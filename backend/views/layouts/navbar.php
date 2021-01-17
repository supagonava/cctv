<?php

use yii\helpers\Html;

?>
<nav class="main-header navbar navbar-expand navbar-dark bg-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <?= Html::a('<i class="fas fa-sign-out-alt"></i>', ['site/logout'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle">
                <span class="d-none d-md-inline"><?= !Yii::$app->user->isGuest ? Yii::$app->user->identity->username : null ?></span>
            </a>
        </li>
    </ul>
</nav>