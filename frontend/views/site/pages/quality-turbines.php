<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Качество турбин - Турбомастер.ру';

$this->registerMetaTag([
    'name' => 'description', 
    'content' => 'Высокое качество наших товаров подтверждается сертификатами соответствия, выданными российскими органами сертификации продукции.']);

$this->registerMetaTag([
    'name' => 'keywords', 
    'content' => 'сертификаты турбин BorgWarner, сертификаты турбин Honeywell, сертификаты турбин Mitsubishi, качество']);

?>
    <section id="breadcrumbs">
    <?=  
        Breadcrumbs::widget([
          'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
          'links' => [['label' => 'Качество турбин']]    
        ]); 
    ?>
    
        <h1 class="catalog">Качество турбин</h1>
    </section>

    <article>
    
        <p>Высокое качество наших товаров подтверждается сертификатами соответствия, выданными российскими органами сертификации продукции.</p>
        
        <h2>Сертификаты турбин BorgWarner (KKK, Schwitzer)</h2>

        <div class="certificate-items">
            <ul class="bxslider">
                <li>
                    <a class="zoom" rel="group" data-fancybox-group="gallery1" href="/photo/certificate/big/BorgWarner-1.jpg" title="Сертификат турбин BorgWarner (KKK, Schwitzer)">
                        <img  alt="Сертификат турбин BorgWarner (KKK, Schwitzer)" src="/photo/certificate/mini/BorgWarner-1.jpg" title="Сертификат турбин BorgWarner (KKK, Schwitzer)">
                    </a>
                </li>
                <li>
                    <a class="zoom" rel="group" data-fancybox-group="gallery1" href="/photo/certificate/big/BorgWarner-2.jpg" title="Сертификат турбин BorgWarner (KKK, Schwitzer)">
                        <img  alt="Сертификат турбин BorgWarner (KKK, Schwitzer)" src="/photo/certificate/mini/BorgWarner-2.jpg" title="Сертификат турбин BorgWarner (KKK, Schwitzer)">
                    </a>
                </li> 
                <li>
                    <a class="zoom" rel="group" data-fancybox-group="gallery1" href="/photo/certificate/big/BorgWarner-3.jpg" title="Сертификат турбин BorgWarner (KKK, Schwitzer)">
                        <img  alt="Сертификат турбин BorgWarner (KKK, Schwitzer)" src="/photo/certificate/mini/BorgWarner-3.jpg" title="Сертификат турбин BorgWarner (KKK, Schwitzer)">
                    </a>
                </li>
            </ul>
        </div><!-- /.photo-items -->
        <div class="clearfix"></div>

        <h2 style="margin: 60px 0 20px 0;">Сертификаты турбин Honeywell (Garrett)</h2>

         <div class="certificate-items">
            <ul class="bxslider">
                <li>
                    <a class="zoom" rel="group" data-fancybox-group="gallery2" href="/photo/certificate/big/Garrett-1.jpg" title="Сертификат турбин Honeywell (Garrett)">
                        <img  alt="Сертификат турбин Honeywell (Garrett)" src="/photo/certificate/mini/Garrett-1.jpg" title="Сертификат турбин Honeywell (Garrett)">
                    </a>
                </li>
                <li>
                    <a class="zoom" rel="group" data-fancybox-group="gallery2" href="/photo/certificate/big/Garrett-2.jpg" title="Сертификат турбин Honeywell (Garrett)">
                        <img  alt="Сертификат турбин Honeywell (Garrett)" src="/photo/certificate/mini/Garrett-2.jpg" title="Сертификат турбин Honeywell (Garrett)">
                    </a>
                </li>
            </ul>
        </div><!-- /.photo-items -->
        <div class="clearfix"></div>


        <h2 style="margin: 60px 0 20px 0;">Сертификаты турбин Mitsubishi (MHI)</h2>
         <div class="certificate-items">
            <ul class="bxslider">
                <li>
                    <a class="zoom" href="/photo/certificate/big/Mitsubishi-1.jpg" title="Сертификат турбин Mitsubishi (MHI)">
                        <img  alt="Сертификат турбин Mitsubishi (MHI)" src="/photo/certificate/mini/Mitsubishi-1.jpg" title="Сертификат турбин Mitsubishi (MHI)">
                    </a>
                </li>
        </div><!-- /.photo-items -->
        <div class="clearfix"></div>

            
    </article>
