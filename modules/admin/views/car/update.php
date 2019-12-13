<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cars */

$this->title = 'Update Cars: ' . $model->car_id;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->car_id, 'url' => ['view', 'id' => $model->car_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cars-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
