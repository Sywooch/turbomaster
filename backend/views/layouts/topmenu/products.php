<?php
use yii\helpers\Html;
?>
<div class="secondary-navigation">
    <ul class="clearfix">
        <li class="first">&nbsp;</li>
        <li class="active"><a href="#" class="clckable">Таблица</a></li>
        <li><a href="#" id="toggle_search_panel" class="clckable">Фильтр</a></li>
        <li style="margin-right: 100px;"><?= HTML::a('Новый товар', ['product/create']); ?></li>
    </ul>
</div>