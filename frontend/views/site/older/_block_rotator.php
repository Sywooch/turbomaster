<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use common\models\Mainpage;
?>
<div class="block-rotator">
    
    <div class="h1" style="margin: 2px 0 24px 0;">Спецпредложения</div>
    <ul class="thumb bxslider">
<?php
    $mapper = ['attention' => 'Дефицит', 'sweet' => 'Сладкая цена' ];
    foreach($items as $item) {
        if(in_array($item['type'], ['attention', 'sweet'])) {

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
                <div class="box_warp">
                    <span class="' .$item['type'] .'"></span>
                    <div class="image_warp">' .
                        Html::a($img, $link) .'
                    </div>
                </div>'.
                $item['description'] .'
            </li>';   
            unset($item);
        }
    }
?>
    </ul>
    <div class="clearfix"></div>
