<?php
use yii\helpers\Html;
use backend\assets\AdminAsset;

$this->title = 'ТурбоАдмин :: ' .$params['title_name'];
$this->registerJsFile('js/list.js', ['depends' => [AdminAsset::className()]]);

if(isset($params['jsFile'])) {
    $this->registerJsFile($params['jsFile'], ['depends' => [AdminAsset::className()]]);
}

$tableName = $model->tableName();
?>

<?= $this->render('/layouts/leftmenu/_common', ['title_name' => $params['title_name']]); ?>

<div id="main">
    <div id="block-tables" class="block">
        <?= $this->render('/layouts/topmenu/_common', ['title_name' => $params['title_name'], 'is_add' => true]); ?>

    <div class="content" style="margin: 20px 0 0 40px;">

        <?php  $formPath = (isset($params['formPath'])) ? $params['formPath'] : '_form_common'; 
        echo $this->render($formPath, ['model' => $model, 'params' => $params]); 
        
         
        $tableWidth = 200;
        foreach($params['columns'] as $column) {
            $tableWidth += intval($column['width']);
        }
        ?>
        <table class="item-list" style="width: <?= $tableWidth ?>px;">
            <tr style="background: #f0f0f0;">
            <?php 
            foreach($params['columns'] as $column): ?>
                <th><?= $column['name'] ?></th>
            <?php endforeach ?>
                <th></th>
                <th>Удалить</th>
            </tr>

    <?php 
        foreach($items as $item) { ?>
            <tr>
        <?php 
        foreach($params['columns'] as $column) { 

            if(isset($column['toggleDot']) && $column['toggleDot'] === true) { ?>
                <td class="place-<?= $column['property'] ?>">
                    <span id="<?= $tableName .'-' .$column['property'] .'-' .$item['id'] .'-' .$item[$column['property']] ?>" class="<?= ($item[$column['property']] == 1) ? 'active' : 'no-active'; ?>"></span>
                </td>
            <?php
            }   else {
                $class = (isset($column['editorial']) && $column['editorial'] === true) ? 'cursor-pointer place-for-phantom' : '';
                $style = 'width: ' .$column['width'] .'px;';
                if(isset($column['style'])) {
                     $style .= ' ' .$column['style'];
                }
                if(isset($column['class'])) {
                     $class .= ' ' .$column['class'];
                }

                $tdContent = $item[$column['property']];
                if(isset($column['link'])) {
                     $tdContent = Html::a($tdContent, [$column['link'], 'id'=>$item['id']]);
                } 

                ?>
                <td class="<?= $class ?>" id="<?php echo $tableName .'-' .$column['property'] .'-' .$item['id'] ?>" style="<?= $style ?>"><?= $tdContent ?></td>
        <?php   
            }
        } ?>
                <td>
            <?php
            if(isset($params['posManipulate']) and $params['posManipulate'] === true) {
                $max = \common\models\Utilities::findMaxFrom($tableName);

                if($item['pos'] > 1) {
                    echo Html::a('<div class="arrows button-behavior"></div>', [$model::tableName().'/shift', 'direction' => 'up', 'id'=> $item['id'] ]);
                }
                if($item['pos'] < $max) {
                    echo Html::a('<div class="arrows down button-behavior"></div>', [$model::tableName().'/shift', 'direction' => 'down', 'id'=> $item['id'] ]);
                }    
            } 
            ?>
                </td>
                <td><?= Html::a('<div class="icon_delete"></div>', [$tableName .'/delete', 'id'=> $item['id']], ['class' => 'confirmDeletion']) ?></td>
            </tr>
<?php } ?>
    </table>

  </div><!-- /content -->
  </div><!-- /block-tables  -->
</div><!-- /main  -->
