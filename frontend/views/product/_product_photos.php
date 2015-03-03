<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;

$isOriginalPhoto = !empty($photos) ? true : false;

$mainPhoto = !empty($photos) ? CommonHelper::getImageSrc('/photo/product/240/' .$photos[0]['src']) : CommonHelper::getImageSrc('/photo/product/default/240/' .$product['manufacturer_alias'] .'.jpg');

?>

<div class="row product-main-photo">
    <div class="col-md-10 col-md-offset-2 col-xs-8">
        <?= Html::img($mainPhoto, ['alt' => $product['name']]) ?>
        <?php if(!$isOriginalPhoto) { ?>
            <div class="alert alert-warning" role="alert" style="max-width: 242px; font-size: 13px; line-height: 1.1em; background: #f0f0f0; color: #555;">
                Внимание! На фотографии представлен образец оригинальной турбины <?= $product['manufacturer_name'] ?>, НЕ идентичный данному товару.
            </div>
        <?php } ?>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-2 col-xs-8 product-thumbs">
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