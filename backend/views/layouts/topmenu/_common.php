<?php
use yii\helpers\Html;
?>
<div class="secondary-navigation">
    <ul class="clearfix">
      <li class="first">&nbsp;</li>
      <li class="active"><a href="#"><?= ($title_name) ?  $title_name : 'Таблица'; ?></a></li>

      <?php 
      if(!empty($is_add))  { ?>
      <li>
        <a href="#" class="show_hidden_form">
          <?= (!empty($add_name))?  $add_name : 'Добавить'; ?>
        </a>
      </li>
    <?php } ?>
    </ul>
</div>
