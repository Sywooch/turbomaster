<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Гарантия - Турбомастер.ру';

$this->registerMetaTag([
    'name' => 'description', 
    'content' => 'Гарантию на ТК и условия ее предоставления определяет производитель. Продавец является субъектом, через которого производитель реализует свои гарантийные обязательства перед покупателем.']);

$this->registerMetaTag([
    'name' => 'keywords', 
    'content' => 'гарантия, турбомастер']);

?>
    <section id="breadcrumbs">
    <?=  
        Breadcrumbs::widget([
          'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
          'links' => [['label' => 'Гарантия']]    
        ]); 
    ?>
    
        <h1 class="catalog">Гарантия</h1>
    </section>

    <article>
    
        <h2>Общие положения</h2>
        
        <ol>
            <li>Гарантия действительна только при наличии у покупателя правильно оформленного гарантийного талона с указанием серийного номера изделия, даты продажи и гарантийного срока, с подписью и печатью продавца.</li>
            <li>Претензии по качеству ТК рассматриваются, если они заявлены в течение гарантийного срока, указанного в талоне.&nbsp;</li>
            <li>Идентификационные данные ТК должны соответствовать указанным в гарантийном талоне.&nbsp;</li>
        </ol>

        <h2>Гарантия сохраняется только при выполнении следующих условий:</h2>

        <ol>
            <li>Модель ТК рекомендована автопроизводителем для данного двигателя.</li>
            <li>ТК не имеет следов механического воздействия и повреждений.</li>
            <li>ТК не разбирался, полностью или частично, не нарушены заводские настройки механизма регулирования.</li>
            <li>Системы двигателя (механическая, топливоподачи и зажигания, впуска, охлаждения, смазки, вентиляции картера, выпуска и нейтрализации отработавших газов) исправны, их параметры соответствуют требованиям автопроизводителя. В частности: давление картерных газов не превышает 50 мм. водяного столба. Разрежение за воздушным фильтром на холостом ходу менее 20 мм. водяного столба.</li>
            <li>Не изменялась штатная программа управления двигателем, в том числе, характеристики воздухо- и топливоподачи.</li>
            <li>ТК был установлен с соблюдением прилагающейся Инструкции по монтажу турбокомпрессора и прочих процедур, предусмотренных автопроизводителем. В подтверждение этого должен быть представлен заказ-наряд с перечнем работ, выполненных автосервисом, или Инструкция, подписанная лицом, ответственным за монтаж.</li>
            <li>При монтаже ТК не применялись герметики.</li>
            <li>Выполнялись правила эксплуатации и обслуживания автомобиля. В том числе, применялось качественное топливо, соответствующее требованиям ТУ, рекомендованное автозаводом моторное масло и соблюдалась периодичность его замены.</li>
            <li>Не использовались промывки и присадки к моторному маслу.</li>
        </ol>

        <h2>Порядок рассмотрения рекламации:</h2>

        <ol>
            <li>Вывод о причине отказа ТК (признание случая гарантийным или нет) делается на основании результата технической экспертизы. Экспертиза ТК выполняется независимым сертифицированным экспертом, имеющим лицензию на проведение данного вида исследования, а в отдельных случаях &ndash; подразделением завода-производителя.</li>
            <li>При возникновении претензии покупатель должен вернуть ТК фирме-продавцу, которая организует проведение экспертизы.</li>
            <li>ТК возвращается полностью укомплектованным, неразобранным и неочищенным.&nbsp;</li>
            <li>Вместе с ТК покупатель представляет гарантийный талон и документы, подтверждающие, что монтаж и запуск турбокомпрессора были выполнены квалифицированными сервисными работниками в соответствие с инструкциями завода-производителя.</li>
            <li>Срок рассмотрения рекламации составляет 14 календарных дней с момента передачи ТК продавцу. В случае отправки ТК на завод-производитель срок экспертизы может увеличиться до 45 дней.</li>
            <li>Эксперт имеет право запросить транспортное средство, на которое устанавливался ТК, для контроля работы турбины в составе двигателя.</li>
            <li>При признании рекламации обоснованной гарантийные обязательства фирмы-производителя ТК реализуются в течение 10 рабочих дней.</li>
            <li>Если случай признан негарантийным, покупатель возмещает затраты на проведение экспертизы ТК.</li>
        </ol>

        <p>Отсутствие подписи покупателя на гарантийном листе не снимает с него ответственность за несоблюдение условий гарантии.</p>
            
    </article>
