<?php
use yii\helpers\Html;
use common\models\Mainpage;
use common\models\Utilities;
use yii\helpers\CommonHelper;
use backend\assets\AdminAsset;

$this->title = 'ТурбоАдмин :: Главная страница';

$this->registerJsFile('js/mainpage.js', ['depends' => [AdminAsset::className()]]);
$this->registerJsFile('js/search_panel.handler.js', ['depends' => [AdminAsset::className()]]);

$type = Yii::$app->request->get('type');   
$typeName = Mainpage::getName($type);
?>

<?= $this->render('/layouts/leftmenu/_common', ['title_name' => $typeName]); ?>

<div id="main">
    <div id="block-tables" class="block">
        <?= $this->render('/layouts/topmenu/mainpage'); ?>
        <div class="content">

            <?= (Yii::$app->session->hasFlash('success')) ? '<div id="notice">' .Yii::$app->session->getFlash('success') .'</div>' : ''; ?>

            <?= $this->render('_form', [
                                        'model' => $model,
                                        'type'  => $type,
                                        ]) ?>
            
            <div class="flying-block">
                <?= $this->render('/layouts/_search_panel'); ?>
            </div>                                        

        </div><!-- /content -->
    </div><!-- /block-tables  -->
</div><!-- /main  -->