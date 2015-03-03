<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
?>

<table id="product-card-table" class="table table-striped">
    <tbody>
        <tr>
            <th>Модель</th>
            <td><?= $product['brand_name'] .' ' .$product['model_name'] ?></td>
        </tr>
        <tr>
            <th>Наименование</th>
            <td><strong><?= $product['name'] ?></strong></td>
        </tr>
        <tr>
            <th>Применение</th>
            <td style="padding: 0;">
                <table class="table matroska" style="margin-bottom: 0;">
                    <tr>
                        <td style="width: 34%; border-top: 0;">двигатель:</td>
                        <td style="border-top: 0;"><?= $product['engine'] ?></td>
                    </tr>
                    <tr>
                        <td>объём:</td>
                        <td> <?= str_replace('.', '', $product['volume']) ?> cm<sup>3</sup></td>
                    </tr>
                    <tr>
                        <td>мощность:</td>
                        <td><?= $product['power'] ?> л.с.</td>
                    </tr>
                    <tr>
                    <?php if(!empty($product['date_from'])) { ?>
                        <td>год:</td>
                        <td><?= ($product['date_from']) ? 'с '.$product['date_from'] : ''?> 
                            <?= ($product['date_to']) ? ' до ' .$product['date_to'] : '' ?></td>
                        <?php } ?>
                    </tr>
                </table>                              
            </td>
        </tr>
        <tr>
            <th>Артикул</th>
            <td><strong><?= $product['partnumber'] ?></strong></td>
        </tr>
        <tr>
            <th style="word-wrap: break-word; hyphens: auto;">Взаимоза&shy;меняемость</th>
            <td style="word-wrap: break-word;"><?= \common\models\Product::interchangeViewFormat($product['interchange']) ?></td>
        </tr>
        <tr>
            <th>Производитель</th>
            <td><?= $product['manufacturer_name'] ?></td>
        </tr>
        <tr>
            <th>Гарантия</th>
            <td><?= $product['warranty'] ?></td>
        </tr>
        <tr>
            <th colspan="2" class="fa-hover" style="padding-left: 30%;">
                <a href="/question/create" data-question-type="common_question" data-product-id="<?= $product['id'] ?>" class="question-add-link">
                    <i class="fa fa-question-circle" style="font-size: 26px; color: #b04340;"></i>
                    <span style="border-bottom: 1px dotted #b04340;">Задать вопрос о товаре</span>
                </a>
            </th>
        </tr>
    </tbody>
</table>