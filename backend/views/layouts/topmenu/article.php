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
         <li<?= ($actionName == 'update') ? ' class="active"' : '' ?>> 
            <?= Html::a((in_array($actionName, ['update', 'media'])) ?  'Редактировать статью' : 'Новая статья', $editUrl) ?>
        </li>
        <?php if($articleId) { ?>
        <li<?= ($actionName == 'media') ? ' class="active"' : '' ?>> 
            <?= Html::a('Фото', ['article/media', 'id' => $articleId]) ?>
        </li>
<?php   }  ?>
    </ul>
</div>