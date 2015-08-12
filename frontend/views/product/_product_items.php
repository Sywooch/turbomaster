<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;

$items[0] = $product;
if($analogs) {
    $items = array_merge($items, $analogs);
}
?>

<!-- <h3 style="margin: 30px 0 10px 0; color: #b04340;">На складе:</h3> -->

<div class="table-responsive" style="margin-top: 20px;">
    <table class="table table-striped" style="border-bottom: 2px solid #bbb; margin-top: 20px;">
        <thead>
            <tr class="grey">
                <th>Наименование турбины</th>
                <th>Артикул</th>
                <th>Производитель</th>
                <th>Состоян.</th>
                <th style="">Цена</th>
                <th>Заказать</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach($items as $k => $item) {
            if($k == 1) {
                echo '<tr class="warning"><th colspan="6">Аналоги:</th></tr>';
            }
        
            $price = (!empty($item['price'])) ? '<strong>' .CommonHelper::formatPrice($item['price']) .' руб.</strong>' : '<a href="/question/create" class="question-add-link link-dotted" data-question-type="price_request" data-product-id="' .$item['id'] .'">цена по запросу</a>';
            
            $state = (in_array($item['type'], [1, 3])) ? 'новая' : Html::a('оборотная', ['product/refurbish']);
            ?>
        
            <tr class="gross">
                <td><strong><?= $item['name'] ?></strong></td>
                <td><?= $item['partnumber'] ?></td>
                <td><?= $item['manufacturer_name'] ?></td>
                <td><?= $state ?></td>
                <td nowrap class="price_cell"><?= $price ?></td>
                <td>
                <?= Html::a('', ['cart/create'], ['data-product-id' => $item['id'], 'class' => 'cart-add-product-link btn btn-lg btn-danger fa fa-shopping-cart', 'style' => 'font-size: 26px; padding: 4px 12px;']) ?>
                </td>
            </tr>
        <?php } ?>   
      </tbody>
    </table>
</div>