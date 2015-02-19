<?php

namespace backend\controllers;

use backend\controllers\AdminController;  
use Yii;
use common\models\Rubric;
use yii\web\NotFoundHttpException;


class RubricController extends AdminController
{

    public function actionMainlist($id)
    {   
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return Rubric::find()->where('parent_id = :category_id', [':category_id' => $id])->asArray()->all();
        }
    }



  
}
