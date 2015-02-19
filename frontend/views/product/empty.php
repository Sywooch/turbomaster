<?php

use yii\helpers\Html;
use yii\helpers\CommonHelper;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\models\Product;

$this->title = 'Каталог восстановленных турбин - Турбомастер.ру, продажа восстановленных турбин с доставкой по Москве и России, диагностика и ремонт турбин';
?>

<section id="breadcrumbs">
<?=  
Breadcrumbs::widget([
  'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
  'links' => [
    ['label' => 'ТурбоМагазин'],
  ]    
]); 
    ?>
  <h1>Поиск не дал результатов</h1>
</section>

<section id="list">

    <p></p>

</section>

