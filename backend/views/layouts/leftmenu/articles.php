<?php
use yii\helpers\Html;
?>

<div id="sidebar">
 <div class="sidebar-menu">
    <div id="toggle_header"></div>

    <div class="block">

      <h3 style="margin-top: 4px;">Статьи</h3>

      <ul class="navigation" style="margin: 40px 0 0 0;">
        <li><?= HTML::a('Список статей', ['article/index']) ?></li>
        <li><?= HTML::a('Новая статья',  ['article/create']) ?></li>
      </ul>

  </div><!-- /block -->
 </div><!-- /sidebar-menu -->
</div><!-- /sidebar -->