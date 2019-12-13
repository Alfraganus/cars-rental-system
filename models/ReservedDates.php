<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserved_dates".
 *
 * @property integer $id
 * @property string $starting_date
 * @property string $finishing_Date
 * @property integer $car_id
 * @property integer $user_id
 */
class ReservedDates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reserved_dates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['starting_date', 'finishing_Date'], 'required'],
            [['starting_date', 'finishing_Date'], 'safe'],
            [['car_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'starting_date' => 'Starting Date',
            'finishing_Date' => 'Finishing  Date',
            'car_id' => 'Car ID',
            'user_id' => 'User ID',
        ];
    }
}
