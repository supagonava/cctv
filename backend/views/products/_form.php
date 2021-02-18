<?php

use common\models\Categories;
use common\models\SiteInfo;
use common\models\Store;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <!-- dropdownlist -->
    <?= $form->field($model, 'category_id')->dropdownList(yii\helpers\ArrayHelper::map(Categories::find()->all(), "id", "name"), ['class' => 'form-control']) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'store_id')->dropdownList(ArrayHelper::map(Store::find()->all(), 'id', 'name')) ?>
    <div class="row">
        <?php foreach ($model->productscontents as $content) : ?>
            <!-- ถ้ามีรูป -->
            <?php if (!empty($content->file_path)) : ?>
                <!-- แสดงรูป -->
                <div class="col-6">
                    <img src="<?= SiteInfo::web() . "/$content->file_path" ?>" class="img-fluid rounded">
                    <br>ตำแหน่งไฟล์ : <?= SiteInfo::web() . "/$content->file_path" ?>
                </div>

            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <hr>
    <div class="form-group">
        <label for="image">เลือกไฟล์รูปภาพ</label>
        <input type="file" class="form-control-file" name="image" id="image" placeholder="image" aria-describedby="labelFiles">
        <small id="labelFiles" class="form-text text-muted">เพื่ออัปโหลด</small>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>