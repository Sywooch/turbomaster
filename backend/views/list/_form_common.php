<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<div class="hidden_form with-shadow">

<?php
$form = ActiveForm::begin([
            'action' => '/' .$model::tableName() . '/create',
            'enableAjaxValidation'   => false,
            'enableClientValidation' => false,
            ]); ?>

    <div>
        <?php
        foreach($params['columns'] as $column) { ?>
        <?= $form->field($model, $column['property'])->textInput(['class'=>'phantom-input focus_on_me', 'style' => 'width: 320px;'])->label($column['name']) ?>
        <br>
        <?php } ?>
    </div>
    <div class="clearfix"></div>                                  
    <div class="row buttons" style="margin: 20px 0 0 0;">
        <?= Html::submitButton('Ok', ['class'=>'phantom-button']) ?>
        <?= Html::a('Нет', '#', ['class'=>'phantom-button hide_hidden_form']) ?>
    </div>
    <div class="clearfix"></div>
<?php ActiveForm::end(); ?>     

</div>  