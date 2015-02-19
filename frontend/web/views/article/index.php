<?php

use yii\helpers\Html;
use yii\helpers\CommonHelper;
use yii\widgets\Breadcrumbs;

$category_name      =  $articles[0]['category_name'];
$maincategory_name  =  $articles[0]['maincategory_name'];

$this->title = $maincategory_name  .' - Турбомастер.ру';
?>

<section id="breadcrumbs">

<?php 
$links = [];
if($maincategory_name) 
    $links[] = ['label' => $maincategory_name, 'url' => ['article/rubrics', 'alias' => $articles[0]['maincategory_alias']]];
if($category_name) 
    $links[] = ['label' => $category_name];

echo Breadcrumbs::widget([
  'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
  'links' => $links,    
]); 
?>
<h1 class="catalog" style="margin-bottom: 40px;"><?= $category_name ?></h1>
</section>

<section>
    <ul class="articles">
    <?php 
    foreach($articles as $item) { 
        $link = ['article/view', 'alias' => $item['alias']];

        $random = rand(1, 6);
        $randomPhoto = '/images/samples/sample_' .$random .'.jpg';

        $img = Html::img(CommonHelper::getImageSrc('/photo/article/250/' .$item['mainphoto_src'], $randomPhoto), ['width'=> 180,  'title' => $item['title']]);
            echo 
            '<li>
                <div class="image-warp">' .
                    Html::a($img, $link) .'
                </div>
                <div class="text-warp">
                    <h2>' .Html::a($item['title'], $link) .'</h2>
                    <p>' .Html::a($item['brief'], $link) .'</p>
                </div>
            </li>';   
    } ?>
    </ul>
</section>