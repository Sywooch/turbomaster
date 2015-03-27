<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Диагностика турбины  - Турбомастер.ру';
$this->registerMetaTag([
    'name' => 'description', 
    'content' => 'Турбина диагностируется мастерами ремонтного цеха с применением специальных средств контроля и испытательного оборудования: пневматических и электронных тестеров, калибраторов, балансировочного стенда.']);
$this->registerMetaTag([
    'name' => 'keywords', 
    'content' => 'диагностика, турбина, испытательное оборудование, тестер, восстановительный ремонт, пневматический тестер, электронный тестер, калибратор, балансировочный стенд, повреждения, работоспособность турбины']);
?>

<div class="container page-style">
    <div class="row">
        <div class="col-md-12">
            <section id="breadcrumbs">
                <?= Breadcrumbs::widget([
                  'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
                  'links' => [['label' => 'Диагностика турбины']]    
                ]) ?>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <h1 class="catalog">Диагностика турбины</h1>

            <article>
                <h2>Что такое диагностика турбины?</h2>

                <p>Диагностика турбины – это определение текущего состояния турбины,  снятой с автомобиля.</p>
                <p>Диагностика позволяет ответить на вопросы:</p>

                <ul>
                    <li>работоспособна турбина или нет;</li>
                    <li>каковы повреждения и чем они предположительно вызваны;</li>
                    <li>возможен ли восстановительный ремонт турбины и сколько он может стоить.</li>
                </ul>
                <p>Турбина диагностируется мастерами ремонтного цеха с применением специальных средств контроля и испытательного оборудования: пневматических и электронных тестеров, калибраторов, балансировочного стенда. В зависимости от конкретной ситуации она может выполняться с частичной или полной разборкой турбокомпрессора.</p>
                <p>Результаты диагностики турбины передаются заказчику в устной форме.</p>
                <p>В случае необходимости получения официального заключения о состоянии турбины и причинах ее отказа заказчик может воспользоваться услугой <a href="/expertise" style="text-decoration: underline;">«Экспертиза турбины»</a>.</p>

                <h2>Срок диагностики турбины.</h2>
                <p>Инструментальная диагностика турбины выполняется в течение 1-2 рабочих дней. </p>

                <h2>Стоимость диагностики турбины.</h2>
                <p>Диагностика турбины стоит от 3000 до 5000 руб в зависимости от конструктивной сложности агрегата (трудоемкости сборочно-разборочных операций).</p>

                <h2>Прием турбин на диагностику.</h2>
                <p>На диагностику турбины принимаются в офисе компании «ТурбоМастер» <a href="/contact#map-turbomaster" style="text-decoration: underline;">по адресу</a>: Волгоградский проспект, д.32, кор.24, офис208. Агрегаты принимаются в неразобранном виде, полностью укомплектованными. </p>

            </article>
        </div><!-- /.col-md-9 -->
    </div><!-- /.row -->
</div><!-- /.container -->
       
       
        
