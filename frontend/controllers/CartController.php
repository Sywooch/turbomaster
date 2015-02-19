<?php

namespace frontend\controllers;

use Yii;
use common\models\Cart;
use common\models\CartProduct;
use common\models;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class CartController extends Controller
{

    public $enableCsrfValidation = false;


    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    // 'create' => ['post'],
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Cart::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    // ajax
    public function actionCreate()
    {   
        $product_id = (int)Yii::$app->request->post('product_id');
        $cart = Cart::current();

        if(!empty($product_id) ) {
            if(CartProduct::addProductToCart($product_id, $cart->id)) {
                Cart::updateSessionCountProduct();
            }
        }
        
        $lines = $cart->listCartProducts();

            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

                $total_price = CartProduct::totalPriceByCartId($cart->id);
                $out = ['lines' => $lines, 'totalPrice' => $total_price];
                return $out;
            }
    }

    // ajax
    public function actionQuantity() 
    {
        $line_id = (int)Yii::$app->request->post('line_id');
        $sign   = Yii::$app->request->post('sign');

        $line = CartProduct::findOne($line_id);

        if($line && Yii::$app->request->isAjax) {

            if($new_quantity = CartProduct::changeQuantity($line, $sign))  {
                Cart::updateSessionCountProduct();
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

                $total_price = CartProduct::totalPriceByCartId($line->cart_id);
                return ['quantity' => $new_quantity, 'totalPrice' => $total_price];
            }
        }
    }

    // ajax
    public function actionDelete_row() 
    {
        $line_id = (int)Yii::$app->request->post('line_id');
        $line = CartProduct::findOne($line_id);
        $cart_id = $line->cart_id;

        if($line->delete() && Yii::$app->request->isAjax) {
            Cart::updateSessionCountProduct();
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            
            $total_price = CartProduct::totalPriceByCartId($cart_id);
            return ['totalPrice' => $total_price];
        }
    }

    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     } else {
    //         return $this->render('update', [
    //             'model' => $model,
    //         ]);
    //     }
    // }


    // public function actionDelete($id)
    // {
    //     $this->findModel($id)->delete();
    //     return $this->redirect(['index']);
    // }


    protected function findModel($id)
    {
        if (($model = Cart::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
