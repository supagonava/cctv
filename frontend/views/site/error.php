<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
use yii\helpers\Html;
$this->title = $name;
?>

<div class="site-error" style="margin-top: 100px;">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
    <p>
        พบข้อผิดพลาดขณะดำเนินการ
    </p>
    <p>
        โปรดติดต่อเราเพื่อดำเนินการแก้ไข!
    </p>
</div>