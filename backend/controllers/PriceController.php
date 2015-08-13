<?php
namespace backend\controllers;

use backend\controllers\AdminController;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

use common\models\Excel;
use common\models\ExcelManager;
use common\models\Price;

class PriceController extends AdminController
{   

    public function actionIndex()
    {   
        ini_set('max_execution_time', 900);
        $model = new Excel;

        if($model->load(Yii::$app->request->post())) {
            $table_uploaded = UploadedFile::getInstance($model, 'table_uploaded');
            if(!is_null($table_uploaded)) {

                $excelManager = new ExcelManager($table_uploaded);
                $excelManager->loadPriceByParts();

                Yii::$app->session->setFlash('success', 'Прайс загружен в сводную таблицу');
            }  else  {  
                Yii::$app->session->setFlash('success', 'Ошибка при загрузке файла');
            }
            return $this->redirect(['index']);
            
        }  else {  // render view

            $countRows = Price::find()->count();
            $countDublicated = Price::getCountPriceDublicated();

            return $this->render('index', [
                    'model' => $model, 
                    'countRows' => $countRows, 
                    'countDublicated'=> $countDublicated,
                    'title' => 'Загрузка прайс-листа частями',
                ]);
        }
    }

   
    public function actionEmpty() 
    {
        $conn = \Yii::$app->db;    
        $conn->createCommand()->truncateTable(Price::tableName())->execute(); 
        return $this->redirect(['index']);   
    }

    
    public function actionRepairDublicated()
    {
        $items = Price::listPriceDublicated();
        $countRows = Price::find()->count();
        $countDublicated = Price::getCountPriceDublicated();
        
        return $this->render('repair', [
                'items' => $items, 
                'countRows'=> $countRows,
                'countDublicated'=> $countDublicated
                ]);
    }    


    public function actionConfirm() 
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = 'json';
            
            $id = (int)Yii::$app->request->post('id');
            $price = Yii::$app->request->post('price');
            $price = intval(str_replace(' ', '', $price));

            $item = Price::findOne($id);
            $item->price = $price;
            $item->price_var = null;
            return $item->save() ?  $item : [];
        } 
    }


    public function actionCreateFromPriceTemp()
    {   
        ini_set('max_execution_time', 900);

        $items = Price::find()->all();
        
        if(count($items) > 0) {
            $priceManager = new Price;
            $priceManager->cleanPricesInProductTable();
            
            foreach($items as $item) {
                $priceManager->populatePrice($item['partnumber'], $item['type'], $item['price'], null);
            }

            $conn = \Yii::$app->db;    
            $conn->createCommand()->truncateTable(Price::tableName())->execute();

            Yii::$app->session->setFlash('success', 'Итоговый прайс успешно подключен'); 

            $priceReportName =  $priceManager->createReportFile();
            return $this->redirect(['index', 'file_report' => $priceReportName]);
        
        } else {
            return $this->redirect(['index']);
        }
    }

   


}
