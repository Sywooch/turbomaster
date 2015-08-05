<?php
namespace frontend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use common\models\Product;
use common\models\Brand;
use common\models\Model;
use common\models\Seo;

class ListController extends \yii\web\Controller
{   

    public function actionIndex()
    {   
        $brands = [];
        $models = [];
        $seo    = [];
        $pages  = [];

        Product::$isActiveOnly = true;

        $getArray = ['category_alias', 'brand_alias', 'model_alias', 'manufacturer_alias'];
        foreach($getArray as $get) {
            ${$get} = Yii::$app->request->get($get);
        }
        
        if($brand_alias) {
            
            $seo = Seo::findByCategoryAndBrandAndModel($category_alias, $brand_alias, $model_alias);

            if($model_alias) {
                $products = Product::listByCategoryAliasAndBrandAliasAndModelAlias($category_alias, $brand_alias, $model_alias);
                $view = 'list_model';
            } else {
                $products = Product::listByCategoryAliasAndBrandAlias($category_alias, $brand_alias);
                $models = Model::listByCategoryAliasAndBrandAlias($category_alias, $brand_alias);
                $view = 'list_brand';
            }

        } elseif ($manufacturer_alias) {
            $products = Product::listByManufacturerAlias($manufacturer_alias);
            $view     = 'list_manufacturer';

        } else {
            $products = Product::listByCategoryAlias($category_alias);
            $brands   = Brand::listByCategoryAlias($category_alias);
            $view     = 'list_category';
        }   

        if ($products)  {
            $pages = Product::$pages;
            return $this->render( $view, 
                compact('products', 'brands', 'models', 'seo', 'pages'));
        
        }  else {
            // throw new NotFoundHttpException();
            return $this->render('empty');
        }    
    }
    

    public function actionRefurbish() 
    {
        $products = Product::listByType(Product::TYPE_REFURBISH);
        $pages = Product::$pages;
        return $this->render( 'list_refurbish', compact('products', 'pages'));
    }

    public function actionTuning($alias = 'tuning') 
    {
        $products = Product::listByCategoryAlias($alias);
        return $this->render( 'list_tuning', ['products' => $products]);
    }


    public function actionSparepart($alias = 'cartridge') 
    {
        $products = Product::listByCategoryAlias($alias);
        $pages = Product::$pages;
        return $this->render( 'list_' .$alias, compact('products', 'pages', 'alias'));
    }


    // public function actionCartridges() {
    //     return $this->render( 'list_cartridge');
    // }

   

}
