<?php

namespace backend\controllers;

use backend\controllers\AdminController;
use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Product;
use common\models\Brand;
use common\models\Car;
use common\models\PhotoProduct;
use yii\helpers\ArrayHelper;

use yii\db\Query;



class ProductController extends AdminController
{   

    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['post'],
    //                 // 'insert' => ['post'],
    //                 // 'update' => ['post'],
    //             ],
    //         ],
    //     ];
    // }


    public function actionIndex()
    {
        \common\models\Utilities::setBackUrl(Yii::$app->request->url);

        $query = Product::queryProductFull($compact = true);

        $getsArray = ['category_id', 'brand_id', 'model_id', 'manufacturer_id', 'type', 'state', 'is_yml'];
        foreach($getsArray as $get) {
            if($value = Yii::$app->request->get($get)) {
                if(in_array($get, ['state']) && $value == 2) {
                    $value = 0;
                }
                $query->andWhere(["product.$get" => $value]);
            }
        }

        if($partnumber = Yii::$app->request->get('partnumber')) {
            $partnumber = trim($partnumber);
            // $query->andWhere(['like', 'interchange', $partnumber,]);
            // $query->andWhere(['or like', 'partnumber', $partnumber,]);
            $query->andWhere('product.partnumber like :partnumber OR product.interchange like :partnumber OR model.name like :partnumber OR product.name like :partnumber', [':partnumber' => '%' .$partnumber .'%']);
        }

        $pages = new \yii\data\Pagination(['totalCount' => $query->count()]);
        $query->offset($pages->offset)->limit($pages->limit);
        $products = $query->asArray()->all();            

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return  $products;
        }    

        if (!$products)  $products = [];
        return $this->render('index', [ 'products'=>$products,
                                        'pages'=>$pages]);
        
        // } else { return $this->render('empty'); }
    }

    
    public function actionPhoto($id) 
    {
        $product = $this->findModel($id);
        $photos = PhotoProduct::findByPartnumber($product['partnumber']);
        return $this->render('photo', ['product' => $product, 'photos' => $photos]);
    }

    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->type == Product::TYPE_NEW) {
                Product::updatePriceForAnalogs($model);
            }
            Yii::$app->session->setFlash('success', 'Товар сохранен');
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             if($model->type == Product::TYPE_NEW) {
                Product::updatePriceForAnalogs($model);
            }
            Yii::$app->session->setFlash('success', 'Товар сохранен');
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
