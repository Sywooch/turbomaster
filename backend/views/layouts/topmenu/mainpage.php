<?php
use yii\helpers\Html;
use common\models\Mainpage;
use common\models\Utilities;

$actionName = Yii::$app->controller->action->id;
$type       = Yii::$app->request->get('type');
$typeName   = Mainpage::getName($type);

$linkName   = (in_array($actionName, ['index', 'create'])) ? 'Добавить' : 'Редактировать';
?>

<div class="secondary-navigation">
     <ul class="clearfix">
        <li class="first">&nbsp;</li>
        <li<?= ($actionName == 'index') ? ' class="active"' : '' ?>>
            <?= Html::a($typeName, ['mainpage/index', 'type' => $type]) ?>
        </li>
        <li<?= ($actionName != 'index') ? ' class="active"' : '' ?>>
            <?= Html::a($linkName, ['mainpage/update', 'type' => $type]) ?>
        </li>
    </ul>
</div>