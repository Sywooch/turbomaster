<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Контакты - Турбомастер.ру';
$this->registerMetaTag([
    'name' => 'description', 
    'content' => 'Контакты Турбомагазина и Турбосервиса. Карта и схема проезда. Мы работаем с 8:00 до 19:00.']);
$this->registerMetaTag([
    'name' => 'keywords', 
    'content' => 'контакты, турбомастер']);
?>

<div class="container page-style" style="margin-bottom: 30px;">
    <div class="row">
        <div class="col-md-12">
            <section id="breadcrumbs">
                <?= Breadcrumbs::widget([
                  'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
                  'links' => [['label' => 'Реквизиты']]    
                ]) ?>
            </section>

            <h1 class="catalog">Реквизиты</h1>

                
            <p>Общество с ограниченной ответственностью «ТМ-13» (ООО «ТМ-13»)</p>
            <p>ОГРН 5137746006041<br> ИНН/КПП 7704848819/772301001<br> ОКПО 18886043<br> ОКАТО 45286590000<br> Юридический адрес:&nbsp;109316, г. Москва, Волгоградский пр-кт, д. 32, корп. 24.<br> Фактический адрес:&nbsp;<span style="background-color: rgba(255, 255, 255, 0.701961); color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 18.71875px;"></span>109316, г. Москва, Волгоградский проспект, д. 32, корпус 24, оф. 208</p>

            <h2>Банковские реквизиты:</h2>
            <p>Расчетный счет: №&nbsp;40702810800000017393<br> в ОАО «Промсвязьбанк» (филиал ОАО «Промсвязьбанк»)<br> Корреспондентский счёт № 30101810400000000555 в ОПЕРУ Московского ГТУ Банка России<br> БИК 044525555, ИНН 7744000912, КПП 775001001<br> Генеральный директор: Самохин Максим Сергеевич (на основании Устава)</p>
            <br>

        </div>
    </div>
</div>