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
    <!-- BEGIN JIVOSITE CODE {literal} -->
    <script type='text/javascript'>
    (function(){ var widget_id = 'dT9qiIjnMV';
    var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
    <!-- {/literal} END JIVOSITE CODE -->
</body>
</html>
<?php $this->endPage() ?>
