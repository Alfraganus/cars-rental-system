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
                <div class="col-md-9 content" id="content">

                    <h3 class="block-title alt"><i class="fa fa-angle-down"></i>Car Information</h3>
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

                    <h3 class="block-title alt"><i class="fa fa-angle-down"></i>Extras & Frees</h3>
                    <?php $form = ActiveForm::begin(['options' => ['class' => 'form-extras']]) ?>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="left">
                                <?= $form->field($model, 'car_extras')->checkboxList($model->extras, [
                                    'encode' => false,
                                    'item' => function ($index, $label, $name, $checked, $value) {
                                        $string = '<div class="checkbox checkbox-danger">';
                                        $string .= '<input name="' . $name . '" id="car_extra[' . $index . ']" value="' . $value . '" type="checkbox">';
                                        $string .= '<label for="car_extra[' . $index . ']">' . $label . '</label>';
                                        $string .= '</div>';
                                        return $string;
                                    }
                                ])->label(false) ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="right">
                                <?= $form->field($model, 'free_car_extras')->checkboxList($model->freeExtras, [
                                    'encode' => false,
                                    'item' => function ($index, $label, $name, $checked, $value) {
                                        $string = '<div class="checkbox checkbox-danger">';
                                        $string .= '<input name="' . $name . '" id="car_free_extra[' . $index . ']" value="' . $value . '" type="checkbox">';
                                        $string .= '<label for="car_free_extra[' . $index . ']">' . $label . '</label>';
                                        $string .= '</div>';
                                        return $string;
                                    }
                                ])->label(false) ?>
                            </div>
                        </div>

                    </div>

                    <h3 class="block-title alt"><i class="fa fa-angle-down"></i>Customer Information</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'gender')->radioList($model->genders, [
                                'encode' => false,
                                'item' => function ($index, $label, $name, $checked, $value) {
                                    $string = '<div class="radio radio-inline">';
                                    $string .= '<input name="' . $name . '" id="gender[' . $index . ']" value="' . $value;
                                    $string .= $checked ? '" checked type="radio">' : '" type="radio">';
                                    $string .= '<label for="gender[' . $index . ']">' . $label . '</label>';
                                    $string .= '</div>';
                                    return $string;
                                }
                            ])->label(false) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'name_and_surname', [
                                    'template' => '{input}'
                            ])->textInput([
                                'placeholder' => 'Name and Surname:*',
                                'class' => 'form-control alt',
                                'autocomplete' => 'off'
                            ])->label(false) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'email', [
                                    'template' => '{input}'
                            ])->textInput([
                                'placeholder' => 'Email:*',
                                'class' => 'form-control alt',
                                'autocomplete' => 'off'
                            ])->label(false) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'phone_number')->textInput([
                                'placeholder' => 'Phone Number',
                                'class' => 'form-control alt',
                                'autocomplete' => 'off'
                            ])->label(false) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'cell_phone_number')->textInput([
                                'placeholder' => 'Cell Phone Number',
                                'class' => 'form-control alt',
                                'autocomplete' => 'off'
                            ])->label(false) ?>
                        </div>
                    </div>

                    <h3 class="block-title alt"><i class="fa fa-angle-down"></i>Payments options</h3>
                    <div class="panel-group payments-options" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel radio panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapseOne">
                                        <span class="dot"></span> Direct Bank Transfer
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                                <div class="panel-body">
                                    <div class="alert alert-success" role="alert">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sollicitudin ultrices suscipit. Sed commodo vel mauris vel dapibus.</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapseTwo">
                                        <span class="dot"></span> Cheque Payment
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                                <div class="panel-body">
                                    Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapseThree">
                                        <span class="dot"></span> Credit Card
                                    </a>
                                    <span class="overflowed pull-right">
                                    <img src="/assets/img/preview/payments/mastercard-2.jpg" alt=""/>
                                    <img src="/assets/img/preview/payments/visa-2.jpg" alt=""/>
                                    <img src="/assets/img/preview/payments/american-express-2.jpg" alt=""/>
                                    <img src="/assets/img/preview/payments/discovery-2.jpg" alt=""/>
                                    <img src="/assets/img/preview/payments/eheck-2.jpg" alt=""/>
                                </span>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3"></div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading4">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                        <span class="dot"></span> PayPal
                                    </a>
                                    <span class="overflowed pull-right"><img src="/assets/img/preview/payments/paypal-2.jpg" alt=""/></span>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4"></div>
                        </div>
                    </div>

                    <h3 class="block-title alt"><i class="fa fa-angle-down"></i>Additional Information</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'comment')->textarea([
                                'placeholder' => 'Additional Information',
                                'class' => 'form-control alt',
                                'autocomplete' => 'off',
                                'cols' => 30,
                                'rows' => 10
                            ])->label(false) ?>
                        </div>
                    </div>

                    <div class="overflowed reservation-now">
                        <?= $form->field($model, 'agreement', [
                            'template' => '{input}{label}{error}',
                            'options' => ['class' => 'checkbox pull-left'],
                            'labelOptions' => ['class' => '']
                        ])->checkbox([
                            'encode' => false,
                        ], false)->label() ?>
                        <button class="btn btn-theme pull-right" type="submit">Reservation Now</button>
                        <a class="btn btn-theme pull-right btn-cancel btn-theme-dark" href="/">Cancel</a>
                    </div>

                    <?php ActiveForm::end() ?>

                </div>
                <!-- /CONTENT -->

                <!-- SIDEBAR -->
                <aside class="col-md-3 sidebar" id="sidebar">
                    <!-- widget detail reservation -->
                    <div class="widget shadow widget-details-reservation">
                        <h4 class="widget-title">Detail Reservation</h4>
                        <div class="widget-content">
                            <h5 class="widget-title-sub">Picking Up Location</h5>
                            <div class="media">
                                <span class="media-object pull-left"><i class="fa fa-calendar"></i></span>
                                <div class="media-body"><p><?= Yii::$app->formatter->asDatetime($model->datefrom) ?></p></div>
                            </div>
                            <div class="media">
                                <span class="media-object pull-left"><i class="fa fa-location-arrow"></i></span>
                                <div class="media-body"><p>From <?= $model->pickUp->name ?></p></div>
                            </div>
                            <h5 class="widget-title-sub">Droping Off Location</h5>
                            <div class="media">
                                <span class="media-object pull-left"><i class="fa fa-calendar"></i></span>
                                <div class="media-body"><p><?= Yii::$app->formatter->asDatetime($model->dateto) ?></p></div>
                            </div>
                            <div class="media">
                                <span class="media-object pull-left"><i class="fa fa-location-arrow"></i></span>
                                <div class="media-body"><p>From <?= $model->dropOff->name ?></p></div>
                            </div>
                            <div class="button hidden">
                                <a href="/" class="btn btn-block btn-theme btn-theme-dark">Update Reservation</a>
                            </div>
                        </div>
                    </div>
                    <!-- /widget detail reservation -->
                    <!-- widget testimonials -->
                    <div class="widget shadow">
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
                    </div>
                    <!-- /widget testimonials -->
                    <!-- widget helping center -->
                    <div class="widget shadow widget-helping-center">
                        <h4 class="widget-title">Helping Center</h4>
                        <div class="widget-content">
                            <p>Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros.</p>
                            <h5 class="widget-title-sub">+90 555 444 66 33</h5>
                            <p><a href="mailto:support@supportcenter.com">support@supportcenter.com</a></p>
                            <div class="button">
                                <a href="#" class="btn btn-block btn-theme btn-theme-dark">Support Center</a>
                            </div>
                        </div>
                    </div>
                    <!-- /widget helping center -->
                </aside>
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
