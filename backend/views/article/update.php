<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use backend\assets\AdminAsset;

$this->title = 'ТурбоАдмин :: Редактировать статью';
$this->registerJsFile('js/article.js', ['depends' => [AdminAsset::className()]]);
?>

<?= $this->render('/layouts/leftmenu/articles'); ?>

<div id="main">
    <div id="block-tables" class="block">  

    <?= $this->render('/layouts/topmenu/article'); ?>
        <div class="content">

            <?= (Yii::$app->session->hasFlash('success')) ? '<div id="notice">' .Yii::$app->session->getFlash('success') .'</div>' : ''; ?>

            <?= $this->render('_form', [
                                        'model' => $model,
                                        ]) ?>

        </div><!-- /content -->
    </div><!-- /block-tables  -->
</div><!-- /main  -->