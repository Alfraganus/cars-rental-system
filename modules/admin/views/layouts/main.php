<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use app\assets\BackendAsset;
use yii\helpers\Url;

BackendAsset::register($this);

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/logo-fav.png">
    <title>Car rental</title>


</head>
<body>
<div class="be-wrapper be-fixed-sidebar">
    <nav class="navbar navbar-default navbar-fixed-top be-top-header">
        <div class="container-fluid">

            <a href="<?= Url::to(['car/logout']) ?>">
                <button class="btn btn-danger pull-right" style="margin-top: 10px;margin-right:25px;">Log out</button>
            </a>
            <div class="be-right-navbar">


                <div class="page-title"><span>Welcome to admin dashboard</span></div>

            </div>
        </div>
        <?php if (Yii::$app->session->hasFlash('success')) : ?>
            <div class="alert alert-success">
                <strong><?= Yii::$app->session->getFlash('success') ?></strong>
            </div>
        <?php endif ?>
        <?php if (Yii::$app->session->hasFlash('danger')) : ?>
            <div class="alert alert-danger">
                <strong><?= Yii::$app->session->getFlash('danger') ?></strong>
            </div>
        <?php endif ?>
    </nav>
    <div class="be-left-sidebar" style="position:absolute;">
        <div class="left-sidebar-wrapper"><a href="index.html#" class="left-sidebar-toggle">Dashboard</a>
            <div class="left-sidebar-spacer">
                <div class="left-sidebar-scroll">
                    <div class="left-sidebar-content" style="position: relative;">
                        <ul class="sidebar-elements">
                            <li class="divider">Menu</li>
                            <li class="active"><a href="<?= Url::to(['default/']) ?>"><i
                                            class="icon mdi mdi-home"></i><span>Dashboard</span></a>
                            </li>

                            <li><a href="<?= Url::to(['car/']) ?>"><i
                                            class="icon mdi mdi-car"></i><span>Add new car</span></a>
                            <li><a href="<?= Url::to(['orders/']) ?>"><i
                                            class="icon mdi mdi-tab"></i><span>Orders</span></a>
                            <li><a href="<?= Url::to(['car-extras/']) ?>"><i class="icon mdi mdi-google-maps"></i><span>Car extras</span></a>
                            </li>

                            <li><a href="<?= Url::to(['menutext/']) ?>"><i
                                            class="mdi mdi-book-multiple-variant"></i><span> Dashboard menu add</span></a>
                            </li>

                            <li><a href="<?= Url::to(['airbag/']) ?>"><i class="icon mdi mdi-check-all"></i><span>Add Airbag type</span></a>
                            </li>
                            <li><a href="<?= Url::to(['fuel/']) ?>"><i class="icon mdi mdi-gas-station"></i><span>Add fuel type</span></a>
                            </li>
                            <li><a href="<?= Url::to(['radio/']) ?>"><i class="icon mdi mdi-format-indent-increase"></i><span>Add Radio type</span></a>
                            </li>
                            <li><a href="<?= Url::to(['offercategory/']) ?>"><i
                                            class="mdi mdi-book-multiple-variant"></i><span> Add car offering category</span></a>
                            </li>

                            <li><a href="<?= Url::to(['location/']) ?>"><i class="mdi mdi-google-maps"></i><span> Add the location of cars</span></a>
                            </li>

                            <li><a href="<?= Url::to(['testimonials/']) ?>"><i
                                            class="mdi mdi-comment-account"></i><span> Add testimonial</span></a>
                            </li>

                            <li><a href="<?= Url::to(['faq/']) ?>"><i
                                            class="mdi mdi-account-alert"></i><span> Add FAQ</span></a>
                            </li>

                            <li><a href="<?= Url::to(['team/']) ?>"><i class="mdi mdi-account-multiple"></i><span> Manage team</span></a>
                            </li>

                            <li><a href="<?= Url::to(['sales/']) ?>"><i class="mdi mdi-account-multiple"></i><span> Order sales</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?= $content ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
