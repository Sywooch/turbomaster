<?php

use yii\helpers\Html;
use yii\helpers\CommonHelper;
use yii\widgets\Breadcrumbs;

$maincategory_name  =  $rubrics[0]['mainrubric_name'];
$this->title = $maincategory_name  .' - Турбомастер.ру';
?>

<div class="container page-style">
    <div class="row">
        <div class="col-md-9">
            <section id="breadcrumbs">
                <?= Breadcrumbs::widget([
                  'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
                  'links' => ['label' => $maincategory_name]]) ?>
            </section>
            
            <h1><?= $maincategory_name ?></h1>

            <section id="articles-list">
                <ul class="rubric-list">
                <?php

                if (null !== $add_links = $rubrics[0]['add_links']) {

                    $links = unserialize($add_links);
                    foreach ($links as $link) { ?>
                         <li><?= Html::a($link['name'], [$link['url']]) ?></li>
                    <?php } 
                }

                foreach ($rubrics as $rubric) { ?>
                    <li><?= Html::a($rubric['name'], ['article/index', 'alias'=>$rubric['alias']]) ?></li>
                <?php } ?>
                </ul>
            </section>
        </div>
    </div>
</div>