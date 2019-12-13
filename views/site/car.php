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

use yii\helpers\Json;

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

                    <h1><?=Yii::t('main', 'Reservation')?> </h1>

            </div>

        </div>

    </section>

    <!-- /BREADCRUMBS -->


    <!-- PAGE WITH SIDEBAR -->

    <section class="page-section with-sidebar sub-page">

        <div class="container">

            <div class="row">

                <!-- CONTENT -->

                <div class="col-md-9 content" id="content">

                    <?php foreach (Yii::$app->session->getAllFlashes() as $key => $value): ?>

                        <?php
                        $this->registerJS("
                        
                        $('.bs-example-modal-lg').modal('show');
                        
                        ");?>
                      <div class="alert alert-success">
  <strong>Thank you for your order!</strong> Your order will be reviewed soon and our manager will contact with you.
</div>

                    <?php endforeach; ?>

                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-body">

                                    <H2>Battery Low!</H2>
                                    <h4>Your Laptop battery is less then 10%.Recharge the battery.</h4>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-body">

                                    <H2>Battery Low!</H2>
                                    <h4>Your Laptop battery is less then 10%.Recharge the battery.</h4>

                                </div>
                            </div>
                        </div>
                    </div>
                   <h3 class="block-title alt"><?=Yii::t('main', 'Car Information')?></h3>

                    <div class="car-big-card alt">

                        <div class="row">

                            <div class="col-md-8 text-center">

                                <div class="xzoom-container">

                                    <img class="xzoom a img-responsive default-image" id="xzoom-default" src="/uploads/<?= $car->photo ? $car->photo->image : 'no-image.png' ?>"

                                         xoriginal="/uploads/<?= $car->photo ? $car->photo->image : 'no-image.png' ?>"/>

                                    <div class="xzoom-thumbs">

                                        <?php foreach ($car->photos as $photo): ?>

                                            <a href="/uploads/<?= $photo->image ?>">

                                                <img class="xzoom-gallery a" width="80" src="/uploads/<?= $photo->image ?>" xpreview="/uploads/<?= $photo->image ?>">

                                            </a>

                                        <?php endforeach; ?>

                                    </div>

                                </div>

                                <div class="row car-thumbnails">

                                    <?php foreach ($car->photos as $i => $photo): ?>

                                        <div class="col-xs-2 col-sm-2 col-md-3">

                                            <a href="#" onclick="jQuery('.img-carousel').trigger('to.owl.carousel', [<?= $i ?>,300]);">

                                                <img src="<?= Yii::$app->homeUrl; ?>/uploads/<?= $photo->image ?>" alt="" class="img-responsive"/>

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

                                                <h2><?= $car->name ?></h2>

                                            </li>  

                                            <li><?=Yii::t('main', 'Fuel type')?>: <?= $car->fueling->name ?></li>

                                            <li><?=Yii::t('main', 'Under')?> : <?= $car->km ?> Km</li>

                                            <li><?=Yii::t('main', 'Transmission')?> : <?= $car->manual == Cars::SPEED_ONE ? Yii::t('main', 'Manual') : Yii::t('main', 'Automatic') ?></li>

                                            <li><?=Yii::t('main', 'Consumption')?>: <?= $car->rasxod ?> / 100 km </li>

                                            <li><?=Yii::t('main', 'Manufacture Year')?>: <?= $car->manufactureyear ?></li>

                                        </ul>

                                    </div>

                                    <div class="price" data-price="<?= $car->price ?>">

                                        <strong><?= $model->days > 0 ? $car->price * $model->days : $car->price ?></strong> <span style='font-family:Arial'><?= Yii::t('main', 'Euro') ?> <?=Yii::t('main','for')?>  <?= $model->days > 1 ? $model->days . Yii::t('main', 'days') : Yii::t('main', 'day') ?></span> <i
                                                class="fa fa-info-circle"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <hr class="page-divider half transparent"/>

<!--    <center>
<div class="test">
                    <ul class="social-network social-circle">
                        <li><a target="_blank" href="https://www.facebook.com/sharer.php?u=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fcar%3Fid%3D29" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="http://twitter.com/share?url=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fcar%3Fid%3D29&text=model%3A+Volkswagen+Golf%09+1.6+TDi+Style%2C++sada+kol" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en&url=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fcar%3Fid%3D29" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                    </ul>               
</div>
</center> -->



                   <h3 class="block-title alt"><?=Yii::t('main', 'We offer')?></h3>

                    <div class="row">

                        <div class="col-md-12">

                            <table class="table table-bordered table-striped">

                                <thead>

                                <tr>

                                    <?php foreach ($sales as $sale): ?>

                                      <th class="text-center">  <span style='color:green'><?=Yii::t('main', 'discount for more than')?> <?= $sale->day ?>+ <?=Yii::t('main', 'days renting')?></span></th>

                                    <?php endforeach; ?>

                                </tr>

                                </thead>

                                <tbody>

                                <tr>

                                    <?php $j_sales = [];
                                    foreach ($sales as $sale): $j_sales[$sale->day] = $sale->sale; ?>

                                        <td class="text-center"><span style='color:green'><?= $sale->sale ?>% </span></td>

                                    <?php endforeach; ?>

                                </tr>
                                <?php krsort($j_sales); ?>
                                </tbody>

                                <span class="hidden" id="sales" data-sale='<?= Json::encode($j_sales) ?>'></span>

                            </table>

                        </div>

                    </div>

                    <hr class="page-divider half transparent"/>



                    <div class="widget shadow visible-xs visible-sm" style="margin-bottom: 20px;">


                        <section class="mounth" id="calendar">

                            <header class="calendar-header">


                                <nav role='padigation' class="calendar-nav">

                                    <span></span>

                                    <span></span>

                                </nav>

                            </header>


                            <div class="deserved_dates">
                            	<?php foreach ($model->reserved_dates as $date): ?>
                            		<input type="hidden" name="" class="dates" value="<?= $date ?>">
                            	<?php endforeach; ?>
                            </div>


                            <article>

                                <div class="days">

                                    <?php for ($i = time(); $i < time() + 24 * 60 * 60 * 7; $i += 24 * 60 * 60): ?>

                                        <b><?= substr(date('D', $i), 0, 2) ?></b>

                                    <?php endfor; ?>

                                </div>
                                <div class="dates">
                                    <?php for ($i = time(); $i < time() + 24 * 60 * 60 * 42; $i += 24 * 60 * 60): ?>

                                        <span data-date="<?= date('d.m', $i) ?>"
                                              class="
                                              <?= in_array(date('d.m', $i), $car->busyDays) ? 'disable' : ''?>
                                               <?= in_array(date('d.m', $i), $model->reserved_dates) ? 'active' : ''?> 
                                               <?= $car->status == Cars::STATUS_ADV ? 'disable' : '' ?>">
                                            <?= date('d', $i) ?>
                                        </span>

                                    <?php endfor; ?>

                                </div>

                            </article>

                        </section>

                    </div>

 




                    <h3 class="block-title alt"><?=Yii::t('main', 'Extras & Frees')?></h3>

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

                    <style>

                        .alta {

                            background: white !important;

                        }

                        .altb {

                            background: #F2F2F2;

                        }


                    </style>

                    <h3 class="block-title alt"><?=Yii::t('main', 'Customer Information')?></h3>

                    <br>

                    <div class="row" style='background:#F2F2F2; margin-left: 0; margin-right: 0;'>

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

                                'placeholder' =>  Yii::t('main', 'Name and Surname:*'),

                                'class' => 'form-control alta',

                                'autocomplete' => 'off'

                            ])->label(false) ?>

                        </div>

                        <div class="col-md-6">

                            <?= $form->field($model, 'email', [

                                'template' => '{input}'

                            ])->textInput([

                                'placeholder' => Yii::t('main', 'Email:*'),

                                'class' => 'form-control alta',

                                'autocomplete' => 'off'

                            ])->label(false) ?>

                        </div>

                        <div class="col-md-6">

                            <?= $form->field($model, 'phone_number')->textInput([

                                'placeholder' => Yii::t('main', 'Phone Number'),

                                'class' => 'form-control alta',

                                'autocomplete' => 'off'

                            ])->label(false) ?>

                        </div>

                        <div class="col-md-6">

                            <?= $form->field($model, 'cell_phone_number')->textInput([

                                'placeholder' => Yii::t('main', 'Cell Phone Number'),

                                'class' => 'form-control alta',

                                'autocomplete' => 'off'

                            ])->label(false) ?>

                        </div>

                    </div>

                    <br>


                    <h3 class="block-title alt"><?=Yii::t('main', 'Payments options')?></h3>

                    <div class="panel-group payments-options" id="accordion" role="tablist" aria-multiselectable="true">

                      <!--   <div class="panel radio panel-default">

                            <div class="panel-heading" role="tab" id="headingTwo">

                                <h4 class="panel-title">

                                    <a  class="collapsed" data-type="<?= Cars::PAYMENT_TYPE_CASH ?>" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapseTwo">

                                        <span class="dot"></span><?=Yii::t('main', 'Payment by cash')?>

                                    </a>
                                      <a class="collapsed" data-type="<?= Cars::PAYMENT_TYPE_CASH ?>" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapseTwo">
                                            <span class="dot"></span> <?=Yii::t('main', 'Payment by cash')?>
                                        </a>

                                </h4>

                            </div>

                        </div> -->

                         <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                   
                                        <a class="collapsed payment_option" data-type="<?= Cars::PAYMENT_TYPE_PAYPAL ?>" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapseThree">
                                            <span class="dot"></span> <?=Yii::t('main', 'Payment by Paypal')?>
                                        </a>
                                <span class="overflowed pull-right">
                                    <img src="assets/img/preview/payments/mastercard-2.jpg" alt=""/>
                                    <img src="assets/img/preview/payments/visa-2.jpg" alt=""/>
                                    <img src="assets/img/preview/payments/american-express-2.jpg" alt=""/>
                                    <img src="assets/img/preview/payments/discovery-2.jpg" alt=""/>
                                    <img src="assets/img/preview/payments/eheck-2.jpg" alt=""/>
                                </span>
                                    </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                                </div>
                            </div>


                             <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading4">
                                    <h4 class="panel-title">
                                        <a class="collapsed payment_option" data-type="<?= Cars::PAYMENT_TYPE_CASH ?>" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                            <span class="dot"></span> <?=Yii::t('main', 'Payment by cash')?>
                                        </a>
                                        <span class="overflowed pull-right"><img src="assets/img/preview/payments/paypal-2.jpg" alt=""/></span>
                                    </h4>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4"></div>
                            </div>



                    </div>


                    <h3 class="block-title alt"><i class="fa fa-angle-down"></i><?=Yii::t('main', 'Additional Information')?></h3>

                    <div class="row">

                        <div class="col-md-12">

                            <?= $form->field($model, 'comment')->textarea([

                                'placeholder' => Yii::t('main', 'Additional Information'),

                                'class' => 'form-control altb',

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

                        ], false)->label(Yii::t('main', "<a target='_blank' href='/site/payment-terms' target='_blank'><span style='color:red'>I accept all information and Payments etc</span></a>")) ?>
 
                    </div>

                    <style>
                        .reservation-now {
                            border: solid 0px !important;
                        }
                    </style>

                    <h3 class="block-title alt"><?=Yii::t('main', 'Total sum of payment')?></h3>

                    <div class="overflowed reservation-now text-right" style="margin-bottom: 20px;">

                        <h4 style="margin-bottom: 7px;font-family:arial"><b><?=Yii::t('main', 'Total payment')?>:</b> <span class="amount"><?= $car->price ?></span> <?= Yii::t('main', 'Euro') ?> </h4>

                        <h4 style="margin-bottom: 7px;font-family:arial"><b><?=Yii::t('main', 'Discount')?>: </b> <span class="sale">0</span> <?= Yii::t('main', 'Euro') ?></h4>

                        <h4 style="margin-bottom: 7px;font-family:arial"><b><?=Yii::t('main', 'Final payment')?>:</b> <span class="total">0 </span> <?= Yii::t('main', 'Euro') ?></h4>

                    </div>

                    <button style="background-color:green !important; border-color:green !important" class="btn btn-theme pull-right" type="submit" style="margin-left: 10px;"><?=Yii::t('main', 'Reserve the car')?></button>

                    <a class="btn btn-theme pull-right btn-cancel btn-theme-dark" href="/"><?=Yii::t('main', 'Cancel')?></a>


                    <?= $form->field($model, 'payment_type')->hiddenInput(['value' => Cars::PAYMENT_TYPE_BANK])->label(false) ?>

                    <?php foreach ($model->reserved_dates as $date): ?>
                        <?= $form->field($model, 'reserved_dates[]')->hiddenInput(['value' => $date])->label(false) ?>
                    <?php endforeach; ?>

                    <?php ActiveForm::end() ?>


                </div>

                <!-- /CONTENT -->


                <!-- SIDEBAR -->

                <aside class="col-md-3 sidebar" id="sidebar">

                    <!-- widget detail reservation -->

                    <div class="widget shadow widget-details-reservation">

                        <h4 class="widget-title"><?=Yii::t('main', 'Detail Reservation')?></h4>

                        <div class="widget-content">

                            <h5 class="widget-title-sub"><?=Yii::t('main', 'Pick-up location')?></h5>

                            <div class="media">

                                <span class="media-object pull-left"><i class="fa fa-location-arrow"></i></span>

                                <div class="media-body"><p><?=Yii::t('main', 'From')?> <?= $model->pickUp->name ?></p></div>

                            </div>

                            <h5 class="widget-title-sub"><?=Yii::t('main', 'Drop-off location')?></h5>

                            <div class="media">

                                <span class="media-object pull-left"><i class="fa fa-location-arrow"></i></span>

                                <div class="media-body"><p><?=Yii::t('main', 'From')?> <?= $model->dropOff->name ?></p></div>

                            </div>

                            <div class="button hidden">

                                <a href="/" class="btn btn-block btn-theme btn-theme-dark"><?=Yii::t('main', 'Update Reservation')?></a>

                            </div>

                        </div>

                    </div>

                    <!-- /widget detail reservation -->

                    <!-- widget testimonials -->


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


                    <div class="widget shadow hidden-xs hidden-sm">


                        <section class="mounth" id="calendar">

                            <header class="calendar-header">

                               <h1 class="c-h1"><?=Yii::t('main', 'Select days')?></h1>

                                <nav role='padigation' class="calendar-nav">

                                    <span></span>

                                    <span></span>

                                </nav>

                            </header>


                            <article>

                                <div class="days">

                                    <?php for ($i = time(); $i < time() + 24 * 60 * 60 * 7; $i += 24 * 60 * 60): ?>

                                        <b><?= substr(date('D', $i), 0, 2) ?></b>

                                    <?php endfor; ?>

                                </div>

                                <div class="dates">

                                    <?php for ($i = time(); $i < time() + 24 * 60 * 60 * 42; $i += 24 * 60 * 60): ?>

                                        <span data-date="<?= date('d.m', $i) ?>"
                                              class="
                                              <?= in_array(date('d.m', $i), $car->busyDays) ? 'disable' : ''?>
                                               <?= in_array(date('d.m', $i), $model->reserved_dates) ? 'active' : ''?>
                                                <?= $car->status == Cars::STATUS_ADV ? 'disable' : '' ?>">
                                            <?= date('d', $i) ?>
                                        </span>

                                    <?php endfor; ?>

                                </div>

                            </article>

                        </section>

                    </div>

                    <!-- /widget testimonials -->

                    <!-- widget helping center -->

                    <div class="widget shadow widget-helping-center">

                        <h4 class="widget-title"><?=Yii::t('main', 'Helping Center')?></h4>

                        <div class="widget-content">

                            <p><?=Yii::t('main', 'Should you have any problem? Please feel free to contact us!')?></p>

                            <h4 style="font-family:Arial">+420 725 905 280</h4><br>

                            <p><a href="mailto:info@rentalcarsnow.cz">info@rentalcarsnow.cz</a></p>

                            <div class="button">

                                <a href="<?= Url::to(['site/contact']) ?>" class="btn btn-block btn-theme btn-theme-dark"><?=Yii::t('main','Support Center')?></a>

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


    <!-- /PAGE -->


