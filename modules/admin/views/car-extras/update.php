<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CarExtras */

$this->title = 'Update Car Extras: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Car Extras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car-extras-update">
    <div class="be-content" style="padding: 0 20px 0 20px">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
