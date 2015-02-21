<?php
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

$this->title = 'Результаты поиска - ТурбоМагазин - Турбомастер.ру';
?>


<section id="breadcrumbs">
    <?= Breadcrumbs::widget([
          'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
          'links' => [['label' => 'Турбопоиск']]    
        ]); ?>
</section>
    
    <h1>Турбопоиск</h1>
</section>

<section id="main-search">
    <?= $this->render('/layouts/_form_search', []); ?>         
</section>

<?php
if(isset($noFound))  {
    echo '
    <p style="margin: 80px 0 0 40px; font: 20px Arial,serif;">К сожалению, по вашему запросу ничего не найдено.</p>';
} 

?>