<?php 
use yii\helpers\Html;
use yii\helpers\CommonHelper;

if(count($similars) > 0) {
?>

<div class="line_1"></div>

<div class="row similar-list">
    <ul>
        <h3 class="rubric">На ту же тему:</h3>
        <?php 
        foreach($similars as $item) { 

            $link = ['article/view', 'alias' => $item['alias']];
            $random = '/photo/article/samples/sample_' .rand(1, 6) .'.jpg';
            $imgSrc = CommonHelper::getImageSrc('/photo/article/250/' .$item['image'], $random);
            ?>
            <li>
                <div class="col-md-3 col-xs-6">
                    <?= Html::a('<div class="image-box" style="background-image: url(' .$imgSrc .');"></div>', $link) ?>
                    <h4><?= Html::a($item['title'], $link) ?></h4>
                </div>
            </li>
    <?php }  ?>
    </ul>
</div>
<?php }  ?>
