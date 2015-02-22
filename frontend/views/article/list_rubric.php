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
            
            <h2><?= $maincategory_name ?></h2>

            <section id="articles-list">
                <ul>
                <?php foreach($rubrics as $rubric) { 
                    ?>
                    <li>
                        <p>
                            <?= Html::a($rubric['name'], ['article/index', 'alias'=>$rubric['alias']]); ?>
                        </p>
                    </li>
            <?php } ?>
                </ul>
            </section>
        </div>
    </div>
</div>