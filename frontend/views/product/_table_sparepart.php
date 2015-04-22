<?php
use common\models\Product;
use yii\helpers\Html;
use yii\helpers\CommonHelper;

?>

<div class="table-responsive">
    <table id="table-products" class="table table-striped">
        <thead>
            <tr class="danger">
                <th>Номер</th>
                <th style="width: 30%;">Название</th>
                <th></th>
                <th>Производитель</th>
                <th>Применение (артикул турбины)</th>
                <th nowrap>Цена, руб.</th>
                <th>Заказать</th>
            </tr>
        </thead>
        <tbody>

        <?php
        foreach($products as $k => $item) {
            $name =  $item['name'];

            $price = (!empty($item['price'])) ? CommonHelper::formatPrice($item['price']) .' руб.' : '<a href="/question/create" class="question-add-link link-dotted" data-question-type="price_request" data-product-id="' .$item['id'] .'">цена по запросу</a>';

                $link = ['product/view', 'sparepart_id'=> $item['id']];
            ?>
            <tr>
                <td><?= $k + 1 ?></td>
                <td class=""><?= Html::a($name, $link) ?></td>
                <td><?= Html::a('', $link, ['class' => 'fa fa-search-plus', 'title' => 'Узнайте подробнее']) ?></td>
                
                <td><?= $item['interchange'] ?></td>
                <td><?= $item['manufacturer_name'] ?></td>
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