<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Progress;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DeviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '设备搜索';
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="device-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <hr>

    <div class="device-search">

        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>

        <?= $form->field($searchModel, 'address',['options'=>['class'=>'col-lg-5'],'labelOptions' => ['label' => '请输入地址关键字进行搜索']])->textInput(['autofocus' => true]); ?>


        <br>

            <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>




    <table class="table table-bordered">
        <thead>
        <tr>
            <th>编号</th>
            <th>地址</th>
            <th>回收价格</th>
            <th>剩余容量</th>

        </tr>
        </thead>
        <tbody>

        <?php
        $tabledata = $dataProvider->models;
        // var_dump($dataProvider);die;
        foreach ($tabledata as $valaue): ?>
            <tr>
                <td><?= $valaue->name ?></td>
                <td><?= $valaue->address ?> </td>
                <td><?= $valaue->price/10;
                    $state = 100 - $valaue->state;
                    $label = $state . '%'; ?>元/斤</td>
                <td><?= Progress::widget(['percent' => $state, 'label' => $label, 'class' => '']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?= LinkPager::widget([
        'pagination' => $dataProvider->pagination,
        'nextPageLabel' => '下一页',
        'prevPageLabel' => '上一页',
    ]); ?>


</div>

