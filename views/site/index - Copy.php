<?php

use app\models\AvailableTimes;
use app\models\Location;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

?>
<style>
    .shadow {
        margin: 10px;
        background-color: black;
        border: 1px solid black;
        opacity: 0.8
    }
.fa-angle-left:before {
    color:red !important;
}

.fa-angle-right:before {
    color:red !important;
}

</style>
<div class="content-area">
    <!-- PAGE -->
    <section class="page-section no-padding slider">
        <div class="container full-width">
            <div class="main-slider">
                <div class="item slide2 ver2" style="background-image: url('img/road.jpg');background-size: 100% 100%">
                    <div class="caption">
                        <div class="container">
                            <div class="div-table">
                                <div class="div-cell">
                                    <div class="caption-content">
                                        <!-- Search form -->
                                        <div class="form-search light">
                                            <?php $form = ActiveForm::begin(['method' => 'GET', 'action' => Url::to(['site/cars'])]) ?>
                                            <div class="form-title">
                                                <i class="fa fa-globe"></i>
                                                <h2><?=Yii::t('main','Search for Cheap Rental Cars in Prague')?> </h2>
                                            </div>
                                            <div class="row row-inputs">
                                                <div class="container-fluid">
                                                    <div class="col-sm-12">
                                                        <?= $form->field($model, 'beginlocation', [
                                                            'options' => [
                                                                'class' => 'form-group selectpicker-wrapper'
                                                            ]
                                                        ])->dropDownList(ArrayHelper::map(Location::find()->all(), 'id', 'name'), [
                                                            'class' => 'selectpicker input-price',
                                                            'data-live-search' => 'true',
                                                            'data-width' => '100%',
                                                            'data-toggle' => 'tooltip',
                                                            'title' => 'Select'
                                                        ]) ?>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <?= $form->field($model, 'endlocation', [
                                                            'options' => [
                                                                'class' => 'form-group selectpicker-wrapper'
                                                            ]
                                                        ])->dropDownList(ArrayHelper::map(Location::find()->all(), 'id', 'name'), [
                                                            'class' => 'selectpicker input-price',
                                                            'data-live-search' => 'true',
                                                            'data-width' => '100%',
                                                            'data-toggle' => 'tooltip',
                                                            'title' => 'Select'
                                                        ]) ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-inputs">
                                                <div class="container-fluid">
                                                    <div class="col-sm-7">
                                                        <?= $form->field($model, 'datefrom', [
                                                            'template' => '{label}{input}{error}<span class="form-control-icon"><i class="fa fa-calendar"></i></span>',
                                                            'options' => ['class' => 'form-group has-icon has-label']
                                                        ])->textInput([
                                                            'placeholder' => 'mm/dd/yyyy',
                                                            'class' => 'form-control datepicker',
                                                            'autocomplete' => 'off',
                                                            'value' => date('m/d/Y')
                                                        ]) ?>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?= $form->field($model, 'timefrom', [
                                                            'template' => '{label}{input}{error}<span class="form-control-icon"><i class="fa fa-clock-o"></i></span>',
                                                            'options' => ['class' => 'form-group has-icon has-label']
                                                        ])->dropDownList(ArrayHelper::map(AvailableTimes::find()->all(), 'id', 'time'), [
                                                            'class' => 'selectpicker input-price',
                                                            'data-live-search' => 'true',
                                                            'data-width' => '100%',
                                                            'data-toggle' => 'tooltip',
                                                            'title' => 'Select time'
                                                        ]) ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-inputs">
                                                <div class="container-fluid">
                                                    <div class="col-sm-7">
                                                        <?= $form->field($model, 'dateto', [
                                                            'template' => '{label}{input}{error}<span class="form-control-icon"><i class="fa fa-calendar"></i></span>',
                                                            'options' => ['class' => 'form-group has-icon has-label']
                                                        ])->textInput([
                                                            'placeholder' => 'mm/dd/yyyy',
                                                            'class' => 'form-control datepicker',
                                                            'autocomplete' => 'off',
                                                            'value' => date('m/d/Y', strtotime('+2 week'))
                                                        ]) ?>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?= $form->field($model, 'timeto', [
                                                            'template' => '{label}{input}{error}<span class="form-control-icon"><i class="fa fa-clock-o"></i></span>',
                                                            'options' => ['class' => 'form-group has-icon has-label']
                                                        ])->dropDownList(ArrayHelper::map(AvailableTimes::find()->all(), 'id', 'time'), [
                                                            'class' => 'selectpicker input-price',
                                                            'data-live-search' => 'true',
                                                            'data-width' => '100%',
                                                            'data-toggle' => 'tooltip',
                                                            'title' => 'Select time'
                                                        ]) ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-submit">
                                                <div class="container-fluid">
                                                    <div class="inner">
                                                        <i class="fa fa-plus-circlee"></i> <a href="#"></a>
                                                        <button type="submit" id="formSearchSubmit2" class="btn btn-submit btn-theme ripple-effect pull-right"><?=Yii::t('main','Find car')?></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php ActiveForm::end() ?>
                                        </div>
                                        <!-- /Search form -->
                                        <style>
                                            .caption-text a:hover {
                                                background-color: #14181c !important;
                                                border-color: #14181c !important;

                                            }
                                        </style>
                                        <h2 class="caption-subtitle"><?= $menu->title ?></h2>
                                        <p class="caption-text">
                                        <div class="shadow caption-text" style="width: 600px;line-height: 1.6">
                                            <?= $menu->content ?></div>
                                        </p>
                                        <p class="caption-text">

                                            <a style="background-color: #e60000;border-color: #e60000;" class="btn btn-theme ripple-effect btn-theme-md" href="<?= Url::to(['site/cars']) ?>"><?=Yii::t('main','See All Vehicles')?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Slide 2 -->


            </div>
        </div>

