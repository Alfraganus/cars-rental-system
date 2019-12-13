<?php

namespace app\controllers;

use app\models\CarExtras;
use app\models\CarOrderForm;
use app\models\Location;
use app\models\Sales;
use app\models\search\CarSearch;
use app\models\search\CarSearcha;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\ReservedDates;
use app\models\LoginForm;
use app\models\Cargallary;
use app\models\events;
use app\models\Team;
use app\models\MenuText;
use app\models\Faq;
use app\models\Testimonials;
use app\models\Cars;
use app\models\ContactForm;
use yii\web\Cookie;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @param $local
     * @return Response
     * @throws BadRequestHttpException
     */
    public function actionChange($local)
    {
        $available_locales = [
            'en',
            'cz'
        ];
        if (!in_array($local, $available_locales)) {
            throw new BadRequestHttpException();

        }
        \Yii::$app->language = $local;
        $cookies = Yii::$app->response->cookies;

        $cookies->add(new Cookie([

            'name' => 'language',
            'value' => $local,

        ]));
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * @param $date
     * @return string|Response
     */
    public function actionReserve($date)
    {
        $model = new ReservedDates();
        $model->starting_date = $date;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('reserve', [
                'model' => $model,
            ]);
        }
    }

    /**
     * @param null $start
     * @param null $end
     * @param null $_
     * @return array
     */
    public function actionViewreservations($start = NULL, $end = NULL, $_ = NULL)
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        $eventList = Events::find()->where(['is_status' => 0])->all();

        $events = [];

        foreach ($eventList as $event) {
            $event = new \yii2fullcalendar\models\event();
            $event->id = $event->event_id;
            $event->title = $event->event_title;
            $event->description = $event->event_detail;
            $event->start = $event->event_start_date;
            $event->end = $event->event_end_date;
            $event->color = (($event->event_type == 1) ? '#00A65A' : (($event->event_type == 2) ? '#00C0EF' : (($event->event_type == 3) ? '#F39C12' : '#074979')));
            $event->textColor = '#FFF';
            $event->borderColor = '#000';
            $event->event_type = (($event->event_type == 1) ? 'Holiday' : (($event->event_type == 2) ? 'Important Notice' : (($event->event_type == 3) ? 'Meeting' : 'Messages')));
            $event->allDay = ($event->event_all_day == 1) ? true : false;
            // $event->url = $event->event_url;
            $events[] = $event;
        }
        return $events;
    }

    /**
     * @return array
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * @param $id
     * @return string
     */
    public function actionOrdering($id)
    {
        $events = ReservedDates::find()->where(['car_id' => 1])->all();

        foreach ($events as $res) {
            $event = new \yii2fullcalendar\models\event();
            $event->id = $res->id;
            $event->title = 'Reserved';
            $event->start = $res->starting_date;
            $event->end = $res->finishing_Date;
            $events[] = $event;
        }
        return $this->render('test', compact('events'));


    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionReservation($id)
    {
        $car = Cars::findOne($id);

        if (!$car) {
            throw new NotFoundHttpException();
        }

        $events = ReservedDates::find()->where(['car_id' => 1])->all();


        $model = new CarOrderForm();
        $model->pick_up_location = (int)Yii::$app->request->get('beginlocation');
        $model->dropp_off_location = (int)Yii::$app->request->get('endlocation');
        $model->datefrom = (int)Yii::$app->request->get('datefrom');
        $model->dateto = (int)Yii::$app->request->get('dateto');
        $model->days = ceil(($model->dateto - $model->datefrom) / 3600 / 24);
        $model->car_id = $id;
        $model->gender = 0;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            echo 'Oplataga o`tadi';
            die;
        }

        foreach ($events as $res) {
            $event = new \yii2fullcalendar\models\event();
            $event->id = $res->id;
            $event->title = 'Reserved';
            $event->start = $res->starting_date;
            $event->end = $res->finishing_Date;
            $events[] = $event;
        }

        return $this->render('reservation', compact(
            'events',
            'car',
            'model'
        ));
    }

    /**
     * @return string
     */
    public function actionServices()
    {
        return $this->render('services');
    }

    /**
     * @return string
     */
    public function actionTest()
    {
        return $this->render('test');
    }

    /**
     * @return string
     */
    public function actionFaq()
    {

        $searchModel = new CarSearcha();
        $dataProvider = $searchModel->filter(Yii::$app->request->queryParams);
        $dataProvider->query->limit(3);
         $faq = Faq::find()->orderby('id DESC')->all();
        $dataProvider->pagination->defaultPageSize = 3;
        return $this->render('faq', [
            'resulta' => $dataProvider,
            'searchModel' => $searchModel,
            'faq' => $faq,
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionIndex()
    {
        $cars = Cars::find()->all();
        $contact = new ContactForm();
        $economic = Cars::find()->where(['category' => 1])->all();
         $bestoffer = Cars::find()->orderBy('car_id ASC')->limit(4)->all();
        $premium = Cars::find()->orderBy('car_id DESC')->limit(4)->all();
        $faq = Faq::find()->limit(4)->orderby('id DESC')->all();
        $team = Team::find()->orderby('id DESC')->limit(4)->all();
        $faq2 = Faq::find()->limit(4)->orderby('id ASC')->all();
        $menu = MenuText::find()->one();
        $testimonials = Testimonials::find()->all();
        $model = new CarSearch();

        return $this->render('index', compact(
            'cars',
            'contact',
            'economic',
            'model',
            'bestoffer',
            'premium',
            'testimonials',
            'faq',
            'faq2',
            'team',
            'menu'
        ));
    }

    /**
     * @return CarExtras[]|Cars[]|Events[]|Faq[]|Location[]|ReservedDates[]|Sales[]|Team[]|Testimonials[]|array|\yii\db\ActiveRecord[]
     */
    public function actionGetLocations()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $result = Location::find()->all();
        return $result;
    }

    /**
     * Showing all cars by get params
     * @return string
     */
    public function actionCars()
    {
        $searchModel = new CarSearch();
        $dataProvider = $searchModel->filter(Yii::$app->request->queryParams);
        $between = $searchModel->oralTimes;

        return $this->render('cars', [
            'result' => $dataProvider,
            'searchModel' => $searchModel,
            'between' => $between,
        ]);
    }

    /**
     * Displaying single car page
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionCar($id)
    {
        $start = strtotime('-1 month');
        $end = strtotime('+1 month');
         $carpicture = Cargallary::find()->where(['car_id'=>$_REQUEST['id']])->one();
        $carmodel = Cars::find()->where(['car_id'=>$_REQUEST['id']])->one();
        $car = Cars::find()->joinWith(['orders' => function (Query $query) use ($start, $end) {
            $query->where(['between', 'created_at', $start, $end]);
        }])->andWhere(['cars.car_id' => $id])->one();

        if (!$car) {
            $car = Cars::findOne($id);
            if (!$car) {
                throw new NotFoundHttpException();
            }
        }

        $pick_up_point = (int)Yii::$app->request->get('beginlocation');
        $dropp_off_point = (int)Yii::$app->request->get('endlocation');
        $pick_up_point = Location::findOne($pick_up_point);
        if (!$pick_up_point) {
            $pick_up_point = Location::find()->one();
        }
        $dropp_off_point = Location::findOne($dropp_off_point);
        if (!$dropp_off_point) {
            $dropp_off_point = Location::find()->one();
        }

        $model = new CarOrderForm();
        $model->pick_up_location = $pick_up_point->id;
        $model->dropp_off_location = $dropp_off_point->id;
        $model->reserved_dates = Yii::$app->request->get('reserved_dates');
        $model->car_id = $id;
        $model->gender = 0;

        if ($model->load(Yii::$app->request->post())) {
            if (!$model->reserved_dates || count($model->reserved_dates) == 0) {
                Yii::$app->session->setFlash('danger', 'Please select reserved dates from calendar');
            } elseif (!$model->payment_type) {
                Yii::$app->session->setFlash('danger', 'Please select payment type');
            } else {
                $count_days = count($model->reserved_dates);
                $model->amount = $count_days * $car->price;
                $sale_amount = 0;
                $model->created_at = time();

                //Calculating extra features amount
                $extras = CarExtras::find()->where(['in', 'id', $model->car_extras])->all();
                $add_amount = 0;
                foreach ($extras as $extra) {
                    if ($extra->is_price_by_day) {
                        $add_amount += $count_days * $extra->price;
                    } else {
                        $add_amount += $extra->price;
                    }
                }
                //Adding to order amount all extras amount
                $model->amount += $add_amount;

                //Calculating sale for car
                $sales = Sales::find()->orderBy(['day' => SORT_DESC])->all();
                foreach ($sales as $sale) {
                    if ($count_days >= $sale->day) {
                        $sale_amount = ($count_days * $car->price) - ($count_days * $car->price) * (100 - $sale->sale) / 100;
                        $model->sale = $sale->sale . ' % sale for ranting car more than ' . $sale->day . ' days';
                        break;
                    }
                }
                $model->amount -= $sale_amount;

                $model->car_extras = Json::encode($model->car_extras);
                $model->free_car_extras = Json::encode($model->free_car_extras);
                $model->reserved_dates = Json::encode($model->reserved_dates);
                if ($model->save()) {
                    $model->contact('info@rentalcarsnow.cz');
                    Yii::$app->session->setFlash('success-order', 'Thank You for Your Order! Your order will be reviewed soon and our manager will contact with you!');
                    return $this->redirect(['/']);
                }
            }
        }

        $sales = Sales::find()->all();

        if (!is_array($model->reserved_dates)) {
            $model->reserved_dates = [];
        }

        return $this->render('car', [
            'car' => $car,
            'model' => $model,
            'carmodel'=>$carmodel,
            'sales' => $sales,
            'carpicture' => $carpicture,
        ]);
    }

    public function actionPaymentTerms()
    {
        return $this->render('payment-terms');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'user-login';
        if (!Yii::$app->user->isGuest) {
            Yii::$app->user->logout();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $contact = new ContactForm();
        if ($contact->load(Yii::$app->request->post()) && $contact->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->redirect(Yii::$app->request->referrer);
        }
        return $this->render('contact', [
            'contact' => $contact,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {

        $cars = Cars::find()->all();
        return $this->render('about', compact('cars'));
    }

    /**
     * @param $id
     * @return string
     */
    public function actionBooking($id)
    {
        $findcar = Cars::findone($id);
        return $this->render('booking', compact('findcar'));
    }
}
