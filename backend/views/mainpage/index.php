<?php
use yii\helpers\Html;
use yii\helpers\CommonHelper;
use common\models\Mainpage;
use common\models\Utilities;
// use backend\assets\AdminAsset;

$this->title = 'ТурбоАдмин :: Главная страница';
$type = Yii::$app->request->get('type');
$model = new Mainpage;

$max = \common\models\Utilities::findMaxFrom($model->tableName(), ['condition' => "type = '$type'"]);
?>

<?= $this->render('/layouts/leftmenu/_common', ['title_name' => Mainpage::getName($type)]); ?>

<div id="main">
    <div id="block-tables" class="block">
        <?= $this->render('/layouts/topmenu/mainpage'); ?>

    <div class="content" style="margin: 20px 0 0 40px;">

        <table class="item-list" style="width: 700px;">
            <tbody>
            <tr style="background: #f0f0f0;">
                <th style="width: 360px;">Текст</th>
                <th style="width: 100px;">Фото</th>
                <th style="width: 140px;"></th>
                <th style="width: 90px;">Удалить</th>
            </tr>
        <?php 
        foreach($items as $item) { 
            $description = strip_tags($item['description']);
            $imgSrc = rtrim(Yii::$app->params['baseFrontendUrl'], '/') . Mainpage::getImageSrc($item);

            ?>
            <tr>
                <td>
                    <?= Html::a($description, ['mainpage/update', 'type' => $type, 'id'=>$item['id']], ['class' => 'hovered']) ?>
                </td>
                <td>
                    <?= Html::img($imgSrc, ['width' => 90, 'style' => 'border: 1px solid #ccc; border-radius: 3px; box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);']); ?>
                </td>
                <td>
                <?php
                if($item['pos'] > 1) {
                    echo Html::a('<div class="arrows button-behavior"></div>', [$model::tableName().'/shift', 'direction' => 'up', 'type' => $type, 'id'=> $item['id'] ]);
                }
                if($item['pos'] < $max) {
                    echo Html::a('<div class="arrows down button-behavior"></div>', [$model::tableName().'/shift', 'direction' => 'down', 'type' => $type, 'id'=> $item['id'] ]);
                } ?>       
                </td>
                <td class="vmiddle">
                    <?= Html::a('<div class="icon_delete"></div>', [$model->tableName() .'/delete', 'id'=> $item['id']], ['class' => 'confirmDeletion']) ?>
                </td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
        </table>

    </div><!-- /content -->
  </div><!-- /block-tables  -->
</div><!-- /main  -->
