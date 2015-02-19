<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "brand_model".
 *
 * @property integer $id
 * @property integer $brand_id
 * @property integer $model_id
 */
class BrandModel extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'brand_model';
    }


    public function rules()
    {
        return [
            [['brand_id', 'model_id'], 'integer']
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_id' => 'Brand Id',
            'model_id' => 'Model Id',
        ];
    }

    // refactoring 
    public static function listByCategoryIdAndBrandId($category_id, $brand_id) 
    {
        return static::find()
            ->select('model.*')
            ->leftJoin('model',          'brand_model.model_id    = model.id')
            ->leftJoin('brand',          'brand_model.brand_id    = brand.id')
            ->leftJoin('category_brand', 'category_brand.brand_id = brand.id')
            ->orderBy('model.name')
            ->andWhere('category_brand.category_id  = :category_id AND 
                        brand_model.brand_id        = :brand_id', 
                        [
                            ':category_id'  => $category_id, 
                            ':brand_id'     => $brand_id 
                        ])
            ->asArray()
            ->all();
    }

}
