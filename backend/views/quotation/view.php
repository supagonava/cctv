<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Quotation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quotations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="quotation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'firstname',
            'lastname',
            'phone',
            'facebook:ntext',
            'email:email',
            'line_id',
            'Room_Size:ntext',
            'bugget',
            'user_id',
            'create_at',
        ],
    ]) ?>
    
    <div class="row">
        <?php foreach ($model->quotationcontents as $item) : ?>
            <!-- ถ้ามีรูป -->
            <?php if (!empty($item->file_path)) : ?>
                <div class="col-6">
                    <!-- แสดงรูป -->
                    <img style="height: 300px;object-fit:cover" src="<?= \common\models\SiteInfo::web() . "/$item->file_path" ?>" class="img-fluid rounded">
                    <br>ตำแหน่งไฟล์ : <?= \common\models\SiteInfo::web() . "/$item->file_path" ?>
                    <br>รายละเอียด : <?= $item->description ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>