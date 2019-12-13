<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;


$this->title = $model->car_id;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-view">
    <div class="be-content" style="padding: 0 50px 0 50px">
        <div style="margin-top: 25px"></div>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->car_id], ['class' => 'btn btn-primary pull-right']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->car_id], [
                'class' => 'btn btn-danger pull-right',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?php try {
            echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name_en',
                    'name_ru',
                    'name_cz',
                    'car_id',
                    'manual',
                    'airbag',
                    'fuel',
                    'condin',
                    'radio',
                    'rasxod',
                    'km',
                    'manufactureyear',
                    'price',
                    'description_en',
                    'description_ru',
                    'description_cz',
                    [
                        'attribute' => 'images',
                        'format' => 'html',
                        'value' => function ($model) {
                            $result = '';
                            foreach ($model->photos as $photo) {
                                $result .= Html::img('/uploads/' . $photo->image, ['style' => 'max-width: 200px', 'class' => 'img-thumbnail']);
                            }
                            return $result;
                        }
                    ]
                ],
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        } ?>

    </div>
