<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'My Yii Application';
?>
<style>
    .site-index {
        vertical-align: middle;
    }
</style>
<div class="site-index">

    <div class="jumbotron">
        <h2>地球真诚的感谢您为环境保护做的每一份贡献！</h2>
        <br>
        <br>
        <h4>请输入您的激活码来激活奖励！</h4>

        <p class="lead"></p>
        <div class="col-lg-10">
            <?php $form = ActiveForm::begin(['id' => 'form-search']); ?>

            <?= $form->field($model, 'username',['labelOptions' => ['label' => '']])->textInput(['autofocus' => true]) ?>

            <?php ActiveForm::end(); ?>
        </div>


        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">确认激活</a></p>
    </div>




</div>