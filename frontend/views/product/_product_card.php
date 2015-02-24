<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
?>

<table id="product-card-table" class="table table-striped">
    <tbody>
        <tr>
            <th>Марка</th>
            <td style="width: 60%;"><?= $product['brand_name'] ?></td>
        </tr>
        <tr>
            <th>Модель</th>
            <td><?= $product['model_name'] ?></td>
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
                        <td> <?= str_replace('.', '', $product['volume']) ?> ccm</td>
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
            <th>Взаимозаменяемость</th>
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
            <th></th>
            <td class="clearfix">
                <i class="fa fa-question-circle" style="display: block; float: left; font-size: 26px; margin: 6px 8px 0 0; color: #b04340;"></i>
                <a href="/question/create" class="question-add-link link-dotted" style="display: block; float: left; font-size: 16px; margin: 6px 0 12px 0;" data-question-type="common_question" data-product-id="<?= $product['id'] ?>">
                    <span>Задать вопрос о товаре</span>
                </a>
            </td>
        </tr>
    </tbody>
</table>
