<?php

namespace common\models;

use Yii;
use yii\db\Query;
use common\models\Category;
use common\models\Image;
use common\models\PhotoProduct;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $manufacturer_id
 * @property integer $category_id
 * @property integer $brand_id
 * @property integer $model_id
 * @property integer $state
 * @property integer $type
 * @property string $partnumber
 * @property string $name
 * @property string $interchange
 * @property integer $price
 * @property string $warranty
 * @property string $engine
 * @property integer $volume
 * @property integer $power
 * @property string $date_from
 * @property string $date_to
 * @property integer $is_yml
 *
 * @property OrderProduct[] $orderProducts
 */


class Product extends \yii\db\ActiveRecord
{
    const STATE_INACTIVE = 0;
    const STATE_ACTIVE   = 1;
    
    const TYPE_NEW       = 1;
    const TYPE_REFURBISH = 2;


    public static $isActiveOnly = false; 
    public static $pages; 

    private static function createPaginator($query, $perPage = 20) 
    {
        static::$pages = new \yii\data\Pagination([
                'defaultPageSize' => $perPage,
                'totalCount' => $query->count(),
            ]);
    }

    private static function clearParam($str) 
    {   
        $strArr = preg_split("/[,?]/", $str);
        return $strArr[0];
    }


    public static function tableName()
    {
        return 'product';
    }


    public function rules()
    {
        return [
            [['name', 'state', 'type', 'category_id'], 'required', 'message' => 'Заполните поле'],
            [['category_id', 'brand_id', 'model_id', 'manufacturer_id', 'state', 'type', 'price', 'is_yml'], 'integer', 'message' => 'Только цифры'],
            [['name', 'interchange', 'volume', 'power'], 'string'],
            [['partnumber', 'warranty', 'engine', 'date_from', 'date_to'], 'string', 'max' => 255]
        ];
    }


    public function getModel()
    {
        return $this->hasOne('model', ['id' => 'model_id']);
    }

    public function getPhotos()
    {
        return $this->hasMany('photo_product', ['partnumber' => 'partnumber']);
    }

    public function getFullname() {
        return $this->name .', ' .$this->partnumber;
    }

    public function getOrderProducts()
    {
        // return $this->hasMany(OrderProduct::className(), ['product_id' => 'id']);
        return $this->hasMany('order', ['product_id' => 'id']);
    }

    public function getCartProducts()
    {
        return $this->hasMany('cart_product', ['product_id' => 'id']);
    }


    public static function queryProductFull($compact = false)
    {   

        $select = $compact ? 'product.*, manufacturer.name as manufacturer_name' : 
                'product.*,
                category.id as category_id, category.name as category_name, category.alias as category_alias, category.title_name as category_title_name, category.h1 as category_h1,
                brand.id as brand_id, brand.name as brand_name, brand.alias as brand_alias,  
                model.id as model_id, model.name as model_name, model.alias as model_alias, 
                manufacturer.id as manufacturer_id, manufacturer.name as manufacturer_name, manufacturer.alias as  manufacturer_alias,
                seo.rus_brand, seo.rus_model';

        $query = static::find()
            ->select($select)
            ->leftJoin('manufacturer', 'manufacturer.id = product.manufacturer_id');
        
        if(!$compact) {
            $query
            ->leftJoin('category',  'category.id  = product.category_id')
            ->leftJoin('model',     'model.id     = product.model_id')
            ->leftJoin('brand',     'brand.id     = product.brand_id')
            ->leftJoin('seo', 'seo.brand_alias = brand.alias AND seo.model_alias = model.alias');
        }
        
        $query->orderBy('product.name');

        // если надо выбрать только активные (в продаже) товары: 
        if(static::$isActiveOnly === true)    {
            $query->andWhere(['product.state' => static::STATE_ACTIVE ]);
        }
        return $query;
    }
    

    public static function findById($id)
    {
        $product = static::queryProductFull()
            ->andWhere(['product.id' => (int)$id ])
            ->asArray()
            ->one();
        return $product;
    }    


    public static function findByModelAliasAndPartnumber($model_alias, $partnumber)
    {
        $partnumber = static::clearParam($partnumber);

        $product = static::queryProductFull()
            ->andWhere(['partnumber'  => $partnumber,
                        'model.alias' => $model_alias ])
            ->asArray()
            ->one();
        return $product;
    }


