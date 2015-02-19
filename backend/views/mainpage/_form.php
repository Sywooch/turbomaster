<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use common\models\Product;
use common\models\PhotoProduct;
use common\models\Utilities;
use backend\assets\AdminAsset;

$pos =  (!$model->isNewRecord) ? $model->pos : \common\models\Utilities::findMaxFrom(\common\models\Mainpage::tableName(), ['condition' => "type = '$type'"]) + 1;

$productName = ($model->product_id) ? Product::findOne($model->product_id)->fullname : 'Выбрать товар';

$imageSrc = '/images/no_image-grey.png';
if($model->image_src) {
    $imageSrc = Yii::$app->params['baseFrontendUrl'] .'/photo/mainpage/133/' .$model->image_src;
} elseif($model->partnumber) {
    $photoProduct = PhotoProduct::find()->where(['partnumber' => $model->partnumber, 'pos' => 1])->one();
    if($photoProduct) {
        $imageSrc = Yii::$app->params['baseFrontendUrl'] .'/photo/product/240/' .$photoProduct->src;
    }
}
?>

<div class="form-common" style="margin: 40px 0 0 40px;">
    <?php
    $form = ActiveForm::begin([
            'id' => 'form-mainpage',
            'enableAjaxValidation'   => false,
            'enableClientValidation' => false,
            'options' => ['enctype'=>  'multipart/form-data']]); ?>
    
    <div style="width: 500px;">
        <div id="place-for-product_name" class="show-search-panel" style="margin: 0 0 30px 4px; text-decoration: underline; font: 17px Arial,sans-serif; color: #333; cursor: pointer;"><?= $productName ?></div>
        
        <?= $form->field($model, 'product_id')->hiddenInput() ?>
        <?= $form->field($model, 'description')->textArea()->widget(yii\imperavi\Widget::className(), [
                'options' => [
                    'minHeight' =>  160,
                    'maxHeight' =>  160,
                    'linebreaks' => true,
                    'buttons' => array('html', 'bold', 'italic', 'link'),
                ],
            ]); ?>
    </div>

    <?= $form->field($model, 'priority_src')->textInput(['style' => 'width: 486px; height: 20px; font: 16px Arial,sans-serif; background: #fafafa;', 'id' => 'input-priority_src', 'placeholder' => 'Альтернат. ссылка']) ?>
    <?= $form->field($model, 'type')->hiddenInput(['value' => $type]) ?>
    <?= $form->field($model, 'pos' )->hiddenInput(['value' => $pos]) ?>
    
    <div style="float: left; width: 310px; height: 120px; overflow: hidden;">
        <?= $form->field($model, 'file')->fileInput() ?>
    </div>
    <div style="float: left; width: 210px; overflow: hidden; padding: 12px 6px 6px 55px;">
        <?= Html::img($imageSrc, ['style' => 'width: 133px; box-shadow: 0 0 6px rgba(0, 0, 0, 0.5);']); ?>
    </div>  

    <div style="clear: both;"></div>
    <div style="margin-top: 0px;">
        <?= Html::a('Отмена', ['mainpage/index', 'type' => $type], ['class' => 'button_link']) ?>
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['id' => 'btn-add-mainpage', 'class' => 'btn-submit-1']) ?>
    </div>


<?php ActiveForm::end(); ?>       

</div>
