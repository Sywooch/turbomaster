<?php
namespace frontend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use common\models\Product;
use common\models\Brand;
use common\models\Model;
use common\models\Seo;
use common\models\PhotoProduct;

class ProductController extends \yii\web\Controller
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

        } elseif($manufacturer_alias) {
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
            throw new NotFoundHttpException(404);
        }    
    }
    

    public function actionRefurbish() 
    {
        $products = Product::listByTematic(Product::TYPE_REFURBISH);
        if ($products)  {
            return $this->render( 'list_refurbish', ['products' => $products]);

        }  else {
            throw new NotFoundHttpException(404);
        } 
    }

    public function actionTuning() 
    {
        $products = Product::listByTematic(Product::TYPE_TUNING);
        return $this->render( 'list_tuning', ['products' => $products]);
    }

    public function actionCartridges() {
        return $this->render( 'list_cartridge');
    }

    public function actionView()
    {
        Product::$isActiveOnly = true;
        
        // temporary get('id')
        if($productId = Yii::$app->request->get('id')) {
            $this->redirectToRightUri($productId);
        
        } elseif($productId = Yii::$app->request->get('tuning_id')) {
            $product = Product::findById($productId);
        
        } elseif(Yii::$app->request->get('model_alias') && Yii::$app->request->get('partnumber')) {
            $model_alias    = Yii::$app->request->get('model_alias');
            $partnumber     = Yii::$app->request->get('partnumber');
            $product        = Product::findByModelAliasAndPartnumber($model_alias, $partnumber);
            $productId      = $product['id'];
        }


        if ($product) {
            $analogs  = Product::findAnalogs($product);
            $photos   = PhotoProduct::findByPartnumberOrInterchange($product);
            $metaTags = Product::createMetaTagsForItem($product);
            $breadcrumbsLinks = Product::createBreadcrumbsLinksForItem($product);
            
            return $this->render('view', compact('product', 'analogs', 'photos', 'metaTags', 'breadcrumbsLinks'));
                
        } else {
            // $this->redirectToListSimilar();
            throw new NotFoundHttpException(404);
        }
    }
    

    private function redirectToRightUri($productId)
    {
        $product = Product::findById($productId);
        if($product) {
             $this->redirect(['product/view', 
                'brand_alias'   => $product['brand_alias'], 
                'model_alias'   => $product['model_alias'], 
                'partnumber'    => $product['partnumber'], 
                ]);
        
        }  else {
            throw new NotFoundHttpException(404);
        }
    }
    

    private function redirectToListSimilar() 
    {
        $req = trim($_SERVER['REQUEST_URI'], '/');
        $regArray = explode('/', $req);
        if(count($regArray) > 3 && $regArray[0] == 'goods') {

            $this->redirect(['product/index', 
                'category_alias' => 'passenger', 
                'brand_alias'    => $regArray[1], 
                'model_alias'    => $regArray[2], 
                ]);

        }  else {
            throw new NotFoundHttpException(404);
        } 
    }



}
