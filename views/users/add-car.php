<?php

/**
 * Created by PhpStorm.
 * User: Farhodjon
 * Date: 09.06.2018
 * Time: 18:53
 */

use app\models\Airbag;
use app\models\FuelType;
use app\models\OfferCategory;
use app\models\Radio;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $model \app\models\Cars */

$this->title = 'Add new car';
?>
<div class="be-content">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="wizard" style="padding: 0 30px 10px 15px">
                <h3>Main informations</h3>
                <div class="wizard-inner">
                    <?= $form->field($model, 'name_cz')->textInput(['placeholder' => 'Name of car'])->label(false) ?>
                    <?= $form->field($model, 'description_cz')->textarea(['rows' => 3, 'placeholder' => 'Write description'])->label(false) ?>
                    <?= $form->field($model, 'images[]')->fileInput(['class' => 'dropify', 'multiple' => 'true', 'accept' => 'image/*'])->label(false) ?>
                     <?= $form->field($model, 'location')->dropDownList(ArrayHelper::map(app\models\Location::find()->all(), 'id', 'name'))->label(false) ?>
                  
                   
                    <?= $form->field($model, 'price')->textInput(['placeholder' => 'Set price'])->label(false) ?>
                    <?= $form->field($model, 'manufactureyear')->textInput(['placeholder' => 'Manufacture year of car'])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="wizard" style="padding: 0 30px 10px 15px">
                <h3>Additional informations</h3>
                <div class="wizard-inner">
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
                    <?= Html::submitButton('Add car', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<script>
    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 13,
            mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('cars-location');
        var searchBox = new google.maps.places.SearchBox(input);
        // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    title: place.name,
                    position: place.geometry.location
                }));

                document.getElementById('cars-lat').value = place.geometry.viewport.b.b;
                document.getElementById('cars-lng').value = place.geometry.viewport.f.b;

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBs0ucLIQg0bMomHXSHEbgt6QobE9ni8LA&libraries=places&callback=initAutocomplete"
        async defer></script>
