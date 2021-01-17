<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ReplySheet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reply-sheet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'real_price')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'store_id')->textInput() ?>

    <?= $form->field($model, 'q_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
