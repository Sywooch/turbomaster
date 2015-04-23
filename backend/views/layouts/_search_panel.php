<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Category;
use common\models\Brand;
use common\models\Model;
use common\models\Manufacturer;

$getArray = ['category_id', 'brand_id', 'model_id', 'manufacturer_id', 'type', 'state', 'is_yml'];
foreach($getArray as $variable) {
  ${$variable} = (!empty($_GET[$variable])) ? $_GET[$variable] : 0;
}

$categoryList = ArrayHelper::map(Category::find()->all(), 'id', 'name');
$typeList  = [1 => 'новая', 2 => 'оборотная'];
$stateList = [1 => 'активные', 2 => 'не активные' ];
$brandList = Brand::listForDropDownList();
$modelList = ($brand_id) ? ArrayHelper::map(Model::listByBrandId($brand_id), 'id', 'name') : [];
$manufacturerList = ArrayHelper::map(Manufacturer::find()->all(), 'id', 'name');

?>

<form name="multi_search" id="form-search-panel" method="get" action="/product/index">

  <div class="inline right-bordered">
    <div style="margin: 0 0 10px 0;">
      <?= Html::dropDownList('category_id', $category_id, $categoryList, ['prompt'=>'--Категория--']);  ?>
    </div>
    <div id="parent_block">
      <?php
      echo Html::dropDownList('brand_id', $brand_id, $brandList,
        ['prompt'=>'--Марка--', 'id'=>'dropDownBrands']); 
      ?>
    </div>
    <div id="children_block"  style="margin: 10px 0 0 0;">
      <div id="warpDropDownModels">
      <?= Html::dropDownList('model_id', $model_id, $modelList,
        ['prompt'=>'--Модель--', 'id'=>'dropDownModels']); 
      ?>
      </div>  
    </div>
  </div><!-- /first block -->

  <div class="inline right-bordered">
    <div>
      <?= Html::dropDownList('manufacturer_id', $manufacturer_id, $manufacturerList, ['prompt'=>'--Производитель--']);  ?>
    </div>
    <div>
      <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
      <input type="text" value="" placeholder="Номер или ОЕM-код" class="turbosearch ui-autocomplete-input inputPartnumber" id="inputPartnumber" name="partnumber" autocomplete="off">  
    </div>
  </div><!-- /second block -->


  <div class="inline right-bordered">
    <div>
      <?= Html::dropDownList('type', $type, $typeList,
        ['prompt'=>'--Тип--', 'id' => 'type_id']); 
      ?>
    </div>

    <div style="margin: 10px 0 0 0;">
      <?= Html::dropDownList('state', $state, $stateList,
        ['prompt'=>'--Статус--', 'id' => 'state_id']); 
      ?>
    </div>
    
    <div style="margin: 10px 0 0 0;">
      <input type="checkbox" name="is_yml" <?= $is_yml == 1 ? 'checked="checked"' : '' ?>  value="1">
      <label>Яндекс.Маркет</label>
    </div>
    
  </div><!-- /third block -->

  <div class="inline">
    <input type="submit" id="submit-search-panel" class="btn_decorator_2" style="margin: 0px 0 0 0px;" value="Найти">
  </div>

</form>