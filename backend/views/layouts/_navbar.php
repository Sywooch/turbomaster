<?php
use yii\helpers\Html;
use common\models\Order; 
use common\models\Question; 

$controllerName = Yii::$app->controller->id;

$newCommonQuestionCount = Question::find()->where(['type' => Question::TYPE_COMMON_QUESTION, 'state' => Question::STATUS_NEW])->count();
$newPriceQuestionCount = Question::find()->where(['type' => Question::TYPE_PRICE_REQUEST, 'state' => Question::STATUS_NEW])->count();
$newOrderCount = Order::find()->where(['state' => Order::STATE_NEW])->count();

?>
    
    <ul>
        <li><?= HTML::a('Товары', ['product/index'], ['class' => ($controllerName == 'product') ? 'active' : '']) ?></li>
        <li><?= HTML::a('Загрузчик', ['excel/catalog-loader'], ['class' => (in_array($controllerName, ['excel', 'price'])) ? 'active' : '']) ?></li>

         <li><?= HTML::a('Заказы', ['order/index', 'state' => Order::STATE_NEW], ['style'=>'padding-right: 1px;', 'class' => ($controllerName == 'order') ? 'active' : '']) ?>
          <?php if($newOrderCount) { echo "<span class=\"count\">$newOrderCount</span>"; } ?>
        </li>
        <li><?= HTML::a('Вопросы', ['question/index', 'type' => Question::TYPE_COMMON_QUESTION, 'state' => Question::STATUS_NEW], ['style'=>'padding-right: 1px;', 'class' => ($controllerName == 'question' && (!\Yii::$app->request->get('type')) && \Yii::$app->request->get('type') == Question::TYPE_COMMON_QUESTION) ? 'active' : '']) ?>
           <?php if($newCommonQuestionCount) { echo "<span class=\"count\">$newCommonQuestionCount</span>"; } ?>
        </li>
        <li><?= HTML::a('Запросы', ['question/index', 'type' => Question::TYPE_PRICE_REQUEST, 'state' => Question::STATUS_NEW], ['style'=>'padding-right: 1px;', 'class' => ($controllerName == 'question' && (!\Yii::$app->request->get('type')) && \Yii::$app->request->get('type') == Question::TYPE_PRICE_REQUEST) ? 'active' : '']) ?>
           <?php if($newPriceQuestionCount) { echo "<span class=\"count\">$newPriceQuestionCount</span>"; } ?>
        </li>
        <li><?= HTML::a('Статьи', ['article/index'], ['class' => ($controllerName == 'article') ? 'active' : '']) ?></li>

        <li class="root">
          <?= HTML::a('Опции', ['product/index'], ['style'=>'padding-right: 1px;', 'class' =>  (in_array($controllerName, ['mainpage', 'menu', 'category', 'brend'])) ? 'active' : '']) ?>
          <ul>
            <li><?= HTML::a('Прайс для Яндекс.Маркета', ['yml/index']) ?></li>
            <li><?= HTML::a('Популярные товары', ['popular/index']) ?></li>
            <li><?= HTML::a('Главная :: Сладкие цены', ['mainpage/index', 'type' => 'sweet']) ?></li>
            <li><?= HTML::a('Главная :: Дефицит', ['mainpage/index', 'type' => 'attention']) ?></li>
            <li><?= HTML::a('Категории транспорта', ['category/index']) ?></li>
            <li><?= HTML::a('Бренды транспорта', ['brand/index']); ?></li>
            <li><?= HTML::a('Бренды турбин', ['manufacturer/index']); ?></li>
            <li><?= HTML::a('Отзывы', ['opinion/index']); ?></li>
          </ul>
        </li>
        
     </ul>
     <div class="clear"></div>