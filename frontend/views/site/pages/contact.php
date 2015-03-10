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
                  'links' => [['label' => 'Контакты']]    
                ]) ?>
            </section>
        </div>

        <div class="col-md-10">
            <h1 class="catalog">Контакты</h1>

            <h2>Офис «ТурбоМастер»</h2>

            <p><strong>Адрес: </strong>109316, г. Москва, Волгоградский проспект, д. 32, корпус 24, оф. 208</p>
            <p><strong>Телефон:</strong> +7 (499) 650-7645</p>
            <p><strong>Мобильный телефон:</strong> +7 (963) 777-0949</p>
            <p><strong>Часы работы:</strong><br> пн-пт: с 8:00 до 19:00<br>сб: с 10:00 до 14:00</p>
            <p>E-mail: <a href="mailto:sales@turbomaster.ru">sales@turbomaster.ru</a></p>
            <h3>Реквизиты</h3>
            <p>Общество с ограниченной ответственностью «ТМ-13» (ООО «ТМ-13»)</p>
            <p>ОГРН 5137746006041<br> ИНН/КПП 7704848819/772301001<br> ОКПО 18886043<br> ОКАТО 45286590000<br> Юридический адрес:&nbsp;109316, г. Москва, Волгоградский пр-кт, д. 32, корп. 24.<br> Фактический адрес:&nbsp;<span style="background-color: rgba(255, 255, 255, 0.701961); color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 18.71875px;"></span>109316, г. Москва, Волгоградский проспект, д. 32, корпус 24, оф. 208</p>
            <h3>Банковские реквизиты:</h3>
            <p>Расчетный счет: №&nbsp;40702810800000017393<br> в ОАО «Промсвязьбанк» (филиал ОАО «Промсвязьбанк»)<br> Корреспондентский счёт № 30101810400000000555 в ОПЕРУ Московского ГТУ Банка России<br> БИК 044525555, ИНН 7744000912, КПП 775001001<br> Генеральный директор: Самохин Максим Сергеевич (на основании Устава)</p>
            <br>

        <a name="map-turbomaster"></a>
        <h3>Проход и проезд в &laquo;ТурбоМастер&raquo;</h3>
            
        <div style="position: relative; width: 680ps; height: 540px; margin: 5px 15px 5px 0;">
            <img src="/images/map/map.jpg" style="display: block; position: absolute; float: none; width: 680px; height: 538px; margin: 0; z-index: 1;">
                
            <a href="/images/map/zoom_1.jpg" class="fancyble" data-fancybox-group="walker">
                <img src="/images/map/point_1.png" style="display: block; position: absolute; float: none; width: 40px; height: 40px; margin: 0; border: none; box-shadow: none;  z-index: 2; top: 139px; left: 270px; cursor: pointer;">
            </a>
            <a href="/images/map/zoom_2.jpg" class="fancyble" data-fancybox-group="walker">
                <img src="/images/map/point_2.png" style="display: block; position: absolute; float: none; width: 40px; height: 40px; margin: 0; border: none; box-shadow: none; z-index: 2; top: 346px; left: 160px; cursor: pointer;">
            </a>
            <a href="/images/map/zoom_3.jpg" class="fancyble" data-fancybox-group="walker">
                <img src="/images/map/point_3.png" style="display: block; position: absolute; float: none; width: 40px; height: 40px; margin: 0; border: none; box-shadow: none; z-index: 2; top: 400px; left: 208px; cursor: pointer;">
            </a>
        </div>
        <p style="margin-bottom: 0px;">Кликните на маркеры  &laquo;1&raquo;, &laquo;2&raquo; и &laquo;3&raquo;, чтобы увидеть фотографии поворотов.
        </p>
                    
        </div><!-- /.col-md-9 -->
    </div><!-- /.row -->
