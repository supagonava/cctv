<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RolesUsers */

$this->title = 'Create Roles Users';
$this->params['breadcrumbs'][] = ['label' => 'Roles Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roles-users-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>