<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '登录';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>请填写您的用户名和密码:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username',['labelOptions' => ['label' => '用户名']])->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password',['labelOptions' => ['label' => '密码']])->passwordInput() ?>

                <?= $form->field($model, 'rememberMe',['labelOptions' => ['label' => '记住我']])->checkbox() ?>

<!--                <div style="color:#999;margin:1em 0">-->
<!--                    忘记密码？--><?//= Html::a('重置', ['site/request-password-reset']) ?><!--.-->
<!--                </div>-->

                <div class="form-group">
                    <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
