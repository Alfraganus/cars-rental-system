<?php


namespace app\modules\admin;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * admin module definition class
 */
class module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity->isAdmin) {
                parent::init();
                yii::$app->viewPath='@app/modules/admin/views';
            } else {
                throw new NotFoundHttpException();
            }
        } else {
            parent::init();
            yii::$app->viewPath='@app/modules/admin/views';
        }
        // !yii::$app->user->can("admin")?\yii::$app->errorHandler->errorAction;

        // custom initialization code goes here
    }
}
