<?php

use yii\helpers\Html;
use yii\helpers\CommonHelper;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\models\Product;

$this->title = 'Каталог восстановленных турбин - Турбомастер.ру, продажа восстановленных турбин с доставкой по Москве и России, диагностика и ремонт турбин';
$this->registerMetaTag(['name' => 'description', 'content' => 'Каталог картриджей для турбин Mitsubishi на автомобили BMW, Ford, Hyundai, Saab, Subaru, Volvo. Бесплатная доставка по Москве. Оперативная доставка во все регионы России!']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'картриджи для турбин, Mitsubishi, запчасти для турбин']);
?>

<section id="breadcrumbs">
<?=  
Breadcrumbs::widget([
  'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
  'links' => [
    ['label' => 'ТурбоМагазин'],
    ['label' => 'Картриджи для турбин'],
  ]    
]); 
    ?>
  <h1 class="catalog">Картриджи для турбин</h1>
</section>

<section id="list">

<p>Каталог картриджей для турбин Mitsubishi на автомобили марки BMW, Ford, Hyundai, Saab, Subaru, Volvo. Бесплатная доставка по Москве. Картридж турбины купить просто, проконсультировавшись с нашими специалистами. Возможна доставка заказа в любой город России! </p>
<p>Бесплатные консультации, информация по заказу картриджей <b>по телефону: (499) 650-76-45</b>.</p>
</section>

<section id="models">

   <?= $this->render('_table_cartridge_static'); ?>
</section>

<section class="teaser" style="margin: 40px 0 40px 0;">
 <?= $this->render('_cartridge_photos'); ?>
</section>

<div style="margin: 40px 0 40px 0px;">
 <?= $this->render('/layouts/_social_share'); ?>
</div>


<?= $this->render('/layouts/_form_cart'); ?>
<?= $this->render('/layouts/_form_question'); ?>