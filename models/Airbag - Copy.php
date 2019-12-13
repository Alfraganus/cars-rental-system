<?php

namespace app\models;

use Yii;
 
class AirbagCopy extends \yii\db\ActiveRecord
{


    public static function tableName()
    {
        return 'airbag';
    }

    public $translate_name;



    public function rules()
    {
        return [
           /* [['name'], 'required'],*/
            [['name'], 'string'],
            [['translate_name'], 'safe'],
        ];
    }

    

public function getName($language = null)
    {
        $name = json_decode($this->name, true);
        if ($language) {
            if (isset($name[$language])) {
                return $name[$language];
            } else {
                return null;
            }
        }

        if (isset($name[Yii::$app->language])) {
            return $name[Yii::$app->language];

        } else {
            $a = null;
            foreach ($name as $value) {
                if ($value != '') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }
    }













    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}
