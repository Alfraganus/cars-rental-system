<?php

use app\models\AvailableTimes;
use app\models\Location;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = 'Rental car service system | rentalcarsnow.cz';

?>

<?php if (Yii::$app->session->hasFlash('success-order')) : ?>

    <?php
    $this->registerJS("
                        
                        $('.bs-example-modal-lg').modal('show');
                        
                        ");?>

<?php endif ?>
<!-- pop up message when car is ordered-->
<div style="clear:both"></div>
<div class="container">

    <div class="row">
        <!-- Large modal -->
        <div class="col-lg-12">

            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-body">

                            <H2>Thank You for Your Order!</H2>
                            <h4>Your order will be reviewed soon and our manager will contact with you!.</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--popup is finished-->

<div class="icon-bar">
  <a target="_blank" href="https://www.facebook.com/sharer.php?u=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Findex" class="facebook"><i class="fa fa-facebook"></i></a>
  <a target="_blank" href="https://twitter.com/intent/tweet?text=Welcome%20to%20renting%20servcies%20in%20Czech%20republic&url=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Findex&original_referer=http%3A%2F%2Frentalcarsnow.cz%2Fsite" class="twitter"><i class="fa fa-twitter"></i></a>
  <a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en&url=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Findex" class="google"><i class="fa fa-google"></i></a>
  <!-- <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a> -->
  <!-- <a href="#" class="youtube"><i class="fa fa-youtube"></i></a>  -->
</div>

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
                                                <h2><?= Yii::t('main', 'Search for Cheap Rental Cars in Prague') ?> </h2>
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
                                                        ])->widget ( yii\jui\DatePicker::class , [
                                                            'options'=>[
                                                                'placeholder'=>Yii::t('main', 'Please select a day'),
                                                                'class' => 'form-control'
                                                            ],
                                                            'clientOptions' => [
                                                                'autoclose' => true,
                                                            ]
                                                        ] ); ?>
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
                                                        <?= $form->field ( $model , 'dateto' , [
                                                            'options' => [
                                                                'class' => 'form-group has-icon has-label'
                                                            ] ,
                                                            'inputOptions' => [
                                                                'class' => 'form-control'
                                                            ],
                                                            'template'=>'{label}{input}<span class="form-control-icon"><i class="fa fa-calendar"></i></span>{error}'
                                                        ] )->widget ( yii\jui\DatePicker::class , [
                                                            'options'=>[
                                                                'placeholder'=>Yii::t('main', 'Please select a day'),
                                                                'class' => 'form-control'
                                                            ],
                                                            'clientOptions' => [
                                                                'autoclose' => true,
                                                            ]
                                                        ] ); ?>
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
                                                        <button type="submit" id="formSearchSubmit2" class="btn btn-submit btn-theme ripple-effect pull-right"><?= Yii::t('main', 'Find car') ?></button>
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

                                            <a style="background-color: #e60000;border-color: #e60000;" class="btn btn-theme ripple-effect btn-theme-md" href="<?= Url::to(['site/cars']) ?>"><?= Yii::t('main', 'See All Vehicles') ?></a>
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





<h2 style="padding-top: 60px" class="section-title wow fadeInUp" data-wow-offset="70" data-wow-delay="100ms">
    <!-- <small>What a Kind of Car You Want</small> -->
    <span><?= Yii::t('main', 'Great Rental Offers for You') ?></span>
</h2>

<!--  <div class="tabs wow fadeInUp" data-wow-offset="70" data-wow-delay="300ms">
            <ul id="tabs" class="nav">

                <li class=""><a href="#tab-1" data-toggle="tab"><?= Yii::t('main', 'Best Offers') ?></a></li>

                <li class="active"><a href="#tab-2" data-toggle="tab"><?= Yii::t('main', 'Popular Cars') ?></a></li>

                 <li class=""><a href="#tab-3" data-toggle="tab"><?= Yii::t('main', 'Economic Cars') ?></a></li>
            </ul>
        </div> -->