    public static function listByCategoryAlias($category_alias)
    {   
        $query = static::queryProductFull()
            ->andWhere(['category.alias' => $category_alias])
            ->asArray();

        $paginator = static::createPaginator($query);
        return  $query->offset(static::$pages->offset)->limit(static::$pages->limit)->all();
    }    
       
    public static function listByCategoryAliasAndBrandAlias($category_alias, $brand_alias)
    {
        $query = static::queryProductFull()
            ->andWhere(['category.alias' => $category_alias,
                        'brand.alias'    => $brand_alias])
            ->asArray();
        
        $paginator = static::createPaginator($query);
        return  $query->offset(static::$pages->offset)->limit(static::$pages->limit)->all();
    } 

    public static function listByManufacturerAlias($manufacturer_alias)
    {
        $query = static::queryProductFull()
            ->andWhere(['manufacturer.alias' => $manufacturer_alias])
            ->andWhere(['product.type' => static::TYPE_NEW])
            ->orderBy('product.name')
            ->asArray();
            
        $paginator = static::createPaginator($query, 40);
        return  $query->offset(static::$pages->offset)->limit(static::$pages->limit)->all();
    }  

    public static function listByCategoryAliasAndBrandAliasAndModelAlias($category_alias, $brand_alias, $model_alias)
    {
        $query = static::queryProductFull()
           ->andWhere([ 'category.alias' => $category_alias,
                        'brand.alias'    => $brand_alias,
                        'model.alias'    => $model_alias ])
            ->asArray();

        $paginator = static::createPaginator($query);
        return  $query->offset(static::$pages->offset)->limit(static::$pages->limit)->all();
    }    

    public static function getInterchangeArray($product) 
    {
        $interchangeArray = array_map('trim', explode(',', $product['interchange']));
        foreach($interchangeArray as $k => $val) {
            if($val == $product['partnumber']) {
                unset($interchangeArray[$k]);
            } 
        }
        return $interchangeArray;
    }

    public static function createInterchangeArrayForInQuery($product) 
    {
        $arr = array_map('trim', explode(',', $product['interchange']));
        $arr[] = $product['partnumber'];
        $arr = array_unique($arr);
        return $arr;
    }


    public static function findAnalogs($product)
    {   
        $interchangeArray = static::createInterchangeArrayForInQuery($product);

        $query = static::queryProductFull()
            ->andWhere('product.price > 0')
            ->andWhere('product.id != :id', [':id' => (int)$product['id']])
            ->andWhere('product.partnumber != :partnumber', [':partnumber' => $product['partnumber']])
            ->andWhere(['product.model_id' => $product['model_id']])
            // ->andWhere(['product.name' => $product['name']])
            ->andWhere(['product.partnumber' => $interchangeArray])

            // // ->orWhere(['like', 'interchange', $product['partnumber']])
            ->asArray()
            ->all();
        return $query;
    }


    public static function listByType($type)
    {
        return static::queryProductFull()
            ->andWhere(['product.type' => $type])
            ->asArray()
            ->all();
    }  
    

    public static function updatePriceForAnalogs($product)
    {   
        $interchangeArray = static::createInterchangeArrayForInQuery($product);

        $products = static::find()
            ->andWhere(['type' => static::TYPE_NEW])
            ->andWhere(['in', 'partnumber',  $interchangeArray])
            // ->andWhere(['partnumber' => $partnumber])
            // ->orWhere(['like', 'interchange', $partnumber])
            ->all();

        if($products) {
            foreach($products as $item) {
                 $item->price = $product->price;
                 $item->save();
            }
        }
    }


