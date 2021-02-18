<?php

use common\models\SiteInfo;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

?>

<div class="quotation-form pb-2">
    <div class="card">
        <div class="card-header text-white">
            <h2>ข้อมูลการเสนอประเมินราคา</h2>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <?= $form->field($quatation, 'Room_Size')->textarea(['rows' => 6]) ?>
            <?= $form->field($quatation, 'bugget')->textInput(["type" => "number"]) ?>
            <div class="row">
                <?php foreach ($quatation->quotationcontents as $content) : ?>
                    <!-- ถ้ามีรูป -->
                    <?php if (!empty($content->file_path)) : ?>
                        <!-- แสดงรูป -->
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="<?= SiteInfo::backendWeb() . "/$content->file_path" ?>" class="img-fluid rounded">
                                        </div>
                                        <div class="col-12">
                                            <a class="btn btn-danger" href="<?= Url::to(["site/remove-quatation-content?id=$content->id"]) ?>" onclick="return confirm('คุณมั่นใจที่จะลบรูปนี้ออกหรือไม่')">ลบรูปนี้</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div id="image-zone">
                <label>คลิกเพิ่มอัปโหลดรูป</label>
            </div>
            <div class="form-group">
                <?= Html::submitButton('ขอประเมินราคา', ['class' => 'btn btn-success w-100']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<div id="template" class="d-none">
    <div class="form-group" id="temp%i%">
        <img src="#" class="img-fluid rounded d-none" id="img%i%">
        <input type="file" onchange="readURL(this,'img%i%');" class="form-control-file" name="image[%i%]" id="fileImg%i%" placeholder="image[%i%]" aria-describedby="fileHelpId[%i%]">
        <small id="fileHelpId[%i%]" class="form-text text-muted">รูปที่ %i% </small>
        <a id="del-btn%i%" class="btn btn-danger d-none" onclick="$('#temp%i%').remove()"><i class="fas fa-trash"></i> ลบรูปนี้</a>
    </div>
</div>

<script>
    var i = 1;
    addMoreImage();

    function addMoreImage() {
        var imageTag = $("#template").html();
        var imageTag = imageTag.replaceAll("%i%", i);
        $("#image-zone").append(imageTag);
    }

    function readURL(input, tagId) {
        $("#" + tagId).removeClass("d-none");
        $("#" + input.id).attr('class', 'd-none');
        $("#del-btn" + i).removeClass("d-none")
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#' + tagId)
                    .attr('src', e.target.result)
                    .height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }
        i++;
        addMoreImage()
    }
</script>