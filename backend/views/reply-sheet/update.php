<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReplySheet */

$this->title = 'Update Reply Sheet: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reply Sheets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reply-sheet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
