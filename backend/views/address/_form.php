<?php

use common\models\Districts;
use common\models\Provinces;
use common\models\Store;
use common\models\Subdistricts;
use common\models\Users;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id')->textInput() ?>
    <?= $form->field($model, 'home_no')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'village')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'road')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'zoi')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'province')->dropDownList(ArrayHelper::map(Provinces::find()->orderBy("name_in_thai")->all(), "name_in_thai", "name_in_thai"), ["onchange" => "getAmphures()"]) ?>
    <?= $form->field($model, 'amphures')->dropDownList(ArrayHelper::map(Districts::find()->join("join", "provinces", "provinces.id = districts.province_id")->where(["provinces.name_in_thai" => $model->province])->orderBy("name_in_thai")->all(), "name_in_thai", "name_in_thai"), ["onchange" => "getSubdistricts()"]) ?>
    <?= $form->field($model, 'district')->dropDownList(ArrayHelper::map(Subdistricts::find()->join("join", "districts", "districts.id = subdistricts.district_id")->where(["districts.name_in_thai" => $model->amphures])->orderBy("name_in_thai")->all(), "name_in_thai", "name_in_thai"), ["onchange" => "getZip()"]) ?>
    <?= $form->field($model, 'post_code') ?>
    <?= $form->field($model, 'user_id')->dropdownList(yii\helpers\ArrayHelper::map(Users::find()->all(), "id", "firstname"), ['class' => 'form-control']) ?>
    <?= $form->field($model, 'store_id')->dropdownList(yii\helpers\ArrayHelper::map(Store::find()->all(), "id", "name"), ['class' => 'form-control']) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<script>
    function getAmphures() {
        var province = $("#address-province").val();
        console.log(province);
        $.ajax({
            type: "get",
            url: "<?= Url::to(["address/get-dropdown-address"]) ?>?type=amphures&tagId=address-amphures&where=province='" + province + "'&name=Adress[amphures]",
            success: function(response) {
                console.log(response);
                $("#address-amphures").html(response);
                getSubdistricts();
            }
        });
    }

    function getSubdistricts() {
        var amphures = $("#address-amphures").val();
        console.log(amphures);
        $.ajax({
            type: "get",
            url: "<?= Url::to(["address/get-dropdown-address"]) ?>?type=subdistricts&tagId=address-district&where=amphures='" + amphures + "'&name=Adress[district]",
            success: function(response) {
                console.log(response);
                $("#address-district").html(response);
                getZip();
            }
        });
    }

    function getZip() {
        var district = $("#address-district").val();
        console.log(district);
        $.ajax({
            type: "get",
            url: "<?= Url::to(["address/get-zipcode"]) ?>?district='" + district + "'",
            success: function(response) {
                console.log(response);
                $("#address-post_code").val(response);
            }
        });
    }
</script>