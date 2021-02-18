<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$this->title = 'เข้าสู่ระบบ';
$this->params['breadcrumbs'][] = $this->title;
?>
<a href="" class="btn btn-primary btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#modalLRForm">Launch
    Modal LogIn/Register <i class="far fa-eye ml-1"></i></a>
<!-- Modal: Login / Register Form -->
<div class="site-login" style="height: 80vh">
    <div class="card mb-5" style="margin-top: 100px;">
        <div class="card-header  text-center text-white">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>กรอกข้อมูลเพื่อเข้าสู่ระบบ:</p>
        </div>
        <div class="card-body p-3">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
            <div style="color:#999;margin:1em 0">
                <?= Html::a('ลืมรหัสผ่าน', ['site/request-password-reset']) ?>.
                <br>
                <!--Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>-->
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <?= Html::submitButton('เข้าสู่ระบบ', ['class' => 'btn btn-primary w-100', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>