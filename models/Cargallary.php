<?php

namespace app\models;

use Yii;

 
class Cargallary extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return 'cargallary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'category'], 'required'],
            [['category'], 'integer'],
            [['image'], 'file', 'extensions' => 'png,jpg,gif','maxFiles'=>5,'skipOnEmpty'=>false],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'category' => 'Category',
        ];
    }
}
