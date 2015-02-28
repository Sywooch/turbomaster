<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use common\models\PhotoArticle;

$srcMini = '/photo/article/250/' .$photo['src']; 
$srcBig  = '/photo/article/800/' .$photo['src'];
$float  = ($photo['layout'] == PhotoArticle::LAYOUT_LEFT) ? 'left' : 'right';

$img = Html::img($srcMini, ['alt' => $photo['subscribe'], 'style' => 'float: ' .$float .'; width: 190px;']);
?>

<figure class="<?= $float ?>">
    <?= HTML::a($img, [$srcBig], ['class' => 'zoom', 'title' => $photo['subscribe'], 'target' => '_blank']) ?>
</figure>
