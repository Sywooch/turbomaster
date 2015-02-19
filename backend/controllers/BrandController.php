<?php
namespace backend\controllers;

use backend\controllers\AdminController;  
use Yii;
use common\models\Model;
use common\models\Brand;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class BrandController extends AdminController
{
    // public $enableCsrfValidation = false; 

    public function actionModellist($id)
    {   
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return Model::listByBrandId($id);
        }
    }

    public function actionIndex()
    {   
        $model  = new Brand;
        $items  = Brand::find()->orderBy('name')->asArray()->all();
        $params = [
            'title_name'    => 'Бренды транспорта',
            'jsFile'        => 'js/brands.js',
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
        $model = new Brand();
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
        if (($model = Brand::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
