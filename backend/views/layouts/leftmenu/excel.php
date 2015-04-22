<?php
use yii\helpers\Html;

$controllerName = Yii::$app->controller->id;
$actionName = Yii::$app->controller->action->id;
?>

<div id="sidebar">
 <div class="sidebar-menu">
    <div id="toggle_header"></div>

    <div class="block">

      <h3 style="margin: 4px 0 40px 0;">Загрузка из таблиц</h3>

      <ul class="navigation"> 
        <li><?=  HTML::a('1. Каталог',  ['excel/catalog-loader'], ['class' => ($actionName == 'catalog-loader') ? 'active' : '']) ?></li>

        <li><?= HTML::a('2. Прайс целиком',  ['excel/price-loader'], ['class' => ($actionName == 'price-loader') ? 'active' : '']) ?></li>
        
        <li><?= HTML::a('2. Прайс частями',  ['price/index'], ['class' => ($controllerName == 'price') ? 'active' : '']) ?></li>

        <li><?= HTML::a('3. Для тюнинга',  ['excel/tuning-loader'], ['class' => ($actionName == 'tuning-loader') ? 'active' : '']) ?></li>
        

        <li><?= HTML::a('4a. Картриджи',  ['excel/sparepart-loader', 'category_id' => 4], ['class' => ($actionName == 'sparepart-loader' && $_GET['category_id'] == 4) ? 'active' : '']) ?></li>

        <li><?= HTML::a('4б. Актюаторы',  ['excel/sparepart-loader', 'category_id' => 5], ['class' => ($actionName == 'sparepart-loader' && $_GET['category_id'] == 5) ? 'active' : '']) ?></li>
        

        <li><?= HTML::a('Яндекс.Маркет',  ['excel/market-loader'], ['class' => ($actionName == 'market-loader') ? 'active' : '', 'style' => 'margin-top: 20px;']) ?></li>
         
      </ul>

      <h3 style="margin: 40px 0 30px 0;">Выгрузка</h3>

      <ul class="navigation"> 
        <li><?=  HTML::a('Текущий прайс',  ['excel/create-price']) ?></li>


  </div><!-- /block -->
 </div><!-- /sidebar-menu -->
</div><!-- /sidebar -->