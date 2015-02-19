<?php
use yii\helpers\Html;
use common\models\Question;

$type = \Yii::$app->request->get('type');
$title = ($type == Question::TYPE_COMMON_QUESTION) ? 'Вопросы' : 'Запросы цены';
$isStateNew = (\Yii::$app->request->get('state') && \Yii::$app->request->get('state') == Question::STATUS_NEW) ? true : false;
?>

<div id="sidebar">
 <div class="sidebar-menu">
    <div id="toggle_header"></div>

    <div class="block">

      <h3 style="margin-top: 4px;"><?= $title ?></h3>

      <ul class="navigation"> 
        <li><?= HTML::a('Требуют ответа',  ['question/index', 'type' => $type, 'state' => Question::STATUS_NEW ], ['class' => ($isStateNew) ? 'active' : '']) ?></li>  
        <li><?= HTML::a('Все',  ['question/index', 'type' => $type], ['class' => ($isStateNew) ? '' : 'active']) ?></li>  
      </ul>

  </div><!-- /block -->
 </div><!-- /sidebar-menu -->
</div><!-- /sidebar -->