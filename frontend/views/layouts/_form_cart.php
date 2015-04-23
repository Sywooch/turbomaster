<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\Order;
use common\models\Cart;

/* @var $this yii\web\View */
/* @var $model common\models\Cart */
/* @var $form ActiveForm */
?>

<div class="popup-wrap" style="display: none;" id="order-popup-wrap">
    <div class="popup-close"></div>
    <div class="popup-skin">
        <div class="popup-inner">
    
            <h3>Заказ</h3>
            <p id="messages" style="color: #009900; display: none;"></p>
            <p id="errors" style="color: #990000; display: none;"></p>

            <?php
            $model = new Order(['scenario' => 'buyer']);

            $form = ActiveForm::begin([
                'action' => Url::to(['order/create']),
                'options' => ['id' => 'orderform'],
                // 'enableAjaxValidation' => true,
                // 'enableClientValidation' => true,
                ]); ?>

                <?= $form->field($model, 'name')->textInput(['placeholder' => 'Имя']) ?>
                <?= $form->field($model, 'phone')->textInput(['id' => 'order-phone-mask', 'placeholder' => 'Телефон']) ?>
                <?= $form->field($model, 'email')->textInput(['placeholder' => 'E-mail']) ?>
                
                <?= $form->field($model, 'address')->textArea(['placeholder' => 'Адрес доставки']) ?>
   
                <h3 style="margin-top: 40px;">Список заказанных товаров</h3>
                <table id="cart-list" class="table table-striped cart-list-table">
                    <thead>
                        <tr class="danger">
                            <th style="width: 260px;">Название товара</th>
                            <th style="width: 80px;">Кол-во</th>
                            <th style="width: 120px;">Цена экз.</th>
                            <th style="width: 40px;">Удалить</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr id="cart_totals">
                            <td colspan="2" style="text-align: left; height: 40px;"><b>ИТОГО</b></td>
                            <td id="cart-total-price" class="center" colspan="2" style="font-weight: bold;"></td>
                        </tr>
                    </tfoot>
                </table>

                <div class="form-group">
                        <?= Html::submitButton('Заказать', ['class' => 'btn btn-danger btn-lg', 'id' => 'form-order-submit', 'style' => 'margin: 0px 0 10px 120px;']) ?>
                </div>
                <?php ActiveForm::end(); ?>

       
        </div><!-- /popup-inner -->
    </div><!-- /popup-skin -->
</div><!-- /popup-wrap -->