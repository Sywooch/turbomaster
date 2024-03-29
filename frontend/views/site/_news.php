<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;

if(count($news) > 0 ) { ?>

<div style="position: relative;">
    <ul class="articles-list">
    <?php
    foreach($news as $item) {
        $link = ['article/view', 'alias' => $item['alias']];
        $img = Html::img(CommonHelper::getImageSrc('/photo/article/250/' .$item['mainphoto_src'], '/images/no_image-grey.png'));
        ?>
        <li>
            <div class="row">
                <div class="col-xs-3">
                    <?= Html::a($img, $link); ?>
                </div>
                <div class="col-xs-9 text">
                    <h3><?= $item['title'] ?></h3>
                    <?= Html::a($item['brief'], $link); ?>
                </div>
            </div>
        </li>
    <?php } ?>
    </ul>
    <div class="link-dotted" style="position: absolute; bottom: -10px; right: 10px;">
        <?= Html::a('Все новости', 'articles/news'); ?>
    </div>
</div>
<?php } ?>
