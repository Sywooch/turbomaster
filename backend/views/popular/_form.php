<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use backend\assets\AdminAsset;

$pos = \common\models\Utilities::findMaxFrom($model->tableName()) + 1;

$this->registerJsFile('js/popular.js', ['depends' => [AdminAsset::className()]]);
$this->registerJsFile('js/search_panel.handler.js', ['depends' => [AdminAsset::className()]]);
?>

<div class="flying-block">
    <?= $this->render('/layouts/_search_panel'); ?>

<?php
$form = ActiveForm::begin([
        'action' => '/' .$model::tableName() . '/create',
        'id' => 'form-create-popular',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => false,
        ]); ?>

        <?= $form->field($model, 'product_id')->hiddenInput(['value' => 0, 'id' => 'popular-product_id']) ?>
        <?= $form->field($model, 'pos')->hiddenInput(['value' => $pos]) ?>

<?php ActiveForm::end(); ?>       
</div>
