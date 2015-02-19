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
    
        <h1 class="catalog">Отзывы клиентов</h1>
    </section>

    <article>
        <p>Отзывы клиентов Турбомастер.ру о работе интернет-магазина и сервисного центра компании, о турбинах и системах турбонаддува, представленных в онлайн-каталоге.</p>
        
        <article id="popup">
        <h1>Оставить отзыв</h1>
            <form id="feedbackform" method="post" action="">
                <input type="hidden" value="feedbackform" id="action" name="action">
                <input type="hidden" value="ajax" id="request" name="request">
                <input type="text" placeholder="Имя" id="name" name="name">
                <input type="tel" placeholder="Телефон" id="phone" name="phone">
                <input type="email" placeholder="E-mail" id="email" name="email">
                <textarea placeholder="Текст отзыва" id="question" name="question"></textarea>
                <div class="link"><p><button>Отправить</button></p></div>
            </form>
        </article>

        <section id="reviews">
            
            <ul>
                <li>
                    Партнеры, спасибо за помощь с ремонтом турбин на бэху Х5М. Оперативно, 
качественно, недорого. Если что - обращайтесь!
                    <span>Техцентр БМВ-Север., 09.09.2013</span>
                </li>
                <li>
                    Турбину получил и уже поставил. Мой Паджерик снова гоняет! Спасибо!
                    <span>Верховодов, 09.09.2013</span>
                </li>
                <li>
                    Долго сомневался, за турбину заплати вперед, да когда до Мурманска 
какойто транспортной довезут, да за доставку еще плати. Позвонил, все объяснили, 
отправили быстро, на четвертый день уже пришла, и всего 350 рублей 
заплатил за доставку. Зря сомневался. 
                    <span>Андрей Иванович,  Апатиты., 09.09.2013</span>
                </li>
                <li>
                    Турбина погнала масло, стал искать. У дилеров цены заоблачные, на экзисте не лучше. 
Хорошо, натолкнулся на сайт Турбомастера. И цена божеская, и привезли через 2 часа 
прямо в сервис. Спасибо, так держать.
                    <span>Василий, 09.09.2013</span>
                </li>
            </ul>
        </section>
    
    </article>

