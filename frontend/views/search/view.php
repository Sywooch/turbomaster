<?php
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

$this->title = 'Результаты поиска - ТурбоМагазин - Турбомастер.ру';
?>

<div class="container page-style">
    <section id="breadcrumbs">
    <?= Breadcrumbs::widget([
          'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
          'links' => [['label' => 'Турбопоиск']]]) ?>
    </section>
    
    <h1>Турбопоиск</h1>

    <?php
    if(isset($noFound))  {
        echo '
        <p style="">К сожалению, по вашему запросу ничего не найдено. Попробуйте уточнить критерии поиска.</p>';
    } 
    ?>

    <section id="main-search">
        <?= $this->render('/layouts/_form_search', []); ?>         
    </section>

</div>
