<?php

namespace common\models;

use Yii;
use common\models\BrandCategory;

/**
 * This is the model class for table "brand".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string  $name
 * @property string  $alias
 */

class Brand extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'brand';
    }

    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['brand_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['name', 'alias'], 'string', 'max' => 255]
        ];
    }

   
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'category_id',
            'name' => 'Name',
            'alias' => 'Alias',
        ];
    }



    // refactoring   ::Basic query::
    private static function findList()
    {   
        return static::find()
            ->select('brand.*, category.brief as category_brief')
            ->leftJoin('category', 'brand.category_id = category.id')
            ->orderBy('brand.name, brand.category_id');
    }


    // refactoring
    public static function listByCategoryAlias($category_alias) 
    {   
        return static::findList()
            ->andWhere('category.alias = :category_alias', [':category_alias' => $category_alias])
            // ->groupBy('brand.id')
            ->asArray()
            ->all();
    }

    // refactoring
    public static function listForDropDownList()
    {
        $rows = static::findList()
            ->andWhere('category.id IN (1,2)')
            ->asArray()
            ->all();

        $out = [];
        $isDubbleBrand = false;

        foreach($rows as $k => $row) {
            $name = $row['name'];
            if(isset($rows[$k+1]) && $rows[$k+1]['name'] == $name) {
                $isDubbleBrand = true;
                $name .= ' (' .$row['category_brief'] .')';
            } elseif($isDubbleBrand == true) {
                $isDubbleBrand = false;
                $name .= ' (' .$row['category_brief'] .')';
            } 
            $out[$row['id']] = $name;
        }
        return $out;
    }


}
