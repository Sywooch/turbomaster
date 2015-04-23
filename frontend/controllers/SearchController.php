<?php
namespace frontend\controllers;

use Yii;
use common\models\Product;

class SearchController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Product::queryProductFull()
            ->andWhere(['type' => Product::TYPE_NEW]);  

        if($brand_id = Yii::$app->request->get('brand_id')) {
            $query->andWhere(['brand.id'=> $brand_id]);
        }
        if($model_id = Yii::$app->request->get('model_id')) {
            $query->andWhere(['product.model_id' => $model_id]);
        } 
        if($partnumber = trim(Yii::$app->request->get('partnumber'))) {
            // $query->andWhere(['or like', 'product.interchange', $partnumber]);
            $query->andWhere('product.partnumber like :partnumber OR product.interchange like :partnumber OR model.name like :partnumber OR product.name like :partnumber OR product.engine like :partnumber', [':partnumber' => '%' .$partnumber .'%']);
        }

        $pages = new \yii\data\Pagination([
                'defaultPageSize' => 20,
                'totalCount' => $query->count(),
                ]);
            
        $products = $query
                ->asArray()
                ->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    // return  array_slice($products, 0, 20);
            return $products;
        }    

        if ($products) {
            return $this->render('index', ['products'=>$products,
                                           'pages'=>$pages]);
        } else {
            return $this->render('view', ['noFound' => true]);
        }
    }
 

    public function actionView() 
    {
        return $this->render('view');
    }

}
