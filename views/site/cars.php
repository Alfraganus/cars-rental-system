<?php

/**
 * Created by PhpStorm.
 * User: Farhodjon
 * Date: 19.05.2018
 * Time: 3:18
 */

use app\models\Cars;
use app\models\FuelType;
use app\models\OfferCategory;
use app\models\Location;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this \yii\web\View */
/* @var $result \yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Search cars').' | ';

?>

<!-- CONTENT AREA -->
<div class="content-area">

    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs text-right">
        <div class="container">
            <div class="page-header">
          <h1><?=Yii::t('main', 'All cars')?></h1>
            </div>
             
        </div>
    </section>
    <!-- /BREADCRUMBS -->



    <!-- PAGE WITH SIDEBAR -->
    <section class="page-section with-sidebar sub-page">
        <div class="container">
            <div class="row">
                <!-- CONTENT -->
                <aside class="col-md-3 sidebar" id="sidebar">
                    <?php $form = ActiveForm::begin(['method' => 'GET']) ?>
                    <!-- widget -->
                    <div class="widget shadow widget-find-car">
                         <h4 class="widget-title"><?=Yii::t('main', 'Find the best renting option')?></h4>
                        <div class="widget-content">
                            <!-- Search form -->
                            <div class="form-search light">

                                <?= $form->field($searchModel, 'beginlocation', [
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

                                <?= $form->field($searchModel, 'endlocation', [
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

                                <?= $form->field($searchModel, 'datefrom', [
                                    'template' => '{label}{input}<span class="form-control-icon"><i class="fa fa-calendar"></i></span>',
                                    'options' => [
                                        'class' => 'form-group has-icon has-label'
                                    ]
                                ])->widget ( yii\jui\DatePicker::class , [
                                    'options'=>[
                                        'placeholder'=>Yii::t('app', 'Select date'),
                                        'class' => 'form-control'
                                    ],
                                    'clientOptions' => [
                                        'autoclose' => true,
                                    ]
                                ] ); ?>

                                <?= $form->field($searchModel, 'dateto', [
                                    'template' => '{label}{input}<span class="form-control-icon"><i class="fa fa-calendar"></i></span>',
                                    'options' => [
                                        'class' => 'form-group has-icon has-label'
                                    ]
                                ])->widget ( yii\jui\DatePicker::class , [
                                    'options'=>[
                                        'placeholder'=>Yii::t('app', 'Select date'),
                                        'class' => 'form-control'
                                    ],
                                    'clientOptions' => [
                                        'autoclose' => true,
                                    ]
                                ] ); ?>

                                <?= $form->field($searchModel, 'category', [
                                    'options' => [
                                        'class' => 'form-group selectpicker-wrapper'
                                    ]
                                ])->dropDownList(ArrayHelper::map(OfferCategory::find()->all(), 'id', 'name'), [
                                    'prompt' => 'Select category',
                                    'class' => 'selectpicker input-price',
                                    'data-live-search' => 'true',
                                    'data-width' => '100%',
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Select'
                                ]) ?>

                                <?= $form->field($searchModel, 'fuel', [
                                    'options' => [
                                        'class' => 'form-group selectpicker-wrapper'
                                    ]
                                ])->dropDownList(ArrayHelper::map(FuelType::find()->all(), 'id', 'name'), [
                                    'prompt' => 'Select category',
                                    'class' => 'selectpicker input-price',
                                    'data-live-search' => 'true',
                                    'data-width' => '100%',
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Select'
                                ]) ?>

                                <button type="submit" style="background-color:#e60000 !important;border-color: #e60000 !Important" id="formSearchSubmit3" class="btn btn-submit btn-theme btn-theme-dark btn-block"><?=Yii::t('main','Find Car')?></button>

                            </div>
                            <!-- /Search form -->
                        </div>
                    </div>
                    <!-- /widget -->
                    <!-- widget price filter -->

                    <?php ActiveForm::end() ?>
                    <!-- /widget price filter -->
                    <!-- widget testimonials -->

                    <!-- /widget testimonials -->
                    <!-- widget helping center -->
                    <div class="widget shadow widget-helping-center">
                         <h4 class="widget-title"><?=Yii::t('main','Helping Center')?></h4>
                        <div class="widget-content">
                          <p><?=Yii::t('main','Should you have any problem? Please feel free to contact us!')?></p>
                            <h5 class="widget-title-sub" style="font-family:arial">+420 725 905 280</h5>
                            <p><a href="mailto:info@rentalcarsnow.cz">info@rentalcarsnow.cz</a></p>
                            <div class="button">
                                <a href="<?= Url::to(['site/contact'])?>" style="background-color:#e60000 !important;border-color: #e60000 !Important "  class="btn btn-block btn-theme btn-theme-dark"><?=Yii::t('main','Support Center')?></a>
                            </div>
                        </div>
                    </div>
                    <!-- /widget helping center -->
                </aside>
                <div class="col-md-9 content car-listing">






                    <!-- Car Listing -->
                    <?php foreach ($result->models as $item): ?>
                        <div class="thumbnail no-border no-padding thumbnail-car-card clearfix fllll" style="margin-bottom: 10px;">
                            <div class="media">
                                <a class="media-link" data-toggle="modal" data-target="#modal<?= $item->car_id ?>">
                                    <img class="img-responsive" src="/uploads/<?= $item->photo ? $item->photo->image : 'no-image.png' ?>"/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
                            <div class="caption md-flex">
                                <div class="car-item-head fljc">
                                    <div class="title-and-price">
                                        <h4 class="caption-title"><a href="<?= Url::to(['site/car', 'id' => $item->car_id]) ?>"><?= $item->name ?></a></h4>
                                        <h5 class="caption-title-sub" style="font-family:Arial"> <?= $item->price ?> <?= Yii::t('main', 'Euro') ?> <?= Yii::t('main', 'per day') ?></h5>
                                    </div>
                                    <div class="calendar">
                                        <section class="mounth listing-calendar" id="calendar">
                                            <article>
                                                <div class="dates-cars">
                                                    <?php for ($i = $searchModel->from_time; $i < $searchModel->from_time + $between; $i += 24 * 60 * 60): ?>
                                                        <span data-date="<?= date('d.m', $i) ?>" class="<?= in_array(date('d.m', $i), $item->busyDays) ? 'disable' : '' ?> <?= $item->status == Cars::STATUS_ADV ? 'disable' : '' ?>">
                                                            <?= date('d', $i) ?>
                                                        </span>
                                                    <?php endfor; ?>
                                                </div>
                                            </article>
                                        </section>
                                    </div>
                                </div>
                                <table class="table">
                                    <tr>
                                        <td><i class="fa fa-car"></i> <?= $item->manufactureyear ?></td>
                                        <td><i class="fa fa-dashboard"></i> <?= $item->fueling ? $item->fueling->name : '' ?></td>
                                        <td><i class="fa fa-cog"></i> <?= $item->manual == Cars::SPEED_ONE ? Yii::t('main', 'Manual') : Yii::t('main', 'Automatic') ?></td>
                                        <td><i class="fa fa-road"></i> <?= $item->km ?></td>
                                        <td class="buttons">
                                            <form action="<?= Url::to(['site/car']) ?>" method="get" class="form-extras">
                                                <input type="hidden" name="id" value="<?= $item->car_id ?>">
                                                <input type="hidden" name="beginlocation" value="<?= $searchModel->beginlocation ?>">
                                                <input type="hidden" name="endlocation" value="<?= $searchModel->endlocation ?>">
                                                <button class="btn btn-theme w100 <?= $item->status == Cars::STATUS_ADV ? 'disabled' : '' ?>"><?=Yii::t('main','Rent It')?></button>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="modal<?= $item->car_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="xzoom-container w100">
                                            <img class="xzoom img-responsive default-image w100" id="xzoom-default" src="/uploads/<?= $item->photo ? $item->photo->image : 'no-image.png' ?>" xoriginal="/uploads/<?= $item->photo ? $item->photo->image : 'no-image.png' ?>"/>
                                            <div class="xzoom-thumbs">
                                                <?php foreach ($item->photos as $photo): ?>
                                                    <!-- <a href="/uploads/<?= $photo->image ?>" class="thumb-click"> -->
                                                        <img class="xzoom img-responsive default-image w100" id="xzoom-default" width="80" src="/uploads/<?= $photo->image ?>" xpreview="/uploads/<?= $photo->image ?>">
                                                    <!-- </a> -->
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                                 <?php \ymaker\social\share\widgets\SocialShare::widget([
    'configurator'  => 'socialShareBlog', // Social share component ID
    'url'           => \yii\helpers\Url::to('site/cars', true),
    'title'         => 'Our cars',
    'description'   => 'There numerous cars at our rentalcarsnow.cz',
    'imageUrl'      => Yii::$app->homeUrl.'uploads/1526762906386.jpg',
]); ?>


 



                    <div class="pagination-wrapper">
                        <?= LinkPager::widget([
                            'pagination' => $result->pagination,
                            'prevPageLabel' => '<i class="fa fa-angle-double-left"></i> Previous',
                            'nextPageLabel' => 'Next <i class="fa fa-angle-double-right"></i>',
                            'disabledListItemSubTagOptions' => ['tag' => 'a']
                        ]) ?>
                    </div>
                    <!-- /Pagination -->

                </div>
                <!-- /CONTENT -->

                <!-- SIDEBAR -->

                <!-- /SIDEBAR -->

            </div>
        </div>
    </section>
    <!-- /PAGE WITH SIDEBAR -->

    <!-- /PAGE -->

</div>

<div class="icon-bar">
  <a target="_blank" href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fcars" class="facebook"><i class="fa fa-facebook"></i></a> 
  <a target="_blank" href="http://twitter.com/share?url=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fcars&text=There+numerous+cars+at+our+rentalcarsnow.cz" class="twitter"><i class="fa fa-twitter"></i></a> 

   <a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en&url=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fcars" class="google"><i class="fa fa-google"></i></a>  
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

.icon-bar .content {
  margin-left: 75px;
  font-size: 30px;
}


/* footer social icons */
.test ul.social-network {
    list-style: none;
    display: inline;
    margin-left:0 !important;
    padding: 0;
}
.test ul.social-network li {
    display: inline;
    margin: 0 5px;
}


