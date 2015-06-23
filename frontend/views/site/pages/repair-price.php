<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Цены на ремонт турбин - ТурбоМастер.ру, ремонт турбин дизельных двигателей в Москве';
$this->registerMetaTag([
    'name' => 'description', 
    'content' => 'Цены на ремонт турбин, описание работ. Расширенная общая гарантия на турбокомпрессор и на выполненные работы.']);
$this->registerMetaTag([
    'name' => 'keywords', 
    'content' => 'цены, прайс, прайс-лист, ремонт турбин, ремонт дизельных турбин, ремонт турбин дизельных двигателей, ремонт турбокомпрессоров, турборемонт, гарантия, турбомастер']);
?>

<div class="container page-style">
    <div class="row">
        <div class="col-md-10">
            <section id="breadcrumbs">
                <?= Breadcrumbs::widget([
                  'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
                  'links' => [['label' => 'ТурбоРемонт']]]) ?>
            </section>
    
            <h1>Стоимость ремонта турбины</h1>
            
            <section id="intro">
                <p>Компания «ТурбоМастер» осуществляет ремонт турбин дизельных и бензиновых двигателей автомобилей всех марок.</p>
                <p><strong>Внимание!&nbsp;</strong>Возможность осуществить ремонт турбин в Москве и его объем определяются после дефектовки турбины. Стоимость работ согласуется с клиентом. Дефектовка выполняется в течение суток с момента поступления турбины в ремонт.</p>
                <p>На любые вопросы по теме ТурбоРемонт вам ответят по тел:&nbsp;<strong>(499) 650-76-45</strong>.</p>
                <br>
                <?= $this->render('/layouts/_repair_contact') ?>
            </section>
        


            <h2 style="margin-top: 50px; padding-bottom: 20px; font-size: 22px;">Цены на ремонт турбин</h2>
           
            <div class="table-responsive">
            <table class="table table-striped">
            <thead>
            <tr class="danger"><th>Тип турбины</th><th>Объем ремонта</th><th>Стоимость, руб.</th></tr>
            </thead>
            <tbody>
            <tr>
            <td rowspan="3">Легковой</td>
            <td>Замена ремкомплекта</td>
            <td style="text-align: center;">9900-11200</td>
            </tr>
            <tr>
            <td>Замена ремкомплекта и отдельных деталей</td>
            <td style="text-align: center;">10700-14800</td>
            </tr>
            <tr>
            <td>Замена картриджа</td>
            <td style="text-align: center;">14200-18700</td>
            </tr>
            <tr>
            <td rowspan="3">Грузовой</td>
            <td>Замена ремкомплекта</td>
            <td style="text-align: center;">9800-10500</td>
            </tr>
            <tr>
            <td>Замена ремкомплекта и отдельных деталей</td>
            <td style="text-align: center;">10800-13000</td>
            </tr>
            <tr>
            <td>Замена картриджа</td>
            <td style="text-align: center;">16700-19000</td>
            </tr>
            <tr>
            <td>Грузовой: HX-30, HX-35, HX-40</td>
            <td>Замена картриджа</td>
            <td style="text-align: center;">15700</td>
            </tr>
            <tr>
            <td>Грузовой: HP-55, HP-60, TB-28 (Foton)</td>
            <td>Замена картриджа</td>
            <td style="text-align: center;">12600</td>
            </tr>
            <tr>
            <td rowspan="3">Грузовой: TV, HX-50</td>
            <td>Замена ремкомплекта</td>
            <td style="text-align: center;">19000</td>
            </tr>
            <tr>
            <td>Замена ремкомплекта и отдельных деталей</td>
            <td style="text-align: center;">23800-26500</td>
            </tr>
            <tr>
            <td>Замена картриджа</td>
            <td style="text-align: center;">32900</td>
            </tr>
            <tr>
            <td rowspan="3">Грузовой, с РСА</td>
            <td>Замена ремкомплекта</td>
            <td style="text-align: center;">23400</td>
            </tr>
            <tr>
            <td>Замена ремкомплекта и отдельных деталей</td>
            <td style="text-align: center;">31000</td>
            </tr>
            <tr>
            <td>Замена картриджа</td>
            <td style="text-align: center;">38000</td>
            </tr>
            <tr>
            <td rowspan="4">Грузовой, с РСА (Detroit Diesel Series 60)</td>
            <td>Замена ремкомплекта</td>
            <td style="text-align: center;">39200</td>
            </tr>
            <tr>
            <td>Замена ремкомплекта, отдельных деталей и РСА</td>
            <td style="text-align: center;">43000</td>
            </tr>
            <tr>
            <td>Замена картриджа</td>
            <td style="text-align: center;">48000</td>
            </tr>
            <tr>
            <td>Замена картриджа и РСА</td>
            <td style="text-align: center;">56000</td>
            </tr>
            <tr>
            <td rowspan="3">Грузовой, Schwitzer S2B (КамАЗ)</td>
            <td>Замена ремкомплекта</td>
            <td style="text-align: center;">8400</td>
            </tr>
            <tr>
            <td>Замена ремкомплекта и отдельных деталей</td>
            <td style="text-align: center;">10700</td>
            </tr>
            <tr>
            <td>Замена картриджа</td>
            <td style="text-align: center;">12500</td>
            </tr>
            </tbody>
            </table>
            </div>


            <h3 style="margin-top: 30px;">Фоторепортаж из нашего техцентра</h3>

            <section class="photogallery">
                <div class="row">
                <ul class="gallery-items" style="margin: 20px 0 40px 15px;">
                    <li><a href="/photo/gallery/big/84.jpg" title="Ремонт турбин немыслим без специализированного оборудования." data-fancybox-group="gallery16"><img width="100" height="100" alt="1" src="/photo/gallery/small/84.jpg"></a></li>
                    <li><a href="/photo/gallery/big/85.jpg" title="Турбины ремонтируются по технологиям, рекомендованным производителями. " data-fancybox-group="gallery16"><img width="100" height="100" alt="2" src="/photo/gallery/small/85.jpg"></a></li>
                    <li><a href="/photo/gallery/big/86.jpg" title="В работе используются оригинальные компоненты и запчасти от известных производителей. " data-fancybox-group="gallery16"><img width="100" height="100" alt="3" src="/photo/gallery/small/86.jpg"></a></li>
                    <li><a href="/photo/gallery/big/87.jpg" title="Оригинальный ремкомплект турбины Garrett. " data-fancybox-group="gallery16"><img width="100" height="100" alt="4" src="/photo/gallery/small/87.jpg"></a></li>
                    <li><a href="/photo/gallery/big/88.jpg" title="Оригинальный ремкомплект турбины Borg Warner. " data-fancybox-group="gallery16"><img width="100" height="100" alt="5" src="/photo/gallery/small/88.jpg"></a></li>
                    <li><a href="/photo/gallery/big/89.jpg" title="Возможность ремонта и объем работ уточняются в ходе диагностики турбины (дефектовки). " data-fancybox-group="gallery16"><img width="100" height="100" alt="6" src="/photo/gallery/small/89.jpg"></a></li>
                </ul>
                </div>
            </section>


        </div><!-- /.col-md-9 -->
    </div><!-- /.row -->
</div><!-- /.container -->
