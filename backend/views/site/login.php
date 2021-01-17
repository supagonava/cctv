<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
?>
<div class="login-logo">
    <a href="<?= Yii::$app->homeUrl ?>"><b>ระบบจัดการหลังบ้าน</a>
</div>
<div class="login-box center-block m-auto">
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">เข้าสู่ระบบ</p>

            <?php $form = ActiveForm::begin(['id' => 'login-form']) ?>

            <?= $form->field($model, 'username', [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>',
                'template' => '{beginWrapper}{input}{error}{endWrapper}',
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

            <?= $form->field($model, 'password', [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>',
                'template' => '{beginWrapper}{input}{error}{endWrapper}',
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    </div>
                </div>
                <div class="col-4">
                    <?= Html::submitButton('เข้าสู่ระบบ', ['class' => 'btn btn-primary btn-block']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

            <!-- /.social-auth-links -->
        </div>
        <!-- /.login-card-body -->
    </div>
</div>