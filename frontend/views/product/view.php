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

<section id="breadcrumbs">
<?= Breadcrumbs::widget([
  'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
  'links'    => $breadcrumbsLinks]); ?>

  <h1 class="catalog"><?= $product['name'] ?></h1>
</section>
<section id="item">
  <?= $this->render('_product_items', ['product' => $product, 'analogs' => $analogs]) ?>

    <h2 style="margin: 30px 0 20px 0;">Информация о товаре:</h2>
    <div>
      <?= $this->render('_product_photos', ['product' => $product, 'photos' => $photos, 'isWarning' => $isWarning]) ?>
     
      <?= $this->render('_product_card', ['product' => $product]) ?>
      
    </div>

    <div id="print">
      <a onclick="window.print();return false;" href="#">
        <img width="32" height="32" alt="Распечатать страницу" src="/images/ico-printer.png">
      </a>
    </div>

</section><!-- #item -->

<?= $this->render('/layouts/_form_question'); ?>
<?= $this->render('/layouts/_form_cart'); ?>


<div style="clear: both;"></div>
<!-- <div id="vk_comments" style="margin: 60px 0 0 0;"></div>
<script type="text/javascript">
VK.Widgets.Comments("vk_comments", {limit: 10, width: "520", attach: "*"});
</script> -->