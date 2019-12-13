<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MenutextSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menutexts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menutext-index">
<div class="be-content" style="padding: 0 50px 0 50px">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Menutext', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title_en',
            'title_ru',
            'title_cz',
            'content_en',
            // 'content_ru',
            // 'content_cz',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
