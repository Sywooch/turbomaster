<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
?>

    <div id="option">

      <div id="slides" class="views">
          <div class="slidebox">
            <ul>
            <?php
            if(!empty($photos)) {    
              

              foreach($photos as $photo) { ?>
              <li>
                <div>
                  <a class="zoom" href="<?= CommonHelper::getImageSrc('/photo/product/big/' .$photo['src']) ?>" rel="group">
                    <?= Html::img(CommonHelper::getImageSrc('/photo/product/240/' .$photo['src']), [
                          'width' => 240, 
                          'height' => 240, 
                          'alt' => $product['name']
                          ]
                        );
                          ?>
                    <img class="lens" src="/images/ico-zoom.png" width="32" height="32" alt="Увеличить">
                  </a>
                </div>
              </li>
            <?php   
                }
            } elseif($default_photo = CommonHelper::getImageSrc('/photo/product/default/240/' .$product['manufacturer_alias'] .'.jpg'))  {  

              $isWarning = true;
              ?>
              <li>
                <div>
                  <a class="zoom" href="<?= CommonHelper::getImageSrc('/photo/product/default/big/' .$product['manufacturer_alias'] .'.jpg'); ?>" rel="group">
                    <?= Html::img($default_photo, [
                          'width' => 240, 
                          'height' => 240, 
                          'alt' => $product['name']
                          ]
                        );
                          ?>
                      <img class="lens" src="/images/ico-zoom.png" width="32" height="32" alt="Увеличить">
                    </a>
                </div>
              </li>
        <?php    
            } ?>    
            </ul>
          </div>
  <?php   if($isWarning) { echo '
          <ins style="font-size: 75%">Внимание! На фотографии представлен образец оригинальной турбины ' .$product['manufacturer_name'] .', НЕ идентичный данному товару.</ins>';
          } ?>
      </div>

      <div style="margin: 40px 0 0px 0px;">
        <?= $this->render('/layouts/_social_share'); ?>
      </div>

</div><!-- /option -->