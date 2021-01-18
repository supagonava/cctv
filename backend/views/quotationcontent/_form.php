<?php

use common\models\Quotation;
use common\models\SiteInfo;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Quotationcontent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quotationcontent-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <!-- ถ้ามีรูป -->
    <?php if (!empty($model->file_path)) : ?>
        <!-- แสดงรูป -->
        <img src="<?= SiteInfo::web() . "/$model->file_path" ?>" class="img-fluid rounded">
        <br>ตำแหน่งไฟล์ : <?= SiteInfo::web() . "/$model->file_path" ?>
    <?php endif; ?>

    <!-- อัปโหลดไฟล์ ->fileInput() -->
    <?= $form->field($model, 'file_path')->fileInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <!-- ทำ dropdown  -->
    <?= $form->field($model, 'q_id')->dropdownList(yii\helpers\ArrayHelper::map(Quotation::find()->all(), "id", "id"), ['class' => 'form-control']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>