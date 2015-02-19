<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$form = ActiveForm::begin([
                'id' => 'login-form', 
                'enableAjaxValidation' => false,
                'enableClientValidation' => false,
                ]); 
                ?>

    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Войти', ['style' => 'margin-top: 40px', 'name' => 'login-button']) ?>
    </div>

<?php ActiveForm::end(); 





