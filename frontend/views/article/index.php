<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use yii\widgets\Breadcrumbs;

$category_name = $items[0]['category_name'];
$maincategory_name = $items[0]['maincategory_name'];
$this->title = $maincategory_name .' - Турбомастер.ру';

$links = [];
if($maincategory_name) {
    $links[] = ['label' => $maincategory_name, 'url' => ['article/rubrics', 'alias' => $items[0]['maincategory_alias']]];
}
if($category_name) {
    // $links[] = ['label' => $category_name];
}
?>
<div class="container page-style">
     <div class="row">
        <div class="col-md-9">

            <section id="breadcrumbs">
                <?= Breadcrumbs::widget([
                      'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl], 'links' => $links]) ?>
            </section>
            <?php

            if($category_name) {
                echo "<h1>$category_name</h1>";
            }

            if(count($items) > 0 ) { ?>
            <section style="margin-top: 40px;">
                <ul class="articles-list">
                <?php
                foreach($items as $item) {

                    $link = ['article/view', 'alias' => $item['alias']];
                    $randomPhoto = '/photo/article/samples/sample_' .rand(1, 6) .'.jpg';
                    $img = Html::img(CommonHelper::getImageSrc('/photo/article/250/' .$item['mainphoto_src'], $randomPhoto), ['width'=> 180,  'title' => $item['title']]);
                    ?>
                    <li>
                        <div class="row">
                            <div class="col-md-3">
                                <?= Html::a($img, $link); ?>
                            </div>
                            <div class="col-md-9 text">
                                <h3><?= $item['title'] ?></h3>
                                <?= Html::a($item['brief'], $link); ?>
                            </div>
                        </div>
                    </li>
                <?php } ?>
                </ul>
            </section>
        <?php } ?>
        </div><!-- /.col-md-9 -->

        <div class="col-md-3 visible-lg visible-md">
            <aside class="sidebar-mini">
                <h3>Рубрики</h3>
                <ul>
                    <?php
                    foreach($rubrics as $rubric) {
                    echo '<li>' .Html::a($rubric['name'], ['article/index', 'alias' => $rubric['alias']]) . '</li>';
                    }
                    ?>
                </ul>
            </aside>
        </div><!-- /.col-md-3 -->
    </div><!-- /.row -->
</div><!-- /.container -->

