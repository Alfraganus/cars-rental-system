<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FuelType */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="fuel-type-form">
<div class="be-content" style="padding: 0 50px 100px 50px">

    <?php $form = ActiveForm::begin(); ?>
<div class="row" style="margin-top: 100px">
	<div class="col-sm-4">
		
    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
	</div>
<div class="col-sm-4">
    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','style'=>'width:100%']) ?>
</div>

<div class="col-sm-4">
    <?= $form->field($model, 'name_cz')->textInput(['maxlength' => true]) ?>
</div>
</div>

    <div class="form-group">
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
