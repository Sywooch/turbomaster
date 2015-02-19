<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use backend\assets\AdminAsset;
use yii\widgets\ActiveForm;

$this->title = 'ТурбоАдмин :: Редактировать товар';
$this->registerJsFile('js/order.js', ['depends' => [AdminAsset::className()]]);

 $arState =  [  1 =>'Новый заказ',
                2 =>'Подтвержден',
                3 =>'Выполнен',
                4 =>'Ошибка'];
?>

<?= $this->render('/layouts/leftmenu/orders'); ?>

<div id="main">
    <div id="block-tables" class="block">  

    <?= $this->render('/layouts/topmenu/order'); ?>
        <div class="content" style="margin: 20px 0 0 40px;">

            <?= (Yii::$app->session->hasFlash('success')) ? '<div id="notice">' .Yii::$app->session->getFlash('success') .'</div>' : ''; ?>

            <h2 style="margin-bottom: 30px;">Заказ # <?= $order->id ?></h2>

            <?php $form = ActiveForm::begin([
                 'enableClientValidation' => false,
                 'enableAjaxValidation' => false 
                 ]); ?>
            <div style="display: inline-block; margin: 0 20px 0 0;">
                <?= $form->field($model, 'state')->dropDownList($arState); ?> 
            </div>
            <?php ActiveForm::end(); ?>

            <table class="item-list" style="width: 770px; margin-top: 30px;">
                <thead>
                    <tr>
                        <th style="width: 350px;">Товары</th>
                        <th style="width:130px;">Артикул</th>
                        <th style="width:100px;">Цена за ед.</th>
                        <th style="width:50px;">Кол-во</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $total_price = (!empty($line['total_price'])) ? CommonHelper::formatPrice($line['total_price']) .' руб.' : '';

                $total_price = 0;
                foreach($lines as $line)  { 
                
                    $price = (!empty($line['price'])) ? CommonHelper::formatPrice($line['price']) .' руб.' : '';

                    $outUrl = Yii::$app->params['baseFrontendUrl'] .'product/' .$line['product_id'];
                    // $innerUrl = ['product/update', 'id' => $line['product_id']];
                ?>

                    <tr>
                        <td><?= HTML::a($line['product_name'], $outUrl, ['target' => '_blank'])  ?></td>
                        <td><?= $line['partnumber'] ?></td>
                        <td><?= $price ?></td>
                        <td><?= $line['quantity'] ?></td>
                    </tr>    
<?php           
                    $total_price += (int)$line['total_price'];
                }  
                $total_price = (!empty($total_price)) ? CommonHelper::formatPrice($total_price) .' руб.' : '';
                ?>
                    <tr>
                        <td colspan="4" style="padding: 20px 0 6px 10px;   color: #777;">Итого к оплате: <span style="color: #333; padding-left: 20px; display: inline; font-weight: bold;"><?= $total_price ?></span></td>
                    </tr>
                </tbody>
            </table>

            <table class="item-list" style="width: 770px; margin: 70px 0 90px;">
                <thead>
                    <tr>
                        <th style="width: 200px;">Покупатель</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Имя</td>
                        <td><?= $order['name'] ?></td>
                    </tr>
                     <tr>
                        <td>Телефон</td>
                        <td><?= $order['phone'] ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><a href="mailto:<?= $order['email'] ?>"><?= $order['email'] ?></a></td>
                    </tr>
                    <tr>
                        <td>Адрес</td>
                        <td><?= $order['address'] ?></td>
                    </tr>
                </tbody>
            </table>
            

        </div><!-- /content -->
    </div><!-- /block-tables  -->
</div><!-- /main  -->