<?php

namespace app\models;

use Yii;
 
class Airbag extends \yii\db\ActiveRecord
{


    public static function tableName()
    {
        return 'airbag';
    }

 



    public function rules()
    {
        return [
           /* [['name'], 'required'],*/
           [['name_en', 'name_ru', 'name_cz'], 'string', 'max' => 255],
             
        ];
    }

    

 


 public function getName()
    {
      $attribute = 'name_'.Yii::$app->language;;
      return $this->$attribute;
    }










    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}
