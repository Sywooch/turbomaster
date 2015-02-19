<?php
use yii\helpers\Html;
use common\models\Order;
use yii\helpers\CommonHelper;
use backend\assets\AdminAsset;

$this->title = 'ТурбоАдмин :: Заказы';
$this->registerJsFile('js/orders.js', ['depends' => [AdminAsset::className()]]);
?>

<?= $this->render('/layouts/leftmenu/orders'); ?>

<div id="main">
    <div id="block-tables" class="block">  
        <?= $this->render('/layouts/topmenu/_common', ['title_name' => 'Заказы']); ?>
    <div class="content">
     
    <table class="item-list">
        <tr class="headers">
        <tr>
            <th>№</th>
            <th>Статус</th>
            <th>Дата</th>
            <th>Товары</th>
            <th>Цена</th>
            <th>Покупатель</th>
            <th>Удалить</th>
        </tr>
        <tr class="rails" style="height: 1px;">
            <td style="width: 40px;"></td>
            <td style="width: 140px;"></td>
            <td style="width: 60px;"></td>
            <td style="width: 360px;"></td>
            <td style="width: 120px;"></td>
            <td style="width: 90px;"></td>
            <td style="width: 70px;"></td> 
        </tr>

        <?php
        $arState =  [1 =>'Новый',
                     2 =>'Подтвержден',
                     3 =>'Выполнен',
                     4 =>'Ошибка'];
 if($items) {                   
    foreach($items as $item) {

         $price = (!empty($item['total_price'])) ? CommonHelper::formatPrice($item['total_price']) .' руб.' : '';
         $products_names = str_replace(' | ', '<br>', $item['products_names']);
    ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td class="place-state for-select clickable" id="order-state-<?= $item['id'] .'-'.$item['state']; ?>"><?= $arState[$item['state']] ?>
            </td>
            <td style="padding: 10px 0;">
                <?php 
                $phpdate = strtotime($item['created_at']);
                echo date("d.m.Y", $phpdate ) .'<span style="display: inline; color: #999; padding-left: 6px;">' .date("H:i", $phpdate) .'</span>';  ?>
            </td>
            <td><?= HTML::a($products_names, ['order/update', 'id' => $item['id']])  ?></td>
            <td><?= $price ?></td>
            <td><?= $item['name'] ?></td>         
            <td><?= HTML::a('<div class="icon_delete"></div>', ['order/delete', 'id' => $item['id']], ['class' => 'confirmDeletion']); ?></td>
        </tr>
<?php } ?>        
    </table>

    <?php
    if($pages->pageCount > 1) {
        echo \yii\widgets\LinkPager::widget(['pagination' => $pages]);
    } 
}
?>

  </div><!-- /content -->
  </div><!-- /block-tables  -->
</div><!-- /main  -->