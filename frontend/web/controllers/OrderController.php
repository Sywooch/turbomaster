<?php

namespace frontend\controllers;

use Yii;
use common\models\Order;
use common\models\Cart;
use common\models\CartProduct;
use common\models\OrderProduct;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;



class OrderController extends Controller
{


    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'create' => ['post'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Order::find(),
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

    public function actionSuccess()
    {
        return $this->render('success');
    }


 
    public function actionCreate()
    {
        $cart  = Cart::current();
        $lines = CartProduct::find()
            ->where(['cart_id' => $cart->id])
            ->all();

        $model = new Order(['scenario' => 'buyer']);
        $model->load(Yii::$app->request->post());

        if ($model->load(Yii::$app->request->post()) && count($lines) > 0 && $model->save()) {

            foreach ($lines as $line) {
                $op = new OrderProduct;
                $op->order_id   = $model->id;
                $op->product_id = $line->product_id;
                $op->quantity   = $line->quantity;
                $op->price      = $line->price;
                $op->save();
            }

            $linesForEmail = Cart::listCartProducts();
            $this->sendEmails($model, $linesForEmail);

            Cart::resetSessionCountProduct();
            $cart->delete();

            return $this->redirect('/order/success');
        } else {
            // return $this->render('create', ['model' => $model,]);
        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    private function sendEmails($model, $linesForEmail)  
    {
        $messages = [];
        $subject =  'Заказ в магазине Tурбомастер';

        foreach(Yii::$app->params['adminShopEmails'] as $emailTo) {
            $messages[] = Yii::$app->mail
                ->compose([
                        // 'html' => 'order-html',
                        'text' => 'order-text',
                    ], 
                    [
                        'order' => $model,
                        'lines' => $linesForEmail,
                    ])
                ->setFrom(Yii::$app->params['informatorEmail'])
                ->setTo($emailTo)
                ->setSubject($subject); 
        }
        Yii::$app->mail->sendMultiple($messages);
    }

}
