<?php
use yii\helpers\Html;
?>

<h2 style="margin-top: 40px;">Выберите модель <?= $common_name ?>:</h2>

<div class="columns">
  <ul class="models-list">        
<?php

$category_alias = Yii::$app->request->get('category_alias');
$brand_alias = Yii::$app->request->get('brand_alias');

$firstLetter = '';
$previosFirstLetter = '';
// $itemsForColumn = round(count($models) / 2);


foreach($models as $k => $model) {

    $firstLetter = mb_substr($model['name'], 0, 1, 'UTF-8');

    if($firstLetter != $previosFirstLetter) {
        if($k != 0) {
            echo '
          </ul>
        </div>
      </li>';
        }    
        echo '
      <li>
        <div class="dontsplit">
          <span>' .strtoupper($firstLetter) .'</span>
          <ul>';
    } 

    echo '
            <li>' .
              HTML::a($model['name'], 
                ['list/index', 
                  'category_alias' => $category_alias,
                  'brand_alias' => $brand_alias, 
                  'model_alias' => $model['alias']],
                ['title' => 'Турбины на ' .$brand_name .' ' .$model['name']]) ."
              </li>\n";
    $previosFirstLetter = $firstLetter;
} 
?>
  </ul>
</div>