<?php
use yii\helpers\Url;

$this->title = 'FAQ | rentalcarsnow.cz';

?>

<section class="page-section breadcrumbs text-center">
    <div class="container">


    </div>
</section>
<div class="row">
<div class="col-sm-2">
    <img style="width: 100%" src="<?=Yii::$app->homeUrl;?>img/ad2.gif">

</div>


<div class="col-md-7 content" id="content"><br>
    <h1 style="font-family: impact;font-size: 36px;text-align: center;"><?=Yii::t('main','Frequently asked questions')?></h1>






    <!-- FAQ -->
    <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">
        <!-- faq1 -->
        <!--  <div class="panel panel-default">
             <div class="panel-heading" role="tab" id="heading1">
                 <h4 class="panel-title">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                         <span class="dot"></span> How can ı dorp the rental car?
                     </a>
                 </h4>
             </div>
             <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                 <div class="panel-body">
                     Duis bibendum diam non erat facilaisis tincidunt. Fusce leo neque, lacinia at tempor vitae, porta at arcu. Vestibulum varius non dui at pulvinar. Ut egestas orci in quam sollicitudin aliquet.
                 </div>
             </div>
         </div> -->


        <?php foreach($faq as $faq) : ?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading<?=$faq->id;?>">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$faq->id;?>" aria-expanded="false" aria-controls="collapse<?=$faq->id;?>">
                            <span class="dot"></span> <?=$faq->title;?>
                        </a>
                    </h4>
                </div>
                <div id="collapse<?=$faq->id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$faq->id;?>">
                    <div class="panel-body">
                        <?=$faq->content;?>
                    </div>
                </div>
            </div>

        <?php endforeach;?>

<?php
/*$this->registerJS("

$('.bs-example-modal-lg').modal('show');

");*/?>


    </div>


    <style>
        .modal  {
            /*   display: block;*/
            padding-right: 0px;
            background-color: rgba(4, 4, 4, 0.8);
        }

        .modal-dialog {
            top: 20%;
            width: 100%;
            position: absolute;
        }
        .modal-content {
            border-radius: 0px;
            border: none;
            top: 40%;
        }
        .modal-body {
            background-color: #0f8845;
            color: white;
        }

    </style>


</div>
<div class="col-md-3">
    <br>
    <h2 style="font-family: impact;text-align:center"><?=Yii::t('main','Latest cars')?></h2>

    <?php foreach ($resulta->models as $item): ?>
        <div class="thumbnail no-border no-padding thumbnail-car-card clearfix">
              <div class="media">
                                <a class="media-link" data-toggle="modal" data-target="#modal<?= $item->car_id ?>">
                                    <img class="img-responsive" src="/uploads/<?= $item->photo ? $item->photo->image : 'no-image.png' ?>"/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
            <div class="caption">
                <h4 class="caption-title" style='margin-left:15px'><a href="<?= Url::to(['site/car', 'id' => $item->car_id]) ?>"><?= $item->name ?></a></h4>
                <h5 class="caption-title-sub" style='margin-left:15px'> <b><?= $item->price ?> euro </b> <span style="color:black;"><?=Yii::t('main','per day')?></span></h5>

                <table class="table">
                    <tr>
                        <td><i class="fa fa-car"></i> <?= $item->manufactureyear ?></td>
                        <td><i class="fa fa-dashboard"></i> <?= $item->fueling ? $item->fueling->name : '' ?></td>
                        <td><i class="fa fa-cog"></i> <?= $item->manual == \app\models\Cars::SPEED_ONE ? Yii::t('main', 'Manual') : Yii::t('main', 'Automatic') ?></td>

                        <td class="buttons">
                            <form action="<?= Url::to(['site/car']) ?>" method="get">
                                <input type="hidden" name="id" value="<?= $item->car_id ?>">
                                <input type="hidden" name="beginlocation" value="<?= $searchModel->beginlocation ?>">
                                <input type="hidden" name="endlocation" value="<?= $searchModel->endlocation ?>">
                                <input type="hidden" name="datefrom" value="<?= strtotime($searchModel->datefrom . ' ' . $searchModel->timefrom) ?>">
                                <input type="hidden" name="dateto" value="<?= strtotime($searchModel->dateto . ' ' . $searchModel->timeto) ?>">
                                <button class="btn btn-theme w100"><?=Yii::t('main','Rent It')?></button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>


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
</div>
</div>