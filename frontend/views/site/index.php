<?php

$this->title = 'Продажа турбин: купить турбину (турбокомпрессор) для автомобилей любой марки, цены на турбины, заказ, доставка, установка турбин на авто - ТурбоМастер.ру';

$this->registerMetaTag(['name' => 'description', 'content' => 'Продажа турбин для легковых и грузовых автомобилей, специальной автотехники, цены на установку систем турбонаддува. Информация о наличии и ценах на турбины (турбокомпрессоры), купить турбину онлайн. Техцентр и склад в Москве.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'турбомастер,  продажа  турбин,  цены на турбины, купить турбину, купить турбокмопрессор, цены на турбонаддув, турбина автомобиля']); 
?>

<?php echo $this->render('_section_intro') ?>
<?php echo $this->render('_section_about', ['news' => $news, 'sweets' => $sweets, 'facts' => $facts, 'opinions' => $opinions]) ?>
<?php echo $this->render('_section_populars', ['populars' => $populars]) ?>

<?= $this->render('/layouts/_form_question'); ?>
<?= $this->render('/layouts/_form_cart'); ?>