</div>

<!-- /CONTENT AREA -->
<div class="icon-bar">
  <a target="_blank" href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fcar%3Fid%3D29" class="facebook"><i class="fa fa-facebook"></i></a> 
  <a target="_blank" href="https://twitter.com/intent/tweet?url=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fcar%3Fid%3D29&text=model%3A%20Volkswagen%20Golf%09%201.6%20TDi%20Style%2C%20%20sada%20kol&original_referer=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fcar%3Fid%3D29%26beginlocation%3D%26endlocation%3D" class="twitter"><i class="fa fa-twitter"></i></a> 

   <a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en&url=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fcar%3Fid%3D29" class="google"><i class="fa fa-google"></i></a>  
</div>


<?php
if (!empty($model->reserved_dates)) {
    $this->registerJs('calculateSaleAndTotalPrice();', \yii\web\View::POS_END);
} 
?>
<?php
    $this->registerJs('
            jQuery(document).on("click",".payment_option",function(){
                var value = $(this).attr("data-type");
                $("#carorderform-payment_type").val(value);
            });
    ');
 ?>

   <?php \ymaker\social\share\widgets\SocialShare::widget([
    'configurator'  => 'socialShareBlog', // Social share component ID
    'url'           => \yii\helpers\Url::to(['site/car','id'=>$car->car_id], true),
    'title'         => 'Single car page',
    'description'   => 'model: '.$car->name,
    'imageUrl'      => Yii::$app->homeUrl.'uploads/'.$carpicture->image,
]); ?>
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
