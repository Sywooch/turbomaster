<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "model".
 *
 * @property integer $id
 * @property integer $brand_id
 * @property string $name
 * @property string $alias
 */
class Model extends \yii\db\ActiveRecord
{

    public $brand_name;

    public static function tableName()
    {
        return 'model';
    }



    public function rules()
    {
        return [
            [['brand_id'], 'integer'],
            [['name', 'alias'], 'string', 'max' => 255]
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_id' => 'brand_id',
            'name' => 'Name',
            'alias' => 'Alias',
        ];
    }


    // refactoring   ::Basic query::
    private static function findList()
    {   
        return static::find()
            ->select('model.*')
            ->leftJoin('brand',     'brand.id    = model.brand_id')
            ->leftJoin('category',  'category.id = brand.category_id')
            ->orderBy('model.name');
    }
    
    // refactoring
    public static function listByBrandId($brand_id) 
    {   
        return static::findList()
            ->andWhere('brand.id = :brand_id', [':brand_id' => $brand_id])
            ->asArray()
            ->all();
    }

    // refactoring
    public static function listByCategoryAliasAndBrandAlias($category_alias, $brand_alias) 
    {   
        return static::findList()
            ->andWhere('category.alias  = :category_alias AND 
                        brand.alias     = :brand_alias',
                       [
                        ':category_alias' => $category_alias,
                        ':brand_alias'    => $brand_alias,
                       ])
            ->asArray()
            ->all();
    }

}
