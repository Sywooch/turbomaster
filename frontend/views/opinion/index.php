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

<div class="container page-style">
    <div class="row">
        <div class="col-md-9">
            <section id="breadcrumbs">
                <?= Breadcrumbs::widget([
                  'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
                  'links' => [['label' => 'Отзывы клиентов']]]) ?>
            </section>
    
            <h1>Отзывы клиентов</h1>

            <p>Отзывы клиентов Турбомастер.ру о работе интернет-магазина и сервисного центра компании, о турбинах и системах турбонаддува, представленных в онлайн-каталоге.</p>

            <div class="alert alert-warning link-dotted" role="alert">
                Уважаемые посетители, покупатели и партнеры! Предлагаем вам <br>легкий способ <span style="color: red;">сэкономить 1000 рублей</span>. Оставьте отзыв о нашей работе (о сайте, товаре, услугах) и мы гарантированно уменьшим стоимость очередной покупки на указанную сумму. Потратьте 5 минут, напишите несколько слов и ... <span style="color: red;">получите весомую скидку!</span>
                <br>
                Для подтверждения авторства отзыва укажите адрес эл. почты или номер телефона.
                <br><br>
                <a href="#" id="show-opinion-form" class="btn-opinion">Добавьте отзыв</a>
            </div>
                
            <section id="reviews" style="margin-top: 60px;">
                <?php    
                foreach($items as $item) { 

                    $header = '<strong>' . $item->name . '</strong>';
                    if($item->company) {
                        $header .= '<strong>, ' .$item->company .'</strong>';
                    }
                    if($item->city) {
                        $header .= '<strong>, ' .$item->city .'</strong>'; 
                    }
                    $header .= '<span class="grey"> (' .date("d-m-Y", strtotime($item->created_at)) .")</span>";
                    ?>

                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title"> <?= $header ?></h3>
                        </div>
                        <div class="panel-body">
                            <?= $item->content ?>
                        </div>
                    </div>
                <?php } ?>
            </section>

            <div style="margin-left: 20px;">
            <?php if($pagination) {
                echo \yii\widgets\LinkPager::widget([
                    'pagination' => $pagination,
                ]);
            }  ?>
            </div>
            
        </div><!-- /.col-md-9 -->
    </div><!-- /.row -->
</div><!-- /.container -->

<?= $this->render('_form'); ?>