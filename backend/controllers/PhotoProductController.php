<?php

namespace backend\controllers;

use backend\controllers\AdminController;  
use Yii;
use common\models\Image;
use common\models\Utilities;
use common\models\PhotoProduct;
use yii\web\UploadedFile;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class PhotoProductController extends AdminController
{
    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'create' => ['post'],
    //                 // 'delete' => ['post'],
    //             ],
    //         ],
    //     ];
    // }


    public function actionCreate()
    {   
        $model = new PhotoProduct;
        $model->load(Yii::$app->request->post());
        
        $product_id = Yii::$app->request->get('product_id');
        

        $model->file = UploadedFile::getInstance($model, 'file');
        if(!is_null($model->file)) {

            $uploadedFile = $model->file->tempName;
            $subDirectory = 'product';
            $model->src   = Utilities::createRandomName() .'.jpg';
            
            if($model->save()) {
                Image::createImagesByPattern($uploadedFile, $subDirectory, $model->src, PhotoProduct::getStandardPattern());
            } 
        }
        return $this->redirect(['product/photo', 'id' => $product_id]);
    }


    public function actionAutomateCreate()
    {   
        ini_set('max_execution_time', 900);

        $dirSrc = "D:\__photo_crop_src";
        // $dirTarget = "D:\__photo_crop_target";

        $dir = new \DirectoryIterator($dirSrc);
        foreach ($dir as $file) {
            if (!$file->isDot()) {
                $file->getFilename();
                
                $filename = explode('.', $file)[0];
                $partnumber = explode('_', $filename)[0];

                $model = new PhotoProduct;
                $model->src = Utilities::createRandomName() .'.jpg';

                $model->partnumber = $partnumber;
                $uploadedFile = $dirSrc .DIRECTORY_SEPARATOR .$file;
                $subDirectory = 'test';

                if(is_file($uploadedFile))  {
                    if($model->save()) {
                        Image::createImagesByPattern($uploadedFile, $subDirectory, $model->src, PhotoProduct::getStandardPattern());

                        echo 'create photo for ' . $partnumber .' - ' .$model->src .'<br>';
                    } 
                }
            }
        }
        echo 'READY';
    }
    

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        
        if($model->delete()) {
            $arraySubDirectories = array_keys(PhotoProduct::getStandardPattern());
            Image::deleteImages($model->src, 'product', $arraySubDirectories);
        }
        // return $this->redirect(['product/photo', 'id' => $model->product_id]);
         Utilities::retroGoBack();
    }


    public function actionShift($id, $partnumber, $direction)
    {
        $params = [
                     'condition' => 'partnumber = \'' .$partnumber .'\'', 
                     'beforeNormalize' => true
                  ];
        Utilities::shiftItem(new PhotoProduct, $id, $direction, $params);

        Utilities::retroGoBack();
        // return $this->redirect(['product/photo', 'id' => $product_id]);
    }



    protected function findModel($id)
    {
        if (($model = PhotoProduct::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
