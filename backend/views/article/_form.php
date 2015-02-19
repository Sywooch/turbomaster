<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use yii\helpers\ArrayHelper;
use common\models\Article;
use common\models\Rubric;

$attributesArray = ['category_id',  'state'];
foreach($attributesArray as $variable) {
  ${$variable} = (!empty($model->{$variable})) ? $model->{$variable} : 0;
}

$stateList = [1 => 'активный', 0 => 'не активный' ];

?>

<div class="form-common" style="margin-left: 40px;">

<?php $form = ActiveForm::begin([
                  'enableAjaxValidation' => false,
                  // 'enableClientValidation' => true,
                  'enableClientValidation' => false,
                ]); 
?>

   <div id="top_panel" style="margin: 20px 0 20px 0;">
      
      <div class="inline right-bordered" style="width: 280px; height: 90px;">
            <div id="parent_block" style="margin: 10px 0 0 0;">
              <?php
              $main_category_id = ($model->isNewRecord) ? 0 : Rubric::findOne($model->category_id)['parent_id'];
              $mainRubricList = ArrayHelper::map(Rubric::find()->where('parent_id = 0')->all(), 'id', 'name');

              echo Html::dropDownList('main_category_id', $main_category_id, $mainRubricList, ['prompt'=>'--Раздел--', 'id'=>'dropDownMainRubrics']);  ?>
            </div>

            <div id="children_block"  style="margin: 10px 0 0 0;">
                <div id="warpDropDownRubrics">
                <?php
                if($main_category_id)  {
                    $rubricList = ArrayHelper::map(Rubric::find()->where('parent_id = :main_category_id', [':main_category_id' => $main_category_id])->all(), 'id', 'name');
                } else { $rubricList = []; } ?>

                <?= $form->field($model, 'category_id')->dropDownList($rubricList, ['prompt'=>'--Рубрика--', 'id' => 'dropDownRubrics']); ?> 

                </div>  
            </div>
        </div><!-- /first block -->


        <div class="inline"  style="width: 280px; margin-left: 80px;">
            <div>
                <?= $form->field($model, 'state')->dropDownList($stateList); ?> 
            </div>
            <?= $form->field($model, 'alias')->textInput(['style' => 'font-weight: normal; font-size: 15px; margin-top: 4px; width: 184px; height: 20px;', 'placeholder' => 'Псевдоним', 'id' => 'input-alias']) ?>
        </div><!-- /second block -->

        
 
    </div><!-- /panel_filter --> 

    <div style="width: 780px; margin: 0 0 20px 0;">

        <?= $form->field($model, 'title')->textInput(['style' => 'width: 767px; height: 20px; font-weight: normal; font-size: 16px;', 'placeholder' => 'Заголовок', 'id' => 'input-title']) ?>

        <label id="toggle-brief">Кратко</label>
        <label id="toggle-meta">Мета</label>
        <div class="clearfix"></div>
        
        <div id="wrap-brief" style="display: none;">
            <?= $form->field($model, 'brief')->textArea()->widget(yii\imperavi\Widget::className(), [
                    'options' => [
                        'minHeight' =>  100,
                        'maxHeight' =>  100,
                        'linebreaks' => true,
                        'buttons' => array('html', '|', 'formatting',  'bold', 'italic', '|', 'h4', 'unorderedlist', 'orderedlist', '|',  'link', '|', 'alignment', '|', 'horizontalrule', '|', 'table'),
                        'formattingTags' => array('p', 'h3', 'h4', 'h5'),
                    ],
                ]);
            ?>
        </div>

        <div id="wrap-meta" style="display: none; margin: 10px 0 40px 0;">
            <?= $form->field($model, 'metadesc'); ?>
            <?= $form->field($model, 'metakey'); ?>
        </div>

        <?= $form->field($model, 'content')->textArea()->widget(yii\imperavi\Widget::className(), [
                'options' => [
                    'minHeight' =>  400,
                    'maxHeight' =>  400,
                    'linebreaks' => true,
                    // 'pastePlainText' => true,
                    // 'iframe' => true,
                    // 'removeEmptyTags' => true,
                    // 'allowedTags' => array('p', 'h2', 'h3', 'h4', 'div', 'strong', 'br'),
                    // 'plugins' => ['fontcolor'],

                    'buttons' => array('html', '|', 'formatting',  'bold', 'italic', '|', 'h4', 'unorderedlist', 'orderedlist', '|',  'link', '|', 'alignment', '|', 'horizontalrule', '|', 'table'),
                    'formattingTags' => array('p', 'h3', 'h4', 'h5'),
                ],
            ]);
        ?>

        <div class="form-group" style="margin: 40px 0 0 0;">
            <?= Html::a('Отмена', \common\models\Utilities::backUrl(), ['class' => 'button_link']) ?>
            <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', []) ?>
        </div>
        
    </div> 
   

    <?php ActiveForm::end(); ?>

</div>
