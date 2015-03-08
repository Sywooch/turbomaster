<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
?>

<table class="product-ask" style="margin-top: 20px;">
    <tr>
        <td class="fa-hover">
            <a href="/question/create" data-question-type="common_question" data-product-id="<?= $product['id'] ?>" class="question-add-link">
                <i style="font-size: 20px; color: #b04340;" class="fa fa-question-circle"></i>
                <span style="border-bottom: 1px dotted #b04340; margin-left: 10px;">Задать вопрос о товаре</span>
            </a>
        </td>
        <td>или позвонить:</td>
        <td>8 (499) 650-76-45</td>
        <td>8 (963) 777-09-49</td>
        <td>8 (800) 333-66-23</td>
    </tr>
</table>