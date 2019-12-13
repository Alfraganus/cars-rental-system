<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\CarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cars-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'car_id') ?>

    <?= $form->field($model, 'manual') ?>

    <?= $form->field($model, 'airbag') ?>

    <?= $form->field($model, 'fuel') ?>

    <?= $form->field($model, 'condin') ?>

    <?php // echo $form->field($model, 'radio') ?>

    <?php // echo $form->field($model, 'rasxod') ?>

    <?php // echo $form->field($model, 'km') ?>

    <?php // echo $form->field($model, 'manufactureyear') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'datefrom') ?>

    <?php // echo $form->field($model, 'dateto') ?>

    <?php // echo $form->field($model, 'isreserved') ?>

    <?php // echo $form->field($model, 'beginlocation') ?>

    <?php // echo $form->field($model, 'endlocation') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
