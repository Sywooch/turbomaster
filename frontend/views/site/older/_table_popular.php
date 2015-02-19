<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
?>

<h2>Цены на популярные турбины:</h2>

<table class="bordered subst">
    <thead>
        <tr>
            <th>Марка</th>
            <th>Название турбины</th>
            <th>Код Производителя</th>
            <th>Цена</th>
        </tr>
    </thead>
    <tbody>

<?php
    foreach($populars as $item) {
            
            // $nameArray = explode(' ', $item['product_name']);
            // $product_name = implode(' ', array_slice($nameArray,1));
            $product_name = $item['product_name'];
            $price = (!empty($item['price'])) ? CommonHelper::formatPrice($item['price']) .' руб.' : '<a href="/question/create" class="question-add-link dotted" data-question-type="price_request" data-product-id="' .$item['product_id'] .'">цена по запросу</a>';
            $link = ['product/view', 
                        'brand_alias' => $item['brand_alias'], 
                        'model_alias' => $item['model_alias'], 
                        'partnumber'  => $item['partnumber'], 
                    ];
             echo 
            '<tr>
                <td>' .$item['brand_name'] .'</td>
                <td>'.
                Html::a($product_name, $link) .
                Html::a(Html::img('/images/icon-more.png', ['alt' => 'Узнайте подробнее', 'title' => 'Узнайте подробнее']), $link) .'
                </td>
                <td>' . $item['partnumber'] . '</td>
                <td class="price_cell"><span>' .$price .'</span>'
                    . Html::a(Html::img('/images/icon-buy.png', ['alt' => 'Купить', 'title' => 'Купить']),
                                ['cart/create'], ['data-product-id' => $item['product_id'], 'class' => 'cart-add-product-link']
                                ) .'
                </td>
            </tr>';   
    }
?>
    </tbody>
</table>

<p style="text-align: right;">Открыть полный <a href="/turboshop/passenger">каталог турбин</a></p>
