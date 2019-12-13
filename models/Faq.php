<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property integer $id
 * @property string $title_en
 * @property string $title_ru
 * @property string $title_cz
 * @property string $content_en
 * @property string $content_ru
 * @property string $content_cz
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['title_en', 'title_ru', 'title_cz', 'content_en', 'content_ru', 'content_cz'], 'required'],
            [['content_en', 'content_ru', 'content_cz'], 'string'],
            
            [['title_en', 'title_ru', 'title_cz'], 'string', 'max' => 255],
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
