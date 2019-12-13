<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Testimonials */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="testimonials-form">
<div class="be-content" style="padding: 0 50px 0 50px">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-sm-8">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
  </div>
  <div class="col-sm-4">
<?= $form->field($model, 'image')->fileinput() ?>
  </div>
	<div class="col-sm-6">
		
    <?= $form->field($model, 'content_en')->textarea(['rows' => 6]) ?>
	</div>
	<div class="col-sm-6">

    <?= $form->field($model, 'content_ru')->textarea(['rows' => 6]) ?>
	</div>
</div>


    <?= $form->field($model, 'content_cz')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
