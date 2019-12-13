<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Json;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Car Order Forms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-order-form-index">
    <div class="be-content" style="padding: 0 20px 0 20px">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        

        <?php try {
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//                    'id',
                    'name_and_surname',
                    
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
                        }
                    ],
                    'pickUp.name',
                    'dropOff.name',
//                    'car_extras',
                    //'free_car_extras',
                    //'gender',
                    
//                    'email:email',
                    'phone_number',
                    //'cell_phone_number',
//                    'payment_type',
                    //'comment:ntext',
                    'car.name',
                    //'status',
                    'created_at:datetime',
                    //'updated_at',
                    //'cancelled_at',
                    //'reserved_dates:ntext',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view}{delete}'
                    ],
                ],
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        } ?>
    </div>
</div>
