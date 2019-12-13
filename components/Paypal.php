<?php
namespace app\components;

use app\models\CarOrderForm;
use app\models\Cars;
use app\models\Payment as PaymentModel;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RefundRequest;
use PayPal\Api\Sale;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class Paypal
{

    private $apiContext;
    private $currency;

    const CLIENT_ID     = 'AQcraiewG2V2L1tay3XR3M99uWHFjEe9wykorj-E56wcF9ddTtgNEmQ0-63yrv0rMJQLiT2BBaLK2hi8';
    const CLIENT_SECRET = 'EI-xdjb7UDLO8zBwfm3n2LhIF5qCcyqlhyvwISf8ep0oiVWOFuWVEAhOVo0E_BJtqm5lOaRQ94HBzAWD';

    const CLIENT_ID_TEST     = 'AS5ffwlvjGEKZxZzaw4o-mp9ichp5k60yyxrQZYJxo5m4uthJth8IJR_Df9stIAY3PVUyqBCcF1CwtMi';
    const CLIENT_SECRET_TEST = 'EMZZm0b78NnbJTBLtoG7B6gZXISwI7UF4R8mgxEPWfMXJ1BIszfWpiqkYKcuHkFLkdFaDu83hBjALA4g';

    public function __construct()
    {
        if( \Yii::$app->language == 'en' ){
            $this->currency = 'EUR';
        }else if(\Yii::$app->language == 'cz'){
            $this->currency = "CZK";
        }else{
            $this->currency = 'EUR';
        }

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(self::CLIENT_ID, self::CLIENT_SECRET)
        );

        $this->apiContext->setConfig(['mode' => 'live']);
    }

    public function createPayment($model)
    {
        $payer = new Payer();
        $car   = Cars::find()->where(['car_id' => $model->car_id])->one();
        $payer->setPaymentMethod('paypal');

        $item1 = new Item();
        $item1->setName($car->getName())->setCurrency($this->currency)->setQuantity(1)->setSku($model->car_id)
              ->setPrice($model->amount);

        $itemList = new ItemList();
        $itemList->setItems([$item1]);

        $details = new Details();
        $details->setShipping(0)->setSubtotal($model->amount);

        $amount = new Amount();
        $amount->setCurrency($this->currency)->setTotal($model->amount)->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
                    ->setItemList($itemList)
                    ->setDescription($car->getDescription())
                    ->setInvoiceNumber(uniqid());

        $baseUrl = 'http://rentalcarsnow.cz';

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl/site/paypal?success=true&order_id=" . $model->id)
                     ->setCancelUrl("$baseUrl/site/paypal?success=false&order_id=" . $model->id);

        $payment = new Payment();
        $payment->setIntent("sale")->setPayer($payer)->setRedirectUrls($redirectUrls)->setTransactions([$transaction]);

        try {
            $payment->create($this->apiContext);
        } catch (\Exception $ex) {
            var_dump($ex);
            return false;
        }

        $approvalUrl = $payment->getApprovalLink();

        return $approvalUrl;
    }

    public function executePayment()
    {
        $get = \Yii::$app->request->get();

        if (isset($get['token']) && isset($get['success'])) {
            if ($get['success'] == 'true' && isset($get['paymentId']) && isset($get['PayerID']) && isset($get['order_id'])) {
                $order = CarOrderForm::find()->where(['id' => $get['order_id']])->one();

                $paymentId = $get['paymentId'];
                $payment   = Payment::get($paymentId, $this->apiContext);
                $execution = new PaymentExecution();
                $execution->setPayerId($get['PayerID']);

                $transaction = new Transaction();
                $amount      = new Amount();
                $details     = new Details();

                $details->setShipping(0)->setSubtotal($order->amount);
                $amount->setCurrency($this->currency);
                $amount->setTotal($order->amount);
                $amount->setDetails($details);
                $transaction->setAmount($amount);

                $execution->addTransaction($transaction);

                try {
                    $pay                    = $payment->execute($execution, $this->apiContext);
                    $payModel               = new PaymentModel();
                    $payModel->order_id     = $order->id;
                    $payModel->payment_id   = $paymentId;
                    $payModel->payer_id     = $get['PayerID'];
                    $payModel->payment_type = PaymentModel::PAYPAL_PAYMENT;
                    $payModel->status       = PaymentModel::SOLD;
                    $payModel->sale_id      = $pay->transactions[0]->related_resources[0]->sale->id;
                    $payModel->save();

                    $order->contact('info@rentalcarsnow.cz');

                    \Yii::$app->session->setFlash('success-order', 'Thank You for Your Order! Your order will be reviewed soon and our manager will contact with you!');
                    return true;
                } catch (\Exception $e) {
                    \Yii::debug($e->getMessage());
                    \Yii::$app->session->setFlash('danger', 'Payment Failed..');
                    return true;
                }
            } else {
                \Yii::$app->session->setFlash('danger', 'Payment Failed..');

                return true;
            }
        }
        return true;
    }

    public function refundOrder(CarOrderForm $order)
    {
        $payment = PaymentModel::find()->where(['order_id' => $order->id])->one();

        if (!$payment) {
            \Yii::error('Paypal Payment not found this order..');
            \Yii::$app->session->setFlash('danger', 'Paypal Payment not found this order..');
            return false;
        }

        if ($payment->status == PaymentModel::REFUND) {
            \Yii::error('The Payment is already Refunded..');
            \Yii::$app->session->setFlash('danger', 'The Payment is already Refunded..');
            return false;
        }

        $amt = new Amount();
        $amt->setCurrency($this->currency)
            ->setTotal($order->amount);

        $refundRequest = new RefundRequest();
        $refundRequest->setAmount($amt);

        $sale = new Sale();
        $sale->setId($payment->getSaleId());

        try {
            $sale->refundSale($refundRequest, $this->apiContext);
            $payment->status = PaymentModel::REFUND;
            $payment->save();

            return true;
        } catch (\Exception $e) {
            \Yii::error($e->getMessage());
            \Yii::$app->session->setFlash('danger', $e->getMessage());
            return false;
        }
    }
}

?>
