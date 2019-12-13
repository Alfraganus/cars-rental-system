<?php

namespace app\models;

use Yii;

 
class MenuText extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_text';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_en', 'title_ru', 'title_cz', 'content_en', 'content_ru', 'content_cz'], 'required'],
            [['title_en', 'title_ru', 'title_cz'], 'string', 'max' => 120],
            [['content_en', 'content_ru', 'content_cz'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_en' => 'Title En',
            'title_ru' => 'Title Ru',
            'title_cz' => 'Title Cz',
            'content_en' => 'Content En',
            'content_ru' => 'Content Ru',
            'content_cz' => 'Content Cz',
        ];
    }




public function getTitle()
    {
      $attribute = 'title_'.Yii::$app->language;;
      return $this->$attribute;
    }



    public function getContent()
    {
      $attribute = 'content_'.Yii::$app->language;;
      return $this->$attribute;
    }



}
