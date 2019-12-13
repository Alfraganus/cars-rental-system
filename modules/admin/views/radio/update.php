<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Radio */

$this->title = 'Update Radio: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Radios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="radio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
