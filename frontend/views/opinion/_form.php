<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\Opinion;
?>

<div class="popup-wrap" style="display: none; width: 460px;" id="opinion-popup-wrap">
    <div class="popup-close"></div>
        <div class="popup-skin">
            <div class="popup-inner">
    
                <h3></h3>
                <?php
                $model = new Opinion();

                $form = ActiveForm::begin([
                    'action' => Url::to(['opinion/create']),
                    'options' => ['id' => 'question_form'],
                    // 'enableAjaxValidation' => false,
                    // 'enableClientValidation' => true,
                    ]); ?>

                    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Имя']) ?>
                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'E-mail']) ?>
                    <?= $form->field($model, 'city')->textInput(['placeholder' => 'Город']) ?>
                    <?= $form->field($model, 'company')->textInput(['placeholder' => 'Компания (не обязательно)', 'id' => 'input-company']) ?>
                    <?= $form->field($model, 'content')->textArea(['placeholder' => 'Текст отзыва']) ?>
                    
                    <?= $form->field($model, 'approved')->hiddenInput(['value' => 0]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['id' => 'opinion_submit', 'class' => 'button', 'style' => 'margin: 10px 0 10px 120px;']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

        </div><!-- /popup-inner -->
    </div><!-- /popup-skin -->
</div><!-- /popup-wrap -->