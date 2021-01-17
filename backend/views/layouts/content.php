<div class="content-wrapper bg-pattern">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <?php if (Yii::$app->session->hasFlash('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>บันทึกสำเร็จ</strong>
            </div>
        <?php endif; ?>

        <?php if (Yii::$app->session->hasFlash('errors')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>บันทึกล้มเหลว</strong>
            </div>
        <?php endif; ?>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <?= $content ?>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>