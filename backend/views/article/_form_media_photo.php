<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\PhotoArticle;
?>

<div id="wrap-form-photo" class="media-form bigsize_file_input">
  <div class="nosik"></div>

<?php 
$model = new PhotoArticle;
$form = ActiveForm::begin([
                'action' => '/photo-article/create',
                'enableAjaxValidation'   => false,
                'enableClientValidation' => false,
                'options' => [
                                'enctype'=>  'multipart/form-data',
                                'name'   =>  'form_photo',  
                              ],  
                ]); 
?>

    <?= $form->field($model, 'file')->fileInput() ?>
    <?= $form->field($model, 'subscribe')->textArea(['id' => 'photo-textarea-subscribe' , 'placeholder' => 'подпись']); ?>
    
    <div style="margin: 9px 0 0 0;">
        <input type="radio" name="PhotoArticle[layout]" checked value="<?= PhotoArticle::LAYOUT_LEFT ?>" style="margin: 0 2px 0 0;" />
        <label>слева</label>

        <input type="radio" name="PhotoArticle[layout]"  value="<?= PhotoArticle::LAYOUT_BOTTOM ?>" style="margin: 0 2px 0 16px;" />
        <label>внизу</label> 
    </div>

    <?= $form->field($model, 'article_id')->hiddenInput(['value' => $article->id]); ?>
    <?= $form->field($model, 'pos')->hiddenInput(['value' => 0, 'id' => 'photo-input-pos']); ?>

    
    <div style="margin: 4px 0 0 0;">
        <a class="btn-mini btn-cancel">Отмена</a>
        <?= Html::submitButton('Добавить', ['class' => 'btn-mini', 'id' => 'photo-btn-submit'] ) ?>
    </div> 
<?php ActiveForm::end(); ?>       

</div><!-- divFormPhoto -->