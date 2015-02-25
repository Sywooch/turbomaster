<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;


$this->title = 'Оплата - Турбомастер.ру';
$this->registerMetaTag([
    'name' => 'description', 
    'content' => 'Мы принимаем: наличную оплату курьеру, безналичный расчет. Курьеру при доставке или в офисе в случае самовывоза. Только для Москвы и Московской области. В случае наличной оплаты, Вам выдается Гарантийный талон, гарантийная карта и Инструкция по монтажу изделия.']);
$this->registerMetaTag([
    'name' => 'keywords', 
    'content' => 'оплата, турбомастер']);
?>
    
<div class="container page-style">
    <div class="row">
        <div class="col-md-9">
            <section id="breadcrumbs">
                <?= Breadcrumbs::widget([
                    'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl], 'links' => [['label' => 'Оплата']]]) ?>
            </section>
    
            <h1 class="catalog">Оплата</h1>

            <article>
                <p>Наша компания продлила действие акции по бесплатной доставке турбин нашим клиентам. Бесплатная доставка осуществляется во все районы Москвы, для иногородних заказчиков - бесплатная доставка до транспортной компании.</p>
                <h2>Условия оплаты</h2>
                <h3>Наличная оплата</h3>
                <p>Курьеру при доставке или в офисе в случае самовывоза. Только для Москвы и Московской области. В случае наличной оплаты, Вам выдается Гарантийный талон, гарантийная карта и Инструкция по монтажу изделия.</p>
                <h3>Безналичный расчет (+1% суммы заказа)</h3>
                <p>После заказа, мы выставляем Вам счет на оплату (для юридических лиц), или квитанцию (для физических лиц).</p>
                <p>В момент выставления счета Ваш товар бронируется на складе на 6 дней. В этот срок Вы можете оплатить Ваш заказ. Отправка заказа осуществляется на следующий день (в редких случаях на второй день), после поступления оплаты на наш расчетный счет. Вместе с товаром, вы получаете накладные на оплаченные Вами детали.</p>
                <p>Если у Вас возникли какие то трудности с оплатой товара, либо Вам более подходят иные способы оплаты, Вы всегда можете согласовать это с менеджером, связавшись по телефону (495) 617-12-22</p>

                <h3>Наши реквизиты:</h3>

                <p>Общество с ограниченной ответственностью «ТМ-13» (ООО «ТМ-13»)</p>
                <p>ОГРН 5137746006041<br> ИНН/КПП 7704848819/772301001<br> ОКПО 18886043<br> ОКАТО 45286590000<br> Юридический адрес:&nbsp;109316, г. Москва, Волгоградский пр-кт, д. 32, корп. 24.<br> Фактический адрес:&nbsp;<span style="background-color: rgba(255, 255, 255, 0.701961); color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 18.71875px;"></span>109316, г. Москва, Волгоградский проспект, д. 32, корпус 24, оф. 208</p>
                <p><strong>Банковские реквизиты:</strong></p>
                <p>Расчетный счет: №&nbsp;40702810800000017393<br> в ОАО «Промсвязьбанк» (филиал ОАО «Промсвязьбанк»)<br> Корреспондентский счёт № 30101810400000000555 в ОПЕРУ Московского ГТУ Банка России<br> БИК 044525555, ИНН 7744000912, КПП 775001001<br> Генеральный директор: Самохин Максим Сергеевич (на основании Устава)</p>

                <p>E-mail: <a href="mailto:sales@turbomaster.ru">sales@turbomaster.ru</a></p>
            </article>
        </div><!-- /.col-md-9 -->
    </div><!-- /.row -->
</div><!-- /.container -->


