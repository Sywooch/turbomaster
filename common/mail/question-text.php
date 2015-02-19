<?php

use yii\helpers\Html;

$product = \common\models\Product::findById($question->product_id);
$url = \Yii::$app->urlManagerFrontend->createAbsoluteUrl(['product/view', 'id'=> $product['id']]);
$message = ($question->type == \common\models\Question::TYPE_COMMON_QUESTION) ? 'был задан вопрос о товаре' : 'была заполнена форма запроса цены у товара';
?>

Здравствуйте.

На сайте <?= $message ?>: <?= Html::a($product['name'], $url) ?>

Имя: <?= $question['name']  ?>
Телефон: <?= $question['phone'] ?>
E-mail: <?= $question['email'] ?>
  
Вопрос:>
<?= $question['content'] ?>
