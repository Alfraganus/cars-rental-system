<?php

/**
 * Created by PhpStorm.
 * User: Farhodjon
 * Date: 09.06.2018
 * Time: 21:00
 */

/* @var $this \yii\web\View */
/* @var $car \app\models\Cars */

$this->title = 'View my car ' . $car->name;

?>
<div class="be-content">
    <div class="row" style="padding: 10px 30px">
        <?php foreach (Yii::$app->session->getAllFlashes() as $key => $value): ?>
            <p class="alert alert-<?= $key ?>"><?= $value ?></p>
        <?php endforeach; ?>
    </div>
</div>
