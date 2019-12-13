<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CarExtras */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-extras-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
<div class="col-sm-6">
    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
 </div>

<div class="col-sm-6">
    <?= $form->field($model, 'name_cz')->textInput(['maxlength' => true]) ?>
 </div>


 </div>
    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'is_price_by_day')->dropDownList([
        1 => 'Yes',
        0 => 'No'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
