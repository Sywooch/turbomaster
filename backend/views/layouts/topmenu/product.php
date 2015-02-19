<?php
use yii\helpers\Html;
use common\models\Utilities;

$actionName = Yii::$app->controller->action->id;
$productId =  Yii::$app->request->get('id');
$editUrl = ($productId) ? ['product/update', 'id' => $productId] : '#';
?>
<div class="secondary-navigation">
     <ul class="clearfix">
        <li>
            <?= Html::a('Назад', Utilities::backUrl()) ?>
        </li>
        <li<?= (in_array($actionName, ['update', 'create'])) ? ' class="active"' : '' ?>>
            <?= Html::a('Редактировать товар', $editUrl) ?>
        </li>
        <?php if($productId) { ?>
        <li<?= ($actionName == 'photo') ? ' class="active"' : '' ?>> 
            <?= Html::a('Фото', ['product/photo', 'id' => $productId, 'partnumber' => $product['partnumber']]) ?>
        </li>
<?php   }  ?>
    </ul>
</div>