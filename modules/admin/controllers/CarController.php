<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Url;
use app\models\Cars;
use app\models\Airbag;
use app\models\Cargallary;
use app\models\search\CarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CarController implements the CRUD actions for Cars model.
 */
class CarController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cars models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cars model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\db\Exception
     */
    public function actionCreate()
    {
        $model = new Cars();
        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post())) {
        	$model->images = UploadedFile::getInstances($model, 'images');
        	$model->isreserved = Cars::CAR_IS_EMPTY;
            if ($model->save() && $model->uploadMultiple($model->car_id)) {
            	return $this->redirect(['view', 'id' => $model->car_id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionAirbaga()
    {
        $model = new Airbag();


        if ($model->load(Yii::$app->request->post())) {

            if ($model->save()) {
                echo "worked";


                return $this->redirect(['car']);
            }

        } else {
            return $this->render('airbag', [
                'model' => $model,
            ]);
        }

    }


    public function actionAirbag()
    {
        $model = new Airbag();

        if ($model->load(Yii::$app->request->post())) {


            if ($model->save()) {
                echo "name";


                return $this->redirect(['car/']);


            } else {
                return $this->render('airbag', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('airbag', [
                'model' => $model,
            ]);
        }
    }


    public function actionAddgallary($id)
    {
        $gallary = new Cargallary();
        $product = Cars::find()->where(['car_id' => $_REQUEST['id']])->one();
        if ($gallary->load(Yii::$app->request->post())) {
            $gallary->image = UploadedFile::getInstances($gallary, 'image');

            if ($gallary->image && $gallary->validate()) {
                if (!file_exists(Url::to('uploads/'))) {
                    mkdir(Url::to('uploads/'), 0777, true);
                }
                $path = Url::to('uploads/');
                foreach ($gallary->image as $image) {
                    $model = new Cargallary();
                    $model->category = $gallary->category;
                    $model->image = time() . rand(100, 999) . '.' . $image->extension;
                    if ($model->save(false)) {
                        $image->saveAs($path . $model->image);
                    }
                }
                return $this->redirect(['car/index']);
            }


        }


        return $this->renderajax('addgallary', ['gallary' => $gallary, 'product' => $product]);

    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     * @throws \yii\db\Exception
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->images = UploadedFile::getInstances($model, 'images');
            if ($model->save() && $model->uploadMultiple($model->car_id)) {
                return $this->redirect(['view', 'id' => $model->car_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionRemoveImage()
    {
        $id = (int)Yii::$app->request->post('id');
        $photo = Cargallary::findOne($id);
        if ($photo)
            $photo->delete();
        return true;
    }

    /**
     * Deletes an existing Cars model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cars model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cars the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cars::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