<div class="tab-content wow fadeInUp" data-wow-offset="70" data-wow-delay="500ms">



    <!-- tab 2 -->

    <div class="tab-pane fade active in" id="tab-2">

        <div class="container">



            <div class="row">

                <div class="col-md-3">
                    <!-- Controls -->
                    <div class="controls pull-right hidden-xs">
                        <a class="left fa fa-chevron-left btn btn" href="#carousel-example"
                           data-slide="prev"></a><a class="right fa fa-chevron-right btn" href="#carousel-example"
                                                    data-slide="next"></a>
                    </div>
                </div>
            </div>
            <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            <?php foreach ($bestoffer as $offer) : ?>
                                <a href="<?=Url::to(['site/car','id'=>$offer->car_id])?>">
                                    <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price col-md-12">
                                                        <h5 style="text-align: center;font-family: impact"><?= $offer->name; ?></h5>

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="photo">
                                                <img src="<?= Yii::$app->homeUrl; ?>uploads/<?= $offer->photo->image ?>" class="img-responsive" alt="a" />
                                            </div>

                                            <div class="info">
                                                <b><span style="color:red;font-weight: bold;text-align: right"><?= $offer->price; ?> <?= Yii::t('main', 'Euro') ?></span> </b><?=Yii::t('main','per a day')?><br>
                                                <div class="separator clear-left">
                                                    <p class="btn-add">
                                                        <i class="fa fa-dashboard"></i><?= $offer->fueling->name;; ?>t
                                                    </p>
                                                    <p class="btn-details">
                                                        <i class="fa fa-cog"></i> <?php if ($offer->manual == 1) {
                                                            echo   Yii::t('main', 'Manual');
                                                        } else {
                                                            echo Yii::t('main', 'Automatic');
                                                        } ?>
                                                    </p>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <?php foreach ($bestoffer as $offer) : ?>
                                <a href="<?=Url::to(['site/car','id'=>$offer->car_id])?>">
                                    <div class="col-sm-3">
                                        <div class="col-item">
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price col-md-12">
                                                        <h5 style="text-align: center;font-family: impact"><?= $offer->name; ?></h5>

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="photo">
                                                <img src="<?= Yii::$app->homeUrl; ?>uploads/<?= $offer->photo->image ?>" class="img-responsive" alt="a" />
                                            </div>
                                            <div class="info">
                                                <b><span style="color:red;font-weight: bold;text-align: right"><?= $offer->price; ?> <?= Yii::t('main', 'Euro') ?></span> </b><?=Yii::t('main','per a day')?><br>
                                                <div class="separator clear-left">
                                                    <p class="btn-add">
                                                        <i class="fa fa-dashboard"></i><?= $offer->fueling->name;; ?>
                                                    </p>
                                                    <p class="btn-details">
                                                        <i class="fa fa-cog"></i>  <?php if ($offer->manual == 1) {
                                                            echo   Yii::t('main', 'Manual');
                                                        } else {
                                                            echo Yii::t('main', 'Automatic');
                                                        } ?>
                                                    </p>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<br>

    <?php  //  $this->registerCssFile('@web/assets/test.css', ['depends' => [yii\bootstrap\BootstrapAsset::className()]]); ?>
    <?php   // $this->registerCssFile('@web/assets/test.js', ['depends' => [yii\bootstrap\BootstrapAsset::className()]]); ?>

    <?php
    $this->registerJs("
    
      jQuery(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: 5000
        });
 
        $('#carousel-text').html($('#slide-content-0').html());
 
        
        $('[id^=carousel-selector-]').click( function(){
                var id_selector = $(this).attr('id');
                var id = id_selector.substr(id_selector.length -1);
                var id = parseInt(id);
                $('#myCarousel').carousel(id);
        });
 
 
         
        $('#myCarousel').on('slid', function (e) {
                var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});
    
    
    
    
    
    
    ");?>

