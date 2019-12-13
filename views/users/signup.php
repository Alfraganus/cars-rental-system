<?php

/**
 * Created by PhpStorm.
 * User: Farhodjon
 * Date: 30.05.2018
 * Time: 0:04
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $model \mdm\admin\models\form\Signup */
?>
<div class="be-wrapper be-login">
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="splash-container">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading">
                        <img src="<?=Yii::$app->homeUrl;?>img/login.png" alt="logo" width="102" height="97" class="logo-img">
                        <span class="splash-description">Please enter your user information.</span>
                    </div>
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off']]) ?>
                        <div class="login-form">
                            <?= $form->field($model, 'username')->textInput(['placeholder' => 'Username'])->label(false) ?>
                            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email'])->label(false) ?>
                            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>
                            <?= $form->field($model, 'confirm_password')->passwordInput(['placeholder' => 'Confirm Password'])->label(false) ?>
                            <div class="form-group row login-tools">
                                <div class="col-xs-12 login-remember">
                                    <?= $form->field($model, 'i_agree', [
                                        'template' => '{input}{label}',
                                        'options' => ['class' => 'be-checkbox']
                                    ])->checkbox([], false) ?>
                                </div>
                            </div>
                            <div class="form-group row login-submit">
                                <div class="col-xs-6">
                                    <a href="<?= Url::to(['users/login']) ?>" class="btn btn-default btn-xl">Login</a>
                                </div>
                                <div class="col-xs-6">
                                    <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">Register</button>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
