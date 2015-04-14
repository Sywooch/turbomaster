<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
?>

<div class="row">
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
            <th>Для замены</th>
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
    </tbody>
</table>
</div><!-- /.row -->

<div class="row">
    <div class="col-xs-6 col-xs-offset-3 fa-hover" style="margin-top: 20px; margin-bottom: 40px;">

        <a href="/question/create" data-question-type="common_question" data-product-id="<?= $product['id'] ?>" class="question-add-link">
            <i style="font-size: 26px; color: #b04340;" class="fa fa-question-circle"></i>
            <span style="border-bottom: 1px dotted #b04340; margin-left: 10px;">Задать вопрос о товаре</span>
        </a>
    </div>
</div><!-- /.row -->