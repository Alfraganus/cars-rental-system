<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "assets/ico/apple-touch-icon-144-precomposed.png",
        "assets/ico/favicon.ico",
        "assets/plugins/bootstrap/css/bootstrap.min.css",
        "assets/plugins/bootstrap-select/css/bootstrap-select.min.css",
        "assets/plugins/fontawesome/css/font-awesome.min.css",
        "assets/plugins/prettyphoto/css/prettyPhoto.css",
        "assets/plugins/owl-carousel2/assets/owl.carousel.min.css",
        "assets/plugins/owl-carousel2/assets/owl.theme.default.min.css",
        "assets/plugins/animate/animate.min.css",
        "assets/plugins/swiper/css/swiper.min.css",
        "assets/plugins/jquery-ui/jquery-ui.min.css",
        "assets/plugins/datepicker/bootstrap-datepicker.css",
        "assets/plugins/timepicker/css.css",
        "assets/css/theme.css",
        'css/site.css',
        'assets/lib/css/calendar.css',
        'assets/lib/css/xzoom.css',
        'css/wizard.css',
    ];
    public $js = [
        "assets/plugins/modernizr.custom.js",
        "assets/plugins/bootstrap/js/bootstrap.min.js",
        "assets/plugins/bootstrap-select/js/bootstrap-select.min.js",
        "assets/plugins/datepicker/bootstrap-datepicker.js",
        "assets/plugins/superfish/js/superfish.min.js",
        "assets/plugins/prettyphoto/js/jquery.prettyPhoto.js",
        "assets/plugins/owl-carousel2/owl.carousel.min.js",
        "assets/plugins/jquery.sticky.min.js",
        "assets/plugins/jquery.easing.min.js",
        "assets/plugins/jquery.smoothscroll.min.js",
        "assets/plugins/smooth-scrollbar.min.js",
        "assets/plugins/wow/wow.min.js",
        "assets/plugins/swiper/js/swiper.jquery.min.js",
        "assets/plugins/jquery-ui/jquery-ui.min.js",
        "assets/plugins/timepicker/js.js",
        "assets/js/theme-ajax-mail.js",
        "assets/js/modal.js",
        "assets/js/reservation.js",
        "assets/lib/js/xzoom.js",
        "assets/js/theme.js",
        "assets/lib/js/dropify.js",
        "assets/js/main.js",
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
