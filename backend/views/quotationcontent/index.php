<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\QuotationcontentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quotationcontents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotationcontent-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Quotationcontent', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'file_path:ntext',
            'description:ntext',
            'q_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
