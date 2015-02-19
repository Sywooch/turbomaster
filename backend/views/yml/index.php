<?php
use yii\helpers\Html;
use common\models\Yml;
use yii\helpers\CommonHelper;
use backend\assets\AdminAsset;

$this->title = 'ТурбоАдмин :: Создать прайс для Яндекс.Маркета';

$filename =  Yii::$app->request->get('filename');
?>

<?= $this->render('/layouts/leftmenu/_common', ['title_name' => 'Яндекс.Маркет']); ?>

<div id="main">
    <div id="block-tables" class="block">  
        <?= $this->render('/layouts/topmenu/_common', ['title_name' => 'Яндекс.Маркет']); ?>
    <div class="content">
     
        <div style="display: block; padding: 70px 0 0 90px;">

            <h2 style="margin: 0 0 90px;">Создание прайс-листа для Яндекс.Маркета</h2>


            <?php
            if (!$filename) {
                echo HTML::a('Создать новый YML-файл для Яндекс.Маркета',  ['yml/create'], ['style' => 'text-decoration: underline;']);
            
            } else { 

                $file = Yii::$app->params['baseFrontendUrl'] .'/yml/' .$filename;
                ?>

                Сформирован новый YML-файл для Яндекс.Маркета.<br>
                Cкопируйте ссылку: <br><br>
                <strong><?= $file; ?></strong> 

            <?php 
            }
            ?>

    </div>

  </div><!-- /content -->
  </div><!-- /block-tables  -->
</div><!-- /main  -->