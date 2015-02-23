<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;

$photos = ['01.jpg', '02.jpg', '03.jpg'];
?>

<h3>Примеры картриджей</h3>

<div class="row">
    <div style="width: 670px; height: 220px;">
        <ul style="margin: 0; padding: 0;">
        <?php 
        foreach($photos as $photo) { ?>
            <li style="list-style: none; display: block; width: 200px; height: 200px; position: relative; float: left; margin: 0 20px 0 0;">
                <a class="zoom" href="<?= CommonHelper::getImageSrc('/images/cartridges/big/' .$photo) ?>" rel="group">
                    <?= Html::img(CommonHelper::getImageSrc('/images/cartridges/mini/' .$photo), ['width' => 200, 'alt' => '']) ?>
                    <img class="lens" style="position: absolute; bottom: 0px; right: 0px; border: 0; box-shadow: none;" src="/images/ico-zoom.png" width="32" height="32" alt="Увеличить">
                </a>
            </li>
        <?php } ?>
        </ul>
    
    </div>
</div>



