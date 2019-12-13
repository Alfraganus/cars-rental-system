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

$this->title = 'Search cars | ';

?>
<!-- CONTENT AREA -->
<div class="content-area">

    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs text-right">
        <div class="container">
            <div class="page-header">
                <h1>All cars</h1>
            </div>
            <!--<ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">List Car</li>
            </ul>-->
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
                        <h4 class="widget-title">Find Best Rental Car</h4>
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
                                ])->textInput([
                                    'placeholder' => 'dd/mm/yyyy',
                                    'class' => 'form-control datepicker',
                                    'autocomplete' => 'off'
                                ]) ?>

                                <?= $form->field($searchModel, 'dateto', [
                                    'template' => '{label}{input}<span class="form-control-icon"><i class="fa fa-calendar"></i></span>',
                                    'options' => [
                                        'class' => 'form-group has-icon has-label'
                                    ]
                                ])->textInput([
                                    'placeholder' => 'dd/mm/yyyy',
                                    'class' => 'form-control datepicker',
                                    'autocomplete' => 'off'
                                ]) ?>

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

                                <button type="submit" id="formSearchSubmit3" class="btn btn-submit btn-theme btn-theme-dark btn-block">Find Car</button>

                            </div>
                            <!-- /Search form -->
                        </div>
                    </div>
                    <!-- /widget -->
                    <!-- widget price filter -->
                    <div class="widget shadow widget-filter-price">
                        <h4 class="widget-title">Price</h4>
                        <div class="widget-content">
                            <div id="slider-range"></div>
                            <input type="text" id="amount" readonly/>
                            <?= $form->field($searchModel, 'price_from', [
                                'template' => '{input}',
                                'options' => ['tag' => false]
                            ])->hiddenInput(['id' => 'amount-from'])->label(false) ?>
                            <?= $form->field($searchModel, 'price_to', [
                                'template' => '{input}',
                                'options' => ['tag' => false]
                            ])->hiddenInput(['id' => 'amount-to'])->label(false) ?>
                            <button type="submit" class="btn btn-theme btn-theme-dark">Filter</button>
                        </div>
                    </div>
                    <?php ActiveForm::end() ?>
                    <!-- /widget price filter -->
                    <!-- widget testimonials -->
                    <!--    <div class="widget shadow">
                            <div class="widget-title">Testimonials</div>
                            <div class="testimonials-carousel">
                                <div class="owl-carousel" id="testimonials">
                                    <div class="testimonial">
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="testimonial-text">Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                                                    cubilia.
                                                </div>
                                                <div class="testimonial-name">John Doe <span class="testimonial-position">Co- founder at Rent It</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial">
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="testimonial-text">Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                                                    cubilia.
                                                </div>
                                                <div class="testimonial-name">John Doe <span class="testimonial-position">Co- founder at Rent It</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial">
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="testimonial-text">Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                                                    cubilia.
                                                </div>
                                                <div class="testimonial-name">John Doe <span class="testimonial-position">Co- founder at Rent It</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    <!-- /widget testimonials -->
                    <!-- widget helping center -->
                    <div class="widget shadow widget-helping-center">
                        <h4 class="widget-title">Helping Center</h4>
                        <div class="widget-content">
                            <p>Should you have any problem? Please feel free to contact us!</p>
                            <h5 class="widget-title-sub">+420 775 119 752</h5>
                            <p><a href="mailto:support@supportcenter.com">support@carrental.com</a></p>
                            <div class="button">
                                <a href="<?= Url::to(['site/contact']) ?>" class="btn btn-block btn-theme btn-theme-dark">Support Center</a>
                            </div>
                        </div>
                    </div>
                    <!-- /widget helping center -->
                </aside>
                <div class="col-md-9 content car-listing" id="content">

                    <!-- Car Listing -->
                    <?php foreach ($result->models as $item): ?>
                        <div class="thumbnail no-border no-padding thumbnail-car-card clearfix">
                            <div class="media">
                                <a class="media-link" data-gal="prettyPhoto" href="<?= Yii::$app->homeUrl; ?>uploads/<?= $item->photo ? $item->photo->image : 'no-image.png' ?>">
                                    <img class="img-responsive car-image" src="<?= Yii::$app->homeUrl; ?>uploads/<?= $item->photo ? $item->photo->image : 'no-image.png' ?>"/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
                            <div class="caption">
                                <div class="car-item-head car-flex-item">
                                    <div class="title-and-price">
                                        <h4 class="caption-title"><a href="<?= Url::to(['site/car', 'id' => $item->car_id]) ?>"><?= $item->name ?></a></h4>
                                        <h5 class="caption-title-sub">
                                            <bold><?= $item->price ?> kc</bold>
                                            <span style='color:black'>per a day</span></h5>
                                    </div>
                                    <div class="calendar">
                                        <section class="mounth listing-calendar" id="calendar">
                                            <article>
                                                <div class="dates">
                                                    <?php for ($i = $searchModel->from_time; $i < $searchModel->from_time + $between; $i += 24 * 60 * 60): ?>
                                                        <span data-date="<?= date('d.m', $i) ?>" class="<?= in_array(date('d.m', $i), $item->busyDays) ? 'disable' : '' ?>">
                                                            <?= date('d', $i) ?>
                                                        </span>
                                                    <?php endfor; ?>
                                                </div>
                                            </article>
                                        </section>
                                    </div>
                                </div>
                                <style>
                                    .btn-theme:hover {
                                        background-color: #14181c !important;
                                        border-color: #14181c !important;

                                    }

                                    .btn-theme {
                                        background-color: #e60000 !important;
                                        border-color: #e60000 !important;
                                    }
                                </style>
                                <table class="table">
                                    <tr>
                                        <td><i class="fa fa-car"></i> <?= $item->manufactureyear ?></td>
                                        <td><i class="fa fa-dashboard"></i> <?= $item->fueling ? $item->fueling->name : '' ?></td>
                                        <td><i class="fa fa-cog"></i> <?= $item->manual == Cars::SPEED_ONE ? Yii::t('main', 'Manual') : Yii::t('main', 'Automatic') ?></td>
                                        <td><i class="fa fa-road"></i> <?= $item->km ?></td>
                                        <td class="buttons">
                                            <form action="<?= Url::to(['site/car']) ?>" method="get">
                                                <input type="hidden" name="id" value="<?= $item->car_id ?>">
                                                <input type="hidden" name="beginlocation" value="<?= $searchModel->beginlocation ?>">
                                                <input type="hidden" name="endlocation" value="<?= $searchModel->endlocation ?>">
                                                <button class="btn btn-theme w100">Rent It</button>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- /Car Listing -->

                    <!-- Pagination -->
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

    <!-- PAGE -->
    <section class="page-section contact dark">
        <div class="container">

            <!-- Get in touch -->

            <h2 class="section-title">
                <small>Feel Free to Say Hello!</small>
                <span>Get in Touch With Us</span>
            </h2>

            <div class="row">
                <div class="col-md-6">
                    <!-- Contact form -->
                    <form name="contact-form" method="post" action="#" class="contact-form alt" id="contact-form">

                        <div class="row">
                            <div class="col-md-6">

                                <div class="outer required">
                                    <div class="form-group af-inner has-icon">
                                        <label class="sr-only" for="name">Name</label>
                                        <input
                                                type="text" name="name" id="name" placeholder="Name" value="" size="30"
                                                data-toggle="tooltip" title="Name is required"
                                                class="form-control placeholder"/>
                                        <span class="form-control-icon"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="outer required">
                                    <div class="form-group af-inner has-icon">
                                        <label class="sr-only" for="email">Email</label>
                                        <input
                                                type="text" name="email" id="email" placeholder="Email" value="" size="30"
                                                data-toggle="tooltip" title="Email is required"
                                                class="form-control placeholder"/>
                                        <span class="form-control-icon"><i class="fa fa-envelope"></i></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group af-inner has-icon">
                            <label class="sr-only" for="input-message">Message</label>
                            <textarea
                                    name="message" id="input-message" placeholder="Message" rows="4" cols="50"
                                    data-toggle="tooltip" title="Message is required"
                                    class="form-control placeholder"></textarea>
                            <span class="form-control-icon"><i class="fa fa-bars"></i></span>
                        </div>

                        <div class="outer required">
                            <div class="form-group af-inner">
                                <input type="submit" name="submit" class="form-button form-button-submit btn btn-block btn-theme" id="submit_btn" value="Send message"/>
                            </div>
                        </div>

                    </form>
                    <!-- /Contact form -->
                </div>
                <div class="col-md-6">

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
    <!-- /PAGE -->

</div>
<!-- /CONTENT AREA -->
