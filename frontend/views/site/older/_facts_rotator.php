<?php
use yii\helpers\Html;
use common\models\Fact;

$facts = Fact::find()->orderBy('RAND()')->asArray()->all();
?>

<h2 style="margin: 0px 0 0 0;">ТурбоФакты</h2>
<div id="da-slider" class="da-slider">
    <?php
    $i = 1;
    foreach($facts as $k => $fact) { ?>

    <div class="da-slide">
        <p><?= $fact['content'] ?></p>
        <div class="da-img">
            <img src="images/parallax/turb-<?= $i ?>.png" />
        </div>
    </div>
    <?php   
        ++$i; 
        if($i > 3) { $i = 1; }
    } 
    ?>
                
</div>





