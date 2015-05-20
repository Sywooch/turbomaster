<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;

$is_turbine = (isset($product['category_alias']) && isset($product['brand_alias']) && isset($product['model_alias'])) ? true : false;

$name = (isset($product['brand_name']) && isset($product['model_name'])) ? $product['brand_name'] .' ' .$product['model_name'] : false;

$linkShopModel = $is_turbine ? [ 
    'product/index',
    'category_alias' => $product['category_alias'],
    'brand_alias' => $product['brand_alias'],
    'model_alias' => $product['model_alias']
] : false;
?>

<div class="row">
    <ul class="product-card-links">
        <div class="col-md-6">
        <?php 
        if($is_turbine && $name) { ?>
            <li>
                <?= Html::a('Все турбины для ' .$name, $linkShopModel) ?>
            </li>
            <li>
                <a href="/turborepair?name=<?= $name ?>">Ремонтировать турбину для <?= $name ?></a>
            </li>
            <li><a href="/turboservice?name=<?= $name ?>"><i class="fa fa-dashboard"></i>Заменить турбину для <?= $name ?></a></li>
        <?php } ?>
        </div>
        <div class="col-md-6">
            <li><a href="/turboservice?name=<?= $name ?>"><i class="fa fa-dashboard"></i>Заменить турбину для <?= $name ?></a></li>
        </div>
    </ul>
</div>

