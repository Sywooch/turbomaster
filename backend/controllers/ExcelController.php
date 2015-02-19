<?php
namespace backend\controllers;

use Yii;
use backend\controllers\AdminController;
use yii\web\Request;
use yii\web\UploadedFile;

use common\models\Excel;
use common\models\ExcelManager;
use common\models\Price;
use common\models\Product;
use yii\web\NotFoundHttpException;


class ExcelController extends AdminController
{


    public function actionCatalogLoader() 
    { 
        ini_set('max_execution_time', 900);
        $model = new Excel;

        if(Yii::$app->request->post() && $model->load(Yii::$app->request->post())) {
            $table_uploaded = UploadedFile::getInstance($model, 'table_uploaded');
            if(!is_null($table_uploaded)) {

                $excelManager = new ExcelManager($table_uploaded);
                if(!$excelManager->validateByNumberColumns(11)) {
                    Yii::$app->session->setFlash('success', 'Неправильный формат таблицы');
                    return $this->redirect(['catalog-loader']);
                }
                 
                $conn = \Yii::$app->db;    
                foreach(['product', 'brand', 'model', 'manufacturer'] as $table) {
                    $conn->createCommand()->truncateTable($table)->execute();    
                }
                $excelManager->loadCatalog();
            } 
            return $this->redirect(['success', 'from' => 'catalog']);

        } else {
            return $this->render('create_common', [
                    'model' => $model, 
                    'title' => 'Загрузка каталога',
                ]);
        }
    }


    //  PRICE .............................

    public function actionPriceLoader()
    {   
        ini_set('max_execution_time', 900);

        $model = new Excel;

        if($model->load(Yii::$app->request->post())) {
            $table_uploaded = UploadedFile::getInstance($model, 'table_uploaded');
            if(!is_null($table_uploaded)) {

                $priceManager = new Price;
                
                $excelManager = new ExcelManager($table_uploaded);
                // $excelManager->validateByNumberColumns(4);

                $excelManager->loadPrice($priceManager);

                $priceReportName =  $priceManager->createReportFile();
                return $this->redirect(['success', 'from' => 'price', 'file_report' => $priceReportName]);

            }  else  {  // ошибка при загрузке excel
                Yii::$app->session->setFlash('success', 'Ошибка при загрузке файла');
                return $this->redirect(['price-loader']);
            }
            
        }  else {  // render view 
            return $this->render('create_common', [
                    'model' => $model, 
                    'title' => 'Загрузка прайс-листа целиком',
                ]);
        }
    }


    // TUNING ..............................

    public function actionTuningLoader()
    {   
        ini_set('max_execution_time', 900);
        $model = new Excel;
        
        if(Yii::$app->request->post() && $model->load(Yii::$app->request->post())) {
            $table_uploaded = UploadedFile::getInstance($model, 'table_uploaded');
            if(!is_null($table_uploaded)) {

                $excelManager = new ExcelManager($table_uploaded);
                $excelManager->loadTuning();

                return $this->redirect(['success', 'from' => 'tuning']);
            }  
            Yii::$app->session->setFlash('success', 'Ошибка при загрузке файла');
            return $this->redirect(['tuning-loader']);
            
        } else {
            return $this->render('create_common', [
                    'model' => $model, 
                    'title' => 'Загрузка турбин для тюнинга',
                ]);
        }
    }


    // MARKET ..................................

    public function actionMarketLoader()
    {   
        ini_set('max_execution_time', 900);

        $model = new Excel;

        if(Yii::$app->request->post() && $model->load(Yii::$app->request->post())) {
            $table_uploaded = UploadedFile::getInstance($model, 'table_uploaded');
            if(!is_null($table_uploaded)) {

                $excelManager = new ExcelManager($table_uploaded);
                $excelManager->loadMarket();
                
                $fileReport = $excelManager->createReportFile('market');
                return $this->redirect(['success', 'from' => 'market', 'file_report' => $fileReport]);
            }  
            Yii::$app->session->setFlash('success', 'Ошибка при загрузке файла');
            return $this->redirect(['market-loader']);
            
        } else {
             return $this->render('create_common', [
                    'model' => $model, 
                    'title' => 'Загрузка для Яндекс.Маркета',
                ]);
        }

    }


    // CREATE PRICE LIST ........................
    public function actionCreatePrice()
    {   
        $excelManager = new ExcelManager();
        $excelManager->createPriceList();
    }  
    

    public function actionSuccess() 
    { 
        return $this->render('success');
    }


}
