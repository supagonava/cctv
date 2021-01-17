<?php

use common\models\SiteInfo;
use yii\helpers\Url;

$menus = [
    'items' => [
        ['label' => 'หนัาหลัก', 'icon' => 'home', 'url' => ['site/index']],
        ['label' => 'จัดการผู้ใช้งาน', 'icon' => 'users', 'url' => ['users/index']],
        ['label' => 'สินค้า', 'icon' => 'fa fa-shopping-cart', 'url' => ['orders/index']],
        ['label' => 'ร้านค้า', 'icon' => 'fa fa-shopping-basket', 'url' => ['store/index']], 
        ['label' => 'คำอ้างอิง', 'icon' => 'fa fa-stop-circle', 'url' => ['quotation/index']], 
        ['label' => 'ผลิตภัณฑ์', 'icon' => 'fa fa-id-badge', 'url' => ['products/index']], 
        ['label' => 'เนื้อหาใบเสนอราคา', 'icon' => 'fa fa-folder', 'url' => ['quotationcontent/index']], 
        ['label' => 'ที่อยู่', 'icon' => 'fa fa-location-arrow', 'url' => ['address/index']], 
        ['label' => 'แผ่นตอบรับ', 'icon' => 'fa fa-barcode', 'url' => ['ReplySheet/index']],
        ['label' => 'เนื้อหาผลิตภัณฑ์', 'icon' => 'fa fa-file-text', 'url' => ['productscontent/index']],  

        [
            'label' => 'หมวดหมู่สินค้า', 'icon' => 'fa fa-bars',
            'items' => [
                ['label' => '1', 'icon' => 'dot-circle', 'url' => ['Categories/index']],
                ['label' => '2', 'icon' => 'dot-circle', 'url' => ['Categories/index']],
                ['label' => '3', 'icon' => 'dot-circle', 'url' => ['Categories/index']],
                ['label' => '4', 'icon' => 'dot-circle', 'url' => ['Categories/index']],
            ],  
        ['label' => 'generator', 'icon' => 'gavel', 'url' => 'gii'],
        ],
    ],
];
?>
<aside class="main-sidebar sidebar-light-primary elevation-2">
    <div class="text-center bg-primary">
        <a href="<?= \yii\helpers\Url::home() ?>" class="brand-link">
            <div class="image">
                <img src="<?= SiteInfo::web() ?>dist/img/AdminLTELogo.png" class="img-circle elevation-2" style="width: 50px" alt="User Image">
            </div>
            <span class="brand-text">ระบบจัดการหลังบ้าน</span>
        </a>
    </div>
    <?php if (!Yii::$app->user->isGuest) : ?>
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?= SiteInfo::web() ?>dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
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