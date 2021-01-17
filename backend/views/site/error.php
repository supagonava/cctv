<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="card">
    <div class="card-header bg-danger">
        อุ๊ปเหมือนเราจะพบข้อผิดพลาด บางอย่าง!

    </div>
    <div class="card-body">
        <p>
            โปรดแจ้งเราเพื่อดำเนินการแก้ไข
            <a href="<?=Url::to(["site/index"])?>">กลับหน้าแรก</a>
        </p>
    </div>

</div>