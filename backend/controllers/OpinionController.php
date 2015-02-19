<?php
namespace backend\controllers;

use backend\controllers\AdminController;  
use Yii;
use common\models\Model;
use common\models\Opinion;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class OpinionController extends AdminController
{


    public function actionIndex()
    {   
        $model  = new Opinion;
        $items  = Opinion::find()->orderBy('created_at DESC')->asArray()->all();
        $params = [
            'title_name'    => 'Отзывы',
            'jsFile'        => 'js/opinions.js',
            'columns' => [
                [
                    'property'  => 'content',
                    'name'      => 'Отзыв',
                    'width'     => '320',
                    'link'      =>  'opinion/edit',
                    'style'     => 'font-size: 13px;',
                ],
                [
                    'property'  => 'name',
                    'name'      => 'Имя',
                    'width'     => '80',
                    'style'     => 'font-size: 13px;',
                ],
                [
                    'property'  => 'email',
                    'name'      => 'E-mail',
                    'width'     => '70',
                    'style'     => 'font-size: 13px;',
                ],
                [
                    'property'  => 'city',
                    'name'      => 'Город',
                    'width'     => '70',
                    'style'     => 'font-size: 13px;',
                    'editorial' =>  true, 
                ],
                [
                    'property'  => 'company',
                    'name'      => 'Компания',
                    'width'     => '60',
                    'style'     => 'font-size: 13px;',
                    'editorial' =>  true, 
                ],
                [
                    'property'  => 'created_at',
                    'name'      => 'Дата',
                    'width'     => '50',
                    'style'     => 'font-size: 12px; ',
                    'editorial' =>  true, 
                ],
                [
                    'property'  => 'approved',
                    'name'      => 'Утвер.',
                    'width'     => '70',
                    'toggleDot' =>  true,
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
        $model = new Opinion();
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
        if (($model = Opinion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
