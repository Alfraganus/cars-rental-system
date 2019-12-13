<?php

/**
 * Created by PhpStorm.
 * User: Farhodjon
 * Date: 09.06.2018
 * Time: 21:10
 */

use app\models\Cars;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $cars Cars */

$this->title = 'My cars';

?>
<div class="be-content">
    <div class="row" style="padding: 10px 30px">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>№</th>
                <th>Car name</th>
                <th>Main image</th>
                <th>Location</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cars as $key => $car): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $car->name ?></td>
                    <td>
                        <img src="/uploads/<?= $car->photo->image ?>" alt="" class="img-thumbnail" style="max-width: 200px;">
                    </td>
                    <td><?= $car->location ?></td>
                    <td><?= $car->price ?></td>
                    <td>
                        <?php if ($car->status != Cars::STATUS_LOCKED): ?>
                            <a href="<?= Url::to(['users/lock-car', 'id' => $car->car_id]) ?>">
                                <span class="glyphicon glyphicon-lock"></span>
                            </a>
                        <?php else: ?>
                            <a href="<?= Url::to(['users/lock-car', 'id' => $car->car_id]) ?>">
                                <span class="glyphicon glyphicon-ok"></span>
                            </a>
                        <?php endif; ?>
                        <a href="<?= Url::to(['users/view-my-car', 'id' => $car->car_id]) ?>">
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </a>
                        <a href="<?= Url::to(['users/edit-car', 'id' => $car->car_id]) ?>">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
