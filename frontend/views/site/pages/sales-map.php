<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Карта продаж - Турбомастер.ру';
$this->registerMetaTag([
    'name' => 'description', 
    'content' => 'Карта продаж компании Турбомастер. Все, что вы хотели узнать о нас. Турбомастер.ру - это интернет-магазин и собственный техцентр!']);
$this->registerMetaTag([
    'name' => 'keywords', 
    'content' => 'карта, регионы, продажи, тарифы']);
?>

<div class="container page-style">
    <div class="row">
        <div class="col-md-12">
            <section id="breadcrumbs">
                <?= Breadcrumbs::widget([
                      'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
                      'links' => [['label' => 'О компании']]    
                    ]) ?>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1>Карта продаж</h1>

            <article>
                <div style="margin: 20px 0 20px 0;">
                    <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=qV2DbnATP62QBIC2FRoFrAv82xjla1u9&width=100%&height=500"></script>
                </div>

                <p style="margin: 30px 0 50px;">* Чтобы узнать примерные сроки и стоимость доставки, <span style="color: #b04340;">кликните на маркере</span></p>

                <?=  Html::a('Подробнее о способах и условиях доставки', ['site/static', 'view' => 'delivery'], ['class' => 'underline']) ?>

            </article>
        </div><!-- /.col-md-9 -->
    </div><!-- /.row -->
</div><!-- /.container -->
       