<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Партнеры - Турбомастер.ру';
$this->registerMetaTag([
    'name' => 'description', 
    'content' => 'Партнеры ТурбоМастера']);
$this->registerMetaTag([
    'name' => 'keywords', 
    'content' => 'партнеры, ссылки']);
?>

<div class="container page-style">
    <div class="row">
        <div class="col-md-12">
            <section id="breadcrumbs">
                <?= Breadcrumbs::widget([
                  'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
                  'links' => [['label' => 'Наши партнеры']]]) ?>
            </section>
    
            <h1 class="catalog">Наши партнеры</h1>
    
            <article>
                <p>Серьезный бизнес немыслим без партнерства. Будучи многопрофильной компанией, «ТурбоМастер» в своей работе сотрудничает со множеством фирм, круг которых необычайно широк.</p>  
                <p>Мы рады представить наших партнеров на этой странице.</p>

                <h2>Производители турбин:</h2>
                <section style="margin: 20px 0 0 0;">
                    <ul style="padding-left: 20px;">
                        <li><a href="http://www.turbos.bwauto.com">BorgWarner</a></li>
                        <li><a href="http://turbo.honeywell.com">Honeywell</a></li>
                        <li><a href="http://www.mhi-global.com/products/category/turbocharger.html">MHI</a></li>
                        <li><a href="http://www.cumminsturbotechnologies.com/ctt/index.jsp">Cummins</a></li>
                    </ul>
                </section>

                <h2>Представители российского турборынка:</h2>
                <section style="margin: 20px 0 0 0;">
                    <ul style="padding-left: 20px;">
                        <li><a href="#">Первая компания</a></li>
                        <li><a href="#">Вторая компания</a></li>
                    </ul>
                </section>

                <h2>Транспортные компании:</h2>
                <section style="margin: 20px 0 0 0;">
                    <ul style="padding-left: 20px;">
                        <li><a href="http://www.jde.ru">Желдорэкспедиция</a></li>
                        <li><a href="http://www.baikalsr.ru">Байкал-сервис</a></li>
                        <li><a href="http://www.dellin.ru">Деловые линии</a></li>
                        <li><a href="http://nrg-tk.ru">Энергия</a></li>
                        <li><a href="http://www.ae5000.ru">Автотрейдинг</a></li>
                    </ul>
                </section>

                <h2>Информационные ресурсы:</h2>
                <section style="margin: 20px 0 0 0;">
                    <ul style="padding-left: 20px;">
                        <li><a href="http://abs-magazine.ru">Журнал "АБС-авто"</a></li>
                        <li><a href="#">Второе СМИ</a></li>
                        <li><a href="#">Третье СМИ</a></li>
                    </ul>
                </section>

            </article>
        </div><!-- /.col-md-9 -->
    </div><!-- /.row -->
</div><!-- /.container -->

