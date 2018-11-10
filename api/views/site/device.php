<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = '设备';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>请添加设备信息</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-device']); ?>

            <?= $form->field($model, 'name',['labelOptions' => ['label' => '设备名']])->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'address',['labelOptions' => ['label' => '地址']]) ?>

            <?= $form->field($model, 'price',['labelOptions' => ['label' => '价格']]) ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
</div>
</div>