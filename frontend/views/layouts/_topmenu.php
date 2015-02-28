<?php
use yii\helpers\Html;
?>

<nav class="navbar navbar-default topmenu">
    <div class="container">
    <div class="row">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- <a class="navbar-brand" href="#">Brand</a> -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
  <!--          <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li> -->
                
                <li class="fa-hover clearfix"><a href="/" style="padding-left: 0; padding-right: 2px;"><i class="fa fa-home"></i></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Турбины <span class="caret"></span></a>
                    <ul class="dropdown-menu extended" role="menu">
                        <div class="container">
                        <div class="row">
                            <div class="col-md-5 divider-v">

                                <li class="h4">Турбины по применению:</li>

                                <li class="fa-hover clearfix"><a href="/turboshop/passenger"><i class="fa fa-car"></i> Турбины для легковых автомобилей</a></li>

                                <li class="fa-hover clearfix"><a href="/turboshop/trucks"><i class="fa fa-truck"></i> Турбины для грузовиков и спецтехники</a></li>

                                <li class="fa-hover clearfix"><a href="/turboshop/tuning"><i class="fa fa-dashboard"></i> Турбины для тюнинга</a></li>

                                <li class="fa-hover clearfix"><a href="/turboshop/refurbish"><i class="fa fa-recycle"></i> Турбины восстановленные</a></li>
                                
                                <li class="fa-hover clearfix"><a href="/turboshop/ship"><i class="fa fa-ship"></i> Турбины судовые</a></li>
                            </div>
                            <div class="col-md-4 divider-v">
                                <li class="h4">Турбины производителя:</li>
                                <li><a href="/turboshop/manufacturers/honeywell_garrett">Турбины Garrett</a></li>
                                <li><a href="/turboshop/manufacturers/borg_warner_schwitzer_3k">Турбины KKK</a></li>
                                <li><a href="#">Something else here</a></li>
                            </div>
                            <div class="col-md-3">
                                <li class="h4">Запчасти для турбины:</li>
                                <li><a href="/turboshop/cartridges">Картриджи для турбин</a></li>
                                <li><a href="/article/turbokit">Турбо кит Нива Шевроле</a></li>
                            </div>
                        </div>
                        </div>
                    </ul>
                </li><!-- /. ТурбоМагазин -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Сервис <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/turboservice">Замена турбины - дело тонкое</a></li>
                        <li><a href="/price">Стоимость замены турбины</a></li>
                        <li><a href="/turboservice_gallery">Фоторепортажи ТурбоСервиса</a></li>
                        <li><a href="/articles/bulletins-turboservice">Бюллетени ТурбоСервиса</a></li>
                    </ul>
                </li><!-- /. ТурбоСервис -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ремонт <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/turborepair">Профессиональный ремонт турбин</a></li>
                        <li><a href="/repair-price">Стоимость ремонта турбины</a></li>
                    </ul>
                </li><!-- /. ТурбоРемонт -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Инфо <span class="caret"></span></a>
                    <ul class="dropdown-menu extended" role="menu">
                        <div class="row">
                            <div class="col-md-6 divider-v">
                                <li class="h4">ТурбоИнформация:</li>
                                <li><a href="/article/diagnostika-neispravnostej-turbiny">Диагностика неисправностей турбины</a></li>
                                <li><a href="/article/petrol-or-fuel-oil">Бензин или дизель?</a></li>
                                <li><a href="/article/choice">Номера турбин</a></li>
                                <li><a href="/article/indentification">Идентификация турбокомпрессоров</a></li>
                                <li><a href="/article/construction">Конструкция турбокомпрессора</a></li>
                                <li><a href="/article/how-does-this-work">Принцип работы турбины</a></li>
                                <li><a href="/articles/malfunction">Причины отказов</a></li>
                                <li><a href="/articles/reference-materials">Справочные материалы</a></li>
                                <li><a href="/article/glossary">Глоссарий </a></li>
                                <li><a href="/articles/rules">Монтаж турбины</a></li>
                            </div>
                            <div class="col-md-6">
                                <div class="vertical-divide-left">
                                    <li class="h4">ТурбоЧтиво:</li>
                                    <li><a href="/articles/manufacturer">Производители турбин</a></li>
                                    <li><a href="/articles/technology">Современные турботехнологии</a></li>
                                    <li><a href="/articles/operation">Эксплуатация турбин</a></li>
                                    <li><a href="/articles/about-turbo">О турбонаддуве</a></li>
                                    <li><a href="/articles/why">&laquo;Почему?...Почему?...&raquo;</a></li>
                                </div>
                            </div>
                        </div>
                    </ul>
                </li><!-- /. Чтиво -->                
                <li><?= Html::a('Доставка', ['site/static', 'view' => 'delivery']) ?></li>    
                <li><?= Html::a('Оплата', ['site/static', 'view' => 'payment']) ?></li>    
                <li><?= Html::a('Отзывы', ['opinion/index']) ?></li>    
                <li><?= Html::a('Контакты', ['site/static', 'view' => 'contact']) ?></li>
                <li><?= Html::a('О компании', ['site/static', 'view'=>'about']) ?></li>    
                <li class="fa-hover clearfix"><?= Html::a('<i class="fa fa-search"></i>', ['search/index'], ['style' => '']) ?></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
    </div><!-- /.container -->
</nav>
    