<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\PhotoProduct;
?>

<div class="form-common" id="photo-input-area">
    <?php 
    $model = new PhotoProduct;
    $form = ActiveForm::begin([
                    // 'action' => '/photo-product/create,
                    'action' => Url::toRoute(['photo-product/create', 'product_id' => $product->id]),
                    'enableAjaxValidation'   => false,
                    'enableClientValidation' => false,
                    'options' => ['enctype'=>  'multipart/form-data']]); ?>
        
        <div style="float: left; width: 310px; overflow: hidden;">
            <?= $form->field($model, 'file')->fileInput() ?>
        </div>                                  
        <?= $form->field($model, 'partnumber')->hiddenInput(['value' => $product->partnumber]) ?>
        
        <?= Html::submitButton('Добавить фото', ['id' => 'file-submit-button', 'style' => 'display: none; float: left; width: 140px; margin: 11px 0 0 0; font: normal 14px Arial,sans-serif; padding: 5px 6px']) ?>


    <?php ActiveForm::end(); ?>       
</div>