</div>

<!-- PAGE -->
<!-- <section class="page-section" style="background-color: #AAAAAA">
    <div class="container">
        <div class="row">
            <div class="col-md-4 wow flipInY" data-wow-offset="70" data-wow-duration="1s">
                <div class="thumbnail thumbnail-featured no-border no-padding">
                    <div class="media">
                        <a class="media-link" href="#">
                            <div class="caption">
                                <div class="caption-wrapper div-table">
                                    <div class="caption-inner div-cell">
                                        <div class="caption-icon"><i class="fa fa-support" style="color:red"></i></div>
                                        <h4 class="caption-title">Tech Support</h4>
                                        <div class="caption-text">Duis bibendum diam non erat facilaisis tincidunt. Fusce leo neque,lacinia at tempor vitae, porta at arcu.</div>
                                        <div class="buttons">
                                            <span class="btn btn-theme ripple-effect btn-theme-transparent">Read More</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="caption hovered" style="background-image: url('img/support.jpg');background-size: cover; ">
                                <div class="caption-wrapper div-table">
                                    <div class="caption-inner div-cell">
                                        <div class="caption-icon"><i class="fa fa-cogs"></i></div>
                                        <h4 class="caption-title" style="color: #E53D00">7/24 Tech Support</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 wow flipInY" data-wow-offset="70" data-wow-duration="1s">
                <div class="thumbnail thumbnail-featured no-border no-padding">
                    <div class="media">
                        <a class="media-link" href="#">
                            <div class="caption">
                                <div class="caption-wrapper div-table">
                                    <div class="caption-inner div-cell">
                                        <div class="caption-icon"><i class="fa fa-support"></i></div>
                                        <h4 class="caption-title" style="color:red">Reservation </h4>
                                        <div class="caption-text">Duis bibendum diam non erat facilaisis tincidunt. Fusce leo neque,lacinia at tempor vitae, porta at arcu.</div>
                                        <div class="buttons">
                                            <span class="btn btn-theme ripple-effect btn-theme-transparent">Read More</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="caption hovered" style="background-image: url('img/time.jpg');background-size: cover; ">
                                <div class="caption-wrapper div-table">
                                    <div class="caption-inner div-cell">
                                        <div class="caption-icon"><i class="fa fa-calendar"></i></div>
                                        <h4 class="caption-title" style="color:#E53D00">Reservation service</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


            <div class="col-md-4 wow flipInY" data-wow-offset="70" data-wow-duration="1s">
                <div class="thumbnail thumbnail-featured no-border no-padding">
                    <div class="media">
                        <a class="media-link" href="#">
                            <div class="caption">
                                <div class="caption-wrapper div-table">
                                    <div class="caption-inner div-cell">
                                        <div class="caption-icon"><i class="fa fa-support"></i></div>
                                        <h4 class="caption-title">Tech Support</h4>
                                        <div class="caption-text">Duis bibendum diam non erat facilaisis tincidunt. Fusce leo neque,lacinia at tempor vitae, porta at arcu.</div>
                                        <div class="buttons">
                                            <span class="btn btn-theme ripple-effect btn-theme-transparent">Read More</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="caption hovered" style="background-image: url('img/mobile.jpg');background-size:cover; ">
                                <div class="caption-wrapper div-table">
                                    <div class="caption-inner div-cell">
                                        <div class="caption-icon"><i class="fa fa-microphone"></i></div>
                                        <h4 class="caption-title" style="color: #E53D00">7/24 working call centre</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


        </div>

    </div>
