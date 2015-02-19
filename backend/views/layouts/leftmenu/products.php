<?php
use yii\helpers\Html;
use common\models\Category;
use common\models\Manufacturer;
use common\models\Brand;
use common\models\Car;
use common\models\Product;
use yii\helpers\ArrayHelper;
?>

<?php 
if($this->beginCache('admin-leftmenu-products', array('duration'=>600))) { ?>

<div id="sidebar">
 <div class="sidebar-menu">
  <div id="toggle_header"></div>

  <div class="block">

    <h3 style="margin-top: 4px;">Товары</h3>

    <h3 style="margin-top: 40px;">Категории</h3>
      <ul class="navigation smaller">
        <li><?= HTML::a('Все товары',  ['product/index']); ?></li>  
        <?php 
        $categoties = Category::find()->orderBy('name')->all();
        foreach($categoties as $category) {
         echo '<li>' .HTML::a($category['name'],  ['product/index', 'category_id' => $category['id']]) ."</li>\n";
        }
        ?>  
      </ul>

    <h3 style="margin-top: 40px;">Производители</h3>
      <ul class="navigation smaller">  
        <?php 
        $manufacturers = Manufacturer::find()->orderBy('name')->all();
        foreach($manufacturers as $manufacturer) {
         echo '<li>' .HTML::a($manufacturer['name'],  ['product/index', 'manufacturer_id' => $manufacturer['id']]) ."</li>\n";
        }
        ?>  
      </ul>

    <?php  ?>

    <h3 style="margin-top: 40px;">Тип</h3>
      <ul class="navigation smaller">  
        <?php 
        $typesArray = ['новая', 'обортная', 'для тюнинга'];
        foreach($typesArray as $k => $type) {
         echo '<li>' .HTML::a($type,  ['product/index', 'type_id' => $k+1]) ."</li>\n";
        }
        ?>  
      </ul>


    <h3 style="margin-top: 40px;">Бренды</h3>
      <ul class="navigation smaller">
        <?php 
        $brands = Brand::find()->orderBy('name')->all();
        foreach($brands as $brand) {
         // echo '<li>' .HTML::a($brand['name'],  ['product/index', 'brand_id' => $brand['id']]) ."</li>\n";
        }
        ?>  
      </ul>

  </div><!-- /block -->
 </div><!-- /sidebar-menu -->
</div><!-- /sidebar -->

<?php $this->endCache(); } ?>