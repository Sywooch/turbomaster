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
        <?= Html::a($link['title'], '/' .$link['url']) ?>
    </div>
</div>

<?php } ?>
