<?php

$this->title = 'Продажа турбин: купить турбину (турбокомпрессор) для автомобилей любой марки, цены на турбины, заказ, доставка, установка турбин на авто - ТурбоМастер.ру';

$this->registerMetaTag(['name' => 'description', 'content' => 'Продажа турбин для легковых и грузовых автомобилей, специальной автотехники, цены на установку систем турбонаддува. Информация о наличии и ценах на турбины (турбокомпрессоры), купить турбину онлайн. Техцентр и склад в Москве.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'турбомастер,  продажа  турбин,  цены на турбины, купить турбину, купить турбокмопрессор, цены на турбонаддув, турбина автомобиля']); 

?>
<section id="intro">
    <div class="container-fluid">
        <div class="row">
            <div class="intro-bg">
                <div class="texture-overlay"></div>
                    <div class="col-md-6 nopadding">
                    </div>
                    <div class="col-md-6 nopadding">
                         <?= $this->render('/layouts/_form_search', []); ?> 
                    </div>
                </div>            
            </div>
        </div>
    </div>
</section><!-- / #intro -->

<section id="about">
    <div class="container">
        <div class="row">
            
            <div class="col-md-4">
                <div class="tabbable">
                    <ul class="nav nav-tabs nav-stacked">
                        <li class="active"><a data-toggle="tab" href="#tab1">ТурбоМагазин</a></li>
                        <li class=""><a data-toggle="tab" href="#tab2">ТурбоСервис</a></li>
                        <li class=""><a data-toggle="tab" href="#tab3">ТурбоРемонт</a></li>
                        <li class=""><a data-toggle="tab" href="#tab4">ТурбоИнформация</a></li>
                    </ul>
                </div>
            </div><!-- /.col-md-4 -->
            <div class="col-md-8">
                <div class="tab-content link-dotted" style="margin-left: 20px;">
                    
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row-fluid">
                            <!-- <h4>Турбомастер.ру - это интернет-магазин и собственный техцентр!</h4> -->
                            <p>В ассортименте <a href="/turboshop/passenger">ТурбоМагазина</a> представлены новые, оригинальные и восстановленные турбины для легковых и грузовых автомобилей, автобусов, строительной и спецтехники. Все турбины из нашего каталога вы можете приобрести как в розницу, так и оптом.</p>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"> 
                                <div class="feature-box-icon">
                                    <i class="fa fa-tags"></i>
                                </div>
                                <div class="feature-box-content">
                                    <h4>3211 турбин</h4>
                                    <p>В наличии и под заказ</p>
                                </div>                          
                            </div>
                            <div class="col-xs-6"> 
                                <div class="feature-box-icon">
                                    <i class="fa fa-thumbs-up"></i>
                                </div>
                                <div class="feature-box-content">
                                    <h4>12 месяцев гарантии</h4>
                                    <p>На все новые турбины</p>
                                </div>                          
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6"> 
                                <div class="feature-box-icon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="feature-box-content">
                                    <h4>География продаж</h4>
                                    <p>Мы отправляем турбины во все регионы России и страны СНГ</p>
                                </div>                          
                            </div>
                            <div class="col-xs-6"> 
                                <div class="feature-box-icon">
                                    <i class="fa fa-language"></i>
                                </div>
                                <div class="feature-box-content">
                                    <h4>Ведущие произодители</h4>
                                    <p>Турбины Garrett, ККК и других лидеров</p>
                                </div>                          
                            </div>
                        </div>

                    </div><!-- .tab-pane -->

                    <div id="tab2" class="tab-pane fade">
                        <div class="row-fluid">
                            <p>Профессиональное решение любых проблем с турбиной: оперативная диагностика неисправностей, проверка параметров системы турбонаддува, регулировка, снятие и установка турбокомпрессора на двигатель а/м любой модели!</p>
                            <p>Обратившись в <a href="/turboservice">ТурбоСервис</a>, вы получите следующие преимущества: профессиональное обслуживание, поддержку гарантии продавца турбокомпрессора.</p>
                            <p>Задайте любой вопрос специалисту ТурбоСервиса по телефону <strong>(499) 391-58-75</strong></p>
                        </div>
                    </div><!-- .tab-pane -->

                    <div id="tab3" class="tab-pane fade">
                        <div class="row-fluid">
                            <h4>ТурбоСервис на все случаи</h4>
                            <p>Профессиональное решение любых проблем с турбиной: оперативная диагностика неисправностей, проверка параметров системы турбонаддува, регулировка, снятие и установка турбокомпрессора на двигатель а/м любой модели!</p>
                            <p>Обратившись в ТурбоСервис, вы получите следующие преимущества: профессиональное обслуживание, поддержку гарантии продавца турбокомпрессора.</p>
                        </div>
                    </div><!-- .tab-pane -->

                    <div id="tab4" class="tab-pane fade">
                        <div class="row-fluid">
                            <h4>ТурбоСервис на все случаи</h4>
                            <p>Профессиональное решение любых проблем с турбиной: оперативная диагностика неисправностей, проверка параметров системы турбонаддува, регулировка, снятие и установка турбокомпрессора на двигатель а/м любой модели!</p>
                            <p>Обратившись в ТурбоСервис, вы получите следующие преимущества: профессиональное обслуживание, поддержку гарантии продавца турбокомпрессора.</p>
                        </div>
                    </div><!-- .tab-pane -->

                </div><!-- /tab-content -->
            </div><!-- /.col-md-8 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

<section id="news">
    <div class="container">
        <div class="col-md-12">
            <?= $this->render('_table_popular', ['populars' => $populars]); ?>
        </div>

    </div>
</section>