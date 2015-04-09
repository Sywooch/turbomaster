<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Brand;
use common\models\Model;

$getArray = ['brand_id', 'model_id'];
foreach($getArray as $variable) {
  ${$variable} = (!empty($_GET[$variable])) ? $_GET[$variable] : 0;
}

$brandList = Brand::listForDropDownList();
$modelList = ($brand_id) ? ArrayHelper::map(Model::listByBrandId($brand_id), 'id', 'name') : [];
?>

<div id="form-search">

    <h3>Найдите свою турбину!</h3>
    <form method="get" action="<?= \Yii::$app->urlManager->createUrl(['search/index']); ?>" id="search-form">

        <div class="form-group">
            <?= Html::dropDownList('brand_id', $brand_id, $brandList, ['prompt'=> 'Выберите марку автомобиля', 'id'=>'select-cascade-brand', 'class' => 'stylerize']); ?> 
        </div>
        <div class="form-group">
            <div id="wrap-cascade-model">
                <?= Html::dropDownList('model_id', $model_id,  $modelList, ['id'=>'select-cascade-model', 'class' => 'stylerize']); ?>
            </div>
        </div>
        <div class="form-group">
            <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
            <input type="text" value="" placeholder="Введите номер производителя или ОЕM-код" class="turbosearch ui-autocomplete-input" id="input-partnumber" name="partnumber" autocomplete="off">
        </div>

        <div style="margin: 20px 0 0 0;" class="form-group">
            <input type="submit" value="Искать" id="search-form-submit" class="btn btn-danger btn-lg">
        </div>
    </form>

</div>