<?php

use yii\helpers\Html;
use yii\helpers\CommonHelper;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\models\Product;

$brand_name = $products[0]['brand_name'];
$model_name   = $products[0]['model_name'];

$this->title =  "Турбины на $brand_name $model_name - Турбомастер.ру, продажа турбин для $brand_name $model_name с доставкой по Москве и России";
$this->registerMetaTag(['name' => 'description', 'content' => "Турбины на $brand_name $model_name  - наличие, цены, описание. Бесплатная доставка по Москве. При установке турбины в нашем ТурбоСервисе - расширенная общая гарантия на турбокомпрессор и на выполненные работы. Оперативная доставка во все регионы России!"]);
$this->registerMetaTag(['name' => 'keywords', 'content' => "турбины на $brand_name $model_name, турбокомпрессоры на $brand_name $model_name, продажа турбин, каталог турбин, $brand_name $model_name, $model_name"]);
?>

<div class="container page-style">

    <section id="breadcrumbs">
        <?= Breadcrumbs::widget([
        // 'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
        'homeLink' => false,
            'links' => [
                ['label' => 'ТурбоМагазин'],
                ['label' => $products[0]['category_name'], 'url' => ['product/index', 'category_alias' => Yii::$app->request->get('category_alias')]],
                ['label' => $brand_name, 'url' => ['product/index', 'category_alias' => Yii::$app->request->get('category_alias'), 'brand_alias' => Yii::$app->request->get('brand_alias')]],
                // ['label' => $model_name]
                ]]);  ?>
    </section>

    <h1 class="catalog">Турбины для <?= $brand_name . ' ' .$model_name; ?></h1>

    <p>Оригинальные турбины для всех моделей марки <?= $brand_name . ' ' .$model_name; ?> в наличии на складе в Москве и под заказ. Бесплатные консультации, информация о наличии и заказе турбин по телефону: (499) 650-76-45. Бесплатная доставка по Москве. Оперативная доставка во все регионы России!</p>
    <p>При заказе диагностики и ремонта турбины на <?= $brand_name . ' ' .$model_name; ?> в нашем ТурбоСервисе - расширенная общая гарантия на турбокомпрессор и на выполненные работы.</p>
    </p>

    <section id="models" style="margin-top: 30px;">
        <?= $this->render('/layouts/_table_products', ['products' => $products, 'pages' => $pages, 'addClass' => 'emphasis']); ?> 
    </section>

</div><!-- /.container -->
    
<?= $this->render('/layouts/_form_cart'); ?>
<?= $this->render('/layouts/_form_question'); ?>