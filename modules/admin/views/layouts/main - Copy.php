<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\BackendAsset;
use yii\helpers\Url;

BackendAsset::register($this);

$url = Yii::$app->homeUrl.'backend/';

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

<section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="<?= Yii::$app->homeUrl?>" class="logo"><b>Андижон вилоят хокимлиги курилиш хисоботи</b></a>
        <!--logo end-->
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a data-method="POST" class="logout" href="<?= Url::to(['/site/logout'])?>">Tizimdan chiqish</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
                <?php $controller = Yii::$app->controller->id; ?>
    
  <ul class="sidebar-menu" id="nav-accordion">
      <p class="centered"><a href="profile.html"><img src="<?= $url?>assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
  <li class="mt">
                    <a class="<?= ($controller=='default')?'active':''?>" href="<?= Url::to(['default/'])?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Бош сахифа</span>
                    </a>
                </li>

  <li class="mt">
                    <a class="<?= ($controller=='firma')?'active':''?>" href="<?= Url::to(['firma/'])?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Курилиш фирмалари</span>
                    </a>
                </li>

      <li class="mt">
          <a class="<?= ($controller=='obyem')?'active':''?>" href="<?= Url::to(['obyem/'])?>">
              <i class="fa fa-dashboard"></i>
              <span>Курилиш обём кўшиш</span>
          </a>
      </li>
 
     <li class="mt">
          <a class="<?= ($controller=='reyting')?'active':''?>" href="<?= Url::to(['reyting/'])?>">
              <i class="fa fa-dashboard"></i>
              <span>Рейтинг бахолаш</span>
          </a>
      </li>
          
            </ul>





        </aside>
    <!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

            <?= $content ?>

        </section>
    </section>


</section>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
