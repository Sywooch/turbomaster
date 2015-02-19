<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property integer $id
 * @property string $category_alias
 * @property string $brand_alias
 * @property string $model_alias
 * @property string $rus_brand
 * @property string $rus_model
 * @property string $title
 * @property string $meta_key
 * @property string $meta_desc
 * @property string $history
 */
class Seo extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'seo';
    }


    public function rules()
    {
        return [
            [['category_alias', 'brand_alias', 'model_alias'], 'required'],
            [['meta_key', 'meta_desc', 'history'], 'string'],
            [['category_alias', 'brand_alias', 'model_alias', 'title'], 'string', 'max' => 255],
            [['rus_brand', 'rus_model'], 'string', 'max' => 120]
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_alias' => 'Category Alias',
            'brand_alias' => 'Brand Alias',
            'model_alias' => 'Model Alias',
            'rus_brand' => 'Brand Rus',
            'rus_model' => 'Model Rus',
            'title' => 'Title',
            'meta_key' => 'Meta Key',
            'meta_desc' => 'Meta Desc',
            'history' => 'History',
        ];
    }


    public static function findByCategoryAndBrand($category_alias, $brand_alias)
    {   
        return static::find()
            ->where([
                'category_alias' => $category_alias,
                'brand_alias' => $brand_alias,
                'model_alias' => NULL,
                ])
            ->asArray()
            ->one();
    }

    public static function findByCategoryAndBrandAndModel($category_alias, $brand_alias, $model_alias)
    {   
        return static::find()
            ->where([
                'category_alias' => $category_alias,
                'brand_alias' => $brand_alias,
                'model_alias' => $model_alias,
                ])
            ->asArray()
            ->one();
    }


}
