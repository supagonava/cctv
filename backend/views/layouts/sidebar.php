<?php

use common\models\SiteInfo;
use yii\helpers\Url;

$menus = [
    'items' => [
        ['label' => 'หนัาหลัก', 'icon' => 'home', 'url' => ['site/index']],
        ['label' => 'องคมนตรี', 'icon' => 'user-circle', 'url' => ['privy-council/index']],
        [
            'label' => 'โรงเรียน', 'icon' => 'school',
            'items' => [
                ['label' => 'ในโครงการ', 'icon' => 'dot-circle', 'url' => ['school/index']],
                ['label' => 'เครือข่าย', 'icon' => 'dot-circle', 'url' => ['school/index-network']],
                ['label' => 'นอกโครงการ', 'icon' => 'dot-circle', 'url' => ['school/index-not-main']],
            ]
        ],
        [
            'label' => 'นักเรียนทุนพระราชทาน', 'icon' => 'graduation-cap',
            'items' => [
                ['label' => 'ทั้งหมด', 'icon' => 'dot-circle', 'url' => ['students/index']],
                ['label' => 'ในโรงเรียนโครงการ', 'icon' => 'dot-circle', 'url' => ['students/in-main']],
                ['label' => 'ในโรงเรียนเครือข่าย', 'icon' => 'dot-circle', 'url' => ['students/in-network']],
                ['label' => 'นอกโรงเรียนโครงการ', 'icon' => 'dot-circle', 'url' => ['students/in-not-main']],
                ['label' => 'พ้นสภาพ', 'icon' => 'dot-circle', 'url' => ['students/feeing']],
            ]
        ],
        [
            'label' => 'งบประมาณ', 'icon' => 'project-diagram',
            'items' => [
                ['label' => 'ทั้งหมด', 'icon' => 'dot-circle', 'url' => ['school-projects/index']],
                ['label' => 'งบโครงการกองทุนการศึกษา', 'icon' => 'dot-circle', 'url' => ['school-projects/index1']],
                ['label' => 'งบมูลนิธิ ซี.ซี.เอฟ', 'icon' => 'dot-circle', 'url' => ['school-projects/index2']],
                ['label' => 'งบอาชีวพัฒนา (สอศ.)', 'icon' => 'dot-circle', 'url' => ['school-projects/index3']],
                ['label' => 'งบ กอ.รมน.', 'icon' => 'dot-circle', 'url' => ['school-projects/index4']],
                ['label' => 'งบจากหน่วยงานอื่น ๆ', 'icon' => 'dot-circle', 'url' => ['school-projects/index5']],
            ]
        ],
        [
            'label' => 'ครูอัตราจ้าง', 'icon' =>  'graduation-cap',
            'items' => [
                ['label' => 'บัณฑิตครูคืนถิ่น', 'icon' => 'dot-circle', 'url' => ['local-teacher/index']],
                ['label' => 'ครูอัตราจ้าง(กรณีพิเศษ)', 'icon' => 'dot-circle', 'url' => ['local-teacher/index-special']],
            ]
        ],
        [
            'label' => 'อาสาสมัคร', 'icon' =>  'hospital',
            'items' => [
                ['label' => 'ไม่มีความเกี่ยวข้องกับองคมนตรี', 'icon' => 'dot-circle', 'url' => ['volunteer/index-not-under']],
                ['label' => 'ประจำองคมนตรี', 'icon' => 'dot-circle', 'url' => ['volunteer/index-privy']],
                ['label' => 'ประจำจังหวัด', 'icon' => 'dot-circle', 'url' => ['volunteer/index-province']],
            ]
        ],
        // ['label' => 'ผู้ใช้งานระบบ', 'icon' => 'lock', 'url' => ['user/index']],
    ],
];
?>
<aside class="main-sidebar sidebar-light-warning elevation-2">
    <div class="text-center bg-warning">
        <a href="<?= \yii\helpers\Url::home() ?>" class="brand-link">
            <div class="image">
                <img src="<?= SiteInfo::web() ?>dist/img/scholarship.png" class="img-circle elevation-2" style="width: 50px" alt="User Image">
            </div>
            <span class="brand-text">KingEduFund</span>
        </a>
    </div>
    <?php if (!Yii::$app->user->isGuest) : ?>
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?= SiteInfo::web() ?>dist/img/scholarship.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= !Yii::$app->user->isGuest ? Yii::$app->user->identity->username : null ?></a>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">
                        เมนู
                    </li>
                    <?php foreach ($menus['items'] as $menu) : ?>
                        <?php if (!empty($menu['items'])) : ?>
                            <?php $isInSub = false; ?>
                            <?php foreach ($menu['items'] as $subMenu) :
                                if (Yii::$app->request->url == Url::to($subMenu['url'])) {
                                    $isInSub = true;
                                    break;
                                }
                            endforeach; ?>
                            <li class="nav-item has-treeview <?= $isInSub ? 'menu-is-opening menu-open' : '' ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-<?= $menu['icon'] ?? 'tachometer-alt' ?>"></i>
                                    <p>
                                        <?= $menu['label'] ?>
                                        <i class="right fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <?php foreach ($menu['items'] as $subMenu) : ?>
                                    <ul class="nav nav-treeview" style="display: none;">
                                        <li class="nav-item">
                                            <a href="<?= Url::to($subMenu['url']) ?? ['site/index'] ?>" class="nav-link <?= Yii::$app->request->url == Url::to($subMenu['url']) ? 'active' : '' ?>">
                                                &nbsp;<i class="fa fa-<?= $subMenu['icon'] ?? 'home' ?> nav-icon"></i>
                                                <p><?= $subMenu['label'] ?></p>
                                            </a>
                                        </li>
                                    </ul>
                                <?php endforeach; ?>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a href="<?= Url::to($menu['url'] ?? ["site/index"]) ?>" class="nav-link <?= Yii::$app->request->url == Url::to($menu['url']) ? 'active' : '' ?>">
                                    <i class="nav-icon fa fa-<?= $menu['icon'] ?? 'home' ?>"></i>
                                    <p>
                                        <?= $menu['label'] ?>
                                    </p>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    <?php endif; ?>

</aside>