<?php

use yii\helpers\Html;
use yii\grid\GridView;

 

$this->title = 'Airbags';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="be-content" style="padding: 0 50px 0 50px">
<div class="cars-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Airbag', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   <?php  $airbag=\yii\helpers\ArrayHelper::map(\app\models\Airbag::find()->all(),'id','name') ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'car_id',
            'name_en',
            'name_ru',
            'name_cz',
             
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
</div>
