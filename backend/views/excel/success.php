<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;

$this->title = 'ТурбоАдмин :: Загрузка товаров из таблицы';
$map = [
    'price' => 'прайс-листа',
    'catalog' => 'каталога',
    'tuning' => 'таблицы турбин для тюнинга',
    'sparepart' => 'таблицы запчастей',
];
?>

<?= $this->render('/layouts/leftmenu/excel'); ?>

<div id="main">
    <div id="block-tables" class="block">  

    <?= $this->render('/layouts/topmenu/_common', ['title_name' => 'Загрузчик']); ?>
        <div class="content" style="padding: 40px 0 0 60px;">

            <h3 style="margin-left: 30px;">Данные из <?= $map[$_GET['from']] ?> успешно внесены в базу данных</h3>

            <?php
            if(isset($_GET['file_report'])) {
                echo $this->render('/layouts/_file_report'); 
            } ?>

        </div><!-- /content -->
    </div><!-- /block-tables  -->
</div><!-- /main  -->