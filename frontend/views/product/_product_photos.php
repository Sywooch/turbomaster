<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;

$isOriginalPhoto = !empty($photos) ? true : false;

$mainPhoto = !empty($photos) ? CommonHelper::getImageSrc('/photo/product/240/' .$photos[0]['src']) : CommonHelper::getImageSrc('/photo/product/default/240/' .$product['manufacturer_alias'] .'.jpg');

?>

<div class="row product-main-photo">
    <div class="col-md-10 col-md-offset-2 col-xs-12">
        <?= Html::img($mainPhoto, ['alt' => $product['name']]) ?>
        <?php if(!$isOriginalPhoto) { ?>
            <div class="attention">
                Внимание! На фотографии представлен образец оригинальной турбины <?= $product['manufacturer_name'] ?>, НЕ идентичный данному товару.
            </div>
        <?php } ?>
    </div>
</div>

<div class="row">
    <!-- <div class="col-md-10 col-md-offset-2 col-xs-8 product-thumbs"> -->
    <div class="col-md-10 col-xs-8" style="margin-top: 40px;">
        <?php


        if(count($photos) > 1) {
            echo '<ul id="photo-rotator">';
            // array_shift($photos);
            foreach($photos as $photo) {
                echo '<li class="pane-item">' .Html::img(CommonHelper::getImageSrc('/photo/product/240/' .$photo['src'])) .'</li>';
            }
            echo '<ul>';
        }
        ?>
    </div>
</div>