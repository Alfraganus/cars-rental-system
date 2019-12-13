<?php

/**
 * Created by PhpStorm.
 * User: Farhodjon
 * Date: 27.05.2018
 * Time: 19:01
 */

use app\models\Cars;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $car Cars */
/* @var $free_extras \app\models\CarExtras[] */
/* @var $extras \app\models\CarExtras[] */
/* @var $model \app\models\CarOrderForm */

$this->title = $car->name;

?>
<!-- CONTENT AREA -->
<div class="content-area">

    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs text-right">
        <div class="container">
            <div class="page-header">
                <h1>Car Booking</h1>
            </div>
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="<?= Url::to(Yii::$app->request->referrer) ?>">Cars</a></li>
                <li class="active">Booking & Payment</li>
            </ul>
        </div>
    </section>
    <!-- /BREADCRUMBS -->

    <!-- PAGE WITH SIDEBAR -->
    <section class="page-section with-sidebar sub-page">
        <div class="container">
            <div class="row">
                <!-- CONTENT -->
                <div class="col-md-12 content" id="content">

                    <h3 class="block-title alt"> Car Information</h3>
                    <div class="car-big-card alt">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="owl-carousel img-carousel">
                                    <?php foreach ($car->photos as $photo): ?>
                                        <div class="item">
                                            <a class="btn btn-zoom" href="/uploads/<?= $photo->image ?>" data-gal="prettyPhoto">
                                                <i class="fa fa-arrows-h"></i>
                                            </a>
                                            <a href="<?=Yii::$app->homeUrl;?>/uploads/<?= $photo->image ?>" data-gal="prettyPhoto">
                                                <img class="img-responsive" src="<?=Yii::$app->homeUrl;?>/uploads/<?= $photo->image ?>" alt=""/>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="row car-thumbnails">
                                    <?php foreach ($car->photos as $i => $photo): ?>
                                        <div class="col-xs-2 col-sm-2 col-md-3">
                                            <a href="#" onclick="jQuery('.img-carousel').trigger('to.owl.carousel', [<?= $i ?>,300]);">
                                                <img src="<?=Yii::$app->homeUrl;?>/uploads/<?= $photo->image ?>" alt="" class="img-responsive"/>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="car-details">
                                    <div class="list">
                                        <ul>
                                            <li class="title">
                                                <h2><?= $car->name ?> <span><?= $car->fueling->name ?></span></h2>
                                            </li>
                                            <li>Fuel <?= $car->fueling->name ?></li>
                                            <li>Under <?= $car->km ?> Km</li>
                                            <li>Transmission <?= $car->manual == Cars::SPEED_ONE ? Yii::t('site', 'Manual') : Yii::t('site', 'Automatic') ?></li>
                                            <li>5 Year service included</li>
                                            <li>Manufacturing Year <?= $car->manufactureyear ?></li>
                                            <li>5 Doors and Panorama View</li>
                                        </ul>
                                    </div>
                                    <div class="price">
                                        <strong><?= $car->price * $model->days ?></strong> <span>$/for <?= $model->days ?> days</span> <i class="fa fa-info-circle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="page-divider half transparent"/>

                    <a href="<?=Url::to(['site/reservation','id'=>$car->car_id])?>"><button class="btn btn-primary">Reserve this car</button></a>



        </div>
    </section>
    <!-- /PAGE -->

</div>
<!-- /CONTENT AREA -->
