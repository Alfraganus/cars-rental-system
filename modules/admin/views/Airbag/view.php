<?php

use yii\helpers\Html; 
use yii\widgets\DetailView; 

/* @var $this yii\web\View */ 
/* @var $model app\models\Airbag */ 

$this->title = $model->id; 
$this->params['breadcrumbs'][] = ['label' => 'Airbags', 'url' => ['index']]; 
$this->params['breadcrumbs'][] = $this->title; 
?> 
 <div class="be-content" style="padding: 0 50px 0 50px">
<div class="airbag-view"> 

    <h1><?= Html::encode($this->title) ?></h1> 

    <p> 
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?> 
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [ 
            'class' => 'btn btn-danger', 
            'data' => [ 
                'confirm' => 'Are you sure you want to delete this item?', 
                'method' => 'post', 
            ], 
        ]) ?> 
    </p> 

    <?= DetailView::widget([ 
        'model' => $model, 
        'attributes' => [ 
            'id',
            'name_en',
            'name_ru',
            'name_cz',
        ], 
    ]) ?> 

</div> 