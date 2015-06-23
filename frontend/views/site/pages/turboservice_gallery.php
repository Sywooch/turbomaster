<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Фоторепортажи ТурбоСервиса - ТурбоСервис - Турбомастер.ру';
$this->registerMetaTag([
    'name' => 'description', 
    'content' => 'Фотогалерея самых интересных и напряженных моментов в нашем Турбосервисе. Посмотрите, как мы работаем!']);
$this->registerMetaTag([
    'name' => 'keywords', 
    'content' => 'фото, турбосервис']);
?>

<div class="container page-style">
    <div class="row">
        <div class="col-md-12">
            <section id="breadcrumbs">
                <?= Breadcrumbs::widget([
                  'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
                  'links' => [['label' => 'ТурбоСервис']]]) ?>
            </section>
    
            <h1 class="catalog">Фоторепортажи ТурбоСервиса</h1>

            <p>Фирменный ТурбоСервис компании ТурбоМастер предоставляет клиентам полный спектр услуг по обслуживанию систем турбонаддува как бензиновых, так и дизельных двигателей.</p>
            <p>ТурбоСервис располагается в современном здании, спроектированном специально для авторемонта и расположенном на огороженной, круглосуточно охраняемой территории с удобной парковкой. В здании предусмотрено комфортабельное помещение для ожидания клиентов. Оснащение ТурбоСервиса диагностическим и ремонтным оборудованием соответствует рекомендациям производителей турбокомпрессоров.</p>
            <p>Сотрудники ТурбоСервиса – мастера с большим опытом работы, специализирующиеся в области сервиса систем турбонаддува. Подтверждением сказанному служит размещенный здесь фоторепортаж. Посмотрите как мы живем и работаем!</p>

            <div class="row">
                <div class="col-md-9">
                <section class="photogallery">
                <ul class="gallery-items" style="margin: 20px 0 40px 0px;">
                    <li><a href="/photo/gallery/big/1.jpg" title="За «белым безмолвием» - напряженный ритм Турбосервиса." data-fancybox-group="gallery1"><img width="100" height="100" alt="Снег да снег кругом" src="/photo/gallery/small/1.jpg"></a></li>
                    <li><a href="/photo/gallery/big/83.jpg" title="За внешним спокойствием - напряженная работа ТурбоСервиса" data-fancybox-group="gallery1"><img width="100" height="100" alt="Летний вариант" src="/photo/gallery/small/83.jpg"></a></li>
                    <li><a href="/photo/gallery/big/2.jpg" title="Направо пойдешь &ndash; «коня» потеряешь..." data-fancybox-group="gallery1"><img width="100" height="100" alt="Добро пожаловать" src="/photo/gallery/small/2.jpg"></a></li>
                    <li><a href="/photo/gallery/big/3.jpg" title="Для водилы и блондинки с пассажирского." data-fancybox-group="gallery1"><img width="100" height="100" alt="Присаживайтесь" src="/photo/gallery/small/3.jpg"></a></li>
                    <li><a href="/photo/gallery/big/4.jpg" title="Раз, два &ndash; взяли!" data-fancybox-group="gallery1"><img width="100" height="100" alt="Уииии!!!" src="/photo/gallery/small/4.jpg"></a></li>
                    <li><a href="/photo/gallery/big/5.jpg" title="Работа в партере." data-fancybox-group="gallery1"><img width="100" height="100" alt="Работа в партере." src="/photo/gallery/small/5.jpg"></a></li>
                    <li><a href="/photo/gallery/big/6.jpg" title="Без кувалды и зубила ты не слесарь, а..." data-fancybox-group="gallery1"><img width="100" height="100" alt="Инструмент - это круто" src="/photo/gallery/small/6.jpg"></a></li>
                    <li><a href="/photo/gallery/big/7.jpg" title="Пост сдал &ndash; пост принял." data-fancybox-group="gallery1"><img width="100" height="100" alt="Меняем на новую" src="/photo/gallery/small/7.jpg"></a></li>
                    <li><a href="/photo/gallery/big/8.jpg" title="Мерседес «горячего копчения»." data-fancybox-group="gallery1"><img width="100" height="100" alt="М-м, как в больнице" src="/photo/gallery/small/8.jpg"></a></li>
                    <li><a href="/photo/gallery/big/9.jpg" title="В воздуханах мотора ОМ642 &ndash; «флора» и «фауна» со всей Европы." data-fancybox-group="gallery1"><img width="100" height="100" alt="Biohazard!" src="/photo/gallery/small/9.jpg"></a></li>
                    <li><a href="/photo/gallery/big/10.jpg" title="Предпродажная подготовка двигателя выполнена поверхностно." data-fancybox-group="gallery1"><img width="100" height="100" alt="Руки отрывать" src="/photo/gallery/small/10.jpg"></a></li>
                    <li><a href="/photo/gallery/big/11.jpg" title="С таким клапаном рециркуляции &ndash; не жизнь..." data-fancybox-group="gallery1"><img width="100" height="100" alt="Ёршик нужен" src="/photo/gallery/small/11.jpg"></a></li>
                </ul>
            </section>
            </div>
            </div>

            <div style="margin: 40px 0 0 0;">
                <?= $this->render('/layouts/_service_contact') ?>
            </div>
            
        </div><!-- /.col-md-10 -->
    </div><!-- /.row -->
</div><!-- /.container -->
       


