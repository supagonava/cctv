<?php

use common\models\LoginForm;
use common\models\SiteInfo;
use frontend\models\SignupForm;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CCTV</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="<?= SiteInfo::web() ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= SiteInfo::web() ?>css/mdb.min.css" rel="stylesheet">
    <style>
        .card-ecommerce {
            cursor: pointer;
        }
    </style>

</head>

<body class="homepage-v1 hidden-sn white-skin animated">
    <script type="text/javascript" src="<?= SiteInfo::web() ?>js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="<?= SiteInfo::web() ?>js/popper.min.js"></script>
    <script type="text/javascript" src="<?= SiteInfo::web() ?>js/bootstrap.min.js">
    </script>
    <script type="text/javascript" src="<?= SiteInfo::web() ?>js/mdb.min.js"></script>
    <script type="text/javascript">
        new WOW().init();
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $(document).ready(function() {
            $('.mdb-select').material_select();
        });
        $(".button-collapse").sideNav();
    </script>

    <header>
        <?= $this->render("navbar") ?>
    </header>

    <div class="container" style="margin-top:100px">
        <?php if (Yii::$app->session->getFlash("success")) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><?= Yii::$app->session->getFlash("success") ?></strong>
            </div>
        <?php elseif (Yii::$app->session->getFlash("error")) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><?= Yii::$app->session->getFlash("error") ?></strong>
            </div>
        <?php endif; ?>

        <?= $content ?>
    </div>

    <?= $this->render("footer") ?>

</body>
<?php include("modal.php"); ?>

</html>