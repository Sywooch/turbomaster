<?php

use yii\helpers\Html;
use yii\helpers\CommonHelper;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\models\Product;

$this->title = 'Каталог восстановленных турбин - Турбомастер.ру, продажа восстановленных турбин с доставкой по Москве и России, диагностика и ремонт турбин';
$this->registerMetaTag(['name' => 'description', 'content' => 'Каталог актюаторов для турбин. Бесплатная доставка по Москве. Оперативная доставка во все регионы России!']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'актюатор, актюаторы для турбин, запчасти для турбин']);
?>

<div class="container page-style">
    <section id="breadcrumbs">
        <?= Breadcrumbs::widget([
          'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
          'links' => [
            ['label' => 'ТурбоМагазин'],
            ['label' => 'Актюаторы для турбин'],
        ]]) ?>
    </section>
    
    <h1 class="catalog">Актюаторы для турбин</h1>

    <section>
        <p>Актуатор (электронный блок управления турбиной или ротационный электронный привод) – важнейший прецизионный компонент современных дизельных турбин с регулируемым сопловым аппаратом (РСА). В просторечии их называют турбинами с изменяемой геометрией. Актуатор управляет положением направляющих лопаток РСА для достижения наиболее эффективной работы турбины во всем диапазоне режимов двигателя. Электронный привод лопаток – надежный элемент турбокомпрессора. Тем не менее, его отказ – не редкость. Как правило, выход из строя актуатора провоцируется неисправностью механизма РСА. Наиболее распространенная неисправность – нарушение подвижности (заклинивание) механизма вследствие коксования его деталей или их повреждения посторонним предметом, попавшим в турбинную часть из камеры сгорания или выпускного коллектора двигателя. Заклинивание приводит к повреждению электродвигателя и/или редуктора электронного актуатора. </p>
        <p>Более детальную информацию о ротационных электронных приводах турбин <a href="http://turbomaster.ru/article/elektronnye-bloki-upravlenija-reasrea">читайте здесь</a>.</p>
        <p>В магазине компании ТурбоМастер вы найдете широкий ассортимент наиболее распространенных и востребованных на рынке электронных блоков турбин. Консультации по вопросам покупки электронных актуаторов - по тел. 8(499)650-7645.</p>
    </section>

    <section style="margin: 30px 0 20px;">
        <?= $this->render('_table_sparepart', ['products' => $products, 'pages' => $pages]); ?>
    </section>
</div>


<?= $this->render('/layouts/_form_cart'); ?>
<?= $this->render('/layouts/_form_question'); ?>