</section> -->
<!-- /PAGE -->
<section class="page-section">
    <div class="container">

        <h2 class="section-title wow fadeInUp" data-wow-offset="70" data-wow-delay="100ms">
            <!-- <small>What a Kind of Car You Want</small> -->
            <span><?=Yii::t('main','Great Rental Offers for You')?></span>
        </h2>

                <div class="tabs wow fadeInUp" data-wow-offset="70" data-wow-delay="300ms">
                    <ul id="tabs" class="nav"><!--
                        --><li class=""><a href="#tab-1" data-toggle="tab"><?=Yii::t('main','Best Offers')?></a></li><!--
                        --><li class="active"><a href="#tab-2" data-toggle="tab"><?=Yii::t('main','Popular Cars')?></a></li><!--
                        --><li class=""><a href="#tab-3" data-toggle="tab"><?=Yii::t('main','Economic Cars')?></a></li>
                    </ul>
                </div>


        

        <div class="tab-content wow fadeInUp" data-wow-offset="70" data-wow-delay="500ms">

            <!-- tab 1 -->
            <div class="tab-pane fade" id="tab-1">

                <div class="swiper swiper--offers-best">
                    <div class="swiper-container">

                        <div class="swiper-wrapper">
                            <?php foreach ($economic as $econom): ?>
                                <div class="swiper-slide">
                                    <div class="thumbnail no-border no-padding thumbnail-car-card">
                                        <div class="media">
                                            <a class="media-link" data-gal="prettyPhoto" href="<?= Yii::$app->homeUrl; ?>uploads/<?= $econom->photo->image; ?>">
                                                <img style="width:370px;height:220px" src="<?= Yii::$app->homeUrl; ?>uploads/<?= $econom->photo->image; ?>" alt=""/>
                                                <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                            </a>
                                        </div>
                                        <div class="caption text-center">
                                            <h4 class="caption-title"><a href="#"><?= $econom->name; ?></a></h4>
                                            <div class="caption-text"><b><span style="color:red;font-weight: bold"><?= $econom->price; ?> kc</span> </b><?=Yii::t('main','per a day')?></div>
                                            <div class="buttons">
                                                <a class="btn btn-theme ripple-effect" href="<?= Url::to(['site/car', 'id' => $econom->car_id]) ?>"><?=Yii::t('main','Rent It')?></a>
                                            </div>
                                            <table class="table">
                                                <tr>
                                                    <td><i class="fa fa-car"></i> <?= $econom->manufactureyear; ?></td>
                                                    <td><i class="fa fa-dashboard"></i> <?= $econom->fueling->name;; ?></td>
                                                    <td><i class="fa fa-cog"></i> <?php if ($econom->manual == 1) {
                                                            echo 'Manual';
                                                        } else {
                                                            echo "Automatic";
                                                        } ?></td>
                                                    <td><i class="fa fa-road"></i> <?= $econom->km; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>

                    </div>

                    <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                    <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>

                </div>

            </div>

            <!-- tab 2 -->

            <div class="tab-pane fade active in" id="tab-2">

                <div class="swiper swiper--offers-popular">
                    <div class="swiper-container">

                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <?php foreach ($bestoffer as $offer) : ?>
                                <div class="swiper-slide">
                                    <div class="thumbnail no-border no-padding thumbnail-car-card">
                                        <div class="media">
                                            <a class="media-link" data-gal="prettyPhoto" href="<?= Yii::$app->homeUrl; ?>uploads/<?= $offer->photo->image ?>">
                                                <img style="width:370px;height:220px" src="<?= Yii::$app->homeUrl; ?>uploads/<?= $offer->photo->image ?>" alt=""/>
                                                <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                            </a>
                                        </div>
                                        <div class="caption text-center">
                                            <h4 class="caption-title"><a href="#"><?= $offer->name; ?></a></h4>
                                            <div class="caption-text"><b><span style="color:red;font-weight: bold"><?= $offer->price; ?> kc</span> </b><?=Yii::t('main','per a day')?></div>
                                            <div class="buttons">
                                                <a class="btn btn-theme ripple-effect" href="<?=Url::to(['site/car','id'=>$offer->car_id])?>"><?=Yii::t('main','Rent It')?></a>
                                            </div>
                                            <table class="table">
                                                <tr>
                                                    <td><i class="fa fa-car"></i> <?= $offer->manufactureyear; ?></td>
                                                    <td><i class="fa fa-dashboard"></i> <?= $offer->fueling->name;; ?></td>
                                                    <td><i class="fa fa-cog"></i> <?php if ($offer->manual == 1) {
                                                            echo 'Manual';
                                                        } else {
                                                            echo "Automatic";
                                                        } ?></td>
                                                    <td><i class="fa fa-road"></i> <?= $offer->km; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                    <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>

                </div>

            </div>

            <!-- tab 3 -->
            <div class="tab-pane fade" id="tab-3">

                <div class="swiper swiper--offers-economic">
                    <div class="swiper-container">

                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <?php foreach ($premium as $prem) : ?>
                                <div class="swiper-slide">
                                    <div class="thumbnail no-border no-padding thumbnail-car-card">
                                        <div class="media">
                                            <a class="media-link" data-gal="prettyPhoto" href="<?= Yii::$app->homeUrl; ?>uploads/<?= $prem->photo->image ?>">
                                                <img style="width:370px;height:220px" src="<?= Yii::$app->homeUrl; ?>uploads/<?= $prem->photo->image ?>" alt=""/>
                                                <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                            </a>
                                        </div>
                                        <div class="caption text-center">
                                            <h4 class="caption-title"><a href="#"><?= $prem->name; ?></a></h4>
                                            <div class="caption-text"><b><span style="color:red;font-weight: bold"><?= $prem->price; ?> kc</span> </b><?=Yii::t('main','per a day')?></div>
                                            <div class="buttons">
                                                <a class="btn btn-theme ripple-effect" href="<?=Url::to(['site/car','id'=>$prem->car_id])?>"><?=Yii::t('main','Rent It')?></a>
                                            </div>
                                            <table class="table">
                                                <tr>
                                                    <td><i class="fa fa-car"></i> <?= $prem->manufactureyear; ?></td>
                                                    <td><i class="fa fa-dashboard"></i> <?= $prem->fueling->name;; ?></td>
                                                    <td><i class="fa fa-cog"></i> <?php if ($prem->manual == 1) {
                                                            echo 'Manual';
                                                        } else {
                                                            echo "Automatic";
                                                        } ?></td>
                                                    <td><i class="fa fa-road"></i> <?= $prem->km; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                    <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>

                </div>

            </div>
        </div>

    </div>
