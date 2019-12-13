<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Faq */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-form">
<div class="be-content" style="padding: 0 50px 0 50px">
    <?php $form = ActiveForm::begin(); ?>
<div class="row">
 

    <div class="col-sm-4">
        
    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
    </div>
<div class="col-sm-4">
    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-sm-4">
    <?= $form->field($model, 'title_cz')->textInput(['maxlength' => true]) ?>
</div>
</div>
<div class="row">
    
<div class="col-sm-4">
    <?= $form->field($model, 'content_en')->textarea(['rows' => 6]) ?>
</div>
<div class="col-sm-4">
    <?= $form->field($model, 'content_ru')->textarea(['rows' => 6]) ?>
     <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
     <?= Html::a(Yii::t('stu', 'Cancel'), ['index'], ['class' => 'btn btn-danger']); ?>
</div>
<div class="col-sm-4">
    <?= $form->field($model, 'content_cz')->textarea(['rows' => 6]) ?>
</div>
</div>

    <div class="form-group">
       
    </div>

    <?php ActiveForm::end(); ?>

</div>
