<?php
use common\models\Product;
use common\models\Category;
use yii\helpers\Html;
use yii\helpers\CommonHelper;

?>
<h3 style="margin: 20px 0 20px;">Все восстановленные турбины:</h3>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr class="danger">
                <th style="width: 240px;">Название турбины</th>
                <th>Артикул</th>
                <th>Взаимозаменяемость</th>
                <th style="width: 120px;">Цена</th>
                <th style="width: 50px;"></th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($products as $item) {

            // $nameArray = explode(' ', $item['name']);
            // $name = implode(' ', array_slice($nameArray, 1));
            // $name =  $item['name'];

            $price = (!empty($item['price'])) ? CommonHelper::formatPrice($item['price']) .' руб.' : '<a href="/question/create" class="question-add-link link-dotted" data-question-type="price_request" data-product-id="' .$item['id'] .'">цена по запросу</a>';

            if ($item['category_id'] == Category::TUNING) {
                $link = ['product/view', 'tuning_id'=> $item['id']];
            } else {
                $link = ['product/view', 
                            'brand_alias' => $item['brand_alias'], 
                            'model_alias' => $item['model_alias'], 
                            'partnumber'  => $item['partnumber'], 
                        ];
            }

            echo 
            '<tr>
                <td>'.Html::a($item['name'], $link) .'</td>
                <td>' . $item['partnumber'] . '</td>
                <td>' . str_replace(',', ' / ', $item['interchange']) . '</td>
                <td class="price_cell"><span>' .$price .'</span></td>
                <td>' .Html::a('', ['cart/create'], ['data-product-id' => $item['id'], 'class' => 'cart-add-product-link fa fa-shopping-cart', 'style' => 'font-size: 20px;']) .'</td>
            </tr>';   
         } ?>      
            </tbody>
        </table>
    </div>
    <?php
    if (isset($pages) && $pages->pageCount > 1) {
        echo \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
            ]);
    }
    ?>