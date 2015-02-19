<?php
use yii\helpers\Html;
use common\models\Utilities;

$actionName = Yii::$app->controller->action->id;
$articleId =  Yii::$app->request->get('id');
$editUrl = ($articleId) ? ['article/update', 'id' => $articleId] : '#';
?>
<div class="secondary-navigation">
     <ul class="clearfix">
        <li>
            <?= Html::a('Назад', Utilities::backUrl()) ?>
        </li>
        <li class="active">
            <?= Html::a('Заказ', '#') ?>
        </li>
        
    </ul>
</div>