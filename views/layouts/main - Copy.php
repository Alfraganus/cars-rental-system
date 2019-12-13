<?php

use yii\helpers\Url;

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
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
    <script src="/assets/plugins/iesupport/html5shiv.js"></script>
    <script src="/assets/plugins/iesupport/respond.min.js"></script>
    <![endif]-->
</head>
<body id="home" class="wide">
<style>
    .top-menu {
        background: lightblue !important;
    }
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
                                    <div class="col-sm-9" style="text-align: left">
                                       <?=Yii::t('main', 'Email:')?> <span style='color:#e60000;margin-right: 10px'>info@carrental.com</span>
                                       
                                        <!--  /site/change-lang?locale=en -->
                                        <?=Yii::t('main', 'Mobile')?>: <span style='color:#e60000;margin-right: 10px'>+420 775 119 452 </span>
                                    </div>
                                    <div class="col-sm-3">
                                        <span style='color:#e60000;margin-right: 10px'>
                                            <a href="<?= \yii\helpers\Url::to(['site/change', 'local' => 'en']) ?>">English</a>
                                        </span>
                                        <span style='color:#e60000'>
                                            <a href="<?= \yii\helpers\Url::to(['site/change?local=cz']) ?>">Český </a>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="container">
                            <ul class="nav sf-menu">
                                <li class="<?= (Yii::$app->requestedAction->id == "index") ? 'megamenu sale' : '' ?>"><a class="" href="<?= Url::to(['site/']) ?>"><?=Yii::t('main', 'Home')?></a></li>
                                <li class="<?= (Yii::$app->requestedAction->id == "cars") ? 'megamenu sale' : '' ?>"><a class="" href="<?= Url::to(['site/cars']) ?>"><?=Yii::t('main', 'All cars')?></a></li>
                                <li class="<?= (Yii::$app->requestedAction->id == "about") ? 'megamenu sale' : '' ?>"><a href="<?= Url::to(['site/about']) ?>"><?=Yii::t('main', 'Why us')?></a></li>
                                <!--  <li class="<?= (Yii::$app->requestedAction->id == "services") ? 'megamenu sale' : '' ?>"><a href="<?= Url::to(['site/services']) ?>">Services</a></li> -->
                                <li class="<?= (Yii::$app->requestedAction->id == "faq") ? 'megamenu sale' : '' ?>"><a href="<?= Url::to(['site/faq']) ?>"><?=Yii::t('main', 'Frequently asked questions')?></a></li>
                                <li class="<?= (Yii::$app->requestedAction->id == "contact") ? 'megamenu sale' : '' ?>"><a href="<?= Url::to(['site/contact']) ?>"><?=Yii::t('main', 'Contact us')?></a></li>


                                <?php if (Yii::$app->user->isGuest): ?>
                                    <li><a href="<?= Url::to(['users/login']) ?>"><?=Yii::t('main', 'Login')?></a></li>
                                <?php else: ?>
                                    <li><a href="<?= Url::to(['users/cabinet']) ?>"><?=Yii::t('main', 'Cabinet')?></a></li>
                                <?php endif; ?>
                                  <li><a href="<?= Url::to(['admin/']) ?>"><?=Yii::t('main', 'Administrator')?></a></li>
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

<?= $content ?>

<!-- <footer class="footer">
    <div class="footer-meta">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <p class="btn-row text-center">
                        <a href="#" class="btn btn-theme ripple-effect btn-icon-left facebook wow fadeInDown" data-wow-offset="20" data-wow-delay="100ms"><i class="fa fa-facebook"></i>FACEBOOK</a>
                        <a href="#" class="btn btn-theme btn-icon-left ripple-effect twitter wow fadeInDown" data-wow-offset="20" data-wow-delay="200ms"><i class="fa fa-twitter"></i>TWITTER</a>
                        <a href="#" class="btn btn-theme btn-icon-left ripple-effect pinterest wow fadeInDown" data-wow-offset="20" data-wow-delay="300ms"><i class="fa fa-pinterest"></i>PINTEREST</a>
                        <a href="#" class="btn btn-theme btn-icon-left ripple-effect google wow fadeInDown" data-wow-offset="20" data-wow-delay="400ms"><i class="fa fa-google"></i>GOOGLE</a>
                    </p>
                    <!-- <div class="copyright">&copy; 2015 Rent It — An One Page Rental Car Theme made with passion by jThemes Studio</div> -->
</div>

</div>
</div>
</div>
</footer>  
<div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>
</div>
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
