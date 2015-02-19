<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
?>

<table class="bordered">
    <tbody>
        <tr>
            <th>Марка</th>
            <td><?= $product['brand_name'] ?></td>
        </tr>
        <tr>
            <th>Модель</th>
            <td><?= $product['model_name'] ?></td>
        </tr>
        <tr>
            <th>Наименование товара (турбины)</th>
            <td><?= $product['name'] ?></td>
        </tr>
        <tr>
          <th>Применение</th>
          <td>
            <table class="table_inside">
              <tr>
                <td>двигатель:</td>
                <td><?= $product['engine'] ?></td>
              </tr>
              <tr>
                <td>объём:</td>
                <td> <?= $product['volume'] ?> ccm</td>
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
          <td><b><?= $product['partnumber'] ?></b></td>
        </tr>
        <tr>
          <th>Взаимозаменяемость</th>
          <td><?= \common\models\Product::interchangeViewFormat($product['interchange']) ?></td>
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

    <tfoot>
      <tr>
        <td colspan="2">
          <a href="/question/create" class="question-add-link dotted" data-question-type="common_question" data-product-id="<?= $product['id'] ?>">
            <img width="32" height="32" alt="Задать вопрос о товаре" src="/images/ico-question.png">
            <span>Задать вопрос о товаре</span>
          </a>
        </td>
      </tr>
    </tfoot>
</table>