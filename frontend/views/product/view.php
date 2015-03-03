<?php

use yii\helpers\Html;
use yii\helpers\CommonHelper;
use frontend\assets\AppAsset;
use yii\widgets\Breadcrumbs;
use common\models\Product;

$this->registerCssFile('css/print.css', ['depends' => [AppAsset::className()], 'media' => 'print']);

$this->title = $product['name'] .', код ' .$product['partnumber'] .' - ТурбоМагазин - Турбомастер.ру';
$this->registerMetaTag(['name' =>'description','content'=>$metaTags['description']]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $metaTags['keywords']]);
$isWarning = false;
?>

<div class="container page-style" style="position: relative;">
    
    <div id="print-label" class="visible-lg visible-md">
        <a onclick="window.print(); return false;" href="#">
            <div class="fa fa-print" title="Распечатать страницу"></div>
        </a>
    </div>

    <section id="breadcrumbs">
        <?= Breadcrumbs::widget([
          // 'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
          'homeLink' => false,
          'links'    => $breadcrumbsLinks]); ?>
    </section>

    <h1><?= $product['name'] ?></h1>
    
    <section id="item">
        <?= $this->render('_product_items', ['product' => $product, 'analogs' => $analogs]) ?>

        <h3 style="margin: 30px 0 12px 0; color: #888;">Информация о товаре:</h3>
        <div class="row">
            <div class="col-md-8">
                <?= $this->render('_product_card', ['product' => $product]) ?>
            </div>
            <div class="col-md-4">
                <?= $this->render('_product_photos', ['product' => $product, 'photos' => $photos, 'isWarning' => $isWarning]) ?>
            </div>
            
        </div>
    </section><!-- #item -->
         
</div><!-- /.container -->

<?= $this->render('/layouts/_form_question'); ?>
<?= $this->render('/layouts/_form_cart'); ?>



