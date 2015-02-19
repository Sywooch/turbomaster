<?php
namespace backend\controllers;

use backend\controllers\AdminController;  
use Yii;
use common\models\Category;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class CategoryController extends AdminController
{

   
    public function actionIndex()
    {   
        $model  = new Category;
        $items  = Category::find()->orderBy('pos, name')->asArray()->all();
        $params = [
            'title_name' => 'Категории транспорта',
            'posManipulate' => false,
            'jsFile' => 'js/categories.js',

            'columns' => [
                [
                    'property'  => 'name',
                    'name'      => 'Название',
                    'width'     => '200',
                    'editorial' =>  true,
                ],
                [
                    'property'  => 'alias',
                    'name'      => 'Псевдоним',
                    'width'     => '100',
                    'editorial' =>  true,
                ],
                [
                    'property'  => 'title_name',
                    'name'      => 'Заголовок',
                    'width'     => '180',
                    'editorial' =>  true,
                ],
                [
                    'property'  => 'h1',
                    'name'      => 'h1',
                    'width'     => '180',
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
