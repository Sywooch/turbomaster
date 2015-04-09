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
            <section class="row">
                <div class="col-md-10">

                    <p>ККК (Kühnle, Kopp&amp;Kausch или 3К) – торговая марка турбин, которые выпускает один из лидеров мирового турбостроения, <a href="/article/turbodivizion-borgwarner-legendarnyj-razgon">концерн BorgWarner</a>. Концерн также хорошо известен работникам автобизнеса как производитель агрегатов трансмиссий и других автомобильных компонентов. BorgWarner предлагает широкую гамму турбин для двигателей в диапазоне мощностей от 20 до 1000 кВт различного применения: для пассажирских и коммерческих автомобилей, локомотивов, судов и промышленных установок.</p>
                    <p>Турбоподразделение концерна было основано на базе двух знаменитых предприятий, занимавшихся разработкой и производством турбокомпрессоров с 50-х годов прошлого века: 3К и Schwitzer. В то время как турбины марки ККК ориентированы преимущественно на легковые автомобили, линейка турбин Schwitzer предназначена для коммерческих автомобилей.</p>
                    <p>В каталоге ТурбоМагазина вы найдете широкий ассортимент турбокомпрессоров ККК, предназначенных для сервисной замены турбин автомобилей всех марок и моделей.</p>
            </div>
        </section>

<?php } elseif($manufacturer_alias == 'honeywell_garrett') {  ?>

        <h1 class="catalog">Турбины (турбокомпрессоры) Garrett</h1>
        <section class="row">
            <div class="col-md-10">
                <p>Garrett (Гарретт) – это легендарная торговая марка турбин, которые выпускает <a href="/article/motor">турбоподразделение концерна Honeywell</a>. На нескольких фирменных заводах концерна, расположенных по всему миру, ежегодно производится порядка 10 млн. «гарреттов». Ассортимент турбин Garrett буквально всеобъемлющий. Он включает модели для бензиновых, дизельных и гибридных двигателей пассажирских автомобилей и коммерческой автотехники рабочим объемом от 0,8 до 100 л.с. </p>
                <p>Турбины Garrett поставляются на конвейеры практически всех основных автопроизводителей. Их можно увидеть под капотом спортивных автомобилей любых классов, в том числе и болидов формулы F1 команды Ferrari.</p>
                <p>В каталоге ТурбоМагазина вы найдете исчерпывающий ассортимент турбокомпрессоров Гаррет для автомобилей всех марок и моделей. Каталог ТурбоМагазина поможет вам определиться с выбором нужной вам модели турбины. Наши квалифицированные специалисты проконсультируют вас и помогут купить турбину Garrett (Гаррет).</p>

                <h3>Инструкция по установке</h3>

                <p>Часто причиной отказа турбокомпрессора становятся досадные ошибки, допущенные при его монтаже. Как правильно установить турбину? Кто ответит на этот вопрос лучше, чем разработчики? Вот какие рекомендации дают специалисты Honeywell Turbo Technologies. <a href="/article/instruktsija-po-ustanovke-turbin-ot-firmy-garrett">Читать далее</a></p>
            </div>
        </section>

<?php } elseif($manufacturer_alias == 'mitsubishi_mhi') {  ?>

    <h1 class="catalog">Турбины (турбокомпрессоры) MHI</h1>
        <section class="row">
            <div class="col-md-10">
                <p> MHI – это одновременно и торговая марка, и аббревиатура названия японской компании-производителя турбин – Mitsubishi Heavy Industries. Как многие продукты японского производства, турбины MHI – высокотехнологичные изделия, изготовленные с применением самых передовых процессов и оборудования. Им отдают предпочтение не только японские автосборочные заводы, но и многие европейские автопроизводители. Турбины MHI поставляются на сборочные конвейеры двигателей Volvo, BMW, VW, Audi и других.</p>
            </div>
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
