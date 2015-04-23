<?php

use yii\helpers\Html;
use yii\helpers\CommonHelper;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\models\Product;

$this->title = 'Каталог восстановленных турбин - Турбомастер.ру, продажа восстановленных турбин с доставкой по Москве и России, диагностика и ремонт турбин';
$this->registerMetaTag(['name' => 'description', 'content' => 'Каталог картриджей для турбин. Бесплатная доставка по Москве. Оперативная доставка во все регионы России!']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'картриджи для турбин, Mitsubishi, запчасти для турбин']);
?>

<div class="container page-style">
    <section id="breadcrumbs">
        <?= Breadcrumbs::widget([
          'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
          'links' => [
            ['label' => 'ТурбоМагазин'],
            ['label' => 'Картриджи для турбин'],
        ]]) ?>
    </section>
    
    <h1 class="catalog">Картриджи для турбин</h1>

    <section>
        <p>Картридж - главный узел турбокомпрессора, включающий центральный корпус подшипников в сборе с ротором. От качества сборки и балансировки картриджа, а также его текущего состояния в основном зависит работоспособность турбины. Оригинальные картриджи и изделия известных производителей запчастей турбин отличаются высоким качеством изготовления. Каждый картридж, поставляющийся на рынок запчастей, проходит финишную балансировку. В ходе балансировки приводится в допуск остаточный дисбаланс ротора, а также проверяется правильность сборки и работоспособность уплотнений вала. Поэтому ремонт турбины путем замены картриджа считается наиболее надежным методом ремонта.</p>
        <p>Прежде чем покупать картридж турбины, нужно иметь в виду следующее.</p>
        <p>- На рынок запчастей картриджи оригинального качества поставляются далеко не на все модели турбин.</p>
        <p>- Нужно быть уверенным, что вы сможете корректно выполнить его замену. Замена картриджа не такая простая процедура как кажется на первый взгляд. Она требует знаний, применения специнструмента, оборудования для очистки и финальной регулировки турбины.</p>
        <p>- Не всегда замена картриджа полностью устраняет неисправность турбины. Часто помимо картриджа повреждаются корпуса, сопловой аппарат турбины (геометрия), устройства регулирования.</p>
        <p>Надежнее доверить ремонт турбины профессионалам. </p>
        <p>Профессионалы найдут в ТурбоМагазине широкий ассортимент картриджей турбин и смогут получить консультацию наших специалистов по тел. (499) 650-7645.</p>
    </section>

    <section style="margin: 40px 0 40px 0;">
        <?= $this->render('_cartridge_photos'); ?>
    </section>

    <section style="margin: 30px 0 20px;">
        <?= $this->render('_table_sparepart', ['products' => $products, 'pages' => $pages]); ?>
    </section>
</div>


<?= $this->render('/layouts/_form_cart'); ?>
<?= $this->render('/layouts/_form_question'); ?>