</div>

</div>
</section>
<section class="page-section dark">
    <div class="container">

        <div class="row">
            <div class="col-md-6 wow fadeInLeft" data-wow-offset="200" data-wow-delay="100ms">
                <h2 class="section-title text-left">
                    <!-- <small>What Do You Know About Us</small> -->
                    <span><?= Yii::t('main', 'Our purpose') ?></span>
                </h2>
                <p><?= Yii::t('main', 'At Rentalcars.com everything we do is about giving you the freedom to discover more. We’ll move mountains to find you the right rental car, and bring you a smooth, hassle-free experience from start to finish. Our
                    target is to find the ideal car at your convience') ?> </p>
                <ul class="list-icons">
                    <li><i class="fa fa-check-circle"></i><?= Yii::t('main', 'That wonderful feeling – you start the engine and your adventure begins') ?></li>
                    <li><i class="fa fa-check-circle"></i><?= Yii::t('main', 'We want to make renting a car as simple and personal as driving your own.') ?></li>
                </ul>
                <p class="btn-row">
                    <br>
                    <a href="<?= Url::to(['site/cars']) ?>" class="btn btn-theme ripple-effect btn-theme-md pull-right"><?= Yii::t('main', 'See All Vehicles') ?></a>
                    <!-- <a href="#" class="btn btn-theme ripple-effect btn-theme-md btn-theme-transparent">Reservation Now</a> -->
                </p>
            </div>
            <div class="col-md-6 wow fadeInRight" >

                <div class="item"><img class="img-responsive" style="height: 300px" src="<?php Yii::$app->homeUrl; ?>slides/slide1.jpg" alt=""/></div>

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
                        <h4 class="caption-title"><?= Yii::t('main', 'Users') ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-offset="200" data-wow-delay="200ms">
                <div class="thumbnail thumbnail-counto no-border no-padding">
                    <div class="caption">
                        <div class="caption-icon"><i class="fa fa-car"></i></div>
                        <div class="caption-number">30</div>
                        <h4 class="caption-title"><?= Yii::t('main', 'Total cars') ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-offset="200" data-wow-delay="300ms">
                <div class="thumbnail thumbnail-counto no-border no-padding">
                    <div class="caption">
                        <div class="caption-icon"><i class="fa fa-flag"></i></div>
                        <div class="caption-number">1.255</div>
                        <h4 class="caption-title"><?= Yii::t('main', 'Total KM/MIL') ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-offset="200" data-wow-delay="400ms">
                <div class="thumbnail thumbnail-counto no-border no-padding">
                    <div class="caption">
                        <div class="caption-icon"><i class="fa fa-comments-o"></i></div>
                        <div class="caption-number">500</div>
                        <h4 class="caption-title"><?= Yii::t('main', 'Call Center Solutions') ?></h4>
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
            <small><?= Yii::t('main', 'See What People Ask to Us') ?></small>
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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2560.027151215087!2d14.450825315901632!3d50.08577852145448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b949f3e9bbdf1%3A0x36bff12139ff8006!2zQ2hsdW1vdmEgMTk5LzIyLCAxMzAgMDAgUHJhaGEgMy3FvWnFvmtvdiwg0KfQtdGF0LjRjw!5e0!3m2!1sru!2s!4v1532136157662" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <!-- /Google map -->

    </div>
    <?php \ymaker\social\share\widgets\SocialShare::widget([
        'configurator'  => 'socialShareBlog', // Social share component ID
        'url'           => \yii\helpers\Url::to(['site/index'], true),
        'title'         => 'Homepage rentalcarsnow.cz',
        'description'   => 'Welcome to renting servcies in Czech republic',
        'imageUrl'      => \yii\helpers\Url::to('img/road.jpg', true),
    ]); ?>




    <!-- /PAGE -->

    <!-- PAGE -->

    <!-- PAGE -->

    <!-- /PAGE -->

    <!-- PAGE -->

    <!-- /PAGE -->


    <!--Google MAPS-->
    <!--<script src="http://maps.google.com/maps/api/js?key=AIzaSyBs0ucLIQg0bMomHXSHEbgt6QobE9ni8LA" type="text/javascript"></script>-->


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


    <style>




.icon-bar {
    z-index: 1;
  position: fixed;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

.icon-bar a {
    width: 45px;
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}

.icon-bar a:hover {
  /*background-color: #000;*/
}

.facebook {
  background: #3B5998;
  color: white;
}

.twitter {
  background: #55ACEE;
  color: white;
}

.google {
  background: #dd4b39;
  color: white;
}

.linkedin {
  background: #007bb5;
  color: white;
}

.youtube {
  background: #bb0000;
  color: white;
}

.content {
  margin-left: 75px;
  font-size: 30px;
}



        .carousel-control {
            position: absolute;
            top: 50%;
            left: 15px;
            width: 40px;
            height: 40px;
            margin-top: -20px;
            font-size: 60px;
            font-weight: 100;
            line-height: 30px;
            color: #ffffff;
            text-align: center;
            background: #222222;
            border: 3px solid black;
            -webkit-border-radius: 23px;
            -moz-border-radius: 23px;
            border-radius: 23px;
            opacity: 0.5;
            filter: alpha(opacity=50);
        }


        #forma {
            background: #ffffff;
            border: 1px solid #d3d3d3;
            color: #a5abb7;
        }

        .col-item
        {
            border: 1px solid black;
            border-radius: 5px;
            background: #FFF;
        }
        .col-item .photo img
        {
            margin: 0 auto;
            width: 100%;
        }

        .col-item .info
        {
            padding: 10px;
            border-radius: 0 0 5px 5px;
            margin-top: 1px;
        }
        .col-item:hover .info {
            background-color: rgba(215, 215, 244, 0.5);
        }
        .col-item .price
        {
            /*width: 50%;*/
            float: left;
            margin-top: 5px;
        }

        .col-item .price h5
        {
            line-height: 20px;
            margin: 0;
        }

        .price-text-color
        {
            color: #00990E;
        }

        .col-item .info .rating
        {
            color: #003399;
        }

        .col-item .rating
        {
            /*width: 50%;*/
            float: left;
            font-size: 17px;
            text-align: right;
            line-height: 52px;
            margin-bottom: 10px;
            height: 52px;
        }

        .col-item .separator
        {
            border-top: 1px solid #FFCCCC;
        }

        .clear-left
        {
            clear: left;
        }

        .col-item .separator p
        {
            line-height: 20px;
            margin-bottom: 0;
            margin-top: 10px;
            text-align: center;
        }

        .col-item .separator p i
        {
            margin-right: 5px;
        }
        .col-item .btn-add
        {
            width: 50%;
            float: left;
        }

        .col-item .btn-add
        {
            border-right: 1px solid #CC9999;
        }

        .col-item .btn-details
        {
            width: 50%;
            float: left;
            padding-left: 10px;
        }
        .controls
        {
            margin-top: 20px;
        }
        [data-slide="prev"]
        {
            margin-right: 10px;
        }

.shadow {
    margin: 10px;
    background-color: black;
    border: 1px solid black;
    opacity: 0.8
}

.fa-angle-left:before {
    color: red !important;
}

.fa-angle-right:before {
    color: red !important;
}

.modal  {
    /*   display: block;*/
    padding-right: 0px;
    background-color: rgba(4, 4, 4, 0.8);
}

.modal-dialog {
    top: 20%;
    width: 100%;
    position: absolute;
}
.modal-content {
    border-radius: 0px;
    border: none;
    top: 40%;
}
.modal-body {
    background-color: #0f8845;
    color: white;
}



    </style>


