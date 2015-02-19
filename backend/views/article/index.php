<?php
use yii\helpers\Html;
use common\models\Article;
use yii\helpers\CommonHelper;
use backend\assets\AdminAsset;

$this->title = 'ТурбоАдмин :: Статьи';
$this->registerJsFile('js/articles.js', ['depends' => [AdminAsset::className()]]);

?>

<?= $this->render('/layouts/leftmenu/articles'); ?>

<div id="main">
    <div id="block-tables" class="block">  
        <?= $this->render('/layouts/topmenu/articles'); ?>
    <div class="content">
     
    <table class="item-list">
        <tr class="headers">
        <tr>
            <th>Заголовок</th>
            <th>Рубрика</th>
            <th>Статус</th>
            <th>Главн.</th>
            <th>Удалить</th>
        </tr>
        <tr class="rails" style="height: 1px;">
            <td style="width: 360px;"></td>
            <td style="width: 200px;"></td>
            <td style="width: 70px;"></td>
            <td style="width: 70px;"></td>
            <td style="width: 70px;"></td> 
        </tr>

        <?php
        
 if($items) {                   
    foreach($items as $item) {
    ?>
        <tr>
            <td class="bigger" style="padding: 4px 6px;"><?= Html::a($item['title'], ['article/update', 'id'=>$item['id']], ['class' => 'hovered']) ?></td>
            <td style="font: italic 14px Arial,sans-serif;"><?= $item['maincategory_name'] .' : ' .$item['category_name'] ?></td>
            <td class="place-state">
                <span id="article-state-<?= $item['id'] ?>-<?= $item['state'] ?>" class="<?= ($item['state'] ==1) ? 'active' : 'no-active'; ?>"></span>
            </td>
            <td class="place-is_main">
                <span id="article-is_main-<?= $item['id'] ?>-<?= $item['is_main'] ?>" class="<?= ($item['is_main'] ==1) ? 'active' : 'no-active'; ?>"></span>
            </td>
            <td><?= HTML::a('<div class="icon_delete"></div>', ['article/delete', 'id' => $item['id']], ['class' => 'confirmDeletion']); ?></td>  
        </tr>
<?php } ?>        
    </table>

    <?php
    if($pages->pageCount > 1) {
        echo \yii\widgets\LinkPager::widget(['pagination' => $pages]);
    } 
}
?>

  </div><!-- /content -->
  </div><!-- /block-tables  -->
</div><!-- /main  -->