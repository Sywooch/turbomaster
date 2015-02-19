<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use common\models\PhotoArticle;

foreach($photos as $photo) {

    $src = Yii::$app->params['baseFrontendUrl'] .'/photo/article/800/' .$photo['src']; 
    ?>
    
    <div class="wrap-image">
        <?= Html::img($src) ?>
        <?= HTML::a('', ['photo-article/delete', 'id' => $photo['id']], ['class' => 'btn-photo-delete button-behavior confirmDeletion']); ?>
        <span id="photo_article-is_main-<?= $photo['id'] ?>-<?= $photo['is_main'] ?>" class="dotted <?= ($photo['is_main'] == 1) ? 'active' : 'no-active'; ?>"></span>
        <div class="subscribe-area" data-id="<?= $photo['id'] ?>"><?=  $photo['subscribe'] ?></div>
    </div>

<?php 
}
?>
