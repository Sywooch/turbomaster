<?php
use yii\helpers\Html;
use common\models\Order;

$title = 'Заказы';
?>

<div id="sidebar">
 <div class="sidebar-menu">
    <div id="toggle_header"></div>

    <div class="block">

      <h3 style="margin-top: 4px;"><?= $title ?></h3>

      <ul class="navigation"> 
      
        <li><?= HTML::a('Все',  ['order/index'], ['class' => (empty($_GET['state'])) ? 'active' : '']) ?></li>  
        <li><?= HTML::a('Новые',  ['order/index', 'state' => Order::STATE_NEW], ['class' => (isset($_GET['state']) && $_GET['state'] == Order::STATE_NEW) ? 'active' : '']) ?></li>  
        <li><?= HTML::a('Подтверждены',  ['order/index', 'state' => Order::STATE_CONFIRMED], ['class' => (isset($_GET['state']) && $_GET['state'] == Order::STATE_CONFIRMED) ? 'active' : '']) ?></li>  
        <li><?= HTML::a('Выполнены',  ['order/index', 'state' => Order::STATE_EXECUTED], ['class' => (isset($_GET['state']) && $_GET['state'] == Order::STATE_EXECUTED) ? 'active' : '']) ?></li>  
        <li><?= HTML::a('Ошибочные',  ['order/index', 'state' => Order::STATE_ERROR], ['class' => (isset($_GET['state']) && $_GET['state'] == Order::STATE_ERROR) ? 'active' : '']) ?></li>  
      </ul>

  </div><!-- /block -->
 </div><!-- /sidebar-menu -->
</div><!-- /sidebar -->