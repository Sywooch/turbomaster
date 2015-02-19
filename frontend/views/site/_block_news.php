<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
?>

<?php
    if(count($items)>0) { ?>
        <section class="teaser">
            <div class="h1">Новости</div>
                <ul class="thumb news">
        <?php
        foreach($items as $item) {

            $link = ['article/view', 'alias' => $item['alias']];

            $img = Html::img(CommonHelper::getImageSrc('/photo/article/250/' .$item['mainphoto_src'], '/images/no_image-grey.png'), ['width'=>180,  'title'=>$item['title'], 'style' => 'position: absolute; top: -20px;']);
            echo 
            '<li>
                <div class="image_warp">' .
                    Html::a($img, $link) .'
                </div>
                <h2>' .Html::a($item['title'], $link) . '</h2>'.
                $item['brief'] .'
            </li>';   
        } ?>
            </ul>
        </section>
        <?php
    }
?>
    </ul>
