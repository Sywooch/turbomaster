<?php

namespace common\models;

use Yii;
use common\models\Product;

/**
 * This is the model class for table "popular".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $product_id
 * @property string  $brand_alias
 * @property string  $model_alias
 * @property string  $partnumber
 * @property integer $pos
 */
class Popular extends \yii\db\ActiveRecord
{
    public $product_id;

    public static function tableName()
    {
        return 'popular';
    }

    public function rules()
    {
        return [
            [['product_id', 'type', 'pos'], 'integer'],
            [['brand_alias', 'model_alias', 'partnumber'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '',
            'type' => '',
            'product_id' => '',
            'brand_alias' => '',
            'model_alias' => '',
            'partnumber' => '',
            'pos' => '',
        ];
    }


    public static function getProductList()
    {
        return static::find()
            ->select('popular.id, popular.pos, 
                      product.id as product_id, product.name as product_name, product.partnumber, product.price, 
                      brand.alias as brand_alias, brand.name as brand_name,
                      model.alias as model_alias')
            ->leftJoin('brand', 'popular.brand_alias = brand.alias')
            ->leftJoin('model', 'popular.model_alias = model.alias')
            ->leftJoin('product', 'popular.partnumber = product.partnumber AND model.id = product.model_id')
            ->groupBy('product.id')
            ->orderBy('RAND()')
            ->limit(5)
            ->asArray()
            ->all();
    }


    //.....................................
    
    public function beforeSave($insert) 
    {
        if(parent::beforeSave($insert)) {

            // $product = Product::find()

            $product = (new \yii\db\Query())
                ->from(Product::tableName())
                ->select('brand.alias as brand_alias, model.alias as model_alias, product.partnumber')
                ->leftJoin('brand', 'product.brand_id = brand.id')
                ->leftJoin('model', 'product.model_id = model.id')
                ->where('product.id = :product_id', [':product_id' =>  $this->product_id])
                ->one();
            
            if($product) {
                $this->partnumber  = $product['partnumber'];
                $this->brand_alias = $product['brand_alias'];
                $this->model_alias = $product['model_alias'];
            }
            return true;
        }
        return false;
    }


}
