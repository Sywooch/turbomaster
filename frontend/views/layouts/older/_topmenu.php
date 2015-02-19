<?php
use yii\helpers\Html;
?>        
    <ul>
        <li><a href="/">Главная</a></li>
        <li><?= Html::a('О компании', ['site/static', 'view'=>'about']) ?></li>
        <li class="col">
            <a href="#" class="">Гарантия</a>
            <ul>
                <li><?= Html::a('Гарантия', ['site/static', 'view'=>'warranty']) ?></li>
                <li><?= Html::a('Качество турбин', ['site/static', 'view'=>'quality-turbines']) ?></li>
            </ul>
        </li>  
        <li><?= Html::a('Доставка', ['site/static', 'view'=>'delivery']) ?></li>    
        <li><?= Html::a('Оплата',   ['site/static', 'view'=>'payment']) ?></li>    
        <li><?= Html::a('Оптовикам',['site/static', 'view'=>'wholesale']) ?></li>   
        <li><?= Html::a('Отзывы',   ['opinion/index']) ?></li>    
        <li><?= Html::a('Контакты', ['site/static', 'view'=>'contact']) ?></li>    
        <li><?= Html::a('Поиск',    ['search/view']) ?></li>
    </ul>



