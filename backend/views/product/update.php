<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use backend\assets\AdminAsset;

$this->title = 'ТурбоАдмин :: Редактировать товар';
$this->registerJsFile('js/product.js', ['depends' => [AdminAsset::className()]]);
$this->registerJsFile('js/search.js', ['depends' => [AdminAsset::className()]]);
?>

<?= $this->render('/layouts/leftmenu/products'); ?>

<div id="main">
    <div id="block-tables" class="block">  

    <?= $this->render('/layouts/topmenu/product', ['product' => $model]); ?>
        <div class="content">

            <?= (Yii::$app->session->hasFlash('success')) ? '<div id="notice">' .Yii::$app->session->getFlash('success') .'</div>' : ''; ?>

            <?= $this->render('_form', [
                                        'model' => $model,
                                        ]) ?>

        </div><!-- /content -->
    </div><!-- /block-tables  -->
</div><!-- /main  -->