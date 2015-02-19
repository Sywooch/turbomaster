<?php

namespace common\models;

use Yii;


class TableManager extends \yii\db\ActiveRecord
{

    private $_connection = null;
    private $_options = "COLLATE='utf8_general_ci' ENGINE=InnoDB";


    private function getConnection() 
    {
        if($this->_connection === null) {
            $this->_connection =  \Yii::$app->db;
        }
        return  $this->_connection;
    }  

    
    public function createBrandTable()
    {   
        $conn = $this->getConnection();
        $conn->createCommand()->createTable( 'brand', [
            'id'           => 'pk',
            'category_id'  => 'integer',
            'name'         => 'string',
            'alias'        => 'string',
          ], $this->_options)->execute();
    }

    public function createModelTable()
    {   
        $conn = $this->getConnection();
        $conn->createCommand()->createTable( 'model', [
            'id'        => 'pk',
            'brand_id'  => 'integer',
            'name'      => 'string',
            'alias'     => 'string',
          ], $this->_options)->execute();
    }      


    public function createManufacturerTable()
    {   
        $conn = $this->getConnection();
        $conn->createCommand()->createTable( 'manufacturer', [
            'id'     => 'pk',
            'name'   => 'string',
            'alias'  => 'string',
          ], $this->_options)->execute();
    } 

    public function createProductTable()
    {   
        $conn = $this->getConnection();
        $conn->createCommand()->createTable( 'product', [
            'id'               => 'pk',
            'manufacturer_id'  => 'integer',
            'category_id'      => 'integer',
            'brand_id'         => 'integer',
            'model_id'         => 'integer',
            'type'             => 'integer',
            'state'            => 'integer',
            'name'             => 'string',
            'partnumber'       => 'string',
            'interchange'      => 'string',
            'warranty'         => 'string',
            'price'            => 'integer',
            'engine'           => 'string',
            'volume'           => 'string',
            'power'            => 'string',
            'date_from'        => 'string',
            'date_to'          => 'string',
            'is_yml'           => 'integer',
          ], $this->_options)->execute();
    } 


    
    public function dropTable($table_name)
    {   
        $conn = $this->getConnection();
        $conn->createCommand()->dropTable($table_name)->execute();
    }


    




}
