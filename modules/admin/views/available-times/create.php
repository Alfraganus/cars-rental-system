<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AvailableTimes */

$this->title = 'Create Available Times';
$this->params['breadcrumbs'][] = ['label' => 'Available Times', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="available-times-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
