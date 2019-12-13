<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property int $id
 * @property int $order_id
 * @property string $payment_id
 * @property string $payer_id
 * @property string $payment_type 1=paypal
 * @property int $status 1=sold,2=refund
 * @property int $sale_id Paypal Sale ID
 * @property string $created_at
 *
 */
class Payment extends \yii\db\ActiveRecord
{
    const SOLD           = 1;
    const REFUND         = 2;
    const PAYPAL_PAYMENT = "paypal";

    public static function tableName()
    {
        return 'payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['payment_id', 'payer_id', 'sale_id'], 'string', 'max' => 50],
            [['payment_type'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'payment_id' => 'Payment ID',
            'payer_id' => 'Payer ID',
            'payment_type' => 'Payment Type',
            'status' => 'Status',
            'sale_id' => 'Paypal Sale ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return string
     */
    public function getPaymentId()
    {
        return $this->payment_id;
    }

    /**
     * @return mixed
     */
    public function getSaleId()
    {
        return $this->sale_id;
    }
}
