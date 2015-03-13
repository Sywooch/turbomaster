<?php

use yii\helpers\Html;
use yii\helpers\CommonHelper;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\models\Product;

$brand_name = $products[0]['brand_name'];
$common_name = $seo['rus_brand'] ? $seo['rus_brand'] : $brand_name;

$this->title = "Турбины на $brand_name - Турбомастер.ру, продажа турбин (турбокомпрессоров) для $brand_name, диагностика и ремонт турбин";

$title = $seo['rus_brand'] ? 'Турбины на ' .$seo['rus_brand'] .', турбокомпрессоры для ' .$brand_name : 'Турбины для ' .$brand_name;

$this->registerMetaTag(['name' => 'description', 'content' => "Турбины на $brand_name, большой ассортимент турбин, турбокомпрессоров на $brand_name в наличии на складе в Москве и под заказ. Бесплатные консультации, информация о наличии и заказе турбин для $brand_name по телефону: (499) 650-76-45. Бесплатная доставка по Москве. Оперативная доставка во все регионы России!"]);
$this->registerMetaTag(['name' => 'keywords', 'content' => "турбина на $common_name, турбокомпрессор $brand_name, турбина для $brand_name"]);
?>

<div class="container page-style">
    <section id="breadcrumbs">
        <?= Breadcrumbs::widget([
          // 'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
          'homeLink' => false,
          'links' => [
            ['label' => 'ТурбоМагазин'],
            ['label' => $products[0]['category_name'], 'url' => ['product/index', 'category_alias' => Yii::$app->request->get('category_alias')]],
            // ['label' => $brand_name],
          ]]); ?>
    </section>
    <h1><?= $title ?></h1>

    <section id="list">
        <?php  
        if(count($models) > 0) {
            echo $this->render('_models', 
                [
                    'models' => $models, 
                    'common_name' => $common_name,
                    'brand_name' => $brand_name, 
                ]);
        }
        ?>
    </section>

    <section id="intro">
        <p> Оригинальные турбины для автомобилей марки <?= $brand_name ?> в наличии на складе в Москве и под заказ. Бесплатные консультации, информация о наличии и заказе турбин по телефону: (499) 650-76-45. Бесплатная доставка турбин для <?= $common_name ?> по Москве. Оперативная <a href="http://turbomaster.loc/delivery">доставка</a> во все регионы России!</p>
        <p>При заказе диагностики и ремонта турбины на <?= $brand_name ?> в нашем 
        <a href="http://www.turbomaster.ru/turboservice">ТурбоСервисе</a>
         - расширенная общая гарантия на турбокомпрессор и на выполненные работы. <a href="http://www.turbomaster.ru/price">Стоимость замены</a> турбины на <?= $common_name ?>  нашем профильном центре вас приятно удивит!
        </p>
    </section>

    <?php 
    if(!empty($seo['history'])) { ?>
        <section style="margin-top: 40px;">
            <h2>Справка</h2>
            <?php 
            $pars = explode("\n", $seo['history']); 
            foreach($pars as $par)  {
                echo "<p>$par</p>";
            } ?>
        </section>
    <?php
    } ?>

    <section style="margin-top: 60px;">
        <?php  
        if(count($products) > 0) {
            echo '<h2>Все турбины для ' .$common_name .':</h2>';
            echo $this->render('_table_brand', compact('products', 'pages'));
        }
        ?>
    </section>
</div>

<?= $this->render('/layouts/_form_question'); ?>
<?= $this->render('/layouts/_form_cart'); ?>

