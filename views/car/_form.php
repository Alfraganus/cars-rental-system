<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cars */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cars-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'manual')->textInput() ?>

    <?= $form->field($model, 'airbag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fuel')->textInput() ?>

    <?= $form->field($model, 'condin')->textInput() ?>

    <?= $form->field($model, 'radio')->textInput() ?>

    <?= $form->field($model, 'rasxod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'km')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manufactureyear')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'datefrom')->textInput()->input('date') ?>

    <?= $form->field($model, 'dateto')->textInput()->input('date') ?>

    <?= $form->field($model, 'isreserved')->textInput() ?>

    <?= $form->field($model, 'beginlocation')->textInput() ?>

    <?= $form->field($model, 'endlocation')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
