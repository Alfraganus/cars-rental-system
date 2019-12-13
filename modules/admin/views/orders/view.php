<?php

use app\models\CarExtras;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CarOrderForm */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Car Order Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-order-form-view">
    <div class="be-content" style="padding: 20px 20px 0 20px">
       <p>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?php if( $model->status != -1 ): ?>
                <?= Html::a('Cancel Order', ['cancel', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to cancel and refund this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            <?php endif; ?>
        </p>

        <?php try {
            echo DetailView::widget([
                'model' => $model,
                'attributes' => [
//                    'id',
                    'car.name',
                    'amount:currency',
                    'sale',
                    [
                        'attribute' => 'reserved_dates',
                        'value' => function ($model) {
                            $dates = Json::decode($model->reserved_dates);
                            if (is_array($dates)) {
                                $result = '';
                                foreach ($dates as $date) {
                                    $result = $result . $date . ', ';
                                }
                                return $result;
                            }
                            return null;
                        }
                    ],
                    'pickUp.name',
                    'dropOff.name',
//                    'car_extras',
                    [
                        'attribute' => 'car_extras',
                        'format' => 'html',
                        'value' => function ($model) {
                            $ids = Json::decode($model->car_extras);
                            if (is_array($ids)) {
                                $result = '';
                                foreach ($ids as $id) {
                                    $extra = CarExtras::find()->select('name_en, price')->where(['id' => $id])->one();
                                    if ($extra) {
                                        $result = $result . $extra->name . ' => <b>' .
                                            Yii::$app->formatter->asCurrency($extra->price) . '</b><br>';
                                    }
                                }
                                return $result;
                            }
                            return null;
                        }
                    ],
                    [
                        'attribute' => 'free_car_extras',
                        'format' => 'html',
                        'value' => function ($model) {
                            $ids = Json::decode($model->free_car_extras);
                            if (is_array($ids)) {
                                $result = '';
                                foreach ($ids as $id) {
                                    $extra = CarExtras::find()->select('name')->where(['id' => $id])->one();
                                    if ($extra) {
                                        $result = $result . $extra->name . '<br>';
                                    }
                                }
                                return $result;
                            }
                            return null;
                        }
                    ],
//                    'gender',
                    [
                        'attribute' => 'gender',
                        'value' => function ($model) {
                            if (!$model->gender) {
                                return 'Male';
                            }
                            return 'Female';
                        }
                    ],
                    'name_and_surname',
                    'email:email',
                    'phone_number',
                    'cell_phone_number',
                    'payment_type',
                    'comment:ntext',
                    'status',
                    'created_at:datetime',
                    'updated_at:datetime',
                ],
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        } ?>
    </div>
</div>
