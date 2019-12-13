<?php

namespace app\modules\admin\controllers; 

use Yii; 
use app\models\Airbag; 
use app\models\search\AirbagSearch; 
use yii\web\Controller; 
use yii\web\NotFoundHttpException; 
use yii\filters\VerbFilter; 

/** 
 * RegisterController implements the CRUD actions for Airbag model. 
 */ 
class AirbagController extends Controller
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
     * Lists all Airbag models. 
     * @return mixed 
     */ 
    public function actionIndex() 
    { 
        $searchModel = new AirbagSearch(); 
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams); 

        return $this->render('index', [ 
            'searchModel' => $searchModel, 
            'dataProvider' => $dataProvider, 
        ]); 
    } 

    /** 
     * Displays a single Airbag model. 
     * @param integer $id
     * @return mixed 
     */ 
    public function actionView($id) 
    { 
        return $this->render('view', [ 
            'model' => $this->findModel($id), 
        ]); 
    } 

    /** 
     * Creates a new Airbag model. 
     * If creation is successful, the browser will be redirected to the 'view' page. 
     * @return mixed 
     */ 
    public function actionCreate() 
    { 
        $model = new Airbag(); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) { 
            return $this->redirect(['view', 'id' => $model->id]); 
        } else { 
            return $this->render('create', [ 
                'model' => $model, 
            ]); 
        } 
    } 

    /** 
     * Updates an existing Airbag model. 
     * If update is successful, the browser will be redirected to the 'view' page. 
     * @param integer $id
     * @return mixed 
     */ 
    public function actionUpdate($id) 
    { 
        $model = $this->findModel($id); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) { 
            return $this->redirect(['view', 'id' => $model->id]); 
        } else { 
            return $this->render('update', [ 
                'model' => $model, 
            ]); 
        } 
    } 

    /** 
     * Deletes an existing Airbag model. 
     * If deletion is successful, the browser will be redirected to the 'index' page. 
     * @param integer $id
     * @return mixed 
     */ 
    public function actionDelete($id) 
    { 
        $this->findModel($id)->delete(); 

        return $this->redirect(['index']); 
    } 

    /** 
     * Finds the Airbag model based on its primary key value. 
     * If the model is not found, a 404 HTTP exception will be thrown. 
     * @param integer $id
     * @return Airbag the loaded model 
     * @throws NotFoundHttpException if the model cannot be found 
     */ 
    protected function findModel($id) 
    { 
        if (($model = Airbag::findOne($id)) !== null) { 
            return $model; 
        } else { 
            throw new NotFoundHttpException('The requested page does not exist.'); 
        } 
    } 
} 