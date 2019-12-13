<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\MenutextSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menutext-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title_en') ?>

    <?= $form->field($model, 'title_ru') ?>

    <?= $form->field($model, 'title_cz') ?>

    <?= $form->field($model, 'content_en') ?>

    <?php // echo $form->field($model, 'content_ru') ?>

    <?php // echo $form->field($model, 'content_cz') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
