<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car_extras".
 *
 * @property integer $id
 * @property string $name
 * @property double $price
 * @property integer $is_price_by_day
 */
class CarExtras extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car_extras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_en'], 'required'],
            [['price'], 'number'],
            [['is_price_by_day'], 'integer'],
            [['name_en','name_cz'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'is_price_by_day' => 'Is Price By Day',
        ];
    }

     public function getName()
    {
        $attribute = 'name_' . Yii::$app->language;;
        return $this->$attribute;
    }

    
}
