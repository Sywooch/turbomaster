<?php
use yii\helpers\Html;
?>

<!-- <h2 style="margin-top: 40px;">Выберите марку:</h2> -->

<div class="columns">
  <ul class="models-list">       

<?php
$firstLetter = '';
$previosFirstLetter = '';

foreach($brands as $k => $brand) {

    $firstLetter = mb_substr($brand['name'], 0, 1, 'UTF-8');

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
            <li>' .HTML::a($brand['name'], ['list/index', 'category_alias' => Yii::$app->request->get('category_alias'), 'brand_alias' => $brand['alias']]) ."</li>";
      
    $previosFirstLetter = $firstLetter;
} 
?>
  </ul>
</div>