<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="/img/logo.png" style="display:inline; vertical-align: top; height:32px;">',
        'brandUrl' => Yii::$app->urlManager->createUrl(['site/index']), //ссылался на Yii::$app->homeUrl, но homeUrl проходит процесс генерации в функциях, не знаю можно ли там что-то менять, поэтому просто заменил его.
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
            ['label' => 'Играть', 'url' => Yii::$app->urlManager->createUrl(['site/index'])],
            ['label' => 'Отзывы', 'url' => Yii::$app->urlManager->createUrl(['site/feedback'])],
            ['label' => 'Купить полную версию', 'url' => Yii::$app->urlManager->createUrl(['site/buyfull'])],
            Yii::$app->user->isGuest ? (
                ['label' => 'Войти', 'url' => ['/site/login']]
            ) : (
                    '<li>'
                    . Html::tag('p', Html::encode("Добро пожаловать, " ))
                    .'</li>'

                    . '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                            Yii::$app->user->identity->username,
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
            )
        ],
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
<div class="line">
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">Cайт создан в 2018 году.</p>

        <p class="pull-right">Copyright © (наименование) <?= date('Y') ?>  Все права защищены</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
