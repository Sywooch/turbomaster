<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\Question;
use common\models\Utilities;
?>

<div class="popup-wrap" style="display: none; width: 460px;" id="question-popup-wrap">
    <div class="popup-close"></div>
        <div class="popup-skin">
            <div class="popup-inner">
    
                <h3 style="margin: 0px 0 20px 0; text-align: center;"></h3>

                <?php
                $isWorkingHours = Utilities::checkIsWorkingHours();
                
                if($isWorkingHours) { ?>
                    <ul class="phones">
                        <li>
                            <span class="icon"><i class="fa fa-phone-square"></i></span>
                            <a class="receiver tel" title="Проводной телефон" href="tel:+74996507645">8 (499) 650-76-45</a>
                        </li>
                        <li>
                            <span class="icon"><i class="fa fa-phone-square"></i></span>
                            <a class="cellphone tel" title="Мобильный телефон" href="tel:+79637770949">8 (963) 777-09-49</a>
                        </li>
                        <li>
                            <span class="icon"><i class="fa fa-comments"></i></span>
                            <a class="freephone tel" title="Бесплатный звонок по России" href="tel:+78003336623">8 (800) 333-66-23 &nbsp;&nbsp;(беспл. звонок по России)</a>
                        </li>
                    </ul>

                    <div style="width: 100%; height: 3px; border-top: 3px solid #eee; margin: 30px 0 20px 0;"></div>
                <?php
                }
                
                $model = new Question();

                $form = ActiveForm::begin([
                    'action' => Url::to(['question/create']),
                    'options' => ['id' => 'question_form'],
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                    ]); ?>

                    <?php if($isWorkingHours) {
                        echo '<h4 style="text-align: center;">или заполните форму:</h4>';
                    } ?>
                    
                    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Имя']) ?>
                    <?= $form->field($model, 'phone')->textInput(['id' => 'question-phone-mask', 'placeholder' => 'Телефон']) ?>
                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'E-mail']) ?>
                    <?= $form->field($model, 'content')->textArea(['placeholder' => 'Текст вопроса']) ?>
                    
                    <?= $form->field($model, 'product_id')->hiddenInput(['value' => 0, 'id' => 'question-form-product_id']) ?>
                    <?= $form->field($model, 'type')->hiddenInput(['value' => 0, 'id' => 'question-form-type']) ?>


                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['id' => 'question_submit', 'class' => 'btn btn-danger btn-lg', 'style' => 'margin: 0px 0 10px 120px;']) ?>
                    </div>

                <?php ActiveForm::end(); ?>


        </div><!-- /popup-inner -->
    </div><!-- /popup-skin -->
</div><!-- /popup-wrap -->