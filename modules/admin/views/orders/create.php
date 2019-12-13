<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CarOrderForm */

$this->title = 'Create Car Order Form';
$this->params['breadcrumbs'][] = ['label' => 'Car Order Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-order-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
