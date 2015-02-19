<?php

namespace backend\controllers;

use backend\controllers\AdminController;
use Yii;
use yii\web\NotFoundHttpException;
use common\models\Question;
use yii\helpers\ArrayHelper;



class QuestionController extends AdminController
{   

  

    public function actionIndex()
    {
        \common\models\Utilities::setBackUrl(Yii::$app->request->url);

        $query = Question::find()
            ->select('question.*, product_id as product_id, product.name as product_name')
            ->leftJoin('product',  'product.id = question.product_id')
            ->orderBy('question.id DESC');

        $getsArray = ['type', 'state'];
        foreach($getsArray as $get) {
            if($value = Yii::$app->request->get($get)) {
                $query->andWhere("question.$get  = :$get", [":$get" => $value]);
            }
        }
        $pages = new \yii\data\Pagination(['totalCount' => $query->count()]);
        $items = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->asArray()
            ->all();            
        return $this->render('index', [ 'items'=>$items,
                                        'pages'=>$pages]);
    }

    

   
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()) {
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Элемент сохранен');
                    return $this->redirect(['update', 'id' => $model->id]);
                } 
            }
        } else {
            return $this->render('update', ['model' => $model]);
        }
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Question::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
