<?php
namespace backend\controllers;

use backend\controllers\AdminController;
use Yii;
use common\models\Yml;
use yii\web\NotFoundHttpException;


class YmlController extends AdminController
{   


    public function actionIndex($filename = null)
    {
        return $this->render('index', ['filename' => $filename]);
    }

    

    public function actionCreate()
    {   
        $model = new Yml;
        $filename = $model->createYandexMarketFile();
        return $this->redirect(['index', 'filename' => $filename]);
    }



}
