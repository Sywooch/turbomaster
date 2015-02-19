<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use common\models\PhotoArticle;

$dir     = '/photo/article';
$srcMini = $dir .'/250/' .$photo['src']; 
$srcBig  = $dir .'/800/' .$photo['src'];

$float  = ($photo['layout'] == PhotoArticle::LAYOUT_LEFT) ? 'left' : 'right';

$img = Html::img($srcMini, ['alt' => $photo['subscribe'], 'style' => 'float: ' .$float .'; width: 190px;']);
echo HTML::a($img, [$srcBig], ['class' => 'zoom', 'title' => $photo['subscribe'], 'target' => '_blank']);

?>


