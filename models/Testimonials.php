<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


/**
 *
 * @property mixed $content
 */
class Testimonials extends ActiveRecord
{
  
    public static function tableName()
    {
        return 'testimonials';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content_en', 'content_ru', 'content_cz', 'name'], 'required'],
            [['content_en', 'content_ru', 'content_cz'], 'string'],
            [['name'], 'string', 'max' => 150],
            [['image'], 'file',  'extensions' => ['png','jpg','jpeg']],
        ];
    }

    

public function upload()
    {
        if ($this->validate() and $this->image->baseName) {
            $this->image->saveAs(Yii::$app->basePath.'/uploads/' . $this->image->baseName . '.' . $this->image->extension);
            return true;
        } else {
            return false;
        }
    }









    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content_en' => 'Content En',
            'content_ru' => 'Content Ru',
            'content_cz' => 'Content Cz',
            'name' => 'Name',
        ];
    }

    public function getContent()
    {
      $attribute = 'content_'.Yii::$app->language;;
      return $this->$attribute;
    }

}
