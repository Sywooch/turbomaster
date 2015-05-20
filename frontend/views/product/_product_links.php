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
        <div class="col-md-12">
        <?php 
        if($is_turbine && $name) { ?>
            <li>
                <?= Html::a('<i class="fa fa-tags"></i>Все турбины для ' .$name, $linkShopModel) ?>
            </li>
            <li>
                <a href="/turborepair?name=<?= $name ?>"><i class="fa fa-wrench"></i>Ремонтировать турбину для <?= $name ?></a>
            </li>
            <li>
                <a href="/turboservice?name=<?= $name ?>"><i class="fa fa-recycle"></i>Заменить турбину для <?= $name ?></a>
            </li>
            <li>
                <a href="/delivery" style="text-decoration: none;"><i class="fa fa-truck"></i>Турбину для <?= $name ?> <span style="text-decoration: underline;"> доставим БЕСПЛАТНО</span></a>
            </li>
            <li>
                <a href="/diagnostika"><i class="fa fa-life-ring "></i>Узнать, чем болеет турбина для <?= $name ?></a>
            </li>
        <?php } ?>
        </div>
        
    </ul>
</div>

