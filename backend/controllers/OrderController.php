<?php
namespace backend\controllers;

use backend\controllers\AdminController;
use Yii;
use yii\web\NotFoundHttpException;
use common\models\Order;
use common\models\OrderProduct;
use yii\helpers\ArrayHelper;


class OrderController extends AdminController
{   


    public function actionIndex($state = null)
    {
        \common\models\Utilities::setBackUrl(Yii::$app->request->url);

        $result = Order::getList($state);
        return $this->render('index', $result);
    }

    
    public function actionUpdate($id)
    {   
        $model = $this->findModel($id);
        $model->scenario = 'admin';
        $order = [];
        $lines = [];

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->save();
                // Yii::$app->session->setFlash('success', 'Стутус изменен');
            }
            return $this->redirect(['update', 'id' => $id]);
        } else {
            $order = Order::findOne($id);
            $lines = OrderProduct::getLines($id);
            
            return $this->render('update', [
                'model' => $model, 
                'order' => $order,
                'lines' => $lines
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


}
