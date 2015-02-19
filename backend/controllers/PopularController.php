<?php

namespace backend\controllers;

use backend\controllers\AdminController;  
use Yii;
use common\models\Popular;
use common\models\Utilities;
use yii\web\NotFoundHttpException;


class PopularController extends AdminController
{
    // public $enableCsrfValidation = false; 

    public function actionIndex()
    {   
        $model  = new Popular;
        $items  = Popular::getProductList();
        $params = [
            'title_name'    => 'Популярные товары',
            'posManipulate' => true,
            'formPath'      => '/popular/_form',
            'columns' => [
                [
                    'property'  => 'product_name',
                    'name'      => 'Название товара',
                    'width'     => '360',
                    'editorial' =>  true,
                ],
                [
                    'property' => 'partnumber',
                    'name'     => 'Артикул',
                    'width'    => '160',
                ],

            ],
        ];

        return $this->render('/list/index', [
                'model'  => $model,
                'items'  => $items,
                'params' => $params,
                ]);
    }


    public function actionCreate()
    {
        $model = new Popular();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        } 
        return $this->redirect(['index']);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    public function actionShift($id, $direction)
    {
        $params = ['beforeNormalize' => true];
        Utilities::shiftItem(new Popular, $id, $direction, $params);

        return $this->redirect(['popular/index']);
    }


    protected function findModel($id)
    {
        if (($model = Popular::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
