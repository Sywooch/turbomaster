<?php

use yii\helpers\Html;

$start = true;
if (isset($randomOf)) {
    $randomNumber = mt_rand(1, $randomOf);
    $start = ($randomNumber == 1) ? true : false;
}

if ($start && $link) { ?>

<div class="fixblock">
    <div class="content">
        <a class="arrow" href="#"><i class="fa fa-arrow-circle-right"></i></a>
        <div class="title"></div>

        <h4><?= $link['title'] ?></h4>
        <?php 
        if (!empty($link['brief'])) { ?>
            <a href="/<?= $link['url'] ?>">
                <p><?= $link['brief'] ?></p>
            </a>
        <?php } ?>
        
        <a href="/<?= $link['url'] ?>" class="btn btn-danger btn-xs" style="margin: 10px 0 0 60px; color: #fff;">Узнать</a>
    </div><!-- /content -->
</div>

<?php } ?>
