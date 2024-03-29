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

<h3>Найди свою турбину!</h3>
<form method="get" action="<?= \Yii::$app->urlManager->createUrl(['search/index']); ?>" id="search-form">
    <table>
        <colgroup>
            <col style="width:80%">
            <col style="width:20%">
        </colgroup>
        <tbody>
            <tr>
                <td>
                <?= Html::dropDownList('brand_id', $brand_id, $brandList,
                        ['prompt'=> 'Выберите марку автомобиля', 'id'=>'dropDownBrands']); ?>    
                </td>
                <td style="text-align:right;vertical-align:middle" rowspan="3"><input type="submit" value="Найти" id="search-form-submit"></td>
            </tr>
            <tr>
                <td>
                    <div id="warpDropDownModels">
                    <?= Html::dropDownList('model_id', $model_id,  $modelList,
                        ['prompt' => 'Выберите модель автомобиля', 'id'=>'dropDownModels']); ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                    <input type="text" value="" placeholder="Введите номер производителя или ОЕM-код" class="turbosearch ui-autocomplete-input" id="inputPartnumber" name="partnumber" autocomplete="off">
                </td>
            </tr>
        </tbody>
    </table>
</form>
