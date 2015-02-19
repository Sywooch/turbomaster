<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use common\models\Mainpage;
?>

    <div class="h1"><?= $title; ?></div>
    <ul class="thumb">
<?php
    foreach($items as $item) {
        if($item['type'] == $type) {

            if(!$link = $item['priority_src']) {
                $link = ['product/view', 
                         'brand_alias'   => $item['brand_alias'], 
                         'model_alias'   => $item['model_alias'], 
                         'partnumber'    => $item['partnumber']];
            }
            
            $imgSrc = Mainpage::getImageSrc($item);
            $topShift = ($item['image_src']) ? 4 : 20;

            $img = Html::img(CommonHelper::getImageSrc($imgSrc, '/images/no_image-grey.png'), ['width'=>133,  'title'=>$item['partnumber'], 'style' => 'position: absolute; top: -' .$topShift .'px;']);
            echo 
            '<li>
                <div class="image_warp">' .
                    Html::a($img, $link) .'
                </div>'.
                $item['description'] .'
            </li>';   
            unset($item);
        }
    }
?>
    </ul>
