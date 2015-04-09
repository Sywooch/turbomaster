<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;

?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr class="danger">
                <th>Модель</th>
                <th>Название турбины</th>
                <th></th>
                <th>Артикул</th>
                <th>Цена</th>
                <th>Купить</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($products as $item) {
            
            $price = (!empty($item['price'])) ? CommonHelper::formatPrice($item['price']) .' руб.' : '<a href="/question/create" class="question-add-link dotted" data-question-type="price_request" data-product-id="' .$item['id'] .'">цена по запросу</a>';

            if(Yii::$app->controller->action->id == 'tuning' || isset($_GET['manufacturer_alias'])) {
                $link = ['product/view', 'id'=> $item['id']];
            } else {
                $link = ['product/view', 
                                'brand_alias' => $item['brand_alias'], 
                                'model_alias'   => $item['model_alias'], 
                                'partnumber'  => $item['partnumber'], 
                                ];
            }

            echo 
            '<tr>
                <td>' .$item['model_name'] .'</td>
                <td>'.Html::a($item['name'], $link) .'</td>
                <td>' .Html::a('', $link, ['class' => 'cart-add-product-link fa fa-search-plus', 'title' => 'Узнайте подробнее']) .'</td>
                <td>' . $item['partnumber'] . '</td>
                <td class="price_cell"><span>' .$price .'</span></td>
                <td>' .Html::a('', ['cart/create'], ['data-product-id' => $item['id'], 'class' => 'cart-add-product-link fa fa-shopping-cart', 'style' => 'font-size: 20px;']) .'</td>
            </tr>';  
         } ?>      
        </tbody>
    </table>
</div>    

    <?php
    if(isset($pages) && $pages->pageCount >1) {
            echo \yii\widgets\LinkPager::widget([
                                'pagination' => $pages,
                                ]);
    }
    ?>