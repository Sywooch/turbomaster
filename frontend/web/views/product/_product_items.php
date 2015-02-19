<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;

$items[0] = $product;
if($analogs) {
  $items = array_merge($items, $analogs);
}
?>

<h2 style="margin: 30px 0 10px 0;">На складе:</h2>

    <table class="bordered subst bigger" style="margin-bottom: 40px;">
      <thead>
        <tr>
        <th>Наименование турбины</th>
        <th>Артикул</th>
        <th>Производитель</th>
        <th>Состоян.</th>
        <th style="width: 84px; padding-right: 2px;">Цена</th>
        <th>Заказать</th>
        </tr>
      </thead>
      <tbody>

      <?php 
      foreach($items as $k => $item) {

        if($k == 1) {

          echo '<tr><td colspan="6" style="background: #f0f0f0; font: bold 17px Arial,sans-serif; padding: 10px 8px 6px; color: #777;">Аналоги:</td></tr>';
        }
        
        $price = (!empty($item['price'])) ? CommonHelper::formatPrice($item['price']) .' руб.' : '<a href="/question/create" class="question-add-link dotted" data-question-type="price_request" data-product-id="' .$item['id'] .'">цена по запросу</a>';
        
        $state = (in_array($item['type'], [1,3])) ? 'новая' : Html::a('оборотная', ['product/refurbish']);
      ?>
        
        <tr>
          <td><?= $item['name'] ?></td>
          <td><?= $item['partnumber'] ?></td>
          <td><?= $item['manufacturer_name'] ?></td>
          <td><?= $state ?></td>
          <td class="price_cell"><?= $price ?></td>
          <td>
            <?= Html::a('Заказать', ['cart/create'], ['data-product-id' => $item['id'], 'class' => 'cart-add-product-link dotted']) ?>
          </td>
        </tr>
     <?php } ?>   
      </tbody>
    </table>