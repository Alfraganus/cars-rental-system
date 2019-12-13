<?php

use yii\helpers\Html;
use yii\grid\GridView;

 

$this->title = 'Cars';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="cars-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cars', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'car_id',
            'manual',
            'airbag',
            'fuel',
            'condin',
            // 'radio',
            // 'rasxod',
            // 'km',
            // 'manufactureyear',
            // 'price',
            // 'datefrom',
            // 'dateto',
            // 'isreserved',
            // 'beginlocation',
            // 'endlocation',
            // 'created_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
