<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'О компании - Турбомастер.ру';
$this->registerMetaTag([
    'name' => 'description', 
    'content' => 'Информация о компании Турбомастер. Все, что вы хотели узнать о нас. Турбомастер.ру - это интернет-магазин и собственный техцентр!']);
$this->registerMetaTag([
    'name' => 'keywords', 
    'content' => 'компания, турбомастер']);
?>

<div class="container page-style">
    <div class="row">
        <div class="col-md-9">
            <section id="breadcrumbs">
                <?= Breadcrumbs::widget([
                      'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
                      'links' => [['label' => 'О компании']]    
                    ]) ?>
            </section>
  
            <h1 class="catalog">О компании</h1>

            <article>
                <h2>Продажа турбин на автомобили всех марок</h2>
                <p>Турбомастер.ру - это интернет-магазин и собственный техцентр!</p>
                <p>Наша цель - предоставить всестороннюю информационную и техническую поддержку всем, кто так или иначе сталкивается с турбонаддувом в автотехнике. Если вы занимаетесь ремонтом и обслуживанием автомобилей с турбодвигателями, собираетесь приобрести или уже эксплуатируете турбомобиль, увлекаетесь турботюнингом, просто интересуетесь этой перспективной технологией или хотите купить турбину, здесь вы найдете для себя массу полезного.</p>
                <p>В ассортименте ТурбоМагазина представлены новые, оригинальные и восстановленные турбины для легковых и грузовых автомобилей, автобусов, строительной и спецтехники. Все турбины из нашего каталога вы можете приобрести как в розницу, так и оптом.</p>
                <p>Затрудняетесь с выбором? Воспользуйтесь нашим онлайн-сервисом "Быстрый подбор турбины" или позвоните нам по телефону (499) 650-76-45 - наши менеджеры помогут вам найти нужную турбину, или, если это возможно, подобрать ей корректную замену.</p>
                <p><b>Доставка турбины в Москве в пределах 10 км от МКАД - бесплатная!</b> Мы с удовольствием работаем со всеми регионами России! Доставка вашего заказа до транспортной компании - бесплатно! <?= Html::a('Подробнее о тарифах доставки', ['site/static', 'view'=>'delivery']) ?></p>

                <h2>Установка турбин на авто</h2>
                <p>Вам требуется профессиональная помощь по диагностике? Установка турбин на авто? К вашим услугам наш ТурбоСервис! Здесь вы получите полный комплекс сервисных услуг, а также расширенную общую гарантию на турбокомпрессор и на выполненные работы. Задайте любой вопрос специалисту ТурбоСервиса по телефону <b>(499) 391-58-75</b></p>
            </article>

                <div id="slides">
                        <div class="h1">«ТурбоМастер» от А до Я</div>
                        <div class="slideboxContainer slideboxContainer_1"><div class="slidebox">
                            <ul class="slideboxSlides" style="width: 10275px; left: 0px;">
                                <li rel="1" class="slideboxSlide slideboxSlide_1">
                                    <div class="slideboxCaption">
                                        <img width="685" height="457" alt="" src="/photo/gallery/big/90.jpg">
                                        <p>Дай-ка мне, друг, "на палочке"!</p>
                                    </div>
                                </li>
                                <li rel="2" class="slideboxSlide slideboxSlide_2">
                                    <div class="slideboxCaption">
                                        <img width="685" height="457" alt="" src="/photo/gallery/big/91.jpg">
                                        <p>"Привет" от концерна BorgWarner Turbo Systems (БоргУорнер Турбо Системс). </p>
                                    </div>
                                </li>
                                <li rel="3" class="slideboxSlide slideboxSlide_3">
                                    <div class="slideboxCaption">
                                        <img width="685" height="457" alt="" src="/photo/gallery/big/92.jpg">
                                        <p>Турбины на любой вкус: от малышки для Смарта... </p>
                                    </div>
                                </li>
                                <li rel="4" class="slideboxSlide slideboxSlide_4">
                                    <div class="slideboxCaption">
                                        <img width="685" height="457" alt="" src="/photo/gallery/big/93.jpg">
                                        <p>...до гиганта для могучей строительной техники Коматсу. (PICT0034)
                                        </p>
                                    </div>
                                </li>
                                <li rel="5" class="slideboxSlide slideboxSlide_5">
                                    <div class="slideboxCaption">
                                        <img width="685" height="457" alt="" src="/photo/gallery/big/94.jpg">
                                        <p>Интегрированный выпускной коллектор помогает подвести отработавшие газы  к турбине с минимальными потерями энергии.</p>
                                    </div>
                                </li>
                                <li rel="6" class="slideboxSlide slideboxSlide_6">
                                    <div class="slideboxCaption">
                                        <img width="685" height="457" alt="" src="/photo/gallery/big/95.jpg">
                                        <p>Три богатыря: "Наддуем всех...".</p>
                                    </div>
                                </li>
                                <li rel="7" class="slideboxSlide slideboxSlide_7">
                                    <div class="slideboxCaption">
                                        <img width="685" height="457" alt="" src="/photo/gallery/big/96.jpg">
                                        <p>Забил "заряд" я в Шниву туго...</p>
                                    </div>
                                </li>
                                <li rel="8" class="slideboxSlide slideboxSlide_8">
                                    <div class="slideboxCaption">
                                        <img width="685" height="457" alt="" src="/photo/gallery/big/97.jpg">
                                        <p>Компьютерная диагностика двигателя - обязательный этап сервиса системы турбонаддува.</p>
                                    </div>
                                </li>
                                <li rel="9" class="slideboxSlide slideboxSlide_9">
                                    <div class="slideboxCaption">
                                        <img width="685" height="457" alt="" src="/photo/gallery/big/98.jpg">
                                        <p>Источник большинства проблем с турбиной - печальное состояние  смежных систем двигателя.</p>
                                    </div>
                                </li>
                                <li rel="10" class="slideboxSlide slideboxSlide_10">
                                    <div class="slideboxCaption">
                                        <img width="685" height="457" alt="" src="/photo/gallery/big/99.jpg">
                                        <p>Тпр-р-р-у-у-у... Стоя-я-ять... Как у нас с давлением картерных газов? </p>
                                    </div>
                                </li>
                                <li rel="11" class="slideboxSlide slideboxSlide_11">
                                    <div class="slideboxCaption">
                                        <img width="685" height="457" alt="" src="/photo/gallery/big/100.jpg">
                                        <p>Кратчайший путь к турбине Дискавери TDV6 лежит через... демонтаж  кузова.</p>
                                    </div>
                                </li>
                                <li rel="12" class="slideboxSlide slideboxSlide_12">
                                    <div class="slideboxCaption">
                                        <img width="685" height="457" alt="" src="/photo/gallery/big/101.jpg">
                                        <p>Турбинист - человек с чистыми руками. А также с холодной головой  и горячим сердцем (на фото не показаны).</p>
                                    </div>
                                </li>
                                <li rel="13" class="slideboxSlide slideboxSlide_13">
                                    <div class="slideboxCaption">
                                        <img width="685" height="457" alt="" src="/photo/gallery/big/102.jpg">
                                        <p>Оригинальным турбинам - оригинальные запчасти.</p>
                                    </div>
                                </li>
                                <li rel="14" class="slideboxSlide slideboxSlide_14">
                                    <div class="slideboxCaption">
                                        <img width="685" height="457" alt="" src="/photo/gallery/big/103.jpg">
                                        <p>Балансировка ротора турбины выполняется с лазерной точностью.</p>
                                    </div>
                                </li>
                            <li rel="1" class="slideboxSlide slideboxSlide_1">
                                    <div class="slideboxCaption">
                                        <img width="685" height="457" alt="" src="/photo/gallery/big/90.jpg">
                                        <p>Дай-ка мне, друг, "на палочке"!</p>
                                    </div>
                                </li></ul>
                        <a class="slideboxPrevious" href="#"></a><a class="slideboxNext" href="#"></a><div class="slideboxThumbs"><a rel="1" class="slideboxThumb selectedSlideboxThumb" href="#"></a><a rel="2" class="slideboxThumb" href="#"></a><a rel="3" class="slideboxThumb" href="#"></a><a rel="4" class="slideboxThumb" href="#"></a><a rel="5" class="slideboxThumb" href="#"></a><a rel="6" class="slideboxThumb" href="#"></a><a rel="7" class="slideboxThumb" href="#"></a><a rel="8" class="slideboxThumb" href="#"></a><a rel="9" class="slideboxThumb" href="#"></a><a rel="10" class="slideboxThumb" href="#"></a><a rel="11" class="slideboxThumb" href="#"></a><a rel="12" class="slideboxThumb" href="#"></a><a rel="13" class="slideboxThumb" href="#"></a><a rel="14" class="slideboxThumb" href="#"></a></div></div></div>
                    </div>


            <h2>Вакансии</h2>
            <article>
                <p>«ТурбоМастер» приглашает на работу в ТурбоCервис следующих специалистов:</p>
                
                <ol>
                    <li>Мастеров участка диагностики и сервиса систем турбонаддува.</li>
                    <li>Автослесарей, механиков по обслуживанию систем турбонаддува.</li>
                </ol>

                <p>Работа &ndash; сменная, оплата &ndash; сдельная.</p>
                <p>ТурбоCервис находится по адресу: ул. Железнодорожная, д. 17-А (ст. метро Новокосино).</p>
                <p>По вопросам трудоустройства звоните по тел. 8-903-203-39-00 (Сергей Викторович).&nbsp;</p>
                <p>Не упустите возможность стать уникальными специалистами в перспективной области автомобильного сервиса!</p>
            
            </article>
        </div><!-- /.col-md-9 -->
    </div><!-- /.row -->
</div><!-- /.container -->
       