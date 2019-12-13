<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AvailableTimesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Available Times';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="available-times-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Available Times', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
