<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DeviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '设备信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增设备', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
           //
           //
           //  ['label'=>'编号','value'=>'name'],
           //  ['label'=>'设备地址','value'=>'address'],
           //  ['label'=>'状态','value'=>'state'],
           //  ['label'=>'回收价格','value'=>'price'],
            'id',
            'name',
            'address',
            'state',
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
