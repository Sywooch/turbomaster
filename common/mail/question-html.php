<?php

use yii\helpers\Html;

$product = \common\models\Product::findById($question->product_id);
$url = \Yii::$app->urlManagerFrontend->createAbsoluteUrl(['product/view', 'id'=> $product['id']]);

$message = ($question->type == \common\models\Question::TYPE_COMMON_QUESTION) ? 'был задан вопрос о товаре' : 'была заполнена форма запроса цены у товара';
?>
 <!-- section with right thumb -->
    <tr>
      <td class="emailSection" bgcolor="#fbfbfb" valign="top" style="padding-top:30px; padding-bottom:30px; padding-right:30px; padding-left:30px; border-bottom-width:1px; border-bottom-style:solid; border-bottom-color:#eeeeee;" >
        <table class="emailBlock" align="right" width="150" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
          <tr>
            <td class="emailIcon" style="font-family:'Open Sans',Arial,sans-serif; padding-top:5px; padding-bottom:20px; padding-right:0; padding-left:0; text-align:right;"></td>
        </tr>
      </table>
      <table class="emailBlock" align="left" width="500" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
        <tr>
          <td  class="emailArticleHeading" style="font-family:'Open Sans',Arial,sans-serif; color:#262626; font-size:22px; line-height:24px; padding-top:0; padding-bottom:0; padding-right:20px; padding-left:0;" >
             Здравствуйте.
          </td>
        </tr>
        <tr>
          <td  class="emailCopy" style="font-family:'Open Sans',Arial,sans-serif;color:#262626; padding-top: 35px; padding-bottom:0; padding-right:0; padding-left:0;">
            <table border="0" cellpadding="2" cellspacing="0" style="width: 100%; font-family:'Open Sans',Arial,sans-serif; color:#262626; font-size: 20px; line-height:24px;">
              <tr>
                <td colspan="2" style="padding-bottom: 40px; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color:#dddddd;">На сайте <?= $message ?>: <br><br>

                  <?= Html::a($product['name'], $url) ?>
                  <?php 
                  if(!empty($product['partnumber'])) {
                    echo '<br>код ' .$product['partnumber'];
                  } ?>
                </td>
              </tr>
              <tr>
                <td style="padding-top: 20px; border-top-width: 1px; border-top-style: solid; border-top-color:#dddddd;">Имя:</td>
                <td style="padding-top: 20px; border-top-width: 1px; border-top-style: solid; border-top-color:#dddddd;">
                  <b><?= $question['name']  ?> </b>
                </td>
              </tr>
              <tr>
                <td>Телефон:</td>
                <td><b><?= $question['phone'] ?></b></td>
              </tr>
              <tr>
                <td style="padding-bottom: 30px;">E-mail:</td>
                <td style="padding-bottom: 30px;">
                  <b><a href="mailto:<?= $question['email'] ?>"><?= $question['email'] ?></a></b>
                </td>
              </tr>
              <tr>
                <td colspan="2" style="padding-top: 40px; padding-bottom: 10px; border-top-width: 1px; border-top-style: solid; border-top-color:#dddddd;">Вопрос:</td>
              </tr>
              <tr>
                <td colspan="2" style="padding-bottom: 140px;"><b><?= $question['content'] ?></b></td>
              </tr>
            </table>
          </td>
        </tr>
          
      </table>
    </td>
</tr><!-- /section with right thumb -->