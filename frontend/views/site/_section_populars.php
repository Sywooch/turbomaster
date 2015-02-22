<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
?>

<section id="main-populars">
    <div class="container">
            
        <h2 style="margin: 40px 0; color: #888; text-align: center;">Цены на популярные турбины</h2>

        <div class="table-responsive">
            <table id="table-popular" class="table table-striped white-stripped">
                <thead>
                    <tr class="danger">
                        <th>Марка</th>
                        <th>Название турбины</th>
                        <th></th>
                        <th>Код производ.</th>
                        <th>Цена</th>
                        <th>Купить</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                foreach($populars as $item) {
                        
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
                        <td>'.Html::a($product_name, $link) .'</td>
                        <td>' .Html::a('', $link, ['class' => 'cart-add-product-link fa fa-search-plus']) .'</td>
                        <td>' . $item['partnumber'] . '</td>
                        <td class="price_cell"><span>' .$price .'</span></td>
                        <td>' .Html::a('', ['cart/create'], ['data-product-id' => $item['product_id'], 'class' => 'cart-add-product-link fa fa-shopping-cart', 'style' => 'font-size: 20px;']) .'</td>
                    </tr>';   
                }  ?>
                </tbody>
            </table>
        </div><!-- /.table-responsive -->

        <p class="link-dotted" style="text-align: left;">Открыть полный <a href="/turboshop/passenger">каталог турбин</a></p>
    
    </div><!-- /.container -->
</section>