<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use backend\assets\AdminAsset;
use common\models\PhotoArticle;

$this->title = 'ТурбоАдмин :: Добавить фото в статью';
$this->registerJsFile('js/article.media.js', ['depends' => [AdminAsset::className()]]);
?>

<?= $this->render('/layouts/leftmenu/articles'); ?>

<div id="main">
    <div id="block-tables" class="block">  

    <?= $this->render('/layouts/topmenu/article'); ?>
        <div class="content media-content" style="width:660px; padding: 40px 0px 40px 80px;">

            <div id="icon_photo"></div>
            <?= $this->render('_form_media_photo', ['article' => $article]); ?>
             
            <h2 style="padding:0 0 40px 0;"><?= $article->title ?></h2>

            <?php
            $parags = explode("\n", $article->content); 


            foreach($parags as $k => $parag)  {
                $hasImage = false;


                if (isset($photos[$k])) { 
                    $hasImage = true;
                    $layout = ($photos[$k][0]['layout'] == PhotoArticle::LAYOUT_LEFT) ? 'alone_left' : 'gallery';
                }
                echo "<a name=\"$k\"></a>";
                // $class = (isset($photos[$k])) ? '' : 'overme';
                $class = 'overme';

                if( $hasImage && $layout == 'alone_left' )  {
                    echo $this->render('_photo_in_article', ['photo' => $photos[$k][0] ]);
                }
                
                if(preg_match("/<h[1-6]/", $parag)) {
                    echo preg_replace('/<h[1-6].*?>(.*?)<\/h[1-6]>/si', 
                        '<p class="heading ' .$class .'"  data-parag="' .$k .'">$1</p>', $parag);
                } else {
                    echo "<p class=\"$class\" data-parag=\"$k\">$parag</p>";
                }

                if( $hasImage && $layout == 'gallery' ) {
                    echo $this->render('_gallery_in_article', ['photos' => $photos[$k] ]);
                }
            } 
            ?>   
        </div><!-- /content -->
    </div><!-- /block-tables  -->
</div><!-- /main  -->
