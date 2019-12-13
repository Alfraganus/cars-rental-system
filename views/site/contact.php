<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Contact us | rentalcarsnow.cz';
?>


<section class="page-section breadcrumbs text-center" style="margin-bottom: 25px">
    <div class="container">
        <div class="page-header">
            <h1><?=Yii::t('main','Contact Us')?></h1>
        </div>

    </div>
</section>
 <div>
<!-- <div style="margin: 0 25px 0 25px"> -->
<div class="col-md-1"></div>
<div class="col-md-3" style="padding-left:50px">
    <div class="contact-info">

        <h2 class="block-title"><span><?=Yii::t('main','Contact Us')?></span></h2>

        <div class="media-list">
            <div class="media">
                <i class="pull-left fa fa-home"></i>
                <div class="media-body">
                    <strong><?=Yii::t('main', 'Address')?>:</strong><br>
                    Praha - Žižkov, Chlumova 199/22, PSČ 130 00
                </div>
            </div>
            <div class="media">
                <i class="pull-left fa fa-phone"></i>
                <div class="media-body">
                    <strong><?=Yii::t('main', 'Telephone')?>:</strong><br>
                    +420 725 905 280
                </div>
            </div>

            <div class="media">
                <div class="media-body">
                    <?=Yii::t('main', 'We are always ready to assit you')?>
                </div>
            </div>
            <div class="media">
                <div class="media-body">
                    <strong><?=Yii::t('main', 'Customer Service')?>:</strong><br>
                    <a href="mailto:hello@rentit.com">info@rentalcarsnow.cz</a>
                </div>
            </div>
<br>
             


                                 <?php \ymaker\social\share\widgets\SocialShare::widget([
    'configurator'  => 'socialShareBlog', // Social share component ID
    'url'           => \yii\helpers\Url::to('site/contact', true),
    'title'         => 'Contact form',
    'description'   => 'rentalcarsnow.cz contact page',
    'imageUrl'      => Yii::$app->homeUrl.'img/road.jpg',
]); ?>



        </div>

    </div>
</div>

<div class="col-md-8" style="padding-right:50px">

 

    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

    <div class="row">
        <div class="col-md-6">


            <div class="outer required">
                <div class="form-group af-inner has-icon">
                    <?= $form->field($contact, 'name', [
                        'options' => ['class' => 'form-group af-inner has-icon'],
                        'template' => '{label}{input}<span class="form-control-icon"><i class="fa fa-user"></i></span>{error}',
                        'labelOptions' => ['class' => 'sr-only']
                    ])->textInput(['class' => 'form-control placeholder', 'placeholder' =>  Yii::t('main', 'Name')])->label(false) ?>
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
                    ])->textInput(['class' => 'form-control placeholder', 'placeholder' => Yii::t('main', 'Email')])->label(false) ?>


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
            ])->textInput(['class' => 'form-control placeholder', 'placeholder' => Yii::t('main', 'Subject')])->label(false) ?>
        </div>
    </div>

    <div class="form-group af-inner has-icon">


        <?= $form->field($contact, 'body', [
            'options' => ['class' => 'form-group af-inner has-icon'],
            'template' => '{label}{input}<span class="form-control-icon"><i class="fa fa-bars"></i></span>{error}',
            'labelOptions' => ['class' => 'sr-only']
        ])->textarea(['class' => 'form-control placeholder', 'placeholder' => Yii::t('main', 'Message')])->label(false) ?>


    </div>

    <div class="outer required">
        <div class="form-group af-inner">

            <?= Html::submitButton(Yii::t('main', 'Submit'), ['class' => 'form-button form-button-submit btn btn-block btn-theme ripple-effect btn-theme-dark','style'=>'background-color: #e60000 !important', 'name' => 'contact-button']) ?>
            <!--  <input type="submit" name="submit" class="form-button form-button-submit btn btn-block btn-theme ripple-effect btn-theme-dark" id="submit_btn" value="Send message"/> -->
        </div>
    </div>

    <?php ActiveForm::end(); ?>



  
 

</div>

 <!--  <center>
<div class="test">
                    <ul class="social-network social-circle">
                        <li><a target="_blank" href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fcontact" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="http://twitter.com/share?url=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fcontact&text=rentalcarsnow.cz+contact+page" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a target="_blank" href="https://plus.google.com/share?url=http://rentalcarsnow.cz/site/contact&hl=en" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                    </ul>               
</div>
</center> -->



<div class="icon-bar">
  <a target="_blank" href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fcontact" class="facebook"><i class="fa fa-facebook"></i></a> 
  <a target="_blank" href="http://twitter.com/share?url=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fcontact&text=rentalcarsnow.cz+contact+page" class="twitter"><i class="fa fa-twitter"></i></a> 

   <a target="_blank" href="https://plus.google.com/share?url=http://rentalcarsnow.cz/site/contact&hl=en" class="google"><i class="fa fa-google"></i></a>  
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










