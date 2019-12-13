<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\RadioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

 
?>
<div class="be-content" style="padding: 0 50px 0 50px">
<div class="radio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Radio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name_en',
            'name_ru',
            'name_cz',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
