<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-signup" >
    <h1><?= Html::encode($this->title) ?></h1>

    <p>请您填写表单来注册您的账号:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username',['labelOptions' => ['label' => '用户名']])->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email',['labelOptions' => ['label' => '邮箱']]) ?>

                <?= $form->field($model, 'password',['labelOptions' => ['label' => '密码']])->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
