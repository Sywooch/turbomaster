<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use backend\assets\AdminAsset;

$this->title = 'ТурбоАдмин :: Загрузка товаров из таблицы';
$this->registerJsFile('js/price.js', ['depends' => [AdminAsset::className()]]);
?>

<?= $this->render('/layouts/leftmenu/excel'); ?>

<div id="main">
    <div id="block-tables" class="block">  

    <?= $this->render('/layouts/topmenu/price', ['countDublicated' => $countDublicated]); ?>
        <div class="content">

            <?= (Yii::$app->session->hasFlash('success')) ? '<div id="notice">' .Yii::$app->session->getFlash('success') .'</div>' : ''; ?>
    <?php
    if($items) {
    ?>    
        <div style="width: 460px; max-height: 600px; overflow-y: auto; margin: 10px 0 0 40px;">
        <table class="item-list price-temp" style="width: 400px;">
            <tr class="headers">
            <tr>
                <th>Артикул</th>
                <th>Тип</th>
                <th>Варианты цен</th>
                <th>Утвержд.</th>
            </tr>
            <tr class="rails" style="height: 1px;">
                <td style="width: 160px;"></td>
                <td style="width: 40px;"></td>
                <td style="width: 120px;"></td>
                <td style="width: 70px;"></td>
            </tr>
            <?php

        foreach($items as $k => $item) {

            $variants = explode('|', $item['price_var']);
            ?>
                <tr>
                    <td><?= $item['partnumber'] ?></td>
                    <td><?= $item['type'] ?></td>
                    <td class="variants">
                    <?php 
                    foreach($variants as $var) {
                        echo '<span data-id="' .$item['id'] .'">' .CommonHelper::formatPrice($var) .'</span><br>';
                    }
                    ?>
                    </td>
                    <td class="confirmed"><?= CommonHelper::formatPrice($item['price']) ?></td>
                </tr>
    <?php   
        } 
    ?>
        </table>
        </div>
    <?php    
    echo Html::a('OK', ['price/index'], ['class' => 'button_link', 'style' => 'margin: 30px 0 0 40px; padding: 6px 20px;']);
    
    } else {
        echo '<h3 style="margin: 40px 0 0 40px;">Дублей в сводной таблице не обнаружено</h3>';
    }
    ?>
        </div><!-- /content -->
    </div><!-- /block-tables  -->
</div><!-- /main  -->