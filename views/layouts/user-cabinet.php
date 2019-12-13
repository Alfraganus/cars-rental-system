<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\UserAsset;
use yii\helpers\Html;
use yii\helpers\Url;

UserAsset::register($this);

$url = Yii::$app->homeUrl . 'backend/';

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="be-wrapper be-fixed-sidebar">
    <nav class="navbar navbar-default navbar-fixed-top be-top-header">
        <div class="container-fluid">
            <form action="<?= Url::to(['users/logout']) ?>" method="post">
                <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken ?>">
                <button class="btn btn-danger pull-right" style="margin-top: 10px; margin-right: 10px;">Log out</button>
            </form>
            <div class="be-right-navbar">
                <div class="page-title"><span>Cabinet user</span></div>
            </div>
        </div>
    </nav>
    <div class="be-left-sidebar">
        <div class="left-sidebar-wrapper">
            <a href="/" class="left-sidebar-toggle">Go to main page</a>
            <div class="left-sidebar-spacer">
                <div class="left-sidebar-scroll">
                    <div class="left-sidebar-content">
                        <ul class="sidebar-elements">
                            <li class="divider">Menu</li>
                            <li class="<?= Yii::$app->controller->action->id == 'cabinet' ? 'active' : '' ?>">
                                <a href="<?= Url::to(['cabinet']) ?>"><i class="icon mdi mdi-home"></i><span>Cabinet</span></a>
                            </li>
                            <li class="<?= Yii::$app->controller->action->id == 'orders' ? 'active' : '' ?>">
                                <a href="<?= Url::to(['orders']) ?>"><i class="icon mdi mdi-view-list"></i><span>My orders</span></a>
                            </li>
                            <li class="<?= Yii::$app->controller->action->id == 'my-cars' ? 'active' : '' ?>">
                                <a href="<?= Url::to(['my-cars']) ?>"><i class="icon mdi mdi-car"></i><span>My cars</span></a>
                            </li>
                            <li class="<?= Yii::$app->controller->action->id == 'cars' ? 'active' : '' ?>">
                                <a href="<?= Url::to(['add-car']) ?>"><i class="icon mdi mdi-plus-box"></i><span>Add car</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?= $content ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
