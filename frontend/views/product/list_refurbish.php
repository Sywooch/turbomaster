<?php

use yii\helpers\Html;
use yii\helpers\CommonHelper;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\models\Product;

$this->title = 'Каталог восстановленных турбин - Турбомастер.ру, продажа восстановленных турбин с доставкой по Москве и России, диагностика и ремонт турбин';
$this->title = 'Каталог восстановленных турбин - Турбомастер.ру, продажа восстановленных турбин с доставкой по Москве и России, диагностика и ремонт турбин';
$this->registerMetaTag(['name' => 'description', 'content' => 'В нашем ТурбоМагазине вы можете купить восстановленные турбины для легковых автомобилей, грузовиков и спецтехники. Бесплатная доставка по Москве. Оперативная доставка во все регионы России!']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'каталог турбин, продажа турбин, турбина восстановленная']);
?>

<section id="breadcrumbs">
<?=  
Breadcrumbs::widget([
  'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
  'links' => [
    ['label' => 'ТурбоМагазин'],
    ['label' => 'Восстановленные турбины'],
  ]    
]); 
    ?>
  <h1 class="catalog">Восстановленные турбины</h1>
</section>

<section id="list">

<p>Восстановленные турбины в каталоге ТурбоМагазин – это турбокомпрессоры, прошедшие восстановительный ремонт. Работоспособность и характеристики всех восстановленных турбин проверены, они полностью соответствуют требованиям производителей автомобилей.</p>
<p>Турбины, восстановленные в заводских условиях (так называемые оборотные турбины), официально рекомендованы автопроизводителями для сервисной замены агрегатов, вышедших из строя в процессе эксплуатации.</p>
<p>Как правило, ремонт на заводе предусматривает замену картриджа, устройств регулирования турбины и тщательную очистку корпусных деталей. Характеристики и ресурс оборотных турбин практически идентичны новым турбоагрегатам, в то время как их цена – заметно ниже. На оборотные турбины предоставляется гарантия 6 месяцев.</p>
<p>По внешнему виду отличить оборотную турбину от новой сможет разве что профессионал. Этим пользуются некоторые недобросовестные торговцы, продавая оборотные турбины вместо новых агрегатов.</p>
<p>Как говорится, лучше один раз увидеть, чем сто раз услышать. На приведенных ниже фотографиях показаны две турбины BorgWarner, пользующиеся повышенным спросом: одна - для Hyundai Starex CRDI, другая - для Mazda CX-7. Каждая - в новой и оборотной версиях.</p>
<p>Смотрите, сравнивайте и делайте выводы сами.</p>
<p>Ассортимент восстановленных турбин быстро меняется - наличие и цену уточняйте по тел.: (499) 650-7645, (963) 777-0949, (800) 333-6623.</p>

<section class="photogallery">
        
        <p class="description"></p>
        <div class="jcarousel-wrapper">
          <div class="jcarousel" data-jcarousel="true">
            <ul style="left: 0px; top: 0px;">
              <li><a href="/photo/gallery/big/115.jpg" title="Новая турбина на Хундай Старекс (слева) и оборотная (справа) упакованы в фирменные коробки. Правда, пропорции коробок несколько отличаются." data-fancybox-group="gallery20"><img width="100" height="100" alt="1" src="/photo/gallery/small/115.jpg"></a></li>
              <li><a href="/photo/gallery/big/116.jpg" title="Новый агрегат (слева) упакован тщательнее. При укладке оборотного (справа) пожалели бумаги и полиэтилена. Видимо, упаковщики были из партии 'зеленых'." data-fancybox-group="gallery20"><img width="100" height="100" alt="2" src="/photo/gallery/small/116.jpg"></a></li>
              <li><a href="/photo/gallery/big/117.jpg" title="У оборотной турбины (справа) не хватает некоторых технологических заглушек и шпилек. Кстати, это и у новых изделий - не редкость. Нет и характерной 'загогулины', проставки на входе в корпус компрессора. Не беда: она никогда не ломается и легко переставляется со старой турбины." data-fancybox-group="gallery20"><img width="100" height="100" alt="3" src="/photo/gallery/small/117.jpg"></a></li>
              <li><a href="/photo/gallery/big/118.jpg" title="Корпус компрессора оборотного агрегата (справа) выглядит как новый. Не исключено, что это так и есть. Пневмокамера управления байпасом однозначно новая. Регулировочные детали, как положено, закрашены." data-fancybox-group="gallery20"><img width="100" height="100" alt="4" src="/photo/gallery/small/118.jpg"></a></li>
              <li><a href="/photo/gallery/big/119.jpg" title="Если бы не отсутствующие шпильки, в этом ракурсе обе турбины были бы практически неотличимы." data-fancybox-group="gallery20"><img width="100" height="100" alt="5" src="/photo/gallery/small/119.jpg"></a></li>
              <li><a href="/photo/gallery/big/120.jpg" title="В какой коробке новая турбина для Мазда CX-7, а в какой оборотная? То, что одна упаковка выглядит 'бывалой', ни о чем не говорит - на долгом пути из Европы всякое случается. Вскрытие покажет! " data-fancybox-group="gallery20"><img width="100" height="100" alt="6" src="/photo/gallery/small/120.jpg"></a></li>
              <li><a href="/photo/gallery/big/121.jpg" title="Вот еще одно отличие - в правой коробке турбина без полиэтиленового пакета. Похоже, это и есть оборотный турбоагрегат?" data-fancybox-group="gallery20"><img width="100" height="100" alt="7" src="/photo/gallery/small/121.jpg"></a></li>
              <li><a href="/photo/gallery/big/122.jpg" title="С этой 'точки зрения' обе турбины, новая и оборотная, выглядят абсолютно одинаковыми. Пожалуй, та, что справа, красивее..." data-fancybox-group="gallery20"><img width="100" height="100" alt="8" src="/photo/gallery/small/122.jpg"></a></li>
              <li><a href="/photo/gallery/big/123.jpg" title="У правой турбины отсутствует трубка отбора управляющего давления из улитки компрессора. Нестандартная комплектация - весомый признак оборотного агрегата." data-fancybox-group="gallery20"><img width="100" height="100" alt="9" src="/photo/gallery/small/123.jpg"></a></li>
              <li><a href="/photo/gallery/big/124.jpg" title="Но у турбины справа на фланце есть все шпильки, а у альтернативной их нет. Может, ранее сделанные выводы неверны? Довольно ломать голову: новая турбина на фотографиях слева! " data-fancybox-group="gallery20"><img width="100" height="100" alt="10" src="/photo/gallery/small/124.jpg"></a></li>
            </ul>
          </div>
          <a class="jcarousel-control-prev inactive" href="#" data-jcarouselcontrol="true">‹</a>
          <a class="jcarousel-control-next" href="#" data-jcarouselcontrol="true">›</a>
          <!-- p class="jcarousel-pagination"></p -->
        </div>
      </section>

<?php // echo $this->render('_table_refurbish_static'); ?>
<?php  echo $this->render('_table_refurbish_db', ['products' => $products]); ?>

    </section>


  <div style="margin: 40px 0 40px 0px;">
     <?= $this->render('/layouts/_social_share'); ?>
  </div>



<?= $this->render('/layouts/_form_cart'); ?>

