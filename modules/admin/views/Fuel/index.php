<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\FuelTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fuel Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuel-type-index">
<div class="be-content" style="padding: 0 50px 0 50px">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fuel Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name_en',
            'name_ru',
            'name_cz',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
