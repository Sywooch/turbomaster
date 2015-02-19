<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Excel;
?>

<h2 style="margin: 20px 0 40px 44px"><?= $title ?></h2>

<div class="form-common" id="photo-input-area" style="margin: 0 0 0 40px; ">
    <?php
    $model = new Excel;
     
    $form = ActiveForm::begin([
                'options'=>[
                    'id' => 'form-excel-upload',
                    'enctype'=>'multipart/form-data'],
                 ]);?>
        
        <label style="margin-bottom: 6px;">Выберите таблицу:</label>
        <div style="float: left; width: 310px; overflow: hidden;">
            <?= $form->field($model, 'table_uploaded')->fileInput()->label('') ?>
        </div>                                  
        
        <?= Html::submitButton('Старт', ['id' => 'file-submit-button', 'style' => 'display: none; float: left; width: 120px; margin: 11px 0 0 0; font: normal 14px Arial,sans-serif; padding: 5px 6px']) ?>


    <?php ActiveForm::end(); ?>       
</div>