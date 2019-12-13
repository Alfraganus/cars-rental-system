<?php

namespace app\models;

use Yii;
 
class Team extends \yii\db\ActiveRecord
{
 
    public static function tableName()
    {
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {   
        return [
            [[ 'name', 'surname', 'skype', 'mobile', 'email'], 'required'],
            [['name', 'surname', 'occupation_ru', 'occupation_cz','occupation_en'], 'string','max'=>255],
            [['image'],'file','extensions'=>['png','jpg','bmp','jpeg'],'checkExtensionByMimeType'=>false] 
        ];
    }

   
    public function upload()
    {

        if($this->validate() and $this->image->baseName) {
            $this->image->saveAs(Yii::$app->basePath.'/uploads/'.$this->image->basename.'.'.$this->image->extension);
                return true;
            } else {
                return false;
            }

        }


    
 public function getOccupation()
    {
      $attribute = 'occupation_'.Yii::$app->language;;
      return $this->$attribute;
    }




    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'name' => 'Name',
            'surname' => 'Surname',
            'occupation_en' => 'Occupation Enlish',
            'occupation_ru' => 'Occupation Russian',
            'occupation_cz' => 'Occupation Czech',
            'skype' => 'Skype id',
            'mobile' => 'Mobile number',
            'email' => 'Email address',
        ];
    }
}
