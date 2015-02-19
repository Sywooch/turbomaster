<?php
use backend\assets\AdminAsset;
use yii\helpers\Html;
// use yii\bootstrap\Nav;
// use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;


AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:700&subset=latin,cyrillic' rel='stylesheet' type='text/css'></link>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    
    <div id="wrapper">

        <div id="header">
            <div id="logo"></div> 
               
            <div id="user-navigation">
                <ul class="clearfix">
                    <li>В системе: <?= \Yii::$app->user->getIdentity()->username; ?></li>
                    <li><?= HTML::a('выход', array('site/logout')) ?></li>
                </ul>         
            </div>

            <div id="main-navigation">
                <?= $this->render('/layouts/_navbar'); ?>
            </div><!-- /tabs top-navigation -->  

        </div><!-- /header  -->
   
        <div id="content">           
            <?= $content; ?>        
        </div><!-- /content  -->        
    
    </div><!--  /wrapper  -->  

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
