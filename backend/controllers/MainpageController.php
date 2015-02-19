<?php

namespace backend\controllers;

use backend\controllers\AdminController;  
use Yii;
use common\models\Mainpage;
use common\models\Product;
use common\models\Image;
use common\models\Utilities;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;


class MainpageController extends AdminController
{

    public function actionIndex($type)
    {   
        $items = Mainpage::queryFull()
            ->where(['type' => $type])
            ->all();
        return $this->render('index', ['items' => $items]);
    }


    public function actionUpdate()
    {   
        if($id = Yii::$app->request->get('id')) {
            $model = $this->findModel($id);
        } else {
            $model = new Mainpage;
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $this->populateProductProperties($model);
            $this->createPhoto($model);
            
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Элемент изменен');
                return $this->redirect(['update', 
                            'id' => $model->id, 
                            'type' => $model->type
                            ]);
            } 
        } 
        return $this->render('update', ['model' => $model]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Utilities::retroGoBack();
    }

    public function actionShift($id, $direction)
    {
        $type = $this->findModel($id)->type;
        $params = [
                     'condition' => 'type = \'' .$type .'\'', 
                     'beforeNormalize' => true
                  ];
        Utilities::shiftItem(new Mainpage, $id, $direction, $params);
        Utilities::retroGoBack();
    }

    private function populateProductProperties($model) 
    {
        $product = Product::queryProductFull()
                ->where('product.id = :id', [':id' => $model->product_id])
                ->asArray()
                ->one();
        if($product) { 
            $model->brand_alias =  $product['brand_alias'];
            $model->model_alias =  $product['model_alias'];
            $model->partnumber  =  $product['partnumber'];
        }
        return $model;        
    }    

    private function createPhoto($model) 
    {
        $model->file = UploadedFile::getInstance($model, 'file');
            if(!is_null($model->file)) {
                
                $this->deletePhoto($model);

                $uploadedFile = $model->file->tempName;
                $subDirectory = 'mainpage';
                $model->image_src = Utilities::createRandomName() .'.jpg';
                $photoPattern = ['133' => [
                                    'crop'      => true, 
                                    'width'     => 140,
                                    'height'    => 110,
                                    'quality'   => 92,
                                    // 'sharpen'   => 4
                                ]];
                Image::createImagesByPattern($uploadedFile, $subDirectory, $model->image_src, $photoPattern);
            }    
        return $model;    
    }


    private function deletePhoto($model) {
        if($model->image_src) {
            Image::deleteImages($model->image_src, 'mainpage', ['133']);
        }
    }

    protected function findModel($id)
    {
        if (($model = Mainpage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