</section>
<section class="page-section dark">
    <div class="container">

        <div class="row">
            <div class="col-md-6 wow fadeInLeft" data-wow-offset="200" data-wow-delay="100ms">
                <h2 class="section-title text-left">
                    <!-- <small>What Do You Know About Us</small> -->
                    <span>Our purpose </span>
                </h2>
                <p>At Rentalcars.com everything we do is about giving you the freedom to discover more. We’ll move mountains to find you the right rental car, and bring you a smooth, hassle-free experience from start to finish. Our
                    target is to find the ideal car at your convience </p>
                <ul class="list-icons">
                    <li><i class="fa fa-check-circle"></i>That wonderful feeling – you start the engine and your adventure begins</li>
                    <li><i class="fa fa-check-circle"></i>We want to make renting a car as simple and personal as driving your own.</li>
                </ul>
                <p class="btn-row">
                     <br>
                    <a href="<?= Url::to(['site/cars']) ?>" class="btn btn-theme ripple-effect btn-theme-md pull-right">See All Vehicles</a>
                    <!-- <a href="#" class="btn btn-theme ripple-effect btn-theme-md btn-theme-transparent">Reservation Now</a> -->
                </p>
            </div>
            <div class="col-md-6 wow fadeInRight" data-wow-offset="200" data-wow-delay="300ms">
                <div class="owl-carousel img-carousel">
                    <div class="item"><a href="<?php Yii::$app->homeUrl; ?>slides/slide1.jpg" data-gal="prettyPhoto"><img class="img-responsive" src="<?php Yii::$app->homeUrl; ?>slides/slide1.jpg" alt=""/></a></div>
                    <div class="item"><a href="<?php Yii::$app->homeUrl; ?>slides/slide2.jpg" data-gal="prettyPhoto"><img class="img-responsive" src="<?php Yii::$app->homeUrl; ?>slides/slide2.jpg" alt=""/></a></div>
                    <div class="item"><a href="<?php Yii::$app->homeUrl; ?>slides/slide3.jpg" data-gal="prettyPhoto"><img class="img-responsive" src="<?php Yii::$app->homeUrl; ?>slides/slide3.jpg" alt=""/></a></div>
                    <div class="item"><a href="<?php Yii::$app->homeUrl; ?>slides/slide4.jpg" data-gal="prettyPhoto"><img class="img-responsive" src="<?php Yii::$app->homeUrl; ?>slides/slide4.jpg" alt=""/></a></div>
                </div>
            </div>
        </div>

    </div>
