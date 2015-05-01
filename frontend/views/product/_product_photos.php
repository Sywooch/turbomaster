<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
?>

<div class="row">
    <div class="col-md-10 col-md-offset-2 col-xs-8">
        <?php 
        if(!empty($photos)) { 
            echo '<ul id="photo-rotator">';
            foreach($photos as $photo) {
                echo '
                <li class="pane-item">
                    <a rel="group" href="/photo/product/big/' .$photo['src'] .'" class="zoom">' 
                        .Html::img(CommonHelper::getImageSrc('/photo/product/240/' .$photo['src']), ['class' =>'zoom', 'alt' => $product['name']]) .
                    '</a>
                </li>';
            }
            echo '<ul>';

        } else {   
            $imgSrc = CommonHelper::getImageSrc('/photo/product/default/240/' .$product['manufacturer_alias'] .'.jpg');

            if($imgSrc) {
                echo '
                <div class="product-photo">
                    <div>' 
                    .Html::img($imgSrc, ['alt' => $product['name']]) 
                    .'</div>
                    <div class="attention">Внимание! На фотографии представлен образец оригинальной турбины ' .$product['manufacturer_name'] .', <br>НЕ идентичный данному товару.</div>
                </div>';
            }
        }
        ?>
    </div>
</div>