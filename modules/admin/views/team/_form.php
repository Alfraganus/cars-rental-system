<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Team */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="be-content" style="padding: 0 50px 0 50px">
<div class="team-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
    

<div class="col-sm-4">
    <?= $form->field($model, 'name')->textInput() ?>
    <?php if($model->image) {  ?>
 <img src="/uploads/<?=$model->image?> style='width: 300px'>">
        <?php } ?>
</div>
<div class="col-sm-4">
    <?= $form->field($model, 'surname')->textInput() ?>
</div>
<div class="col-sm-4">
    <?= $form->field($model, 'image')->fileinput() ?>
</div>
</div>
<div class="row">
    
<div class="col-sm-4">
    <?= $form->field($model, 'occupation_en')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-sm-4">
    <?= $form->field($model, 'occupation_ru')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-sm-4">
    <?= $form->field($model, 'occupation_cz')->textInput(['maxlength' => true]) ?>
</div>
</div>
<div class="row">
    <div class="col-sm-4">
    <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-sm-4">
    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','style'=>'width:100%']) ?>
    </div>
</div>
<div class="col-sm-4">
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
</div>
</div>

    

    <?php ActiveForm::end(); ?>

</div>