</section>



<section class="page-section image">
    <div class="container">

        <div class="row">
            <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-offset="200" data-wow-delay="100ms">
                <div class="thumbnail thumbnail-counto no-border no-padding">
                    <div class="caption">
                        <div class="caption-icon"><i class="fa fa-users"></i></div>
                        <div class="caption-number">100</div>
                        <h4 class="caption-title">Users</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-offset="200" data-wow-delay="200ms">
                <div class="thumbnail thumbnail-counto no-border no-padding">
                    <div class="caption">
                        <div class="caption-icon"><i class="fa fa-car"></i></div>
                        <div class="caption-number">657</div>
                        <h4 class="caption-title">Total car count</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-offset="200" data-wow-delay="300ms">
                <div class="thumbnail thumbnail-counto no-border no-padding">
                    <div class="caption">
                        <div class="caption-icon"><i class="fa fa-flag"></i></div>
                        <div class="caption-number">1.255.657</div>
                        <h4 class="caption-title">Total KM/MIL</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-offset="200" data-wow-delay="400ms">
                <div class="thumbnail thumbnail-counto no-border no-padding">
                    <div class="caption">
                        <div class="caption-icon"><i class="fa fa-comments-o"></i></div>
                        <div class="caption-number">1255</div>
                        <h4 class="caption-title">Call Center Solutions</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- /PAGE -->

