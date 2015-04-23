<?php
use common\models\Product;
use yii\helpers\Html;
use yii\helpers\CommonHelper;


if(count($products) > 0) {
?>

<div class="table-responsive">
    <table id="table-products" class="table table-striped">
        <thead>
            <tr class="danger">
                <th>Номер</th>
                <th style="width: 25%;">Название</th>
                <th>Применение <br>(артикул турбины)</th>
                <th>Производит.</th>
                <th nowrap>Цена, руб.</th>
                <th>Уточнить</th>
                <th>Заказать</th>
            </tr>
        </thead>
        <tbody>

        <?php
        foreach($products as $k => $item) {
            
            $price = (!empty($item['price'])) ? CommonHelper::formatPrice($item['price']) .' руб.' : '<a href="/question/create" class="question-add-link link-dotted" data-question-type="price_request" data-product-id="' .$item['id'] .'">цена по запросу</a>';

                // $link = ['product/view', 'sparepart_id'=> $item['id']];
            ?>
            <tr>
                <td><?= $k + 1 ?></td>
                <td class=""><?= $item['name'] ?></td>
                <td><?= $item['interchange'] ?></td>
                <td><?= $item['manufacturer_name'] ?></td>
                <td class="price_cell"><span><?= $price ?></span></td>
                <td class="center">
                    <?= Html::a('', ['question/create'], ['data-question-type' => 'common_question', 'data-product-id' => $item['id'], 'class' => 'question-add-link fa fa-question-circle', 'style' => 'font-size: 20px;']) ?>
                </td>
                <td class="center"><?= Html::a('', ['cart/create'], ['data-product-id' => $item['id'], 'class' => 'cart-add-product-link fa fa-shopping-cart', 'style' => 'font-size: 20px;']) ?></td>
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

}
?>