    public static function createMetaTagsForItem($product)
    {
        $brand_name = $product['brand_name'] ? $product['brand_name'] : '';
        $model_name = $product['model_name'] ? $product['model_name'] : '';

        $common_car_name = ($product['rus_brand'] && $product['rus_model']) ? $product['rus_brand'] .' ' .$product['rus_model'] : $brand_name .' ' .$model_name;

        $description = $product['name'];
        if(!empty($product['partnumber'])) {
            $description .= ', код ' .$product['partnumber'];
        }
        if(strlen($common_car_name) > 2) {
            $description .= ' для автомобиля ' .$common_car_name ;
        }
        $description .= ' - наличие, цены, описание. Бесплатная доставка по Москве. Принимаем заказы со всех регионов России!';

        $keywords = [];
        $keywords[] = $product['name'];

        if(!empty($brand_name) && !empty($model_name)) {
            $keywords[] = $brand_name.' '.$model_name;
            $keywords[] = 'продажа турбин на ' .$brand_name .' ' .$model_name;
        }
        if(!empty($product['partnumber'])) {
            $keywords[] = $product['partnumber'];
        }
        
        $str = '';
        if(strlen($common_car_name) > 2) {
            $str = $common_car_name;
        }
        if(!empty($product['partnumber'])) {
            $str .= ' ' .$product['partnumber'];
        }
        if(strlen($str) > 2) {
            $keywords[] = 'купить турбину на ' .$str;
        }

        $metaKeywords = implode(', ', $keywords);
    
        return [
            'description' => $description, 
            'keywords'    => $metaKeywords
        ];
    }


    public static function createBreadcrumbsLinksForItem($product)
    {
        $links = [];
        $links[] = ['label' => 'ТурбоМагазин'];
        if(isset($product['category_id']) && $product['category_id'] == Category::TUNING)  {
            $links[] =  ['label' => 'Турбины для тюнинга', 'url' => ['product/tuning']];
        } else {
            if($product['category_name']) {
            $links[] =  ['label' => $product['category_name'], 'url' => ['product/index', 'category_alias'  => $product['category_alias']]];
            }
            if($product['brand_name']) {
            $links[] =  ['label' => $product['brand_name'], 'url' => ['product/index', 'category_alias'  => $product['category_alias'], 'brand_alias' => $product['brand_alias']]];
            }
            if($product['model_name']) {
            $links[] =  ['label' => $product['model_name'], 'url' => ['product/index', 'category_alias'  => $product['category_alias'], 'brand_alias' => $product['brand_alias'], 'model_alias' => $product['model_alias']]];
            }
        }
        $links[] = ['label' => $product['name']];
        return $links;
    }   

   

    public static function interchangeViewFormat($string)
    {
        return preg_replace("/\s*\,\s*/i", ", ", $string);
    }
    
    public static function interchangeFormFormat($string)
    {
        return preg_replace("/\s*\,\s*/i", "\n", $string);
    }

    public static function interchangeDbFormat($string)
    {   
        $string =  preg_replace("/\s*\,\s*/i", ",", $string);
        $string =  preg_replace("/\s+/i", ",", $string);
        return $string;
    }


    public static function fullLink($item)
    {   
        return ['product/view', 
                 'brand_alias'   => $item['brand_alias'], 
                 'model_alias'   => $item['model_alias'], 
                 'partnumber'    => $item['partnumber']
                ];
    }


    public function attributeLabels()
    {
        return [
            'manufacturer_id' => '',
            'type' => '',
            'state' => '',
            'model_id' => '',
            'partnumber' => 'Артикул',
            'name' => 'Наименование ',
            'interchange' => 'Взаимозаменяемость',
            'price' => 'Цена',
            'warranty' => 'Гарантия',
            'engine' => 'Двигатель',
            'volume' => 'Объём, см3',
            'power' => 'Мощность, л.с.',
            'date_from' => '',
            'date_to' => '',
        ];
    }


    //.....................................
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)) {
            $this->interchange = static::interchangeDbFormat($this->interchange);
            return true;
        }
        return false;
    }


    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            
            $countProductsWithSamePartnumber = Product::find()->where(['partnumber' => $this->partnumber])->count();

            if($countProductsWithSamePartnumber == 1) {
                
                $photos = PhotoProduct::find()->where(['partnumber' => $this->partnumber])->all();
                $arraySubdirectories = array_keys(PhotoProduct::getStandardPattern());
                foreach($photos as $photo) {
                    Image::deleteImages($photo->src, 'article', $arraySubdirectories);
                    $photo->delete();
                }
            }


            return true;
        }
        return false;
    }

}