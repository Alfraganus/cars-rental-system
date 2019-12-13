<?php

use app\models\ContactForm;
use yii\helpers\Url;

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);

$contact = new ContactForm();

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
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Renting cars</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="/assets/ico/favicon.ico">

    <!--[if lt IE 9]>

    <![endif]-->
</head>
<body id="home" class="wide">
<style>
    .top-menu {
        background: lightblue !important;
    }

    /*#a5abb7
        .sf-menu a {
            color: black !important;
        }*/
    /*   .sf-menu a:hover {
   color: #a5abb7 !important;
       }*/
</style>
<!-- PRELOADER -->
<!-- <div id="preloader">
    <div id="preloader-status">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
        <div id="preloader-title">Loading</div>
    </div>
</div> -->
<!-- /PRELOADER -->

<!-- WRAPPER -->
<div class="wrapper">

    <!-- HEADER -->
    <header class="header fixed">

        <div class="header-wrapper">

            <div class="logo">
                <a href="<?= Url::to(['site/']) ?>"><img src="<?= Yii::$app->homeUrl; ?>img/newlog.png"
                                                         alt="Rentalcarsnow"/></a>
            </div>


            <!-- Mobile menu toggle button -->
            <a href="#" class="menu-toggle btn ripple-effect btn-theme-transparent"><i class="fa fa-bars"></i></a>
            <!-- /Mobile menu toggle button -->
            <?php $controller = Yii::$app->controller->id; ?>
            <!-- Navigation -->
            <nav class="navigation closed clearfix">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <!-- navigation menu -->
                        <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                        <div class="well well-sm top-menu">
                            <div class="container">

                                <div class="row">
                                    <div class="col-md-9 col-sm-12 text-left flex-email" style="display: flex;">
                                        <div class="email">
                                            <p><?= Yii::t('main', 'Email:') ?></p>
                                            <span style='color:#e60000;margin-right: 10px'>info@rentalcarsnow.cz</span>
                                        </div>
                                        <div class="phone">
                                            <p><?= Yii::t('main', 'Mobile') ?>:</p>
                                            <span style='color:#e60000;margin-right: 10px'>+420 725 905 280 </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 language-flex" style="display: flex;">
                                        <span style='color:#e60000;margin-right: 10px'>
                                              <a href="<?= \yii\helpers\Url::to(['site/change', 'local' => 'en']) ?>">English</a>
                                        </span>
                                        <span style='color:#e60000'>
                                            <a href="<?= \yii\helpers\Url::to(['site/change', 'local' => 'cz']) ?>">Český </a>

                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="container">

                            <ul class="nav sf-menu">
                                <li class="<?= (Yii::$app->requestedAction->id == "index") ? 'megamenu sale' : '' ?>"><a
                                            class="" href="<?= Url::to(['site/']) ?>"><?= Yii::t('main', 'Home') ?></a>
                                </li>
                                <li class="<?= (Yii::$app->requestedAction->id == "cars") ? 'megamenu sale' : '' ?>"><a
                                            class=""
                                            href="<?= Url::to(['site/cars']) ?>"><?= Yii::t('main', 'All cars') ?></a>
                                </li>
                                <li class="<?= (Yii::$app->requestedAction->id == "about") ? 'megamenu sale' : '' ?>"><a
                                            href="<?= Url::to(['site/about']) ?>"><?= Yii::t('main', 'Why us') ?></a>
                                </li>
                                <!--  <li class="<?= (Yii::$app->requestedAction->id == "services") ? 'megamenu sale' : '' ?>"><a href="<?= Url::to(['site/services']) ?>">Services</a></li> -->
                                <li class="<?= (Yii::$app->requestedAction->id == "faq") ? 'megamenu sale' : '' ?>"><a
                                            href="<?= Url::to(['site/faq']) ?>"><?= Yii::t('main', 'FAQ') ?></a></li>
                                <li class="<?= (Yii::$app->requestedAction->id == "contact") ? 'megamenu sale' : '' ?>">
                                    <a href="<?= Url::to(['site/contact']) ?>"><?= Yii::t('main', 'Contact us') ?></a>
                                </li>


                                <?php if (Yii::$app->user->isGuest): ?>
                                    <!--  <li><a href="<?= Url::to(['users/login']) ?>"><?= Yii::t('main', 'Login') ?></a></li> -->
                                <?php else: ?>
                                    <!--  <li><a href="<?= Url::to(['users/cabinet']) ?>"><?= Yii::t('main', 'Cabinet') ?></a></li> -->
                                <?php endif; ?>
                                <li><a href="<?= Url::to(['admin/']) ?>"><?= Yii::t('main', 'Administrator') ?></a></li>
                            </ul>

                            <!-- /navigation menu -->
                        </div>
                    </div>
                    <!-- Add Scroll Bar -->
                    <div class="swiper-scrollbar"></div>
            </nav>
            <!-- /Navigation -->

        </div>