/* footer social icons */
.social-network a.icoRss:hover {
    background-color: #F56505;
}
.social-network a.icoFacebook:hover {
    background-color:#3B5998;
}
.social-network a.icoTwitter:hover {
    background-color:#33ccff;
}
.social-network a.icoGoogle:hover {
    background-color:#BD3518;
}
.social-network a.icoVimeo:hover {
    background-color:#0590B8;
}
.social-network a.icoLinkedin:hover {
    background-color:#007bb7;
}
.social-network a.icoRss:hover i, .social-network a.icoFacebook:hover i, .social-network a.icoTwitter:hover i,
.social-network a.icoGoogle:hover i, .social-network a.icoVimeo:hover i, .social-network a.icoLinkedin:hover i {
    color:#fff;
}
.test a.socialIcon:hover, .socialHoverClass {
    color:#44BCDD;
}

.social-circle li a {
    display:inline-block;
    position:relative;
    margin:0 auto 0 auto;
    -moz-border-radius:50%;
    -webkit-border-radius:50%;
    border-radius:50%;
    text-align:center;
    width: 50px;
    height: 50px;
    font-size:20px;
}
.social-circle li i {
    margin:0;
    line-height:50px;
    text-align: center;
}

.social-circle li a:hover i, .triggeredHover {
    -moz-transform: rotate(360deg);
    -webkit-transform: rotate(360deg);
    -ms--transform: rotate(360deg);
    transform: rotate(360deg);
    -webkit-transition: all 0.2s;
    -moz-transition: all 0.2s;
    -o-transition: all 0.2s;
    -ms-transition: all 0.2s;
    transition: all 0.2s;
}
.social-circle i {
    color: #fff;
    -webkit-transition: all 0.8s;
    -moz-transition: all 0.8s;
    -o-transition: all 0.8s;
    -ms-transition: all 0.8s;
    transition: all 0.8s;
}

.test a {
 background-color: #D3D3D3;   
}
</style>
<!-- /CONTENT AREA -->