<?php

use common\models\LoginForm;
use frontend\models\SignupForm;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url; ?>
<!-- Modal: Login & Register tabs -->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!-- Content -->
    <div class="modal-dialog cascading-modal" role="document">
        <div class="modal-content">
            <!-- Modal cascading tabs -->
            <div class="modal-c-tabs">
                <!-- Nav tabs -->
                <ul class="nav md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab"><i class="fas fa-user mr-1"></i>
                            Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel2" role="tab"><i class="fas fa-user-plus mr-1"></i>
                            Register</a>
                    </li>
                </ul>
                <!-- Tab panels -->
                <div class="tab-content">
                    <!-- Panel 1 -->
                    <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
                        <?php
                        $model = new LoginForm(); ?>
                        <?php $form = ActiveForm::begin(['id' => 'login-form', 'action' => Url::to(["site/login"])]); ?>
                        <!-- Body -->
                        <div class="modal-body mb-1">
                            <div class="md-form form-sm">
                                <i class="fas fa-user prefix"></i>
                                <input name="LoginForm[username]" type="text" id="form22" class="form-control form-control-sm">
                                <label for="form22">username</label>
                            </div>
                            <div class="md-form form-sm">
                                <i class="fas fa-lock prefix"></i>
                                <input name="LoginForm[password]" type="password" id="form23" class="form-control form-control-sm">
                                <label for="form23">Your password</label>
                            </div>
                            <?= $form->field($model, 'rememberMe')->checkbox() ?>
                        </div>
                        <!-- Footer -->
                        <div class="modal-footer display-footer">
                            <div class="form-group col-6">
                                <?= Html::submitButton('เข้าสู่ระบบ', ['class' => 'btn btn-primary w-100', 'name' => 'login-button']) ?>
                            </div>
                            <?= Html::a('ลืมรหัสผ่าน', ['site/request-password-reset']) ?>.
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                    <!-- Panel 1 -->
                    <!--Panel 2-->
                    <div class="tab-pane fade" id="panel2" role="tabpanel">
                        <?php $model = new SignupForm(); ?>
                        <?php $form = ActiveForm::begin(['id' => 'signup-form', 'action' => Url::to(["site/signup"]), "method" => "post"]); ?>
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
                                <div class="col-9">
                                    <?= $form->field($model, 'dob')->textInput(["type" => "date", "required" => true]) ?>
                                </div>
                                <div class="col-6">
                                    <?= $form->field($model, 'phone')->textInput(['maxlength' => true, "required" => true]) ?>
                                </div>
                                <div class="col-6">
                                    <?= $form->field($model, 'email')->textInput(['maxlength' => true, "required" => true]) ?>
                                </div>
                                <div class="col-6">
                                    <?= $form->field($model, 'lineId')->textInput(['maxlength' => true, "required" => true]) ?>
                                </div>
                                <div class="col-6">
                                    <?= $form->field($model, 'facebook')->textInput(['maxlength' => true, "required" => true]) ?>
                                </div>
                            </div>
                        </div>
                        <!-- Footer -->
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-md-8">
                                    <?= Html::submitButton('สมัครสมาชิก', ['class' => 'btn btn-success w-100 round']) ?>
                                </div>
                                <div class="col-md-3 mr-3">
                                    <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">ปิด</button>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                    <!-- Panel 2 -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
</div>
<!-- Modal: Login & Register tabs -->