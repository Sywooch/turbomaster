<?php

use yii\helpers\Html;

$start = true;
if (isset($randomOf)) {
    $randomNumber = mt_rand(1, $randomOf);
    $start = ($randomNumber == 1) ? true : false;
}

if ($start && $link) { ?>

<div class="fixblock">
    <h4>Это интересно!
        <a class="fixblock-delete" href="#">
            <i class="fa fa-times"></i>
        </a>
    </h4>

    <div class="wrap">
        <h5><?= $link['title'] ?></h5>
        <?php 
        if (!empty($link['brief'])) { ?>
            <a href="/<?= $link['url'] ?>">
                <p><?= $link['brief'] ?></p>
            </a>
        <?php } ?>
        
        <div class="link-box">
            <div class="col-md-9" style="text-align: right;"><a href="/<?= $link['url'] ?>">Узнать прямо сейчас</a></div>
            <div class="col-md-3" style="margin-top: -2px; padding-left: 0; text-align: left;"><a href="/<?= $link['url'] ?>"><i class="fa fa-arrow-circle-right"></i></a></div>
        </div>
        
    </div><!-- /wrap -->

</div>

<?php } ?>
