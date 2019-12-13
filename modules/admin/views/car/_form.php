<?php

use app\models\Airbag;
use app\models\FuelType;
use app\models\Location;
use app\models\OfferCategory;
use app\models\Radio;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


?>
<div class="be-content">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="wizard" style="padding: 0 30px 10px 15px">
                <h3>Main informations</h3>
                <div class="wizard-inner">
                    <?= $form->field($model, 'name_cz')->textInput(['placeholder' => 'Name of car'])->label(false) ?>
                    <?= $form->field($model, 'name_ru')->textInput(['placeholder' => 'Name of car in Russian'])->label(false) ?>
                    <?= $form->field($model, 'name_en')->textInput(['placeholder' => 'Name of car in English'])->label(false) ?>
                    <?= $form->field($model, 'description_cz')->textarea(['rows' => 3, 'placeholder' => 'Write description'])->label(false) ?>
                    <?= $form->field($model, 'description_ru')->textarea(['rows' => 3, 'placeholder' => 'Write description in Russian'])->label(false) ?>
                    <?= $form->field($model, 'description_en')->textarea(['rows' => 3, 'placeholder' => 'Write description in English'])->label(false) ?>
                    <?php
                    if (!$model->isNewRecord) {

                        foreach ($model->photos as $photo) {
                            echo '<div style="width:124px;height:100px;display:flex;float:left;position:relative">';
                            echo Html::img('/uploads/' . $photo->image, ['class' => 'img-thumbnail img-responsive']);
                            echo Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-trash']),
                                'javascript:void(0)', ['style' => 'position: absolute;',
                                    'data-id' => $photo->id,
                                    'data-url' => Url::to(['car/remove-image']),
                                    'class' => 'img-remove-ajax']);
                            echo '</div>';
                        }
                    }
                    ?>
                    <?= $form->field($model, 'images[]')->fileInput(['class' => 'dropify', 'multiple' => 'true', 'accept' => 'image/*'])->label(false) ?>
                    <?= $form->field($model, 'location')->dropDownList(ArrayHelper::map(Location::find()->all(), 'id', 'name'))->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="wizard" style="padding: 0 30px 10px 15px">
                <h3>Additional informations</h3>
                <div class="wizard-inner">
                    <?= $form->field($model, 'price_cz')->textInput(['placeholder' => 'Set price kc'])->label(false) ?>
                    <?= $form->field($model, 'price_en')->textInput(['placeholder' => 'Set price euro'])->label(false) ?>
                    <?= $form->field($model, 'manufactureyear')->textInput(['placeholder' => 'Manufacture year of car'])->label(false) ?>
                    <?= $form->field($model, 'airbag')->dropDownList(
                        ArrayHelper::map(Airbag::find()->all(), 'id', 'name'))->label(false) ?>
                    <?= $form->field($model, 'fuel')->dropDownList(
                        ArrayHelper::map(FuelType::find()->all(), 'id', 'name'))->label(false) ?>
                    <?= $form->field($model, 'condin')->dropDownList($model->air)->label(false) ?>
                    <?= $form->field($model, 'radio')->dropDownList(
                        ArrayHelper::map(Radio::find()->all(), 'id', 'name'))->label(false) ?>
                    <?= $form->field($model, 'manual')->dropDownList($model->speedmanagement)->label(false) ?>
                    <?= $form->field($model, 'category')->dropDownList(
                        ArrayHelper::map(OfferCategory::find()->all(), 'id', 'name'))->label(false) ?>
                    <?= $form->field($model, 'rasxod')->textInput(['placeholder' => 'How much fuel does your car pend for 100 km'])->label(false) ?>
                    <?= $form->field($model, 'km')->textInput(['placeholder' => 'How much km does your car driven'])->label(false) ?>
                    <?= $form->field($model, 'status')->dropDownList([
                        '10' => 'Active',
                        '0' => 'Locked',
                        '5' => 'For advertisement'
                    ])->label(false) ?>
                    <?= Html::submitButton('Add car', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

