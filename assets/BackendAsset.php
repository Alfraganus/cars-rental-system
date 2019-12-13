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
class BackendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [


        "backend/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css",
        "//cdn.materialdesignicons.com/2.3.54/css/materialdesignicons.min.css",
        "https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js",
        "https://oss.maxcdn.com/respond/1.4.2/respond.min.js",
        "assets/lib/css/dropify.css",

        "backend/assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css",
        "backend/assets/lib/jqvmap/jqvmap.min.css",
        "backend/assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css",
        "backend/assets/css/style.css",
    ];


    public $js = [


        // "backend/assets/lib/jquery/jquery.min.js",
        "backend/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js",
        "backend/assets/js/main.js",
        "backend/assets/js/modal.js",
        "backend/assets/js/wizard.js",
        "backend/assets/js/bootstrap.js",
        "assets/lib/js/dropify.js",
        "assets/js/main.js",

        /*   "backend/assets/lib/bootstrap/dist/js/bootstrap.min.js",
           "backend/assets/lib/jquery-flot/jquery.flot.js",
           "backend/assets/lib/jquery-flot/jquery.flot.pie.js",
           "backend/assets/lib/jquery-flot/jquery.flot.resize.js",
           "backend/assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js",
           "backend/assets/lib/jquery-flot/plugins/curvedLines.js",
           "backend/assets/lib/jquery.sparkline/jquery.sparkline.min.js",
           "backend/assets/lib/countup/countUp.min.js",
           "backend/assets/lib/jquery-ui/jquery-ui.min.js",
           "backend/assets/lib/jqvmap/jquery.vmap.min.js",
           "backend/assets/lib/jqvmap/maps/jquery.vmap.world.js",*/


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
