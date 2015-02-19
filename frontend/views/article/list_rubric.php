<?php

use yii\helpers\Html;
use yii\helpers\CommonHelper;
use yii\widgets\Breadcrumbs;

$maincategory_name  =  $rubrics[0]['mainrubric_name'];

$this->title = $maincategory_name  .' - Турбомастер.ру';
?>

<section id="breadcrumbs">

<?= Breadcrumbs::widget([
  'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
  'links' => ['label' => $maincategory_name],
]); 
?>
<h1><?= $maincategory_name ?></h1>
</section>


<article> </article>

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