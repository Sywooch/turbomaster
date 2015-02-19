<?php

namespace backend\controllers;

use backend\controllers\AdminController;  
use Yii;
use common\models\Manufacturer;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class ManufacturerController extends AdminController
{

    

    public function actionIndex()
    {   
        $model  = new Manufacturer;
        $items  = Manufacturer::find()->orderBy('name')->all();
        $params = [
            'title_name' => 'Бренды турбин',
            'posManipulate' => false,
            'columns' => [
                [
                    'property'  => 'name',
                    'name'      => 'Название',
                    'width'     => '260',
                    'editorial' =>  true,
                ],
                [
                    'property'  => 'alias',
                    'name'      => 'Псевдоним',
                    'width'     => '260',
                    'editorial' =>  true,
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
        $model = new Manufacturer();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        } 
        return $this->redirect(['index']);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Manufacturer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