</div><!-- /.container -->

    <div class="container-fluid">
        <div class="row">
            <h3 style="text-align: center; font-size: 21px; color: #888;">Офис &laquo;ТурбоМастер&raquo; на карте &laquo;Яндекса&raquo;</h3>

            <script type="text/javascript" src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard,package.geoObjects&lang=ru-RU"></script>
            
            <div id="map-office" style="width: 100%; height: 400px;"></div>
        </div>
           
        <div class="row" style="background: #f0f0f0; border-top: 3px solid #ddd; ">
            <div class="col-md-4 col-md-offset-4" style="padding-top: 40px; padding-bottom: 10px;">
                <a name="map-turboservice"></a>
                <h2 style="padding-left: 40px;">&laquo;ТурбоСервис&raquo;</h2>
                <br>
                <p><b>Адрес сервиса:</b> г. Реутов, ул. Железнодорожная д.17А</p>
                <p><b>Телефон:</b> +7 (499) 391-5875</p>
                <p><b>Часы работы:</b> ежедневно с 9:00 до 21:00</p>
            </div>
        </div>

        <div class="row" style="background: #f0f0f0;">
            <h3 style="text-align: center; font-size: 21px; color: #888;">Проезд в &laquo;ТурбоСервис&raquo; с шоссе Энтузиастов</h3>
            <div id="map-service-enthusiast" style="width: 100%; height: 400px;"></div>
            
            <h3 style="text-align: center; font-size: 21px; color: #888; padding-top: 20px;">Проезд в &laquo;ТурбоСервис&raquo; с Носовихинского шоссе</h3>

            <div id="map-service-no-owls" style="width: 100%; height: 400px;"></div>
            <script language="javascript" type="text/javascript">
            //<![CDATA[
                var turboMaps = {
                    office:{
                        id:'map-office',
                        center:[55.719754, 37.6903],
                        zoom:15,
                        additional:{
                            point1:{
                                type:'point',
                                coords:[55.719754, 37.6903],
                                icon:'twirl#nightStretchyIcon',
                                title:'Офис &laquo;Турбомастер&raquo;',
                                description:'<p><b>Офис &laquo;Турбомастер&raquo;</b><br>Россия, г. Москва,<br>Волгоградский пр., д. 32, к. 24, офис 208</p>'
                            }
                        }
                    },
                    enthusiast:{
                        id:'map-service-enthusiast',
                        center:[55.757393, 37.881662],
                        zoom:14,
                        additional:{
                            point1:{
                                type:'point',
                                coords:[55.757393, 37.881662],
                                icon:'twirl#nightStretchyIcon',
                                title:'&laquo;ТурбоСервис&raquo;',
                                description:'<p><b>&laquo;ТурбоСервис&raquo;</b><br>Россия, г. Реутов,<br>ул. Железнодорожная., д. 17А</p>'
                            },
                            polyline1:{
                                type:'polyline',
                                title:'Проезд с шоссе Энтузиастов',
                                color:'#006cff99',
                                width:5,
                                points:[[55.77290748513869,37.825869884631125],[55.78269725471361,37.86755141272256],[55.782727484889406,37.86778744711588],[55.782657955438815,37.86808517231652],[55.782503781021326,37.86833998217293],[55.782340536854186,37.86831316008274],[55.782137992203445,37.86805566801727],[55.78130664116514,37.86603864683813],[55.78112827624798,37.86570068850221],[55.780925725276774,37.86553439154329],[55.778694571433135,37.864729728838896],[55.77278653369049,37.86978301062292],[55.7726217367255,37.870032456061246],[55.772541605845646,37.8703677321881],[55.77227248582759,37.876638736864926],[55.77223015216236,37.87714299215974],[55.77201848319081,37.87762578978242],[55.77158304624794,37.877947654864236],[55.76496622266282,37.882357206484755],[55.76480895352727,37.882357206484755],[55.76470007453147,37.88214262976357],[55.76390161921555,37.8787308598966],[55.763051730162616,37.87926193728154],[55.76102825397384,37.880822982928215],[55.760250896514684,37.8776150609464],[55.76022972313985,37.87738975538913],[55.759718533790995,37.87733074679082],[55.757761433099574,37.87675675406164],[55.75735608616295,37.87672456755348],[55.75636387580073,37.8772610093565],[55.75662100591637,37.878800597331065],[55.75725323627275,37.88188513769818]]
                            }
                        }
                    },
                    noowls:{
                        id:'map-service-no-owls',
                        center:[55.757393, 37.881662],
                        zoom:14,
                        additional:{
                            point1:{
                                type:'point',
                                coords:[55.757393, 37.881662],
                                icon:'twirl#nightStretchyIcon',
                                title:'&laquo;ТурбоСервис&raquo;',
                                description:'<p><b>&laquo;ТурбоСервис&raquo;</b><br>Россия, г. Реутов,<br>ул. Железнодорожная., д. 17А</p>'
                            },
                            polyline1:{
                                type:'polyline',
                                title:'Проезд с Носовихинского шоссе',
                                color:'#33cc0099',
                                width:5,
                                points:[[55.734640824008196,37.84108337416355],[55.74061519313465,37.84172710432713],[55.7408633486756,37.84196850313847],[55.741111502644365,37.84212407126133],[55.74186654671187,37.84312721743286],[55.7426215761209,37.844259109637186],[55.74295747627536,37.84489211096471],[55.743254034362046,37.8457718755216],[55.74384411768113,37.84803029551214],[55.744361567997835,37.85015996946994],[55.744461426027016,37.85043355478944],[55.74460969961395,37.85154398932156],[55.74490473209955,37.85178807034192],[55.74751756308181,37.85421010508239],[55.74779214975637,37.85457890882189],[55.748018323008736,37.855033543249974],[55.748143890205895,37.855556574007906],[55.74890636175757,37.859724726817014],[55.74925128444773,37.8614654804677],[55.74930272002399,37.86183160199821],[55.75145236371166,37.87280787183941],[55.75229116144144,37.877083648285286],[55.75240385697304,37.87788328184784],[55.75513870301819,37.876252498766824],[55.755429117836314,37.877840366503605],[55.75637295099779,37.877261009356396],[55.75649395358726,37.878092494151],[55.75726231125571,37.88188513769805]]
                            }
                        }
                    }
                }
                ymaps.ready( mapsInit );
                function mapsInit() {
                    for ( var map in turboMaps ) {
                        if ( turboMaps.hasOwnProperty( map ) ) {
                            turboMaps[map].map = new ymaps.Map( turboMaps[map].id, { center:turboMaps[map].center, zoom:turboMaps[map].zoom } );
                            turboMaps[map].map.controls.add( 'zoomControl' ).add( 'scaleLine' );
                            if ( turboMaps[map].additional ) {
                                turboMaps[map].objects = {};
                                for ( var addItem in turboMaps[map].additional ) {
                                    if ( turboMaps[map].additional.hasOwnProperty( addItem ) ) {
                                        var curItem = turboMaps[map].additional[addItem];
                                        switch ( curItem.type ) {
                                            case 'point':
                                                turboMaps[map].objects[addItem] = new ymaps.Placemark( curItem.coords, { iconContent:curItem.title, balloonContent:curItem.description }, { preset:curItem.icon } );
                                                turboMaps[map].map.geoObjects.add( turboMaps[map].objects[addItem] );
                                                break;
                                            case 'polyline':
                                                turboMaps[map].objects[addItem] = new ymaps.Polyline( curItem.points, { hintContent:curItem.title }, { strokeColor:curItem.color, strokeWidth:curItem.width } );
                                                turboMaps[map].map.geoObjects.add( turboMaps[map].objects[addItem] );
                                                turboMaps[map].map.setBounds( turboMaps[map].objects[addItem].geometry.getBounds() );
                                                break;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            //]]>
            </script>

</div>
</div>