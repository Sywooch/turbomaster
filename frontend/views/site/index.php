<?php
use frontend\assets\AppAsset;
// AppAsset::register($this);

$this->title = 'Продажа турбин: купить турбину (турбокомпрессор) для автомобилей любой марки, цены на турбины, заказ, доставка, установка турбин на авто - ТурбоМастер.ру';

$this->registerMetaTag(['name' => 'description', 'content' => 'Продажа турбин для легковых и грузовых автомобилей, специальной автотехники, цены на установку систем турбонаддува. Информация о наличии и ценах на турбины (турбокомпрессоры), купить турбину онлайн. Техцентр и склад в Москве.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'турбомастер,  продажа  турбин,  цены на турбины, купить турбину, купить турбокмопрессор, цены на турбонаддув, турбина автомобиля']);


$this->registerCssFile('css/jquery.da-slider.css', ['depends' => [AppAsset::className()]]);
$this->registerJsFile('js/search.js', ['depends' => [AppAsset::className()]]);
$this->registerJsFile('js/core/jquery.cslider.js', ['depends' => [AppAsset::className()]]);
$this->registerJsFile('js/mainpage.js', ['depends' => [AppAsset::className()]]);
?>


<section id="main-search">
    <?= $this->render('/layouts/_search_form', []); ?>         
</section>

<section>
    <?= $this->render('/layouts/_banners_rotator'); ?> 
</section>

<section class="teaser" style="margin: 10px 0 20px; padding-bottom: 0;">
    <?= $this->render('_block_rotator_b', ['items' => $items]); ?>
</section>

<?= $this->render('_table_popular', ['populars' => $populars]); ?>

<section class="teaser-simple" style="margin: 20px 0 20px; padding-bottom: 0px;">
    <?= $this->render('_facts_rotator') ?>
</section>

<?= $this->render('_common_info'); ?>

<section class="teaser-simple" style="width: 682px; margin: 40px 0 20px 0; padding: 10px 0px 0px 0px;">
    <?= $this->render('_gallery'); ?>
</section>

<?= $this->render('_block_news', ['items' => $news]); ?>

<?= $this->render('/layouts/_form_question'); ?>
<?= $this->render('/layouts/_form_cart'); ?>

