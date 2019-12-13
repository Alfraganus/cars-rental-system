<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use yii\web\UploadedFile;


/**
 *
 * @property array $busyDays
 * @property mixed $airconditioning
 * @property mixed $carlocation
 * @property mixed $name
 * @property mixed $fueling
 * @property \yii\db\ActiveQuery $photo
 * @property mixed $description
 * @property mixed $bag
 * @property \yii\db\ActiveQuery $orders
 * @property mixed $category
 * @property \yii\db\ActiveQuery $photos
 * @property \app\models\Faq[]|\app\models\Events[]|array|\yii\db\ActiveRecord[]|\app\models\Testimonials[]|\app\models\ReservedDates[]|\app\models\CarExtras[]|\app\models\Cars[]|\app\models\Team[] $userCars
 * @property mixed name_ru
 * @property mixed name_en
 * @property mixed name_cz
 * @property mixed description_cz
 * @property mixed description_ru
 * @property mixed description_en
 * @property int|string created_by
 * @property mixed car_id
 * @property mixed price
 * @property mixed fuel
 * @property mixed manual
 * @property mixed condin
 * @property mixed location
 * @property mixed radio
 * @property mixed manufactureyear
 * @property mixed isreserved
 * @property mixed airbag
 */
class Cars extends ActiveRecord
{
    const CAR_IS_EMPTY = 0;
    const CAR_IS_BUSY = 1;
    const SPEED_ONE = 1;
    const SPEED_TWO = 2;

    const AIR_ONE = 1;
    const AIR_TWO = 2;
    
    const STATUS_LOCKED = 0;
    const STATUS_ADV = 5;
    const STATUS_ACTIVE = 10;

    const PAYMENT_TYPE_PAYPAL = 4;
    const PAYMENT_TYPE_CARD = 3;
    const PAYMENT_TYPE_CASH = 2;
    const PAYMENT_TYPE_BANK = 1;

    public $beginlocation;
    public $endlocation;
    public $datefrom;
    public $timefrom;
    public $dateto;
    public $timeto;
    public $price_from;
    public $price_to;

