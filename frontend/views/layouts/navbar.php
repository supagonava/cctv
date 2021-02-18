<?php

use yii\helpers\Url; ?>
<nav class="navbar fixed-top navbar-expand-lg  navbar-light scrolling-navbar white">

    <div class="container">
        <div class="float-left mr-2">
        </div>
        <a class="navbar-brand font-weight-bold" href="<?= Url::to(["site/index"]) ?>">
            <strong>ระบบสารสนเทศเพื่อการจัดการประเมินราคาติดตั้งกล้องวงจรปิด</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <?php
            if (Yii::$app->user->identity) : ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ml-6">
                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" href="<?= Url::to(["site/quatation-list"]) ?>">
                            <i class="fas fa-search text-primary fa-lg"></i> ใบเสนอราคาของฉัน</a>
                    </li>
                    <li class="nav-item ml-6">
                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" href="<?= Url::to(["site/quatation-list"]) ?>">
                            <i class="fa fa-shopping-cart text-primary fa-lg"></i>รถเข็นของฉัน</a>
                    </li>
                    <li class="nav-item dropdown ml-3">
                        <a class="nav-link dropdown-toggle waves-effect waves-light dark-grey-text font-weight-bold" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user blue-text fa-lg "></i> <?= Yii::$app->user->identity->username ?> </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                            <a class="dropdown-item waves-effect waves-light" href="#">ข้อมูลของฉัน</a>
                            <a class="dropdown-item waves-effect waves-light" href="<?= Url::to(["site/logout"]) ?>">ออกจากระบบ</a>
                        </div>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" data-toggle="modal" data-target="#modalLRForm">
                            <i class="fas fa-user blue-text "></i> เข้าสู่ระบบ/สมัครสมาชิก
                        </a>
                    </li>
                <?php endif; ?>
                </ul>

        </div>

    </div>

</nav>