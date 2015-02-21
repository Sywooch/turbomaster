<?php

use yii\helpers\Html;
use yii\helpers\CommonHelper;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

$this->title = 'Результаты поиска - ТурбоМагазин - Турбомастер.ру';
?>

<section id="breadcrumbs">
    <?= Breadcrumbs::widget([
          'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
          'links' => [['label' => 'Турбопоиск']]    
        ]); ?>
</section>

<section id="main-search">
    <?= $this->render('/layouts/_form_search', []); ?>         
</section>


<section id="models">
    <h1>Результаты турбопоиска</h1>
    
    <?= $this->render('/layouts/_table_products', ['products' => $products, 'pages' => $pages]); ?>
</section>

<?= $this->render('/layouts/_form_cart'); ?>
<?= $this->render('/layouts/_form_question'); ?>