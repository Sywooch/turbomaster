<?php
use yii\helpers\Html;
use common\models\Fact;

// $facts = Fact::find()->select('*,  rand() as random')->orderBy('random')->asArray()->all();
$facts = Fact::find()->orderBy('pos')->asArray()->all();
?>

<div id="da-slider" class="da-slider">
    
    <?php
    $i = 1;
    foreach($facts as $k => $fact) { ?>

    <div class="da-slide">
        <h2>ТурбоФакты</h2>
        <p><?= $fact['content'] ?></p>
        <div class="da-img"><img src="images/parallax/turb-<?= $i ?>.png" /></div>
    </div>
    <?php   
        ++$i; 
        if($i > 3) { $i = 1; }
    } 
    ?>
                
</div>





