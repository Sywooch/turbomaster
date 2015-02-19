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

    <?= $this->render('/layouts/topmenu/price', ['countDublicated' => $countDublicated]); ?>
        <div class="content">

            <?= (Yii::$app->session->hasFlash('success')) ? '<div id="notice">' .Yii::$app->session->getFlash('success') .'</div>' : ''; ?>

            <?= $this->render('_form_price', [
                                        // 'model' => $model,
                                        'title' => $title,
                                        ]) ?>

             <div style="margin: 80px 0 0 44px;">

                <?php
                if($countRows > 0) {
                    echo '
                    <span style="margin: 0 40px 0 0;">В сводной таблице ' .$countRows .' записей.</span>';
                    echo HTML::a('Очистить таблицу',  ['price/empty'], ['class' => 'btn-mini', 'style' => 'margin: 0 20px 0 0;']);
                }    
                if($countDublicated > 0) {
                    echo Html::a('Дублей: ' .$countDublicated .', устранить', ['price/repair-dublicated'], ['class' => 'btn-mini', 'style' => 'margin: 0 20px 0 0;']);
                }
                if($countRows > 0) {
                    echo Html::a('Подключить итоговый прайс', ['price/create-from-price-temp'], ['class' => 'btn-mini create-overlay', 'style' => 'margin: 0 20px 0 0;']);
                }
                ?>
             </div>                           

             <?= $this->render('/layouts/_file_report'); ?>
             
        </div><!-- /content -->
    </div><!-- /block-tables  -->
</div><!-- /main  -->