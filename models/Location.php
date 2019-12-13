<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "location".
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_ru
 * @property mixed $name
 * @property string $name_cz
 * @property float $lat
 * @property float $lng
 * @property float $delivery_price
 */
class Location extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_cz'], 'required'],
            [['name_en', 'name_ru', 'name_cz'], 'string', 'max' => 255],
            [['lat', 'lng', 'delivery_price'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_en' => 'Name En',
            'name_ru' => 'Name Ru',
            'name_cz' => 'Name Cz',
        ];
    }

     public function getName()
    {
      $attribute = 'name_'.Yii::$app->language;;
      return $this->$attribute;
    }




}
