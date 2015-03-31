<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;

$photos = ['01.jpg', '02.jpg', '03.jpg'];
?>

<h3>Примеры картриджей</h3>

<div class="row">
        <ul style="margin: 20px 0 0 10px; padding: 0;">
        <?php 
        foreach($photos as $photo) { ?>
            <li style="list-style: none; display: block; width: 200px; height: 200px; position: relative; float: left; margin: 0 20px 0 0;">
                <a class="zoom" href="<?= CommonHelper::getImageSrc('/images/cartridges/big/' .$photo) ?>" rel="group">
                    <?= Html::img(CommonHelper::getImageSrc('/images/cartridges/mini/' .$photo), ['width' => 200, 'alt' => '']) ?>
                </a>
            </li>
        <?php } ?>
        </ul>
</div>



