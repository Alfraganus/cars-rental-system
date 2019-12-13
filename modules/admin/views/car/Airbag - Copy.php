<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

 <div class="be-content" style="padding: 0 50px 0 50px">

     <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
       <div class="col-md-9">
        <?php
        $languages = Yii::$app->params['languages'];
        $items = [];
        $i = 0; ?>
        <ul class="nav nav-tabs">
       <?php foreach ($languages as $language => $label) { ?>
       <li class="<?= ($i==0)?'active':''?>"><a data-toggle="tab" href="#<?=
       $language ?>"><?=$label?></a></li>
       <?php $i++; } ?> 
   </ul>
   <div class="tab-content">
<?php  $j=0; foreach ($languages as $language => $label) { ?>
  <div id="<?=$language ?>" class="tab-pane fade in<?= ($j==0)?'active':''?>">
  <?= $form->field($model, 'translate_name['.$language.']')->textInput(['maxlength' => true])->label(Yii::t('yii','Title',null,$language)) ?>
     
        
  </div>  
  <?php $j++; } ?> 
</div>
</div>

<div style="clear: both;"></div>

    
        

        
        <div class="col-sm-3">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn  btn-block btn-primary']) ?>
               
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>