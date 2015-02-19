<?php

use yii\helpers\Html;
use yii\helpers\CommonHelper;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\models\Product;

$this->title = 'Турбо тюнинг - Турбомастер.ру, продажа турбин для тюнинга с доставкой по Москве и России, диагностика и ремонт турбин';
$this->registerMetaTag(['name' => 'description', 'content' => 'Турбины для тюнинга - технические характеристики, цены, заказ онлайн. Для всех, кто увлекается турбо тюнингом или просто интересуется этой перспективной технологией! Расширенная общая гарантия на турбины и на выполненные работы.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'турбо, тюнинг, турбины для тюнинга, турботюнинг, турбомастер']);
?>

<section id="breadcrumbs">
<?=  
Breadcrumbs::widget([
  'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
  'links' => [
    ['label' => 'ТурбоМагазин'],
    ['label' => 'Турбины для тюнинга'],
  ]    
]); 
    ?>
  <h1 class="catalog">Турбо тюнинг</h1>
</section>

<section id="list">

<p>Для всех, кто увлекается турбо тюнингом и любит свой автомобиль! Бесплатные консультации, информация о наличии и заказе турбин по телефону: (499) 650-76-45. Вы можете сделать турбо тюнинг самостоятельно, или обратиться в наш ТурбоСервис - запись по телефону (499) 391-58-75. Мы предоставляем расширенную общую гарантию на выполненные работы.</p>
<p>Бесплатная доставка по Москве. Оперативная доставка во все регионы России!</p>

</section>

<section id="models">
  <h2>Все турбины:</h2>

   <?= $this->render('/layouts/_table_products', ['products' => $products, 'pages' => null]); ?>
</section>

<div style="margin: 40px 0 40px 0px;">
     <?= $this->render('/layouts/_social_share'); ?>
</div>

<?= $this->render('/layouts/_form_cart'); ?>
<?= $this->render('/layouts/_form_question'); ?>