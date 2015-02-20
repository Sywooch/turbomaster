<?php
use yii\helpers\Html;
?>
<header>
    <div class="container">
        <div class="col-md-4">
            <div id="numbers">
                <p><a class="receiver tel" title="Проводной телефон" href="tel:+74996507645">8 (499) 650-76-45</a></p>
                <p><a class="cellphone tel" title="Мобильный телефон" href="tel:+79637770949">8 (963) 777-09-49</a></p>
                <p><a class="freephone tel" title="Бесплатный звонок по России" href="tel:+78003336623">8 (800) 333-66-23</a><br><span class="text">Бесплатные звонки по России!</span></p>
            </div>
        </div>
        <div class="col-md-4">
            <div id="logo">
                <a href="/"><img src="/images/logo.png" alt="Интернет-магазин Турбомастер.ру - продажа турбин для любых автомобилей" title="Интернет-магазин Турбомастер.ру - продажа турбин для любых автомобилей"></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="vc adr">
                <p class="bold">ТурбоМагазин</p>
                <p><span class="locality">Москва</span>, <span class="street-address">Волгоградский проспект,<br>д. 32, к. 24, офис 208</span>
                    <a href="/page/contact#map-turbomaster">
                        <img src="/images/map-icon.png" width="12" height="16" alt="Схема проезда" title="Схема проезда">
                    </a>                    
                </p>
                <p>Время работы:<br><span class="workhours">пн-пт 8:00-19:00, сб 10:00-14:00</span></p>
                <p>E-mail: <a class="email" href="mailto:sales@turbomaster.ru">sales@turbomaster.ru</a><a class="url" href="http://www.turbomaster.ru"></a></p>
            </div>
        </div>
    </div>
</header>

<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu extended" role="menu">
                        <div class="row">
                            <div class="col-md-4">
                                <li class="h4">Турбины по применению:</li>
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                            </div>
                            <div class="col-md-4 vertical-divide">
                                <li class="h4">Турбины по производителю:</li>
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                            </div>
                            <div class="col-md-4 vertical-divide">
                                <li class="h4">Запчасти турбины:</li>
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                            </div>
                        </div>
                       
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>
    