<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;

?>
<table class="bordered subst">
        <thead>
            <tr>
                <th>Модель</th>
                <th>Название турбины</th>
                <th>Код Производителя</th>
                <th style="width: 150px;">Цена</th>
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


            echo '
            <tr>
                <td>' .$item['model_name'] .'</td>
                <td>' .
                    Html::a($item['name'], $link) 
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