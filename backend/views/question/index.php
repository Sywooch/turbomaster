<?php
use yii\helpers\Html;
use common\models\Question;
use yii\helpers\CommonHelper;
use backend\assets\AdminAsset;

$title = (\Yii::$app->request->get('type') == Question::TYPE_COMMON_QUESTION) ? 'Вопросы' : 'Запросы цены';

$this->title = 'ТурбоАдмин :: ' .$title;
$this->registerJsFile('js/questions.js', ['depends' => [AdminAsset::className()]]);
?>

<?= $this->render('/layouts/leftmenu/questions'); ?>

<div id="main">
    <div id="block-tables" class="block">  
        <?= $this->render('/layouts/topmenu/_common', ['title_name' => $title]); ?>
    <div class="content">
     
    <table class="item-list questions-list">
        <tr>
            <th>Статус</th>
            <th>Дата</th>
            <th>Вопрос</th>
            <th>Контакты</th>
            <th>Удал</th>
        </tr>
        <tr class="rails" style="height: 1px;">
            <td style="width: 130px;"></td>
            <td style="width: 60px;"></td>
            <td style="width: 390px;"></td>
            <td style="width: 150px;"></td>
            <td style="width: 50px;"></td> 
        </tr>

        <?php
        $arState =  [1 =>'Новый',
                     2 =>'Дан ответ',
                     3 =>'Ошибка'];
 if($items) {                   
    foreach($items as $item) {
    ?>
        <tr>
            <td class="place-state for-select" id="question-state-<?=$item['id'] .'-'.$item['state']; ?>"><?= $arState[$item['state']] ?>
            </td>
            <td style="padding: 10px 0;">
                <?php 
                $phpdate = strtotime($item['created_at']);
                echo date("d.m.Y", $phpdate ) .'<span style="display: inline; color: #999; padding-left: 6px;">' .date("H:i", $phpdate) .'</span>';  ?>
            </td>
            <td>
                <div class="td-question-name">
                    <?php 
                    // $url = \Yii::$app->urlManagerFrontend->createAbsoluteUrl(['product/view', 'id'=> $item['product_id']]); 
                     $url = ['product/update', 'id'=> $item['product_id']]; 
                    ?>
                    <span class="hovered"><?= $item['product_name'] ?></span>

                    <?= Html::a('| к турбине |', ['product/update', 'id'=> $item['product_id']], ['class' => 'info', 'target' => '_blank']) ?>  
                </div>
                <div class="td-question-content">
                    <?= $item['content']; ?>
                </div>
            </td>
            <td class="person">
                <p><?= $item['name']; ?></p>
                <p><?= $item['phone']; ?></p>
                <p><a class="mailto" href="mailto: <?= $item['email']; ?>"><?= $item['email']; ?></a></p>
            </td>         
            <td><?= HTML::a('<div class="icon_delete"></div>', ['question/delete', 'id' => $item['id']], ['class' => 'confirmDeletion']); ?></td>
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