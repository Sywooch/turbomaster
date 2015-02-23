<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;

$isOriginalPhoto = !empty($photos) ? true : false;

$mainPhoto = !empty($photos) ? CommonHelper::getImageSrc('/photo/product/240/' .$photos[0]['src']) : CommonHelper::getImageSrc('/photo/product/default/240/' .$product['manufacturer_alias'] .'.jpg');

?>

<div class="row product-main-photo">
    <div class="col-md-9 col-xs-4" style="padding-right: 0;">
        <?= Html::img($mainPhoto, ['style' => 'border: 3px solid #eee;', 'alt' => $product['name']]) ?>
        
        <?php if(!$isOriginalPhoto) { ?>
            <div class="alert alert-danger" role="alert" style="font-size: 13px; line-height: 1.1em;">
                Внимание! На фотографии представлен образец оригинальной турбины <?= $product['manufacturer_name'] ?>, НЕ идентичный данному товару.
            </div>
        <?php } ?>
    </div>
    <div class="col-md-3 visible-lg visible-md product-photo-thumbs">
        <?php
        if(count($photos) > 1) {
            echo '<ul>';
            array_shift($photos);
            foreach($photos as $photo) {
                echo '<li>' .Html::img(CommonHelper::getImageSrc('/photo/product/240/' .$photo['src'])) .'</li>';
            }
            echo '<ul>';
        }
        ?>
    </div>
</div>