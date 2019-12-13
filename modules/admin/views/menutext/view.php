<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

 
?>
<div class="be-content" style="padding: 0 50px 0 50px">
<div class="menutext-view">

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
            'title_en',
            'title_ru',
            'title_cz',
            'content_en',
            'content_ru',
            'content_cz',
        ],
    ]) ?>

</div>
