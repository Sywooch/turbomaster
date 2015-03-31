<?php
use yii\helpers\Html;
use common\models\Manufacturer;

?>

<nav class="navbar navbar-default topmenu">
    <div class="container">
    <div class="row">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" style="background: #f0f0f0;" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand visible-xs" href="/" style="padding: 4px 0 0 40px;">
                <img src="/images/logo-red.png" style="width: 150px; height: auto;" role="banner">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                
                <!-- <li class="fa-hover clearfix"><a href="/" style="padding-left: 0; padding-right: 10px;"><i class="fa fa-home"></i></a></li> -->
                <li><a href="/">Главная</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Турбины <span class="caret"></span></a>
                    <ul class="dropdown-menu extended" role="menu">
                        <div class="container">
                        <div class="row">
                            <div class="col-md-4 divider-v">

                                <li class="h4">По применению:</li>

                                <li class="fa-hover clearfix"><a href="/turboshop/passenger"><i class="fa fa-car"></i> Турбины для легковых автомобилей</a></li>

                                <li class="fa-hover clearfix"><a href="/turboshop/trucks"><i class="fa fa-truck"></i> Турбины для грузовиков и спецтехники</a></li>

                                <li class="fa-hover clearfix"><a href="/turboshop/tuning"><i class="fa fa-dashboard"></i> Турбины для тюнинга</a></li>

                                <li class="fa-hover clearfix"><a href="/turboshop/refurbish"><i class="fa fa-recycle"></i> Турбины восстановленные</a></li>
                                
                                <li class="fa-hover clearfix"><a href="/turboshop/ship"><i class="fa fa-ship"></i> Турбины судовые</a></li>
                                
                                <li class="fa-hover clearfix"><a href="/article/turbokit"><i class="fa fa-plug"></i> Турбо кит Нива Шевроле</a></li>
                          
                            </div>
                            <div class="col-md-4 divider-v">
                                <li class="h4">Производителя:</li>
                                
                                <li><a href="/turboshop/manufacturers/honeywell_garrett">Турбины Garrett</a></li>
                                <li><a href="/turboshop/manufacturers/borg_warner_schwitzer_3k">Турбины KKK</a></li>
                                <li><a href="/turboshop/manufacturers/mitsubishi_mhi">Турбины MHI</a></li>
                                <li><a href="/turboshop/manufacturers/ihi">Турбины IHI</a></li>
                                <li><a href="/turboshop/manufacturers/cummins_holset">Турбины Holset</a></li>
                                
                                <?php
                                // $manufacturers = Manufacturer::find()->orderBy('name')->all();
                                // foreach($manufacturers as $manufacturer) {
                                //     echo '<li>' .HTML::a('Турбины ' .$manufacturer['name'],  ['product/index', 'manufacturer_alias' => $manufacturer['alias']]) ."</li>\n";
                                // }
                                ?>  
                            </div>
                            <div class="col-md-4">
                                <li class="h4">Запчасти турбин:</li>
                                <li><a href="/turboshop/cartridges">Картриджи</a></li>
                                <!-- <li><a href="/turboshop/cartridges">Актюаторы</a></li> -->
                            </div>
                        </div>
                        </div>
                    </ul>
                </li><!-- /. ТурбоМагазин -->

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Турбоуслуги <span class="caret"></span></a>
                    <ul class="dropdown-menu extended" role="menu">
                        <div class="container" style="width: 900px;">
                        <div class="row">
                            <div class="col-md-4 divider-v">
                                <li class="h4">Замена турбины</li>
                                <li><a href="/turboservice">Специфика замены турбины</a></li>
                                <li><a href="/price">Стоимость замены турбины</a></li>
                                <li><a href="/articles/bulletins-turboservice">Бюллетени ТурбоСервиса</a></li>
                                <li><a href="/turboservice_gallery">Фоторепортажи ТурбоСервиса</a></li>
                            </div>
                            <div class="col-md-4 divider-v">
                                 <li class="h4">Ремонт турбины</li>
                                <li><a href="/turborepair">Сертифицированный ремонт турбин</a></li>
                                <li><a href="/repair-price">Стоимость ремонта турбины</a></li>
                            </div>
                            <div class="col-md-3">
                                <li class="h4">Диагностика турбины</li>
                                <li><a href="/diagnostics">О диагностике</a></li>

                                <li class="h4" style="margin-top: 20px;">Экспертиза турбины</li>
                                <li><a href="/expertise">Об экспертизе</a></li>
                            </div>

                        </div>
                        </div>
                    </ul>
                </li><!-- /. ТурбоУслуги -->
       
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">ТурбоИнфо <span class="caret"></span></a>
                    <ul class="dropdown-menu extended" role="menu">
                        <div class="row">
                            <div class="col-md-6 divider-v">
                                <li class="h4">Турбо Секреты:</li>
                                <li><a href="/diagnostika">Диагностика неисправностей</a></li>
                                <li><a href="/articles/malfunction">Причины поломок</a></li>
                                <li><a href="/article/indentification">Идентификация турбин</a></li>
                                <li><a href="/articles/rules">Монтаж турбины</a></li>
                                <li><a href="/article/choice">Номера турбин</a></li>
                                <li><a href="/article/construction">Конструкция турбины</a></li>
                                <li><a href="/article/how-does-this-work">Принцип турбонаддува</a></li>
                                <li><a href="/article/petrol-or-fuel-oil">Бензин или дизель?</a></li>
                                <li><a href="/article/glossary">Терминология </a></li>
                                <li><a href="/articles/reference-materials">Справочные данные</a></li>
                            </div>
                            <div class="col-md-6">
                                <div class="vertical-divide-left">
                                    <li class="h4">ТурбоЧтиво:</li>
                                    <li><a href="/articles/manufacturer">Производители турбин</a></li>
                                    <li><a href="/articles/technology">Современные турботехнологии</a></li>
                                    <li><a href="/articles/operation">Эксплуатация турбин</a></li>
                                    <li><a href="/articles/about-turbo">О турбонаддуве</a></li>
                                    <li><a href="/articles/why">Что? Как? Почему?</a></li>
                                </div>
                            </div>
                        </div>
                    </ul>
                </li><!-- /. Чтиво -->

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Покупка <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><?= Html::a('Оплата', ['site/static', 'view' => 'payment']) ?></li>    
                        <li><?= Html::a('Доставка', ['site/static', 'view' => 'delivery']) ?></li>    
                        <li><?= Html::a('Гарантия', ['site/static', 'view' => 'warranty']) ?></li>    
                        <li><?= Html::a('Отзывы', ['opinion/index']) ?></li>    
                        <li><a href="/quality-turbines">Сертификаты турбин</a></li>
                        <li><?= Html::a('Карта продаж', ['#']) ?></li>    
                    </ul>
                </li><!-- /. Покупка -->

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">О компании <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><?= Html::a('Проект ТурбоМастер', ['site/static', 'view'=>'about']) ?></li>    
                        <li><?= Html::a('Контакты', ['site/static', 'view' => 'contact']) ?></li>
                        <li><?= Html::a('Реквизиты', ['site/static', 'view' => 'requisite']) ?></li>
                        <li><?= Html::a('Вакансии', ['site/static', 'view' => 'vacancy']) ?></li>
                        <li><?= Html::a('Сотрудничество', ['site/static', 'view' => 'wholesale']) ?></li>
                        <li><?= Html::a('Фотогаллерея', ['site/static', 'view' => 'photogallery']) ?></li>
                    </ul>
                </li><!-- /. О компании -->

                <li><?= Html::a('Поиск', ['search/index', 'view'=>'about']) ?></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
    </div><!-- /.container -->
</nav>
    