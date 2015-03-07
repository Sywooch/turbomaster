<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use common\models\PhotoArticle;

$srcMini = '/photo/article/250/' .$photo['src']; 
$srcBig  = '/photo/article/800/' .$photo['src'];
$float  = ($photo['layout'] == PhotoArticle::LAYOUT_LEFT) ? 'left' : 'right';

$img = Html::img($srcMini, ['alt' => $photo['subscribe']]);
?>

<figure class="<?= $float ?>">
    <?= HTML::a($img, [$srcBig], ['class' => 'zoom', 'title' => $photo['subscribe'], 'target' => '_blank']) ?>
    <?php 
    if(!empty($photo['subscribe'])) { 
        echo '<figcaption>' .$photo['subscribe'] .'</figcaption>';
    } 
    ?>
</figure>
