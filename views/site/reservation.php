<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Cars;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

?>


    <div class="container">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                    <p>
                        <small>Shipper</small>
                    </p>
                </div>
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>
                        <small>Destination</small>
                    </p>
                </div>
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p>
                        <small>Schedule</small>
                    </p>
                </div>
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                    <p>
                        <small>Cargo</small>
                    </p>
                </div>
            </div>
        </div>

        <form role="form">
            <div class="panel panel-primary setup-content" id="step-1" style="margin:0 70px 0 70px">
                <div class="panel-heading">
                    <h3 class="panel-title">Shipper</h3>
                </div>
                <div class="panel-body">


                    <?php
                    $AEurl = Url::to(["events/add-event"]);
                    $UEurl = Url::to(["events/update-event"]);
                    $AddEvent = Yii::t('dash', 'Add Event');
                    $JSEvent = <<<EOF
function(start, end, allDay) {
    var start = moment(start).unix();
    var end = moment(end).unix();
    $.ajax({
       url: "{$AEurl}",
       data: { start_date : start, end_date : end },
       type: "GET",
       success: function(data) {
           $(".modal-body").addClass("row");
           $(".modal-header").html('<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>{$AddEvent}</h3>');
           $('.modal-body').html(data);
           $('#eventModal').modal();
       }
    });
        }
EOF;
                    $updateEvent = Yii::t('dash', 'Update Event');
                    $JSEventClick = <<<EOF
function(calEvent, jsEvent, view) {
    var eventId = calEvent.id;
    $.ajax({
       url: "{$UEurl}",
       data: { event_id : eventId },
       type: "GET",
       success: function(data) {
           $(".modal-body").addClass("row");
           $(".modal-header").html('<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3> {$updateEvent} </h3>');
           $('.modal-body').html(data);
           $('#eventModal').modal();
       }
    });
    $(this).css('border-color', 'red');
}
EOF;
                    $eDetail = Yii::t('app', 'Event Detail');
                    $eType = Yii::t('app', 'Event Type');
                    $eStart = Yii::t('app', 'Start Time');
                    $eEnd = Yii::t('app', 'End Time');
                    $JsF = <<<EOF
        function (event, element) {
            var start_time = moment(event.start).format("05-07-2018, 17:00:00 a");
                var end_time = moment(event.end).format("09-07-2018, 17:00:00 a");

            element.popover({
                     
                    placement: 'top',
                    html: true,
                global_close: true,
                container: 'body',
                
               
                });
               }
EOF;
                    ?>

                    <?php try {
                        echo \yii2fullcalendar\yii2fullcalendar::widget([
                            'options' => ['language' => 'en'],
                            'clientOptions' => [
                                'fixedWeekCount' => false,
                                'weekNumbers' => true,
                                'editable' => true,
                                'selectable' => true,
                                'eventLimit' => true,
                                'eventLimitText' => 'more Events',
                                'selectHelper' => true,
                                'header' => [
                                    'left' => 'today prev,next',
                                    'center' => 'title',
                                    'right' => 'month,agendaWeek,agendaDay'
                                ],
                                'select' => new \yii\web\JsExpression($JSEvent),
                                'eventClick' => new \yii\web\JsExpression($JSEventClick),
                                'eventRender' => new \yii\web\JsExpression($JsF),
                                'aspectRatio' => 2,
                                'timeFormat' => false
                            ],
                            'ajaxEvents' => Url::toRoute(['events/view-events'])
                        ]);
                    } catch (Exception $e) {
                    } ?>


                    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                </div>
            </div>

            <div class="panel panel-primary setup-content" id="step-2">
                <div class="panel-heading">
                    <h3 class="block-title alt"><i class="fa fa-angle-down"></i>Extras & Frees</h3>

                    <h3 class="panel-title">Destination</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">Company Name</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Company Address</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"/>
                    </div>
                    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                </div>
            </div>

            <div class="panel panel-primary setup-content" id="step-3">
                <div class="panel-heading">
                    <h3 class="panel-title">Schedule</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">Company Name</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Company Address</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"/>
                    </div>
                    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                </div>
            </div>

            <div class="panel panel-primary setup-content" id="step-4">
                <div class="panel-heading">
                    <h3 class="panel-title">Cargo</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">Company Name</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Company Address</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"/>
                    </div>
                    <button class="btn btn-success pull-right" type="submit">Finish!</button>
                </div>
            </div>
        </form>
    </div>

<?php
yii\bootstrap\Modal::begin([
    'id' => 'eventModal',
    //'header' => "<div class='row'><div class='col-xs-6'><h3>Add Event</h3></div><div class='col-xs-6'>".Html::a('Delete', ['#'], ['class' => 'btn btn-danger pull-right', 'style' => 'margin-top:5px'])."</div></div>",
    'header' => "<h3>" . Yii::t('dash', 'Add Event') . "</h3>",
]);

yii\bootstrap\Modal::end();
?>