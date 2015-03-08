<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
?>

<div class="table-responsive" style="margin-top: 20px;">
    <table class="product-ask">
        <tr>
            <td class="fa-hover">
                <a href="/question/create" data-question-type="common_question" data-product-id="<?= $product['id'] ?>" class="question-add-link">
                    <i style="font-size: 20px; color: #b04340;" class="fa fa-question-circle"></i>
                    <span style="border-bottom: 1px dotted #b04340; margin-left: 10px;">Задать вопрос о товаре</span>
                </a>
            </td>
            <td>или по тел:</td>
            <td>8 (499) 650-76-45 <br> 8 (963) 777-09-49 <br> 8 (800) 333-66-23</td>
        </tr>
    </table>
</div>