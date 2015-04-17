<?php
use yii\helpers\Html;
// use yii\bootstrap\Nav;
// use yii\bootstrap\NavBar;
// use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">   
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" media="screen,projection,tv" href="http://fonts.googleapis.com/css?family=Open+Sans&amp;subset=latin,cyrillic-ext">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
</head>
<body>
    <?php $this->beginBody() ?>
        <?= $this->render('_header'); ?>
        <?= $this->render('_topmenu'); ?>
        <?= $content ?>
        <?= $this->render('_footer'); ?>
        <?= $this->render('_counts'); ?>
    <?php $this->endBody() ?>

<script type="text/javascript">document.write('<script type="text/javascript" charset="utf-8" async="true" id="onicon_loader" src="http://cp.onicon.ru/js/simple_loader.js?site_id=5530b5442866886c5f8b4571&srv=1&' + (new Date).getTime() + '"></scr' + 'ipt>');</script>
</body>
</html>
<?php $this->endPage() ?>
