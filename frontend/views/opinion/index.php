<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Отзывы клиентов - Турбомастер.ру';

$this->registerMetaTag([
    'name' => 'description', 
    'content' => 'Отзывы клиентов Турбомастер.ру о работе интернет-магазина и сервисного центра компании, о турбинах и системах турбонаддува, представленных в онлайн-каталоге.']);

$this->registerMetaTag([
    'name' => 'keywords', 
    'content' => 'отзывы, турбины, турбонаддув, турбомастер']);

?>
    <section id="breadcrumbs">
    <?=  
        Breadcrumbs::widget([
          'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
          'links' => [['label' => 'Отзывы клиентов']]    
        ]); 
    ?>
    
        <h1>Отзывы клиентов</h1>
    </section>

    <article>
        <p>Отзывы клиентов Турбомастер.ру о работе интернет-магазина и сервисного центра компании, о турбинах и системах турбонаддува, представленных в онлайн-каталоге.</p>


        <section style="margin-left: 50px; color: #222; font-weight: bold;">
            <p>Уважаемые посетители, покупатели и партнеры! Предлагаем вам <br>легкий способ <span style="color: red;">сэкономить 1000 рублей</span>. Оставьте отзыв о нашей работе (о сайте, товаре, услугах) и мы гарантированно уменьшим стоимость очередной покупки на указанную сумму. Потратьте 5 минут, напишите несколько слов и ... <span style="color: red;">получите весомую скидку!</span></p>
            <p>Для подтверждения авторства отзыва укажите адрес эл. почты или номер телефона.</p>
        </section>
        
        <a href="#" id="show-opinion-form" class="btn-opinion"></a>
           

        <section id="reviews">
            <ul>
            <?php    
            foreach($items as $item) { 

                $header = '<p><strong>' . $item->name . "</strong></p>\n";
                if($item->company) {
                    $header .= '<p class="grey"><strong>' .$item->company ."</strong></p>\n";
                }
                if($item->city) {
                    $header .= '<p class="grey"><strong>' .$item->city ."</strong></p>\n"; 
                }
                $header .= '<p class="grey">' .date("d-m-Y", strtotime($item->created_at)) ."</p>\n";
                ?>

                <li>
                    <div class="header">
                        <?= $header ?>
                    </div>
                    <div class="content">
                        <?= $item->content ?>
                    </div>
                </li>
            <?php } ?>
            </ul>
        </section>

            <div style="margin-left: 20px;">
            <?php if($pagination) {
                echo \yii\widgets\LinkPager::widget([
                    'pagination' => $pagination,
                ]);
            }  ?>
            </div>
    
    </article>

<?= $this->render('_form'); ?>