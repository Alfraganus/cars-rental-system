<?php

namespace app\controllers;

use app\models\Cars;
use app\models\LoginForm;
use app\models\SignUp;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class UsersController extends Controller
{
    public function init()
    {
        $this->layout = 'user-cabinet';
        parent::init(); // TODO: Change the autogenerated stub
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        $this->layout = 'user-login';

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['users/cabinet']);
        }

        return $this->render('login', [
            'model' => $model
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionSignup()
    {
        $model = new SignUp();
        $this->layout = 'user-login';

        if ($model->load(Yii::$app->request->post()) && $user = $model->signup()) {
            Yii::$app->user->login($user);
            return $this->redirect(['users/cabinet']);
        }

        return $this->render('signup', [
            'model' => $model
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCabinet()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['users/login']);
        }

        return $this->render('cabinet');
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionOrders()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['users/login']);
        }

        return $this->render('orders');
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionViewMyCar($id)
    {
        $car = Cars::findOne($id);

        if (!$car) {
            throw new NotFoundHttpException();
        }

        return $this->render('view-my-car', [
            'car' => $car
        ]);
    }

    /**
     * @return string
     */
    public function actionMyCars()
    {
        $cars = new Cars();
        $cars = $cars->userCars;

        return $this->render('my-cars', [
            'cars' => $cars
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\db\Exception
     */
    public function actionAddCar()
    {
        $model = new Cars();

        if ($model->load(Yii::$app->request->post())) {
            $model->name_ru = $model->name_cz;
            $model->name_en = $model->name_cz;
            $model->description_ru = $model->description_cz;
            $model->description_en = $model->description_cz;
            $model->created_by = Yii::$app->user->id;
            $model->images = UploadedFile::getInstances($model, 'images');
            $model->isreserved = Cars::CAR_IS_EMPTY;
            if ($model->save() && $model->uploadMultiple($model->car_id)) {
                Yii::$app->session->setFlash('success', 'Car added successfully');
                return $this->redirect(['users/view-my-car', 'id' => $model->car_id]);
            }
        }

        return $this->render('add-car', [
            'model' => $model
        ]);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
