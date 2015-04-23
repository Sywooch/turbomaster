<?php
use yii\helpers\Html;
use common\models\Category;

$controllerName = Yii::$app->controller->id;
$actionName = Yii::$app->controller->action->id;
?>

<div id="sidebar">
 <div class="sidebar-menu">
    <div id="toggle_header"></div>

    <div class="block">

      <h3 style="margin: 4px 0 20px 0;">Загрузка из таблиц</h3>

      <ul class="navigation"> 
        <li><?=  HTML::a('Каталог',  ['excel/catalog-loader'], ['class' => ($actionName == 'catalog-loader') ? 'active' : '']) ?></li>

        <li style="margin: 20px 0 0 0;"><?= HTML::a('Для тюнинга',  ['excel/tuning-loader'], ['class' => ($actionName == 'tuning-loader') ? 'active' : '']) ?></li>
        <li><?= HTML::a('Картриджи',  ['excel/sparepart-loader', 'category_id' => Category::CARTRIDGE], ['class' => ($actionName == 'sparepart-loader' && $_GET['category_id'] == Category::CARTRIDGE) ? 'active' : '']) ?></li>
        <li><?= HTML::a('Актюаторы',  ['excel/sparepart-loader', 'category_id' => Category::ACTUATOR], ['class' => ($actionName == 'sparepart-loader' && $_GET['category_id'] == Category::ACTUATOR) ? 'active' : '']) ?></li>

        <li style="margin: 20px 0 0 0;"><?= HTML::a('Прайс целиком',  ['excel/price-loader'], ['class' => ($actionName == 'price-loader') ? 'active' : '']) ?></li>
        <li><?= HTML::a('Прайс частями',  ['price/index'], ['class' => ($controllerName == 'price') ? 'active' : '']) ?></li>

        <li style="margin: 30px 0 0 0;"><?= HTML::a('Яндекс.Маркет',  ['excel/market-loader'], ['class' => ($actionName == 'market-loader') ? 'active' : '']) ?></li>
         
      </ul>

      <h3 style="margin: 60px 0 20px 0;">Выгрузка</h3>

      <ul class="navigation"> 
        <li style="margin: 0 0 110px 0;"><?=  HTML::a('Текущий прайс',  ['excel/create-price']) ?></li>


  </div><!-- /block -->
 </div><!-- /sidebar-menu -->
</div><!-- /sidebar -->