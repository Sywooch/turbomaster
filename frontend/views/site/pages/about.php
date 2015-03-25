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
        <div class="col-md-12">
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

            <h2>«ТурбоМастер» от А до Я</h2>
            
            <div style="max-width: 500px;">
                <?= $this->render('/site/_gallery') ?>
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
       