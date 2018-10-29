<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/bootstrap-2.0.3.css" rel="stylesheet">
    <link href="/try/bootstrap/twitter-bootstrap-v2/docs/assets/css/example-fixed-layout.css" rel="stylesheet">
    <link rel="shortcut icon" href="/try/bootstrap/twitter-bootstrap-v2/docs/examples/images/favicon.ico">
    <link rel="apple-touch-icon" href="/try/bootstrap/twitter-bootstrap-v2/docs/examples/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/try/bootstrap/twitter-bootstrap-v2/docs/examples/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/try/bootstrap/twitter-bootstrap-v2/docs/examples/images/apple-touch-icon-114x114.png">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => Yii::t('common','Device'), 'url' => ['/device/index']],
        ['label' => Yii::t('common','Home'), 'url' => ['/site/index']],
        ['label' => Yii::t('common','About'), 'url' => ['/site/about']],

    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('common','Signup'), 'url' => ['/site/signup']];
        $menuItems[] = ['label' =>  Yii::t('common','Login'), 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => Yii::t('common','Wallet'), 'url' => ['/site/contact']];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
