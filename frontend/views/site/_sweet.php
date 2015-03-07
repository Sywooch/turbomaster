<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use common\models\Mainpage;

if(count($sweets) > 0 ) { ?>
    <ul class="articles-list link-red">
    <?php
    $mapper = ['attention' => 'Дефицит', 'sweet' => 'Сладкая цена' ];
    foreach($sweets as $k => $item) {
        if($k > 2) break;
        if(in_array($item['type'], ['attention', 'sweet'])) {

            if(!$link = $item['priority_src']) {
                $link = ['product/view', 
                         'brand_alias'   => $item['brand_alias'], 
                         'model_alias'   => $item['model_alias'], 
                         'partnumber'    => $item['partnumber']];
            }
                
            $imgSrc = Mainpage::getImageSrc($item);
            $img = Html::img(CommonHelper::getImageSrc($imgSrc));
            ?>
            <li>
            <div class="row">
                <div class="col-xs-3" style="margin-bottom: 14px;">
                    <?= Html::a($img, $link); ?>
                </div>
                <div class="col-xs-9 text">
                    <h3><?= $mapper[$item['type']] ?></h3>
                    <?= Html::a($item['description'], $link); ?>
                </div>
            </div>
            </li>
<?php   }
    } ?>
    </ul>
<?php } ?>