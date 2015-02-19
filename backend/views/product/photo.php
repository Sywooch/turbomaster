<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use backend\assets\AdminAsset;

$this->title = 'ТурбоАдмин :: Редактировать товар';
$this->registerCssFile('css/jquery.fancybox.css', ['depends' => [AdminAsset::className()]]);

$this->registerJsFile('js/core/jquery.fancybox.pack.js', ['depends' => [AdminAsset::className()]]);
$this->registerJsFile('js/product.photo.js', ['depends' => [AdminAsset::className()]]);

?>

<?= $this->render('/layouts/leftmenu/products'); ?>

<div id="main">
    <div id="block-tables" class="block">  

   <?= $this->render('/layouts/topmenu/product', ['product' => $product]); ?>
        <div class="content" style="margin: 20px 20px 0 70px;">

          <h2 style=""><?= $product->name ?></h2>

          <?= $this->render('_form_photo', ['product' => $product, 'photos' => $photos]); ?>

          <div id="slides" class="views">
          <div class="slidebox">
            <ul>
          <?php 

          if(!empty($photos)) {  
              $count = count($photos);
              $partnumber = $photos[0]['partnumber'];
              $max = \common\models\Utilities::findMaxFrom(\common\models\PhotoProduct::tableName(), ['condition' => "partnumber = '$partnumber'"]);

              foreach($photos as $photo) { ?>
              <li>
                <div class="photos-iterator">
                  <a class="fancybox" href="<?= Yii::$app->params['baseFrontendUrl'] .'/photo/product/big/' .$photo['src'] ?>" rel="group">
                    <?= Html::img(Yii::$app->params['baseFrontendUrl'] .'/photo/product/240/' .$photo['src'], ['style' => 'width: 120px;']); ?>
                  </a>

                  <?php  if($photo['pos'] < $max) {
                      echo Html::a('', ['photo-product/shift', 'direction' => 'down', 'id' => $photo['id'], 'partnumber' => $photo['partnumber']], ['class' => 'arrows down button-behavior']);
                  }
                  if($photo['pos'] > 1) {
                      echo Html::a('', ['photo-product/shift', 'direction' => 'up', 'id' => $photo['id'], 'partnumber' => $photo['partnumber']], ['class' => 'arrows button-behavior']);
                 }
                  echo Html::a('', ['photo-product/delete', 'id' => $photo['id']], ['class' => 'icon_delete', 'data-confirm' => 'Удалить эту фотографию?']) ?>
                </div>
              </li>
            <?php   
              }
          }
          ?>
        </ul>
    </div>


        </div><!-- /content -->
    </div><!-- /block-tables  -->
</div><!-- /main  -->

        