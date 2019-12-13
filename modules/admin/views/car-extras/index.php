<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CarExtrasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Car Extras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-extras-index">
    <div class="be-content" style="padding: 0 20px 0 20px">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Create Car Extras', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id',
                'name',
                'price:currency',
//            'is_price_by_day',
                [
                    'attribute' => 'is_price_by_day',
                    'value' => function ($m) {
                        if ($m->is_price_by_day) {
                            return 'Yes';
                        }
                        return 'No';
                    }
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}{delete}'
                ],
            ],
        ]); ?>
    </div>
</div>
