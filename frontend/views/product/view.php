<?php

use yii\helpers\Html;
use yii\helpers\CommonHelper;
use frontend\assets\AppAsset;
use yii\widgets\Breadcrumbs;
use common\models\Product;

// $this->registerCssFile('css/print.css', ['depends' => [AppAsset::className()], 'media' => 'print']);

$this->title = $product['name'] .', код ' .$product['partnumber'] .' - ТурбоМагазин - Турбомастер.ру';
$this->registerMetaTag(['name' =>'description','content'=>$metaTags['description']]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $metaTags['keywords']]);
$isWarning = false;
?>

<div class="container page-style" style="position: relative;">
    
    <div id="print-label" class="visible-lg visible-md">
        <a onclick="window.print(); return false;" href="#">
            <div class="fa fa-print" style="color: #999;" title="Распечатать страницу"></div>
        </a>
    </div>

    <section id="breadcrumbs">
        <?= Breadcrumbs::widget([
          // 'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
          'homeLink' => false,
          'links'    => $breadcrumbsLinks]); ?>
    </section>

    <h1><?= $product['name'] ?></h1>

    <section itemtype="http://schema.org/Product" itemscope>
        <meta itemprop="name" content="<?= $product['name'] ?>" />
        <meta itemprop="description" content="<?= $product['name'] ?>" />
        <meta itemprop="sku" content="<?= $product['partnumber'] ?>" />
        <div itemprop="brand" itemscope itemtype="http://schema.org/Brand">
            <meta itemprop="name" content="<?= $product['manufacturer_name'] ?>" />
        </div> 
  
        <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            <meta itemprop="availability" content="http://schema.org/<?= ($product['price'] > 0 ) ? 'InStock' : 'PreOrder' ?>" />
            <meta itemprop="itemCondition" content="http://schema.org/<?= (in_array($product['type'], [1, 3])) ? 'NewCondition' : 'RefurbishedCondition' ?>" />
        <?php 
        if (!empty($product['price'])) { ?>
            <meta itemprop="price" content="<?= $product['price'] ?>.00" />
            <meta itemprop="priceCurrency" content="RUB" />
        <?php } ?>
        </div>
    </section><!-- /itemscope -->


    <section id="item">
        <?= $this->render('_product_items', ['product' => $product, 'analogs' => $analogs]) ?>

        <h3 style="margin-top: 20px; color: #888;">Характеристики турбины:</h3>
        <div class="row">
            <div class="col-md-8">
                <?= $this->render('_product_card', ['product' => $product]) ?>
            </div>
            <div class="col-md-4">
                <?= $this->render('_product_photos', ['product' => $product, 'photos' => $photos, 'isWarning' => $isWarning]) ?>
                
                <div class="col-md-offset-2" style="margin-top: 20px;">  
                    <?= $this->render('_product_links', ['product' => $product]) ?>
                </div>

            </div>
        </div>
        
    </section><!-- #item -->
         
</div><!-- /.container -->

<?= $this->render('/layouts/_form_question'); ?>
<?= $this->render('/layouts/_form_cart'); ?>
<?= $this->render('/layouts/_box_interest', ['link' => $interestLink]); ?>



