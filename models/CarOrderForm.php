<?php
/**
 * @property integer $pick_up_location
 * @property integer $dropping_off_location
 * @property array | string $car_extras
 * @property array | string $free_car_extras
 * @property string $name_and_surname
 * @property string $email
 * @property string $phone_number
 * @property string $cell_phone_number
 * @property string $comment
 * @property integer $payment_type
 * @property integer $gender
 * @property integer $car_id
 * @property integer $status
 * @property boolean $agreement
 */

namespace app\models;


use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Json;


class CarOrderForm extends ActiveRecord
{
    const ORDER_CREATED = 1;
    const ORDER_SUCCESS = 10;
    const ORDER_CANCELLED = -1;
    const ORDER_DELETED = 0;

    public static function tableName()
    {
        return 'orders';
    }

    public $days;
    public $agreement = true;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['name_and_surname', 'email', 'agreement',], 'required'],
            [['pick_up_location', 'dropp_off_location', 'gender', 'payment_type', 'car_id', 'status', 'days', 'created_at', 'updated_at', 'cancelled_at', 'status'], 'integer'],
            [['name_and_surname', 'email', 'phone_number', 'cell_phone_number', 'comment', 'sale'], 'string'],
            [['agreement'], 'boolean'],
            ['email', 'email'],
            [['car_extras', 'free_car_extras', 'reserved_dates'], 'safe'],
            ['reserved_dates', 'required', 'message' => 'You have to select dates from calendar']
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'agreement' => 'I accept <a href="">all information and Payments etc</a>',
        ];
    }

    /**
     * Getting extras of cars
     */
    public function getExtras()
    {
        $extras = CarExtras::find()->where(['not', ['price' => null]])->all();
        $return = [];
        foreach ($extras as $extra) {
            $value = $extra->name;
            $value .= '<span class="pull-right" data-price="' . $extra->price . '" data-day="' . $extra->is_price_by_day . '"><pr>' . $extra->price . '</pr>'. Yii::t('main', ' Euro').' /';
            $value .= $extra->is_price_by_day ? Yii::t('main', 'for a day') : Yii::t('main', 'total') . '</span>';
            $return[$extra->id] = $value;
        }
        return $return;
    }

    /**
     * Getting free extras of cars
     */
    public function getFreeExtras()
    {
        $free_extras = CarExtras::find()->where(['price' => null])->all();
        $return = [];
        foreach ($free_extras as $extra) {
            $value = $extra->name;
            $value .= '<span class="pull-right">'.Yii::t('main', 'free').'</span>';
            $return[$extra->id] = $value;
        }
        return $return;
    }

    /**
     * @return array
     */
    public function getGenders()
    {
        return [
            0 => Yii::t('main', 'Mr'),
            1 => Yii::t('main', 'Ms'),
        ];
    }

    /**
     * @return Location
     */
    public function getPickUp()
    {
        return Location::findOne(['id' => $this->pick_up_location]);
    }

    /**
     * @return Location
     */
    public function getDropOff()
    {
        return Location::findOne(['id' => $this->dropp_off_location]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Cars::className(), ['car_id' => 'car_id']);
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @param string $secondEmail
     * @return bool whether the model passes validation
     */
    public function contact($email = 'info@rentalcarsnow.cz', $secondEmail = 'msganiyev@gmail.com')
    {

        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom(['info@rentalcarsnow.cz' => 'Order for car'])
                ->setSubject("a new order from rentalcarsnow.cz")
                ->setTextBody("You have a new order at rentalcarsnow.cz 
                            Client name: $this->name_and_surname
                            the dates ordered are:.$this->reserved_dates
                            client phone number is:$this->cell_phone_number
                            comment: $this->comment
                            payment: $this->payment_type
                            ")
                ->send();

            Yii::$app->mailer->compose()
                ->setTo($secondEmail)
                ->setFrom(['info@rentalcarsnow.cz' => 'Order for car'])
                 ->setSubject("a new order from rentalcarsnow.cz")
                ->setTextBody("You have a new order at rentalcarsnow.cz
                            Client name: $this->name_and_surname
                            the dates ordered are:.$this->reserved_dates
                            client phone number is:$this->cell_phone_number
                            comment: $this->comment
                              payment: $this->payment_type
                            ")
                ->send();

            return true;
        }
        return false;
    }
}