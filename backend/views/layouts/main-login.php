<?php

use common\models\SiteInfo;

$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');
$this->registerCssFile('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>เข้าสู่ระบบ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= SiteInfo::web() ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= SiteInfo::web() ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= SiteInfo::web() ?>dist/css/adminlte.min.css">
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>


<body class="hold-transition login-page">
    <?php $this->beginBody() ?>
    <div class="login-box">

        <!-- /.login-logo -->

        <?= $content ?>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= SiteInfo::web() ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= SiteInfo::web() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= SiteInfo::web() ?>dist/js/adminlte.min.js"></script>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>