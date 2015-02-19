<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use backend\assets\AdminAsset;

$this->title = 'ТурбоАдмин :: Товары';

$this->registerJsFile('js/products.js', ['depends' => [AdminAsset::className()]]);
$this->registerJsFile('js/search.js', ['depends' => [AdminAsset::className()]]);
?>

<?= $this->render('/layouts/leftmenu/products'); ?>

<div id="main">
  <div id="block-tables" class="block">  

  <?= $this->render('/layouts/topmenu/products'); ?>
  <div class="content">

    <div id="search_panel" style="display: <?= (!empty($_COOKIE['show_search_panel'])) ? 'block' : 'none' ?>">
      <?= $this->render('/layouts/_search_panel'); ?>
    </div>
    <div class="clearfix"></div>
     
    <table class="item-list">
      <tr class="headers">
        <tr>
          <th>Название</th>
          <th>Код производ.</th>
          <th>Марка</th>
          <th>Цена</th>
          <th>Стат.</th>
          <th>Марк.</th>
          <th>Тип</th>
          <th>Удал.</th>
      </tr>
      <tr class="rails" style="height: 1px;">
        <td style="width: 480px;"></td>
        <td style="width: 160px;"></td>
        <td style="width: 180px;"></td>
        <td style="width: 140px;"></td>
        <td style="width: 50px;"></td>
        <td style="width: 50px;"></td>
        <td style="width: 70px;"></td>
        <td style="width: 50px;"></td> 
      </tr>

     <?php
      $typesArray = ['','новая', 'обортная', 'тюнинг'];

      foreach($products as $item) {
            
        $type = ($item['type']) ? $item['type'] : 1;
        // $nameArray = explode(' ', $item['name']);
        // $name = implode(' ', array_slice($nameArray, 1));
        $name = $item['name'];
        
        $manufacturer = $item['manufacturer_name'];
        if(mb_strlen($manufacturer, 'utf-8') > 17) {
          $manufacturer = mb_substr($manufacturer, 0, 16, 'utf-8') .'..';
        }

        $price = (!empty($item['price'])) ? CommonHelper::formatPrice($item['price']) .' руб.' : ' -- ';
        ?>
        <tr>
          <td class="bigger"><?= Html::a($name, ['product/update', 'id'=>$item['id']], ['class' => 'hovered']) ?></td>
          <td class="bigger"><?= $item['partnumber'] ?></td>
          <td><?= $manufacturer ?></td>         
          <td class="bigger"><?= $price ?></td>
          <td class="place-state">
            <span id="product-state-<?= $item['id'] ?>-<?= $item['state'] ?>" class="<?= ($item['state'] == 1) ? 'active' : 'no-active'; ?>"></span>
          </td>
          <td class="place-is_yml">
            <span id="product-is_yml-<?= $item['id'] ?>-<?= $item['is_yml'] ?>" class="<?= ($item['is_yml'] == 1) ? 'active' : 'no-active'; ?>"></span>
          </td>   
          <td><?= $typesArray[$type] ?></td>
          <td><?= HTML::a('<div class="icon_delete"></div>', ['product/delete', 'id' => $item['id']], ['class' => 'confirmDeletion']); ?></td>
        </tr>
  <?php } ?>        
    </table>

    <?php
    if($pages->pageCount >1) {
        echo \yii\widgets\LinkPager::widget(['pagination' => $pages]);
    } ?>

  </div><!-- /content -->
  </div><!-- /block-tables  -->
</div><!-- /main  -->