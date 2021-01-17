<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AddressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'home_no') ?>

    <?= $form->field($model, 'village') ?>

    <?= $form->field($model, 'road') ?>

    <?= $form->field($model, 'zoi') ?>

    <?php // echo $form->field($model, 'district') ?>

    <?php // echo $form->field($model, 'amphures') ?>

    <?php // echo $form->field($model, 'province') ?>

    <?php // echo $form->field($model, 'post_code') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'store_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
