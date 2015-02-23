<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\models\Product;

$manufacturer_name    = $products[0]['manufacturer_name'];
$manufacturer_alias   = $products[0]['manufacturer_alias'];

$this->title = 'Турбины ' .$manufacturer_name .' - Турбомастер.ру, продажа турбин  ' .$manufacturer_name .' для автомобилей всех марок, инструкция по установке турбин от фирмы ' .$manufacturer_name;

if($manufacturer_alias == 'honeywell_garrett') {
  $metaDescription = 'Широкий ассортимент турбин (турбокомпрессоров) Garrett для автомобилей всех марок и моделей  двигателей, доставка по Москве и во все регионы России. Инструкция по установке турбин от фирмы Гаррет.';
  $metaKeywords = 'garrett турбины, турбина гаррет, турбокомпрессор garrett, продажа турбин, продажа турбокомпрессоров, Garrett';
  
} elseif($manufacturer_alias == 'borg_warner_schwitzer_3k') {
  $metaDescription = 'Широкий ассортимент турбин ККК (Kopp&Kausch или 3К) германского концерна BorgWarner для автомобилей всех марок и моделей  двигателей  - доставка по Москве и во все регионы России.';
  $metaKeywords = 'турбины ККК, турбина Kopp&Kausch, турбина 3К, продажа турбин, продажа турбокомпрессоров, BorgWarner';

} else {
  $metaDescription = "Широкий ассортимент турбин $manufacturer_name для автомобилей всех марок и моделей  двигателей  - доставка по Москве и во все регионы России.";
  $metaKeywords = "турбины $manufacturer_name, турбокомпрессор $manufacturer_name, продажа турбин, продажа турбокомпрессоров, $manufacturer_name";
}

$this->registerMetaTag(['name' => 'description', 'content' => $metaDescription]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $metaKeywords]);

?>
<div class="container page-style">
    <section id="breadcrumbs">
        <?= Breadcrumbs::widget([
                'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
                'links' => [
                ['label' => 'ТурбоМагазин'],
                ['label' => 'Производители турбин'],
                // ['label' => $manufacturer_name],
            ]]) ?>
    </section>
    <?php
    if($manufacturer_alias == 'borg_warner_schwitzer_3k') {  ?>

        <h1 class="catalog">Турбины ККК</h1>
        <section>
            <p>Турбины ККК (Kopp&amp;Kausch или 3К) - мощность, надежность и экономичность от легендарного германского концерна BorgWarner. В нашем каталоге ТурбоМагазина вы найдете широкий ассортимент турбокомпрессоров ККК для автомобилей всех марок и моделей двигателей.</p>
            <h3>Турбодивизион BorgWarner - легендарный разгон!</h3>
            <p>Концерн BorgWarner обладает опытом разработки агрегатов турбонаддува, который исчисляется многими десятилетиями. Секрет в том, что он был образован на основе двух вошедших в состав концерна авторитетных компаний-производителей турбокомпрессоров &ndash; немецкой Kühnle, Kopp &amp; Kausch (ККК или 3К) и американской Schwitzer. ККК, отсчитывающая свою историю с конца 19-го века, активно занималась разработкой и производством турбокомпрессоров с 1952 года. <a href="/article/turbodivision">Читать далее</a>.</p>
        </section>

<?php } elseif($manufacturer_alias == 'honeywell_garrett') {  ?>

        <h1 class="catalog">Турбины (турбокомпрессоры) Garrett</h1>
        <section>
            <p>Garrett - гарантия надежности и стабильной работы от лидера американского рынка. В нашем каталоге ТурбоМагазина вы найдете широкий ассортимент турбокомпрессоров Гаррет для автомобилей всех марок и моделей двигателей. Если вы предпочитаете турбины Garrett, каталог ТурбоМагазина поможет вам определиться с выбором. Наши квалифицированные специалисты проконсультируют вас и помогут купить турбину Гаррет. В ТурбоМагазине вы можете осуществить свою мечту - купить турбину Garrett.</p>

            <h3>Инструкция по установке</h3>

            <p>Часто причиной отказа турбокомпрессора становятся досадные ошибки, допущенные при его монтаже. Как правильно установить турбину? Кто ответит на этот вопрос лучше, чем разработчики? Вот какие рекомендации дают специалисты Honeywell Turbo Technologies. <a href="/article/instruction">Читать далее</a></p>
        </section>

<?php } else { 
      } ?>

        <h3 style="margin: 20px 0 20px;">Все турбины <?= $manufacturer_name ?>:</h3>

        <section id="models">
            <?= $this->render('_table_manufacturer', ['products' => $products, 'pages' => $pages]); ?>
        </section>
    </div>

<?= $this->render('/layouts/_form_question'); ?>
<?= $this->render('/layouts/_form_cart'); ?>
