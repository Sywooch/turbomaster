<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use yii\widgets\Breadcrumbs;
use common\models\Article;
use common\models\PhotoArticle;
use frontend\assets\AppAsset;

$category_name      =  $article['category_name'];
$maincategory_name  =  $article['maincategory_name'];

$this->registerJsFile('js/article.js', ['depends' => [AppAsset::className()]]);
$this->title = $article['title'] .' - Турбомастер.ру';


if(!empty($article['metadesc'])) {
    $this->registerMetaTag(['name' =>'description','content' => $article['metadesc']]);
} else {
    $this->registerMetaTag(['name' =>'description','content' => $article['title'] .' - Статья в Турбомастер.ру']);
}

if(!empty($article['metakey'])) {
    $this->registerMetaTag(['name' => 'keywords', 'content' => $article['metakey']]);
} else {
    $this->registerMetaTag(['name' => 'keywords', 'content' => 'статья о турбинах, информация о турбокомпрессоре']);
}

$links = [];
if(isset($maincategory_name) && $maincategory_name != 'ТурбоСайт') 
     $links[] = ['label' => $maincategory_name, 'url' => ['article/rubrics', 'alias' => $article['maincategory_alias']]];
if(isset($category_name)) 
    $links[] = ['label' => $category_name, 'url' => ['article/index', 'alias' => $article['category_alias']]];
?>

<div class="container page-style">
    <div class="row">
        <div class="col-md-9">

            <section id="breadcrumbs">
                <?= Breadcrumbs::widget([
                  'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
                  'links' => $links]) ?>
            </section>
            
            <article class="article">
                <h1><?= $article['title'] ?></h1>

                <?php 
                $pars = explode("\n", $article['content']); 
                foreach($pars as $k => $parag) {
                    $hasImage = false;
                    if (isset($photos[$k])) { 
                        $hasImage = true;
                        $layout = ($photos[$k][0]['layout'] == PhotoArticle::LAYOUT_LEFT) ? 'alone_left' : 'gallery';
                    }
                    if( $hasImage && $layout == 'alone_left' )  {
                        echo $this->render('_photo_in_article', ['photo' => $photos[$k][0] ]);
                    }
                    echo (Article::checkIsParagraph($parag)) ? "<p>$parag</p>" : $parag;
                    if( $hasImage && $layout == 'gallery' ) {
                        echo $this->render('_gallery_in_article', ['photos' => $photos[$k] ]);
                    }
                }
                ?>        
            </article>
        </div><!-- /.col-md-9 -->

        <div class="col-md-3 visible-lg visible-md">
            <aside class="sidebar-mini">
                <h3>На ту же тему:</h3>
                <ul>
                    <li>Раз</li>
                    <li>Два</li>
                    <li>Три</li>
                </ul>
            </aside>

        </div><!-- /.col-md-3 -->
    </div><!-- /.row -->
</div>
