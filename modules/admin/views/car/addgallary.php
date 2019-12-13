<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
 
?>
 
 

 
    <?php $form = ActiveForm::begin(); ?>
 
    <div class="row">
      
 <?php $data = \yii\helpers\Arrayhelper::map(\app\models\Cars::find()->where(['car_id'=>$_REQUEST['id']])->all(),'car_id','name'); ?>
 
  <div class="col-sm-6">
        <?= $form->field($gallary, 'image[]')->fileInput(['multiple' => true]) ?>
 </div>
  <div class="col-sm-6">
    <p style="color: black;background-color: black"><?= $form->field($gallary, 'category')->hiddeninput(['value'=>$product->car_id])->label(false) ?></p>
</div>
 
 
    </div>
 
 
 
    <div class="form-group">
        <?= Html::submitButton($gallary->isNewRecord ? 'Create' : 'Update', ['class' => $gallary->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
       <a href="<?= \yii\helpers\Url::to(['car/index'])?>"> <button class="btn btn-danger">Cancel</button></a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>