    /**
     * @var $images UploadedFile
     */
    public $images;
//    public $lat;
//    public $lng;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cars';
    }


    public function rules()
    {
        return [
            /*    [['manual', 'airbag', 'fuel', 'condin', 'radio', 'rasxod', 'km', 'manufactureyear', 'price', 'datefrom', 'dateto', 'isreserved', 'beginlocation', 'endlocation', 'created_by'], 'required'],*/
            [['name_cz', 'location', 'price', 'manufactureyear'], 'required'],
            [['manual', 'fuel', 'condin', 'radio', 'manufactureyear', 'price_cz','price_ru','price_en', 'isreserved', 'created_by', 'category', 'beginlocation', 'endlocation', 'rasxod', 'km', 'price_from', 'price_to', 'status'], 'integer'],
            [['datefrom', 'dateto', 'timefrom', 'timeto'], 'safe'],
            [['airbag'], 'string', 'max' => 50],
            [['name_en', 'name_ru', 'name_cz'], 'string', 'max' => 150],
            [['description_en', 'description_ru', 'description_cz'], 'string', 'max' => 200],
            [['image'], 'file', 'extensions' => 'png,jpg,bmp,jpeg', 'maxFiles' => 4],
            [['images'], 'file', 'extensions' => 'png, jpg, bmp, gif, jpeg', 'maxFiles' => 10],
            [['images'], 'required', 'on' => 'create']

        ];
    }

    public function getDescription()
    {
        $attribute = 'description_' . Yii::$app->language;
        return $this->$attribute;
    }


    public function getBag()
    {
        return $this->hasOne(Airbag::className(), ['id' => 'airbag']);
    }


    public function getCarlocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location']);
    }

    public function getFueling()
    {
        return $this->hasOne(FuelType::className(), ['id' => 'fuel']);
    }


    public function getAirconditioning()
    {
        return $this->hasOne(FuelType::className(), ['id' => 'condin']);
    }

    public function getCategory()
    {
        return $this->hasOne(OfferCategory::className(), ['id' => 'category']);
    }


    public function upload()
    {

        if ($this->validate()) {
            foreach ($this->image as $file) {
                $file->saveAs(Yii::$app->basePath . '/uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }

    }

    /**
     * @return array
     */
    public static function getSpeedmanagement()
    {
        return [
            self::SPEED_ONE => Yii::t('main', 'Manual'),
            self::SPEED_TWO => Yii::t('main', 'Automatic'),
        ];
    }

    /**
     * @return array
     */
    public static function getAir()
    {

        return [
            self::AIR_ONE => yii::t('main', 'Yes'),
            self::AIR_TWO => yii::t('main', 'No'),
        ];

    }

    public function getName()
    {
        $attribute = 'name_' . Yii::$app->language;;
        return $this->$attribute;
    }


   public function getPrice()
    {
        $attribute = 'price_' . Yii::$app->language;;
        return $this->$attribute;
    }
    /**
     * Get first image of car
     * @return \yii\db\ActiveQuery
     */
    public function getPhoto()
    {
        return $this->hasOne(Cargallary::className(), ['car_id' => 'car_id']);
    }

    /**
     * Get all images of car
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Cargallary::className(), ['car_id' => 'car_id']);
    }


    public function attributeLabels()
    {
        return [
            'car_id' => 'Car ID',
            'name' => 'Name (model of the car)',
            'manual' => Yii::t('main', 'Speed management'),
            'airbag' => Yii::t('main', 'Airbag type'),
            'fuel' => Yii::t('main', 'Fuel type'),
            'condin' => Yii::t('main', 'Air conditioning'),
            'radio' => Yii::t('main', 'Radio availability'),
            'rasxod' => Yii::t('main', 'Consumption of fuel per 100 km'),
            'km' => Yii::t('main', 'Km passed by now'),
            'manufactureyear' => Yii::t('main', 'Car manufacture year'),
            'price' => Yii::t('main', 'Price per day'),
            'datefrom' => Yii::t('main', 'Pick-up date'),
            'timefrom' => Yii::t('main', 'Time'),
            'timeto' => Yii::t('main', 'Time'),
            'dateto' => Yii::t('main', 'Drop-off date'),
            'isreserved' => Yii::t('main', 'Is reserved'),
            'beginlocation' => Yii::t('main', 'Pick-up location'),
            'endlocation' => Yii::t('main', 'Drop-off location'),
            'created_by' => Yii::t('main', 'User'),
            'name_cz' => Yii::t('main', 'Car model'),
        ];
    }

    /**
     * Upload images and save to db
     * @param $id
     * @return bool
     * @throws \yii\db\Exception
     */
    public function uploadMultiple($id)
    {
        if ($this->validate()) {
            $file_names = [];
            foreach ($this->images as $image) {
                $file_name = time(). ' - ' . $image->baseName . '.' . $image->extension;
                $image->saveAs(Yii::$app->basePath . '/uploads/' . $file_name);
                $file_names[] = [
                    'image' => $file_name,
                    'car_id' => $id
                ];
            }
            Yii::$app->db->createCommand()->batchInsert('cargallary', ['image', 'car_id'], $file_names)->execute();
            return true;
        }
        return false;
    }

    /**
     * @return CarExtras[]|Cars[]|Events[]|Faq[]|ReservedDates[]|Team[]|Testimonials[]|array|ActiveRecord[]
     */
    public function getUserCars()
    {
        return self::find()->where(['created_by' => Yii::$app->user->id])->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(CarOrderForm::className(), ['car_id' => 'car_id']);
    }

    /**
     * @return array
     */
    public function getBusyDays()
    {
        $car_busy_days = [];
        if (isset($this->orders)) {
            foreach ($this->orders as $order) {
                $arr = Json::decode($order->reserved_dates);
                if (!is_array($arr)) {
                    $arr = [];
                }
                $car_busy_days = array_merge($car_busy_days, $arr);
            }
        }

        return $car_busy_days;
    }
}
