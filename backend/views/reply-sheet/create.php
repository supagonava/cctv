<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReplySheet */

$this->title = 'Create Reply Sheet';
$this->params['breadcrumbs'][] = ['label' => 'Reply Sheets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reply-sheet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
