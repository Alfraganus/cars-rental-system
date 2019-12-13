<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="be-content" style="padding: 0 50px 0 50px">
    <div class="sales-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Create Sales', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php try {
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //                'id',
                    'day',
                    'sale',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
        } catch (Exception $e) {
        } ?>
    </div>
</div>