<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Car management';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="be-content" style="padding: 0 50px 0 50px">
    <div class="cars-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Create Cars', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php $airbag = \yii\helpers\ArrayHelper::map(\app\models\Airbag::find()->all(), 'id', 'name') ?>
        <?php $location = \yii\helpers\ArrayHelper::map(\app\models\Location::find()->all(), 'id', 'name') ?>
        <?php $fuel = \yii\helpers\ArrayHelper::map(\app\models\FuelType::find()->all(), 'id', 'name') ?>
        <?php try {
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'car_id',
                    'name_en',
                    [
                        'attribute' => 'location',
                        'value' => 'carlocation.name',
                        'filter' => $location,

                    ],
                    [
                        'attribute' => 'airbag',
                        'value' => 'bag.name',
                        'filter' => $airbag,
                    ],
                    [
                        'attribute' => 'fuel',
                        'value' => 'fueling.name',
                        'filter' => $fuel,
                    ],
                    // 'radio',
                    // 'rasxod',
                    // 'km',
                    // 'manufactureyear',
                     'price',
                    // 'datefrom',
                    // 'dateto',
                    // 'isreserved',
                    // 'beginlocation',
                    // 'endlocation',
                    // 'created_by',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
//            throw $e;
        } ?>
    </div>
</div>
