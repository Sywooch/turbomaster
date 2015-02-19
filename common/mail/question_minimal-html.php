<?php

use yii\helpers\Html;

$product = \common\models\Product::findById($question->product_id);
$url = \Yii::$app->urlManagerFrontend->createAbsoluteUrl(['product/view', 'id'=> $product['id']]);
?>

<p>Здравствуйте.</p>

<p>На сайте был задан вопрос о товаре: &nbsp;&nbsp;
<?= Html::a($product['name'], $url) ?></p>

<table>
    <tr>
        <td>Имя:</td>
        <td><?= $question['name']  ?></td>
    </tr>
    <tr>
        <td>Телефон:</td>
        <td><?= $question['phone'] ?></td>
    </tr>
    <tr>
        <td>E-mail:</td>
        <td><?= $question['email'] ?></td>
    </tr>
</table>

<br>
<br>
<p>Вопрос:</p>
<p><?= $question['content'] ?></p>

