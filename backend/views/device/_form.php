<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Device */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="device-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name',['labelOptions' => ['label' => '设备名']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address',['labelOptions' => ['label' => '设备地址']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state',['labelOptions' => ['label' => '设备状态']])->textInput() ?>

    <?= $form->field($model, 'price',['labelOptions' => ['label' => '回收单价']])->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
