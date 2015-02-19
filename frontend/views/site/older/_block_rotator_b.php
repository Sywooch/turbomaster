<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use common\models\Mainpage;
?>
<div class="block-rotator">
    
    <div class="h1" style="margin: -2px 0 18px 0;">Спецпредложения</div>
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

            $div = '
                <div class="sweet-thumb" style="background: url(' .$imgSrc .' ) no-repeat;">
                    <span class="' .$item['type'] .'"></span>
                </div>';
            echo 
            '<li>' .
                Html::a($div, $link) .'<p>'.
                $item['description'] .'</p> 
            </li>';   
            unset($item);
        }
    }
?>
    </ul>
