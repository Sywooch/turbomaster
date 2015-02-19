<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "brand_category".
 *
 * @property integer $id
 * @property integer $brand_id
 * @property integer $category_id
 */
class CategoryBrand extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'category_brand';
    }

    public function rules()
    {
        return [
            [['brand_id', 'category_id'], 'integer']
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_id' => 'Brand ID',
            'category_id' => 'Category ID',
        ];
    }

    public static function listByCategoryAliasAndBrandAlias($category_alias, $brand_alias) 
    {   
        return static::find()
            ->select('model.*, brand.name as brand_name')
            ->leftJoin('category', 'category_brand.category_id = category.id')
            ->leftJoin('brand', 'category_brand.brand_id = brand.id')
            ->leftJoin('brand_model', 'brand_model.brand_id = brand.id')
            ->leftJoin('model', 'brand_model.model_id = model.id')
            ->where('category.alias = :category_alias AND brand.alias = :brand_alias', 
                    [':category_alias'  => $category_alias, 
                    ':brand_alias'      => $brand_alias])
            ->orderBy('model.name')
            ->asArray()
            ->all();
    }
    

    
    // refactoring   ::Basic query::
    private static function listBrands()
    {   
        return static::find()
            ->select('category_brand.id AS category_brand_id, 
                      brand.id, brand.name')
            ->leftJoin('brand',     'category_brand.brand_id    = brand.id')
            ->leftJoin('category',  'category_brand.category_id = category.id')
            ->orderBy('brand.name, brand.id');
    }

    // refactoring 
    public static function listBrandsByCategoryBrandId($category_brand_id) 
    {
        return static::listBrands()
            ->andWhere('category_brand.id = :category_brand_id', [':category_brand_id'=> (int)$category_brand_id])
            ->asArray()
            ->all();
    }

    // refactoring 
    public static function listBrandsByCategoryIdAndBrandIn($category_id, $brand_id) 
    {
        return static::listBrands()
            ->andWhere('category.id = :category_id AND brand.id = :brand_id', [':category_id' => $category_id, ':brand_id' => $brand_id ])
            ->asArray()
            ->all();
    }

    // refactoring 
    public static function listBrandsByCategory($category_id)
    {   
        $query = static::listBrands();
        return $query
            ->andWhere('category.id = :category_id', [':category_id' => $category_id])
            ->asArray()
            ->all();
    }

    // refactoring 
    public static function listPassengerAndTrackBrandsForDropDownList()
    {   
        $rows = static::listBrands()
            ->where('category_brand.category_id IN (1,2)')
            ->asArray()->all();
        $out = [];
        $isDubbleBrand = false;

        foreach($rows as $k => $row) {
            $name = $row['name'];
            if(isset($rows[$k+1]) && $rows[$k+1]['id'] == $row['id']) {
                $name .= ' (легковой)';
                $isDubbleBrand = true;
            } elseif($isDubbleBrand == true) {
                $name .= ' (грузовой)';
                $isDubbleBrand = false;
            } 
            $out[$row['id']] = $name;
        }
        return $out;
    }



}