<!-- PAGE -->
<section class="page-section">
    <div class="container">

        <h2 class="section-title wow fadeInDown" data-wow-offset="200" data-wow-delay="100ms">
            <small>See What People Ask to Us</small>
            <span>FAQS</span>
        </h2>

        <div class="row">
            <div class="col-md-6 wow fadeInLeft" data-wow-offset="200" data-wow-delay="200ms">
                <!-- FAQ -->
                <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">


                    <style>
                        .panel-body:first {
                            color: blue !important;

                        }
                    </style>

                    <?php foreach ($faq as $faq): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading<?= $faq->id; ?>">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $faq->id; ?>" aria-expanded="true" aria-controls="collapse1">
                                        <span class="dot"></span> <?= $faq->title; ?>?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse<?= $faq->id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $faq->id; ?>">
                                <div class="panel-body">
                                    <?= $faq->content; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- /faq1 -->
                    <!-- faq2 -->

                    <!-- /faq3 -->
                </div>
                <!-- /FAQ -->
            </div>
            <div class="col-md-6 wow fadeInRight" data-wow-offset="200" data-wow-delay="200ms">
                <!-- FAQ -->
                <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">
                    <!-- faq1 -->
                    <?php foreach ($faq2 as $faq): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading2<?= $faq->id; ?>">
                                <h4 class="panel-title">

                                    <a data-toggle="collapse" data-parent="#accordion" href="#collap<?= $faq->id; ?>" aria-expanded="true" aria-controls="collapse1">
                                        <span class="dot"></span> <?= $faq->title; ?>?
                                    </a>
                                </h4>
                            </div>
                            <div id="collap<?= $faq->id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2<?= $faq->id; ?>">
                                <div class="panel-body">
                                    <?= $faq->content; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- /faq1 -->
                    <!-- faq2 -->

                    <!-- /faq3 -->
                </div>
            </div>

        </div>
</section>
<!-- /PAGE -->



<!-- 
  <section class="page-section">
    <div class="container">

        <h2 class="section-title wow fadeInDown" data-wow-offset="200" data-wow-delay="100ms">
            <small>Do You Have Any Question or Anything else</small>
            <span>Costumer service</span>
        </h2>

        
        <div class="row">

            <?php foreach ($team as $team) : ?>
                <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-offset="200" data-wow-delay="100ms">
                    <div class="thumbnail thumbnail-team no-border no-padding">
                        <div class="media">
                            <img style="width:270px;height:270px" src="<?= Yii::$app->homeUrl; ?>uploads/<?= $team->image; ?>" alt=""/>

                        </div>
                        <div class="caption">
                            <b>
                                <h4 class="caption-title"><?= $team->name . ' ' . $team->surname ?>
                                    <small><?= $team->occupation; ?></small>
                                </h4>
                                <ul class="team-details">
                                    <li>Skype: <?= $team->skype; ?></li>
                                    <li>Tel: <?= $team->mobile; ?></li>
                                    <li><a href="mailto:<?= $team->email; ?>"><?= $team->email; ?></a></li>
                                </ul>
                        </div>
                    </div>
                </div></b>
            <?php endforeach; ?>


        </div>
     

    </div>
</section>
  -->







<section class="page-section no-padding no-bottom-space-off">
    <div class="container full-width">

        <!-- Google map -->
        <div class="google-map">
            <div id="map-canvas"></div>
        </div>
        <!-- /Google map -->

    </div>
</section>
<!-- /PAGE -->

<!-- PAGE -->

<!-- PAGE -->

<!-- /PAGE -->

<!-- PAGE -->

<!-- /PAGE -->

