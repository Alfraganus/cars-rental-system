<?php

use yii\helpers\Html; 

/* @var $this yii\web\View */ 
/* @var $model app\models\Airbag */ 

$this->title = 'Update Airbag: ' . $model->id; 
$this->params['breadcrumbs'][] = ['label' => 'Airbags', 'url' => ['index']]; 
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]]; 
$this->params['breadcrumbs'][] = 'Update'; 
?> 
<div class="airbag-update"> 

    <h1><?= Html::encode($this->title) ?></h1> 

    <?= $this->render('_form', [ 
        'model' => $model, 
    ]) ?> 
