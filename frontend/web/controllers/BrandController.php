<?php

namespace frontend\controllers;

use Yii;
use common\models\CategoryBrand;
use common\models\Brand;
use common\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class BrandController extends Controller
{

    public function actionModellist($id)
    {   
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return Model::listByBrandId($id);
        }
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
