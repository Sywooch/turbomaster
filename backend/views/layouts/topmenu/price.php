<?php
use yii\helpers\Html;
use common\models\Mainpage;
use common\models\Utilities;

$actionName = Yii::$app->controller->action->id;
?>

<div class="secondary-navigation">
     <ul class="clearfix">
        <li class="first">&nbsp;</li>
        <li<?= ($actionName == 'index') ? ' class="active"' : '' ?>>
            <?= Html::a('Загрузка', ['price/index']) ?>
        </li>

        <?php 
        if($countDublicated > 0) { ?>    
        <li<?= ($actionName == 'repair-dublicated') ? ' class="active"' : '' ?>>
            <?= Html::a('Устранить дубли',  ['price/repair-dublicated']) ?>
        </li>
        <?php } ?>
    </ul>
</div>