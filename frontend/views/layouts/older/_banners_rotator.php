<?php
use yii\helpers\Html;
?>   
<div class="banners-rotator">
    
    <ul class="bxslider">
        <li>
            <?= Html::a(Html::img('/images/boxes/delivery.png', ['width' => 335, 'height' => 80]), ['site/static', 'view'=>'delivery']) ?>
        </li>
        <li>
            <?= Html::a(Html::img('/images/boxes/service.png', ['width' => 335, 'height' => 80]), ['site/static', 'view'=>'turboservice']) ?>
        </li>
        <li>
            <?= Html::a(Html::img('/images/boxes/opinion.png', ['width' => 335, 'height' => 80]),   ['opinion/index']) ?>
        </li>
        <li>
            <?= Html::a(Html::img('/images/boxes/secret.png', ['width' => 335, 'height' => 80]),   ['articles/bulletins-turboservice']) ?>
        </li>
    </ul>
</div>

 