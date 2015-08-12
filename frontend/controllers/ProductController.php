<?php
namespace frontend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use common\models\Product;
use common\models\PhotoProduct;
use common\models\Link;

class ProductController extends \yii\web\Controller
{   

    public function actionView()
    {
        Product::$isActiveOnly = true;
        
        if($productId = Yii::$app->request->get('id')) {
            // temporary get('id')
            $this->redirectToRightUri($productId);
        } elseif($productId = Yii::$app->request->get('tuning_id')) {
            $product = Product::findById($productId);
        } elseif($productId = Yii::$app->request->get('sparepart_id')) {
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
            $interestLink = Link::getRandomInterestLink();
            $metaTags = Product::createMetaTagsForItem($product);
            $breadcrumbsLinks = Product::createBreadcrumbsLinksForItem($product);
            
            return $this->render('view', compact('product', 'analogs', 'photos', 'interestLink', 'metaTags', 'breadcrumbsLinks'));
                
        } else {
            $this->redirectToListSimilar();
            // throw new NotFoundHttpException();
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
            throw new NotFoundHttpException();
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
            throw new NotFoundHttpException();
        } 
    }



}
