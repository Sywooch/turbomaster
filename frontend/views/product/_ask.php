<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
?>

<div class="row product-ask" style="margin: 50px 0 20px;">
    <div class="col-md-5 fa-hover clearfix" style="margin: 0 0 10px 0;">
        <a href="/question/create" data-question-type="common_question" data-product-id="<?= $product['id'] ?>" class="question-add-link">
            <i style="font-size: 26px; color: #b04340;" class="fa fa-question-circle"></i>
            <span style="border-bottom: 1px dotted #b04340; margin-left: 10px;">Задать вопрос о товаре</span>
        </a>
    </div>
    
    <div class="col-md-4 fa-hover">
        <ul class="ask-phone"><i style="font-size: 24px; color: #b04340;" class="fa fa-phone-square"></i><span style="position: relative; top: -3px; padding-left: 10px;"> или по телефону:</span>
            <li style="margin-top: 6px;">8 (499) 650-76-45</li>
            <li>8 (963) 777-09-49</li>
            <li>8 (800) 333-66-23</li>
        </ul>
    </div>
</div>