<?php

$this->title = 'Why us | rentalcarsnow.cz';

?>
<style>
    li
    {
        font-family: Trebuchet MS;
        font-size: 16px;
        list-style-type: circle;
        padding-bottom: 9px;

    }
</style>

<div class="icon-bar">
  <a target="_blank" href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fabout" class="facebook"><i class="fa fa-facebook"></i></a> 
  <a target="_blank" href="https://twitter.com/intent/tweet?url=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fabout&text=All%20our%20pre-owned%20certified%20vehicles%20come%20any%20remaining%20manufacturer%20warranties%20including%20the%20remainder%20of%20a%205-year%2F60%2C000%20mile%20Powertrain%20Limited%20Warranty%20and%20Bumper-to-Bumper%20Limited%20Warranty.&original_referer=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fabout" class="twitter"><i class="fa fa-twitter"></i></a> 


   <a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en&url=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fabout" class="google"><i class="fa fa-google"></i></a>  
  <!-- <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a> -->
  <!-- <a href="#" class="youtube"><i class="fa fa-youtube"></i></a>  -->
</div>


<section class="page-section breadcrumbs text-center">
            <div style="text-align: left;" class="container">
                <br>
               <h2><?=Yii::t('main','Why us?')?></h2>
           
           <ul>
<?=Yii::t('main','<li>All our pre-owned certified vehicles come any remaining manufacturer warranties including the remainder of a 5-year/60,000 mile Powertrain Limited Warranty and Bumper-to-Bumper Limited Warranty.</li>
<li>We have a minimum 12 month or 12,000 miles powertrain component warranty for every vehicle.</li>
<li>We offer the option to purchase extended warranties that are tailored to fit your unique driving preferences and habits.</li>
<li>In the rare event of a breakdown: We provide Rental Car Coverage up to $35 per day for a maximum of ten (10) days for rental car expenses incurred due to a covered mechanical breakdown or manufacturer\'s warranty repair. We will give you up to $75 for towing charges per covered mechanical breakdown. If your car breaks down more than 100 miles from home, you\'ll be reimbursed up to $100 per day for a maximum of $500 per occurrence for food and lodging per covered mechanical breakdown. In addition, we provide 24-hour Roadside Assistance for one year from the date of purchase. We\'ll cover you for up to $50 for emergency services, such as a flat tire, running out of gas, lockouts and jump-starts.</li>')?> 
                 
            </div>
        </section>
        <!-- /BREADCRUMBS -->

        <!-- PAGE -->
        <section class="page-section">
            <div class="container">

                <div class="col-md-6 content_left">
                <img src="<?=Yii::$app->homeUrl;?>img/renting.jpg" alt="" class="img-responsive">
            </div>
            <div class="col-md-6 content_right">
                <h2><?=Yii::t('main','Choose us because')?>:</h2>
               <ul>
<?=Yii::t('main','<li>We love our cars and take good care of them—from regular washes to factory-recommended preventative maintenance.</li>
<li>Our pre-owned cars are strictly maintained to manufacturers\' standards.</li>
<li>We can provide complete maintenance records for our vehicles.</li>
<li>Our vehicles have passed a rigorous multi-point inspection process completed by certified mechanics, including ASE-Certified and ASE Master Technicians.</li>
<li>We won’t sell a vehicle with an open recall or safety campaign.</li>
<li>You won’t find a car in our inventory that has been in an accident, and we will provide you with an AutoCheck ® verification report, which is backed by Experian.</li>')?>
</ul>
            </div>
                </div>

                                                  


            </div>

             <?php \ymaker\social\share\widgets\SocialShare::widget([
    'configurator'  => 'socialShareBlog', // Social share component ID
    'url'           => \yii\helpers\Url::to('site/about', true),
    'title'         => 'About us',
    'description'   => 'All our pre-owned certified vehicles come any remaining manufacturer warranties including the remainder of a 5-year/60,000 mile Powertrain Limited Warranty and Bumper-to-Bumper Limited Warranty.',
    'imageUrl'      => Yii::$app->homeUrl.'img/renting.jpg',
]); ?>



<!-- <center>
<div class="test">
                    <ul class="social-network social-circle">
                        <li><a target="_blank" href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fabout" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="https://twitter.com/intent/tweet?text=test%20uchun&url=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fabout&original_referer=http%3A%2F%2Frentalcarsnow.cz%2Fsite%2Fabout" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a target="_blank" href="https://plus.google.com/share?url=http://rentalcarsnow.cz/site/about&hl=en" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                    </ul>               
                 
</div>
</center> -->
</section>
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

.content {
  margin-left: 75px;
  font-size: 30px;
}


/*=========================
  Icons
 ================= */

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