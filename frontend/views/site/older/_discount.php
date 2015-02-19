<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use common\models\Mainpage;
use common\models\Product;
?>

<div id="discount-block">
    <h2 style="font-size: 1.6em;">Внимание: <span style="color: red;">Сладкие цены</span></h2>

<?php
    $persentArray = [30, 15, 25];
    $discountCount = 0;

    foreach($items as $k => $item) {
        if($item['type'] == 'sweet') {

            if(!$link = $item['priority_src']) {
                $link = Product::fullLink($item); 
            }
            
            $imgSrc = Mainpage::getImageSrc($item);
            $topShift = ($item['image_src']) ? 4 : 20;
            $img = Html::img(CommonHelper::getImageSrc($imgSrc, '/images/no_image-grey.png'), ['width'=>133,  'title'=>$item['partnumber'], 'style' => 'position: absolute; top: -' .$topShift .'px;']);
            ?>

                <div class="discount-box">
                    <div class="photo">
                        <?=  Html::a($img, $link) ?>
                    
                        <div class="mask<?php if($discountCount == 0) echo ' gradient'; ?>"></div>
                        <div class="percent">-<?= $persentArray[$discountCount] ?><span>%</span></div>
                    </div>
                    <div class="desc">
                        <?= $item['description'] ?>
                    </div>
                </div>



            <?php 
            unset($item);
            ++$discountCount;
        }
    }
?>
</div>
<div class="clearfix"></div>