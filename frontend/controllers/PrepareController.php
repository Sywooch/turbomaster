<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class PrepareController extends Controller
{
    private $_tables = [];
    private $_connection;


    public function actionPopulate_photo_product()
    {
        $connection = \Yii::$app->db;

        $schema = $connection->getSchema();
        $this->_tables = $schema->getTableNames();

        $table_name = 'photo_product_new';
        $this->dropTable($table_name);

        $command = $connection->createCommand();
        $command->createTable( $table_name, [
                'id'            => 'pk',
                'partnumber'    => 'string',
                'product_id'    => 'integer',
                'src'           => 'string',
                'pos'           => 'integer',
              ])->execute();


        $command = $connection->createCommand(
           'SELECT pp.*, product.partnumber
            FROM photo_product  AS pp
            LEFT JOIN  product  ON pp.product_id = product.id
            ORDER BY   pp.id');

        $rows = $command->queryAll();

        foreach($rows as $row) {

            $connection->createCommand()->insert( $table_name, [
                    
                'partnumber'    => $row['partnumber'],
                'product_id'    => $row['product_id'],
                'src'           => $row['src'],
                'pos'           => $row['pos'],
            ])->execute();
        }

        echo "table   $table_name  filled <br>";
        exit;
    }


    ////////////// ffff dd ffff  wwdd ////////////


    public function actionSerializeRubric()
    {
        $obj = [
            [
                'name' => 'Замена турбины. Специфика',
                'url' => '/page/turboservice',
            ],
            [
                'name' => 'Бюллетени ТурбоСервиса',
                'url' => '/page/price',
            ],
            [
                'name' => 'Стоимость замены турбины',
                'url' => '/articles/bulletins-turboservice',
            ],
            [
                'name' => 'Фоторепортажи ТурбоСервиса',
                'url' => '/page/turboservice_gallery',
            ],
        ];

        $objSerialized = serialize($obj);

        echo $objSerialized; exit;
    }


    ///////////////////////////////////

    public function actionReorder_pos_photo_product()
    {   
        $connection = \Yii::$app->db;
        $command = $connection->createCommand(
           'SELECT *
            FROM photo_product 
            ORDER BY  partnumber');

        $rows = $command->queryAll();

        foreach($rows as $row) {

            $command = $connection->createCommand(
               "SELECT *
                FROM photo_product 
                WHERE partnumber = '{$row['partnumber']}'
                ORDER BY  pos ");

            $result = $command->queryAll();
            
            if(count($result) > 0) {

                foreach($result as $k => $v) {
                    if((int)$v['pos'] != ($k + 1)) {
                        $command = $connection->createCommand()->update('photo_product', ['pos' => $k + 1], 'id = ' .$v['id']);
                        $command->execute();
                    }
                }
            }

        }    

        echo "reordered photo pos <br>";
        exit;
    }    
    ///////////

    public function actionPopulate_brand_id_in_product()
    {
        $connection = \Yii::$app->db;
        $command = $connection->createCommand(
            'SELECT *
            FROM product 
            ORDER BY id');

        $rows = $command->queryAll();

        foreach($rows as $row) {

            $model_id = (int)$row['model_id'];

            $command = $connection->createCommand(
               "SELECT brand.id AS brand_id
                FROM model
                LEFT JOIN  category_brand  ON model.brand_category_id = category_brand.id
                LEFT JOIN  brand  ON category_brand.brand_id = brand.id
                WHERE model.id = $model_id 
                ");

            $result = $command->queryOne();

            if($result) {

                $command = $connection->createCommand()->update('product', ['brand_id' => $result['brand_id']], 'id = ' .$row['id']);
                $command->execute();
            }

        }    

        echo "populate field 'brand_id' <br>";
        exit;
    }
    //////////



    
    public function dropTable($table_name)
    {
        if(!$this->_connection) {
            $this->_connection =  \Yii::$app->db;
        }
        if(in_array($table_name, $this->_tables)) {
            $this->_connection->createCommand()->dropTable($table_name)->execute();
            echo "table '$table_name' else exists - dropped <br>";
        }
    }



    

}