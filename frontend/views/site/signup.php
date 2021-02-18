<?php

use frontend\models\SignupForm;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'สมัครสมาชิก';
?>
<?php $model = new SignupForm(); ?>
<?php $form = ActiveForm::begin(['id' => 'signup-form', 'action' => Url::to(["site/signup"])]); ?>
<!-- Body -->
<div class="modal-body">
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true, "required" => true, "minlength" => 8]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'password')->textInput(['maxlength' => true, "required" => true, "type" => "password", "minlength" => 8]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'firstname')->textInput(['maxlength' => true, "required" => true]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'lastname')->textInput(['maxlength' => true, "required" => true]) ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'sex')->dropdownList(['ชาย' => 'ชาย', 'หญิง' => 'หญิง']) ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'dob')->textInput(["type" => "date", "required" => true]) ?>
        </div>
        <div class="col-6">
        </div>
        <div class="col-3">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true, "required" => true]) ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true, "required" => true]) ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'lineId')->textInput(['maxlength' => true, "required" => true]) ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'facebook')->textInput(['maxlength' => true, "required" => true]) ?>
        </div>
    </div>
</div>
<!-- Footer -->
<div class="modal-footer">
    <div class="form-group">
        <?= Html::submitButton('สมัครสมาชิก', ['class' => 'btn btn-success w-100 round']) ?>
    </div>
    <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
</div>
<?php ActiveForm::end(); ?>