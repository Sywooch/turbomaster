<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\Question;

?>

<div class="popup-wrap" style="display: none; width: 460px;" id="question-popup-wrap">
    <div class="popup-close"></div>
        <div class="popup-skin">
            <div class="popup-inner">
    
                <h3></h3>
                <?php
                $model = new Question();

                $form = ActiveForm::begin([
                    'action' => Url::to(['question/create']),
                    'options' => ['id' => 'question_form'],
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                    ]); ?>

                    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Имя']) ?>
                    <?= $form->field($model, 'phone')->textInput(['id' => 'question-phone-mask', 'placeholder' => 'Телефон']) ?>
                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'E-mail']) ?>
                    <?= $form->field($model, 'content')->textArea(['placeholder' => 'Текст вопроса']) ?>
                    
                    <?= $form->field($model, 'product_id')->hiddenInput(['value' => 0, 'id' => 'question-form-product_id']) ?>
                    <?= $form->field($model, 'type')->hiddenInput(['value' => 0, 'id' => 'question-form-type']) ?>


                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['id' => 'question_submit', 'class' => 'button', 'style' => 'margin: 10px 0 10px 120px;']) ?>
                    </div>

                <?php ActiveForm::end(); ?>


        </div><!-- /popup-inner -->
    </div><!-- /popup-skin -->
</div><!-- /popup-wrap -->