<!-- PAGE -->
<section class="page-section contact dark">
    <div class="container">

        <!-- Get in touch -->

        <h2 class="section-title wow fadeInDown" data-wow-offset="200" data-wow-delay="100ms">
            <small>Feel Free to Say Hello!</small>
            <span>Get in Touch With Us</span>
        </h2>

        <div class="row">
            <div class="col-md-6 wow fadeInLeft" data-wow-offset="200" data-wow-delay="200ms">
                <!-- Contact form -->


                <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
                    <h1>submitted</h1>
                    <script> alert('Message has been submitted!') </script>
                <?php else: ?>

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <div class="row">
                        <div class="col-md-6">


                            <div class="outer required">
                                <div class="form-group af-inner has-icon">
                                    <?= $form->field($contact, 'name', [
                                        'options' => ['class' => 'form-group af-inner has-icon'],
                                        'template' => '{label}{input}<span class="form-control-icon"><i class="fa fa-user"></i></span>{error}',
                                        'labelOptions' => ['class' => 'sr-only']
                                    ])->textInput(['class' => 'form-control placeholder', 'placeholder' => 'Email'])->label(false) ?>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="outer required">
                                <div class="form-group af-inner has-icon">

                                    <?= $form->field($contact, 'email', [
                                        'options' => ['class' => 'form-group af-inner has-icon'],
                                        'template' => '{label}{input}<span class="form-control-icon"><i class="fa fa-envelope"></i></span>{error}',
                                        'labelOptions' => ['class' => 'sr-only']
                                    ])->textInput(['class' => 'form-control placeholder', 'placeholder' => 'Email'])->label(false) ?>


                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="outer required">
                        <div class="form-group af-inner has-icon">
                            <?= $form->field($contact, 'subject', [
                                'options' => ['class' => 'form-group af-inner has-icon'],
                                'template' => '{label}{input}<span class="form-control-icon"><i class="fa fa-bars"></i></span>{error}',
                                'labelOptions' => ['class' => 'sr-only']
                            ])->textInput(['class' => 'form-control placeholder', 'placeholder' => 'Subject'])->label(false) ?>
                        </div>
                    </div>

                    <div class="form-group af-inner has-icon">


                        <?= $form->field($contact, 'body', [
                            'options' => ['class' => 'form-group af-inner has-icon'],
                            'template' => '{label}{input}<span class="form-control-icon"><i class="fa fa-bars"></i></span>{error}',
                            'labelOptions' => ['class' => 'sr-only']
                        ])->textarea(['class' => 'form-control placeholder', 'placeholder' => 'Message'])->label(false) ?>


                    </div>

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <?= Html::submitButton('Submit', ['class' => 'form-button form-button-submit btn btn-block btn-theme ripple-effect btn-theme-dark', 'name' => 'contact-button']) ?>
                            <!--  <input type="submit" name="submit" class="form-button form-button-submit btn btn-block btn-theme ripple-effect btn-theme-dark" id="submit_btn" value="Send message"/> -->
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                     
                <?php endif; ?>
            </div>
            <div class="col-md-6 wow fadeInRight" data-wow-offset="200" data-wow-delay="200ms">

                <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>

                <ul class="media-list contact-list">
                    <li class="media">
                        <div class="media-left"><i class="fa fa-home"></i></div>
                        <div class="media-body">Adress: 1600 Pennsylvania Ave NW, Washington, D.C.</div>
                    </li>
                    <li class="media">
                        <div class="media-left"><i class="fa fa"></i></div>
                        <div class="media-body">DC 20500, ABD</div>
                    </li>
                    <li class="media">
                        <div class="media-left"><i class="fa fa-phone"></i></div>
                        <div class="media-body">Support Phone: 01865 339665</div>
                    </li>
                    <li class="media">
                        <div class="media-left"><i class="fa fa-envelope"></i></div>
                        <div class="media-body">E mails: info@example.com</div>
                    </li>
                    <li class="media">
                        <div class="media-left"><i class="fa fa-clock-o"></i></div>
                        <div class="media-body">Working Hours: 09:30-21:00 except on Sundays</div>
                    </li>
                    <li class="media">
                        <div class="media-left"><i class="fa fa-map-marker"></i></div>
                        <div class="media-body">View on The Map</div>
                    </li>
                </ul>

            </div>
        </div>

        <!-- /Get in touch -->

    </div>
</section>


<!--Google MAPS-->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyBs0ucLIQg0bMomHXSHEbgt6QobE9ni8LA" type="text/javascript"></script>



<!-- /PAGE -->
<script type='text/javascript' data-cfasync='false'>window.purechatApi = {
        l: [], t: [], on: function () {
            this.l.push(arguments);
        }
    };
    (function () {
        var done = false;
        var script = document.createElement('script');
        script.async = true;
        script.type = 'text/javascript';
        script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript';
        document.getElementsByTagName('HEAD').item(0).appendChild(script);
        script.onreadystatechange = script.onload = function (e) {
            if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {
                var w = new PCWidget({c: '47719fde-8f33-4f47-a39e-8bf87f959e85', f: true});
                done = true;
            }
        };
    })();</script>
</div>