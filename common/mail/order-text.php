<?php
use yii\helpers\Html;
?>

Здравствуйте.

Заказ №<?= $order['id'] ?> в магазине "Турбомастер" 

Имя: <?= $order['name'] ?> 
Телефон: <?= $order['phone'] ?> 
E-mail: <?= $order['email']  ?> 
Адрес: <?= $order['address'] ?> 

<?php 
echo (count($lines) > 1) ? 'Заказанные товары:' : 'Заказанный товар:';
?>


<?php
foreach($lines as $line) {  
    $url = \Yii::$app->urlManagerFrontend->createAbsoluteUrl(['product/view', 'id'=> $line['id']]);

    $productName = $line['name'] .' [' .$line['partnumber'] .']'; 

    $price = (!empty($line['price'])) ? ' - ' .$line['price'] . ' руб.' : '';
    echo $productName .' (' .$line['quantity'] .' экз.)' .$price ."\n";     
}

?>