</div>

</header>

<?php if (Yii::$app->session->hasFlash('danger')) : ?>
    <div class="alert alert-danger">
        <strong><?= Yii::$app->session->getFlash('danger') ?></strong>
    </div>
<?php endif ?>
<?= $content ?>

<!-- PAGE -->
<section class="page-section contact dark">
    <div class="container">

        <!-- Get in touch -->

        <h2 class="section-title wow fadeInDown" data-wow-offset="200" data-wow-delay="100ms">
            <small><?= Yii::t('main', 'Feel Free to Say Hello!') ?></small>
            <span><?= Yii::t('main', 'Get in Touch With Us') ?></span>
        </h2>

        <div class="row">
            <div class="col-md-6 wow fadeInLeft" data-wow-offset="200" data-wow-delay="200ms">
                <!-- Contact form -->


                <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
                    <div class="alert alert-primary" role="alert">
                        Your massage has been submitted and we will contact with you soon
                    </div>
                    <script> alert('Message has been submitted!') </script>
                <?php else: ?>

                <?php $form = ActiveForm::begin(['id' => 'contact-form', 'action' => Url::to(['site/contact'])]); ?>

                    <div class="row">
                        <div class="col-md-6">


                            <div class="outer required">
                                <div class="form-group af-inner has-icon">
                                    <?= $form->field($contact, 'name', [
                                        'options' => ['class' => 'form-group af-inner has-icon'],
                                        'template' => '{label}{input}<span class="form-control-icon"><i class="fa fa-user"></i></span>{error}',
                                        'labelOptions' => ['class' => 'sr-only']
                                    ])->textInput(['class' => 'form-control placeholder',
                                                   'placeholder' => Yii::t('main', 'Name')])->label(false) ?>
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
                                    ])->textInput(['class' => 'form-control placeholder',
                                                   'placeholder' => Yii::t('main', 'Email')])->label(false) ?>


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
                            ])->textInput(['class' => 'form-control placeholder',
                                           'placeholder' => Yii::t('main', 'Subject')])->label(false) ?>
                        </div>
                    </div>

                    <div class="form-group af-inner has-icon">


                        <?= $form->field($contact, 'body', [
                            'options' => ['class' => 'form-group af-inner has-icon'],
                            'template' => '{label}{input}<span class="form-control-icon"><i class="fa fa-bars"></i></span>{error}',
                            'labelOptions' => ['class' => 'sr-only']
                        ])->textarea(['class' => 'form-control placeholder',
                                      'placeholder' => Yii::t('main', 'Message')])->label(false) ?>


                    </div>
                    <style>

                        .btn-theme-dark:active {
                            background-color: #e60000 !important:
                        }
                    </style>


                    <div class="outer required">
                        <div class="form-group af-inner">


                            <?= Html::submitButton(Yii::t('main', 'Submit'), ['class' => 'form-button form-button-submit btn btn-block btn-theme ripple-effect btn-theme-dark',
                                                                              'style' => 'background-color: #e60000 !important',
                                                                              'name' => 'contact-button']) ?>

                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>

                <?php endif; ?>
            </div>
            <div class="col-md-6 wow fadeInRight" data-wow-offset="200" data-wow-delay="200ms">

                <p><?= Yii::t('main', 'Please feel free to ask question regarding rental and tech support') ?></p>

                <ul class="media-list contact-list">
                    <li class="media">
                        <div class="media-left"><i class="fa fa-home"></i></div>
                        <div class="media-body"><?= Yii::t('main', 'Address') ?>: Praha - Žižkov, Chlumova 199/22, PSČ
                            130 00
                        </div>
                    </li>
                    <!--   <li class="media">
                          <div class="media-left"><i class="fa fa"></i></div>
                          <div class="media-body">DC 20500, ABD</div>
                      </li> -->
                    <li class="media">
                        <div class="media-left"><i class="fa fa-phone"></i></div>
                        <div class="media-body"><?= Yii::t('main', 'Support Phone') ?>:+420 725 905 280</div>
                    </li>
                    <li class="media">
                        <div class="media-left"><i class="fa fa-envelope"></i></div>
                        <div class="media-body"><?= Yii::t('main', 'Email') ?>: info@rentalcarsnow.cz</div>
                    </li>
                    <li class="media">
                        <div class="media-left"><i class="fa fa-clock-o"></i></div>
                        <div class="media-body"><?= Yii::t('main', 'Working Hours') ?>:
                            09:00-18:00 <?= Yii::t('main', 'except on Saturday and Sunday') ?></div>
                    </li>

                </ul>

            </div>
        </div>

        <!-- /Get in touch -->
<p style="text-align: center">Copyright © 2018 BLACK ICE PRAGUE s.r.o. IČO 06848354.
<br>Web developed by dacoreit.com software team
</p>
    </div>
</section>
<div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>
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
</body>
</html>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
