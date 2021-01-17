<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StoreSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="store-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'facebook') ?>

    <?= $form->field($model, 'www') ?>

    <?= $form->field($model, 'line_id') ?>

    <?php // echo $form->field($model, 'longtitude') ?>

    <?php // echo $form->field($model, 'Latitude') ?>

    <?php // echo $form->field($model, 'map_url') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
