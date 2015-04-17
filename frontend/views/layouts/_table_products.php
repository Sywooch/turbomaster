<?php
use common\models\Product;
use yii\helpers\Html;
use yii\helpers\CommonHelper;

$tableClass = isset($addClass) ? ' ' .$addClass : '';

if(count($products) == 1) {
    $tableClass .= ' big-padding';
}
?>

<div class="table-responsive">
    <table id="table-products" class="table table-striped<?= $tableClass ?>">
        <thead>
            <tr class="danger">
                <th style="width: 30%;">Название турбины</th>
                <th></th>
                <th>Двигатель</th>
                <th>Артикул</th>
                <th>Цена</th>
                <th>Заказать</th>
            </tr>
        </thead>
        <tbody>

        <?php
        foreach($products as $item) {
            $name =  $item['name'];

            $price = (!empty($item['price'])) ? CommonHelper::formatPrice($item['price']) .' руб.' : '<a href="/question/create" class="question-add-link link-dotted" data-question-type="price_request" data-product-id="' .$item['id'] .'">цена по запросу</a>';

            if($item['type'] == Product::TYPE_TUNING) {
                $link = ['product/view', 'tuning_id'=> $item['id']];
            } else {
                $link = ['product/view', 
                            'brand_alias' => $item['brand_alias'], 
                            'model_alias' => $item['model_alias'], 
                            'partnumber'  => $item['partnumber'], 
                        ];
            } 
            ?>
            <tr>
                <td class="underline"><?= Html::a($name, $link) ?></td>
                <td><?= Html::a('', $link, ['class' => 'fa fa-search-plus', 'title' => 'Узнайте подробнее']) ?></td>
                <td class="engine"><?= CommonHelper::formatEngine($item) ?></td>
                <td><?= $item['partnumber'] ?></td>
                <td class="price_cell"><span><?= $price ?></span></td>
                <td><?= Html::a('', ['cart/create'], ['data-product-id' => $item['id'], 'class' => 'cart-add-product-link fa fa-shopping-cart', 'style' => 'font-size: 20px;']) ?></td>
            </tr>   
        <?php }  ?>

        </tbody>
    </table>
</div><!-- /.table-responsive -->

<?php
if(isset($pages) && $pages->pageCount > 1) {
    echo \yii\widgets\LinkPager::widget([
            'pagination' => $pages]);
}
?>