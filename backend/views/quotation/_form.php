<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
?>

<div class="quotation-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'Room_Size')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'bugget')->textInput() ?>
    <?= $form->field($model, "status")->radioList(["อนุมัติใบเสนอราคา" => "อนุมัติใบเสนอราคา", "ปฏิเสธใบเสนอราคา" => "ปฏิเสธใบเสนอราคา", "รอการอนุมัติ" => "รอการอนุมัติ"]) ?>
    <!-- <?= $form->field($model, 'user_id')->textInput() ?> -->
    <!-- <?= $form->field($model, 'create_at')->textInput() ?> -->
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>