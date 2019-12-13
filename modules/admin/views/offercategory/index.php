<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\OfferCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Offer Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="be-content" style="padding: 0 50px 0 50px">
<div class="offer-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Offer Category', ['create'], ['class' => 'btn btn-success']) ?>
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
