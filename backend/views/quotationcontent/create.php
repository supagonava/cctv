<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Quotationcontent */

$this->title = 'Create Quotationcontent';
$this->params['breadcrumbs'][] = ['label' => 'Quotationcontents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotationcontent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
