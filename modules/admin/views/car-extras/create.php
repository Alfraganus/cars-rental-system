<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CarExtras */

$this->title = 'Create Car Extras';
$this->params['breadcrumbs'][] = ['label' => 'Car Extras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-extras-create">
    <div class="be-content" style="padding: 0 20px 0 20px">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
