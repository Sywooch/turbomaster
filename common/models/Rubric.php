<?php
namespace common\models;

use Yii;

/**
 * This is the model class for table "rubric".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $alias
 * @property integer $pos
 * @property string $add_links
 */
class Rubric extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'rubric';
    }

 
    public function rules()
    {
        return [
            [['parent_id', 'pos'], 'integer'],
            [['name', 'alias'], 'string', 'max' => 255],
            [['add_links'], 'string']
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'alias' => 'Alias',
            'pos' => 'Pos',
            'add_links' => 'Add Links',
        ];
    }


    public static function getRubricListByMainRubricAlias($alias)
    {   
        return static::find()
            ->select('rubric.*, mainrubric.alias as mainrubric_alias, mainrubric.name as mainrubric_name, mainrubric.add_links')
            ->innerJoin('article', 'article.category_id = rubric.id')
            ->leftJoin('rubric AS mainrubric', 
                  'rubric.parent_id = mainrubric.id') 
            ->andWhere(['mainrubric.alias' => $alias])
            ->andWhere(['article.state' => 1])
            // ->andWhere('rubric.parent_id > 0')
            ->orderBy('rubric.pos')
            ->asArray()
            ->all();
    }
    
    public static function getListSubrubricHasPublishArticles()
    {
        return static::find()
            ->select('rubric.*')
            ->innerJoin('article', 'article.category_id = rubric.id') 
            ->andWhere('rubric.parent_id > 0')
            ->andWhere('article.state = 1')
            ->orderBy('rubric.name')
            ->asArray()
            ->all();
    }


}
