<?php
namespace backend\controllers;

use backend\controllers\AdminController;  
use Yii;
use common\models\Model;
use common\models\Link;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class LinkController extends AdminController
{


    public function actionIndex()
    {   
        $model  = new Link;
        $items  = Link::find()->asArray()->all();
        $params = [
            'title_name'    => 'Отзывы',
            // 'jsFile'        => 'js/links.js',
            'columns' => [
                [
                    'property'  => 'url',
                    'name'      => 'Ссылка',
                    'width'     => '160',
                    // 'link'      =>  'opinion/edit',
                    'editorial' =>  true, 
                    // 'style'     => 'font-size: 13px;',
                ],
                [
                    'property'  => 'title',
                    'name'      => 'Заголовок',
                    'width'     => '220',
                    'editorial' =>  true, 
                ],
                [
                    'property'  => 'brief',
                    'name'      => 'Кратко',
                    'width'     => '220',
                    'editorial' =>  true,
                ],
                [
                    'property'  => 'pos',
                    'name'      => 'Поз.',
                    'width'     => '50',
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
        $model = new Link();
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
        if (($model = Link::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
