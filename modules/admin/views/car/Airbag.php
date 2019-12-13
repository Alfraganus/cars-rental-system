<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- <div class="post-form"> -->

 <div class="be-content" style="padding: 0 50px 0 50px">

     <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
      
        <ul class="nav nav-tabs" role="tablist">
       <li role="presentation"><a href="#en" aria-controls="en" role="tab" data-toggle="tab">En</a></li>
       <li role="presentation" class="active"><a href="#ru" aria-controls="ru" role="tab" data-toggle="tab">Ру</a></li>
       <li role="presentation"><a href="#cz" aria-controls="cz" role="tab" data-toggle="tab">Cz</a></li>
     </ul>
 <div class="tab-content">
<div role="tabpanel" style="padding-top: 25px" class="tab-pane" id="en">
        <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
      </div> 
<div role="tabpanel" style="padding-top: 25px" class="tab-pane" id="ru">
        <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

</div>
  <div role="tabpanel" style="padding-top: 25px" class="tab-pane" id="cz">
        <?= $form->field($model, 'name_cz')->textInput(['maxlength' => true]) ?>

  </div>

  
  
  

 

<div style="clear: both;"></div>

    
        

        
        <div class="col-sm-3">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn  btn-block btn-primary']) ?>
               
        </div>
    </div>

 </div> 
    <?php ActiveForm::end(); ?>

</div>