<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use yii\helpers\ArrayHelper;
use common\models\Category;
use common\models\Brand;
use common\models\Model;
use common\models\Manufacturer;
use common\models\Product;

$attributesArray = ['model_id', 'manufacturer_id', 'type', 'state'];
foreach($attributesArray as $variable) {
  ${$variable} = (!empty($model->{$variable})) ? $model->{$variable} : 0;
}

$category_id = ($model->isNewRecord) ? 0 : Category::findOne($model->category_id)['id'];
$brand_id = ($model->isNewRecord) ? 0 : Brand::findOne($model->brand_id)['id'];
$model_id = ($model->isNewRecord) ? 0 : Model::findOne($model->model_id)['id'];

$categoryList = ArrayHelper::map(Category::find()->all(), 'id', 'name');
$brandList = ($category_id) ? Brand::listForDropDownList() : ArrayHelper::map(Brand::find()->all(), 'id', 'name');
$modelList = ($brand_id) ? ArrayHelper::map(Model::find()->where('brand_id = :brand_id', [':brand_id' => $brand_id])->all(), 'id', 'name') : [];
$manufacturerList = ArrayHelper::map(Manufacturer::find()->all(), 'id', 'name');
$typeList =  [1 => 'новая',    2 => 'оборотная', 3 => 'для тюнинга'];
$stateList = [1 => 'активный', 0 => 'не активный' ];
?>

<div class="form-common" style="margin-left: 40px;">
    <h2><?= ($model->isNewRecord) ? 'Новый товар' : $model->name ?></h2>

<?php $form = ActiveForm::begin([
                 'enableClientValidation' => false,
                 'enableAjaxValidation' => false,
                ]); ?>

   <div style="margin: 0 0 20px 0;">
      <div class="inline right-bordered" style="width: 230px;">

            <?= Html::dropDownList('category_id', $category_id, $categoryList, ['prompt'=>'--Категория--']) ?>

            <div id="parent_block" style="margin: 10px 0 0 0;">
              <?= Html::dropDownList('brand_id', $brand_id, $brandList, ['prompt'=>'--Марка--', 'id'=>'dropDownBrands']);  ?>
            </div>
            <div id="children_block"  style="margin: 10px 0 0 0;">
                <div id="warpDropDownModels">
                <?= $form->field($model, 'model_id')->dropDownList($modelList, ['prompt'=>'--Модель--', 'id' => 'dropDownModels']); ?>
                </div>
            </div>
        </div><!-- /first block -->

        <div class="inline right-bordered" style="width: 230px;">
            <div>
                <?= $form->field($model, 'manufacturer_id')->dropDownList($manufacturerList, ['prompt'=>'--Производитель--']); ?> 
            </div>
            <div style="margin: 10px 0 0 0;">
                <?= $form->field($model, 'type')->dropDownList($typeList, ['prompt'=>'--Тип--']); ?>
            </div>
        </div><!-- /second block -->

        <div class="inline"  style="width: 230px;">
            <div>
              <?= $form->field($model, 'state')->dropDownList($stateList, ['prompt'=>'--Статус--']); ?>
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
        <?php // echo $form->field($model, 'description')->textArea(['style' => 'height: 60px;']) ?>
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