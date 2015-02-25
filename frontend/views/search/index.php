<?php

use yii\helpers\Html;
use yii\helpers\CommonHelper;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

$this->title = 'Результаты поиска - ТурбоМагазин - Турбомастер.ру';
?>

<div class="container page-style">

    <section id="breadcrumbs">
    <?= Breadcrumbs::widget([
          'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
          'links' => [['label' => 'Турбопоиск']]]) ?>
    </section>

    <section id="main-search">
        <?php
        $showSearchForm = true;
        if(isset($_GET['brand_id']) || isset($_GET['model_id']) || isset($_GET['partnumber'])) {
            $showSearchForm = false;
            echo '<a href="/search/index">Повторить поиск</a>';
        } 
        ?>
        <div class="row" style="display: <?= $showSearchForm ? 'block' : 'none' ?>;">
            <div class="col-md-offset-3">
                <?= $this->render('/layouts/_form_search', []) ?>
            </div>
        </div>  
    </section>


    <section id="models">
        <?php 
        if(!$showSearchForm) { ?>
            <h1>Результаты турбопоиска</h1>
            <?= $this->render('/layouts/_table_products', ['products' => $products, 'pages' => $pages]); ?>

        <?php } ?>
    </section>

</div>

<?= $this->render('/layouts/_form_cart'); ?>
<?= $this->render('/layouts/_form_question'); ?>