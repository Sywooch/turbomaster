<?php
use common\models\Product;
use yii\helpers\Html;
use yii\helpers\CommonHelper;

$tableClass = isset($addClass) ? ' ' .$addClass : '';

if(count($products) == 1) {
    $tableClass .= ' big-padding';
}
?>
<table class="bordered subst<?= $tableClass ?>">
        <thead>
            <tr>
                <th>Название турбины</th>
                <th>Код Производителя</th>
                <th>Цена</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($products as $item) {
            
            // $nameArray = explode(' ', $item['name']);
            // $name = implode(' ', array_slice($nameArray, 1));
            $name =  $item['name'];

            $price = (!empty($item['price'])) ? CommonHelper::formatPrice($item['price']) .' руб.' : '<a href="/question/create" class="question-add-link dotted" data-question-type="price_request" data-product-id="' .$item['id'] .'">цена по запросу</a>';

            if($item['type'] == Product::TYPE_TUNING) {
                $link = ['product/view', 'tuning_id'=> $item['id']];
            } else {
                $link = ['product/view', 
                                'brand_alias' => $item['brand_alias'], 
                                'model_alias' => $item['model_alias'], 
                                'partnumber'  => $item['partnumber'], 
                                ];
            }


            echo '
            <tr>
                <td>' .
                    Html::a($name, $link) 
                .   Html::a(Html::img('/images/icon-more.png', ['alt' => 'Узнайте подробнее', 'title' => 'Узнайте подробнее']), $link) 
                .'
                </td>
                <td>' .$item['partnumber'] .'
                </td>
               <td class="price_cell"><span>' .$price .'</span>'
                    . Html::a(Html::img('/images/icon-buy.png', ['alt' => 'Купить', 'title' => 'Купить']),
                            ['cart/create'], ['data-product-id' => $item['id'], 'class' => 'cart-add-product-link']) .'
                </td>
               </tr>
               ';
         } ?>      
            </tbody>
        </table>

    <?php
    if(isset($pages) && $pages->pageCount >1) {
            echo \yii\widgets\LinkPager::widget([
                                'pagination' => $pages,
                                ]);
    }
    ?>