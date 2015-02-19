<?php
use yii\helpers\Html;
// use yii\bootstrap\Nav;
// use yii\bootstrap\NavBar;
// use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
// use frontend\widgets\Alert;

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
    <link rel="stylesheet" type="text/css" media="screen,projection,tv" href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow&amp;subset=latin,cyrillic-ext">
</head>
<body>
    <?php $this->beginBody() ?>
        <?= $this->render('_header'); ?>

        <div id="wrapper">
            <nav>
            <?= $this->render('_topmenu'); ?>
            </nav>

            <aside>
            <?= $this->render('_sidebar'); ?>
            </aside>

            <main>
            <?= $content ?>
            </main>

        </div><!-- /#wrapper -->

        <footer>
        <?= $this->render('_footer_rus'); ?>
        </footer>
        
    <?php $this->endBody() ?>
    
    <!-- Jivosite  -->
   <!--  <script type='text/javascript'>
    (function(){ var widget_id = '1PQu8ZNnND';
    var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();
    </script> -->
    <!-- /Jivosite -->

    <script type="text/javascript">document.write('<scr' + 'ipt type="text/javascript" charset="utf-8" id="onicon_loader" src="http://cp.onicon.ru/js/simple_loader.js?site_id=505ad0f613fb810d280052f5&' + (new Date).getTime() + '"></scr' + 'ipt>');</script>
    
</body>
</html>
<?php $this->endPage() ?>
