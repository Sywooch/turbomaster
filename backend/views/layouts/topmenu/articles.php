<?php
use yii\helpers\Html;
?>
<div class="secondary-navigation">
    <ul class="clearfix">
        <li class="first">&nbsp;</li>
        <li class="active"><a href="#">Список статей</a></li>
        <li style="margin-right: 100px;"><?= HTML::a('Новая статья', ['article/create']); ?></li>
    </ul>
</div>