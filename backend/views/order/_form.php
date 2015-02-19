<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use yii\helpers\ArrayHelper;
use common\models\Brand;
use common\models\Car;
use common\models\Manufacturer;
use common\models\Product;

$attributesArray = ['car_id', 'manufacturer_id', 'type', 'state'];
foreach($attributesArray as $variable) {
  ${$variable} = (!empty($model->{$variable})) ? $model->{$variable} : 0;
}

$brand_category_id = ($model->isNewRecord) ? 0 : Car::findOne($model->car_id)['brand_category_id'];
$manufacturerList = ArrayHelper::map(Manufacturer::find()->all(), 'id', 'name');
$typelist =  [1 => 'новая',    2 => 'оборотная', 3 => 'для тюнинга'];
$statelist = [1 => 'активный', 0 => 'не активный' ];

?>

<div class="form-common" style="margin-left: 40px;">
    <h2><?= ($model->isNewRecord) ? 'Новый товар' : $model->name ?></h2>


<?php $form = ActiveForm::begin([
                 // 'enableClientValidation' => false,
                 // 'enableAjaxValidation' => false,
                ]); ?>


   <div id="top_panel" style="margin: 0 0 40px 0;">
      
      <div class="inline right-bordered" style="width: 230px;">
            <div id="parent_block" style="margin: 10px 0 0 0;">
              <?php
              $list = Brand::listForDropDownList();
              echo Html::dropDownList('brand_category_id', $brand_category_id, $list, ['prompt'=>'--Марка--', 'id'=>'dropDownBrands']);  ?>
            </div>

            <div id="children_block"  style="margin: 10px 0 0 0;">
                <div id="warpDropDownCars">
                <?php
                if($brand_category_id)  {
                    $carList = ArrayHelper::map(Car::listByBrandCategoryId($brand_category_id), 'id', 'name');
                } else { $carList = []; } ?>

                <?= $form->field($model, 'car_id')->dropDownList($carList, ['prompt'=>'--Модель--', 'id' => 'dropDownCars']); ?> 

                
                </div>  
            </div>
        </div><!-- /first block -->

        <div class="inline right-bordered"  style="width: 230px;">
            <div>
                <?= $form->field($model, 'manufacturer_id')->dropDownList($manufacturerList, ['prompt'=>'--Производитель--']); ?>      
            </div>
            <div style="margin: 10px 0 0 0;">
                <?= $form->field($model, 'type')->dropDownList($typelist, ['prompt'=>'--Тип--']); ?>          
            </div>
        </div><!-- /second block -->


        <div class="inline"  style="width: 230px;">
            <div>
                <?= $form->field($model, 'state')->dropDownList($statelist, ['prompt'=>'--Статус--']); ?> 
            </div>
        </div><!-- /third block -->
 
    </div><!-- /panel_filter --> 

   <div style="width: 580px; margin: 0 0 20px 0;">
        <?= $form->field($model, 'name') ?>
   </div> 
   
   <div class="inline right-bordered" style="width: 230px;">
        <?= $form->field($model, 'price') ?>
        <?= $form->field($model, 'partnumber') ?>
        <?= $form->field($model, 'warranty') ?>
        <?= $form->field($model, 'description')->textArea(['style' => 'height: 60px;']) ?>
   </div>

   <div class="inline right-bordered" style="width: 230px;">
        <?php 
        $model->interchange = Product::interchangeFormFormat($model->interchange);
        ?>
        <?= $form->field($model, 'interchange')->textArea(['style' => 'height: 252px; padding: 10px;']) ?>
   </div>

   <div class="inline" style="width: 230px;">
        <?= $form->field($model, 'engine') ?>
        <?= $form->field($model, 'volume') ?>
        <?= $form->field($model, 'power') ?>

        <label>Годы выпуска</label>

        <div class="inline"  style="width: 94px; margin-right: 22px;"> 
            <?= $form->field($model, 'date_from') ?>
        </div>
        <div class="inline"  style="width: 94px;">     
            <?= $form->field($model, 'date_to') ?>
        </div>    
   </div>


    <div class="form-group" style="margin: 40px 0 0 0;">
        <?= Html::a('Отмена', \common\models\Utilities::backUrl(), ['class' => 'button_link']) ?>
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', []) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
