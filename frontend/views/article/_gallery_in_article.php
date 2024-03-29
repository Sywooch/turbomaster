<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use common\models\PhotoArticle;

$dir = '/photo/article';
if(count($photos) == 1) {

    $src = $dir .'/800/' .$photos[0]['src'];

    echo '<div>' .
    Html::img($src, ['style' => 'width: 600px; float: none;', 'alt' => $photos[0]['subscribe'] ]);
}   else  {    ?>

    <ul class="gallery-items clearfix">
    <?php
    foreach($photos as $photo) {
        $srcMini = $dir .'/100_square/' .$photo['src'];
        $srcBig  = $dir .'/800/' .$photo['src'];
        echo '<li>';
            $img = Html::img($srcMini, ['width' => '100', 'height' => '100' ]);
            echo HTML::a($img, [$srcBig], ['title' => $photo['subscribe'], 'data-fancybox-group' => 'gallery_' .$photo['pos'] ]);
        echo '</li>';
    }  ?>
    </ul>
<?php } ?>
