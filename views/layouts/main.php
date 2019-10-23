<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
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
    <?php $this->registerCsrfMetaTags() ?>
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
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Accueil', 'url' => ['/site/index']],
            // ['label' => 'A propos', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
/*            ['label' => 'Canevas', 'url' => ['/canevas/index']],
            ['label' => 'Exercice', 'url' => ['/exercice/index']],
            ['label' => 'Indicateur', 'url' => ['/indicateur/index']],
            ['label' => 'Rapport', 'url' => ['/rapport/index']],
            ['label' => 'Unite', 'url' => ['/unite/index']],
            ['label' => 'Utilisateur', 'url' => ['/utilisateur/index']],*/
            Yii::$app->user->isGuest ? (
                ['label' => 'A propos', 'url' => ['/site/about']]
            ) : (
                // if admin
                '<li><a href="'.Url::to(['canevas/index']).'">Canevas</a></li>'.
                '<li><a href="'.Url::to(['exercice/index']).'">Exercice</a></li>'.
                '<li><a href="'.Url::to(['indicateur/index']).'">Indicateur</a></li>'.
                '<li><a href="'.Url::to(['rapport/index']).'">Rapport</a></li>'.
                '<li><a href="'.Url::to(['unite/index']).'">Unite</a></li>'.
                '<li><a href="'.Url::to(['utilisateur/index']).'">Utilisateur</a></li>'.
                // TODO: create other links
                // if not admin
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Déconnexion (' . Yii::$app->user->identity->username . ')',
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

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
