<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RolesUsers */

$this->title = 'Update Roles Users: ' . $model->role_id;
$this->params['breadcrumbs'][] = ['label' => 'Roles Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->role_id, 'url' => ['view', 'role_id' => $model->role_id, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="roles-users-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
