<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fuel_type".
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_ru
 * @property string $name_cz
 */
class FuelType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fuel_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_en', 'name_ru', 'name_cz'], 'required'],
            [['name_en', 'name_ru', 'name_cz'], 'string', 'max' => 120],
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
