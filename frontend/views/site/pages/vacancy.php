<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Ваканcии - Турбомастер.ру';
$this->registerMetaTag([
    'name' => 'description', 
    'content' => 'Турбомастер приглашает на работу во вновь открывающийся Турбосервис следующих специалистов.']);
$this->registerMetaTag([
    'name' => 'keywords', 
    'content' => 'вакансии, о компании, турбомастер']);
?>
    
<div class="container page-style">
    <div class="row">
        <div class="col-md-12">
            <section id="breadcrumbs">
                <?= Breadcrumbs::widget([
                'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
                'links' => [['label' => 'Вакансии']]]) ?>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <h1>Вакансии</h1>
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
       

