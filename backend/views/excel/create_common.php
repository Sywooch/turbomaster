<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use backend\assets\AdminAsset;

$this->title = 'ТурбоАдмин :: Загрузка товаров из таблицы';
$this->registerJsFile('js/excel.js', ['depends' => [AdminAsset::className()]]);
?>

<?= $this->render('/layouts/leftmenu/excel'); ?>

<div id="main">
    <div id="block-tables" class="block">  

    <?= $this->render('/layouts/topmenu/_common', ['title_name' => 'Загрузчик']); ?>
        <div class="content">

            <?= (Yii::$app->session->hasFlash('success')) ? '<div id="notice">' .Yii::$app->session->getFlash('success') .'</div>' : ''; ?>

            <?= $this->render('_form_price', [
                                        // 'model' => $model,
                                        'title' => $title,
                                        ]) ?>

        </div><!-- /content -->
    </div><!-- /block-tables  -->
</div><!-- /main  -->