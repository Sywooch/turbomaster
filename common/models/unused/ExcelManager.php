<?php

namespace common\models;

use Yii;
use common\models\Excel;
use common\models\Product;
use common\models\PriceManager;


class ExcelManager extends \yii\db\ActiveRecord
{
    private $_connection = null;
    private $_objPHPExcel = null;
    private $_objWorksheet = null;
    private $_notFoundItems = [];

    public function __construct($table_uploaded) 
    {
        $this->_objPHPExcel = \PHPExcel_IOFactory::load($table_uploaded->tempName);
        // $this->_objWorksheet = $this->_objPHPExcel->getActiveSheet();
        $this->_objWorksheet = $this->_objPHPExcel->getSheet(0);
    }
    
    private function getNumberRows() 
    {
        return $this->_objWorksheet->getHighestRow(); 
    }

    private function getNumberColumns() 
    {   
        $highestColumn  = $this->_objWorksheet->getHighestColumn(); 
        return \PHPExcel_Cell::columnIndexFromString($highestColumn); 
    }

    private function getCellValue($column, $row) 
    {
        return trim($this->_objWorksheet->getCellByColumnAndRow($column, $row)->getValue());
    }    
    
    public function validateByNumberColumns($num) 
    {   
        $isValidate = false;
        if(strlen($this->getCellValue($num-1, 1)) > 0) {
            $isValidate = true;
        } 
        if(strlen($this->getCellValue($num, 1)) > 0) {
            $isValidate = false;
        } 
        return $isValidate;
        // echo 'number columns = ' .$this->getNumberColumns(); exit;
        // return $this->getNumberColumns() == $num ? true : false;
    }

    public function loadCatalog() 
    {
        $conn = $this->getConnection();

        $prev_category    = '';
        $prev_brand       = '';
        $prev_model       = '';
        $prev_category_id = 0;
        $prev_brand_id    = 0;
        $prev_model_id    = 0;

        $mapCells = [
            0 => 'numberLine',
            1 => 'category',
            2 => 'brand',
            3 => 'model',
            4 => 'name',
            5 => 'usage',
            6 => 'partnumber',
            7 => 'interchange',
            8 => 'manufacturer',
            9 => 'warranty',
        ];
        $arrayCategory = [
            'легковая' => 1,
            'грузовая' => 2,
            'судовая'  => 3,
        ];

    // $objReader = \PHPExcel_IOFactory::createReader('Excel5'); $objReader->setReadDataOnly(true); $objPHPExcel = $objReader->load($table_uploaded->tempName);
    
    // $objPHPExcel    = \PHPExcel_IOFactory::load($table_uploaded->tempName);  
    // $objWorksheet   = $objPHPExcel->getActiveSheet();
    // $highestRow     = $objWorksheet->getHighestRow(); 
    // $highestColumn      = $objWorksheet->getHighestColumn(); 
    // $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn); 
        
        $count = $this->getNumberRows() - 1;
        for ($row = 2; $row <= $count; ++$row) {
            foreach($mapCells as $k => $cell) {
                ${$cell} = $this->getCellValue($k, $row);
            } 

            $category = !empty($category) ? $category : $prev_category;
            $category_id = isset($arrayCategory[$category]) ? $arrayCategory[$category] : $prev_category_id;

            $brand = !empty($brand) ? $brand : $prev_brand;
            $model = !empty($model) ? $model : $prev_model;
            
            if($brand != $prev_brand || $category_id != $prev_category_id) {
                $brand = $this->tuningBrandName($brand);
                $alias = $this->createAlias($brand);
                $add_query = " AND category_id = $category_id"; 
                $brand_id = $this->getIdByAlias('brand', $alias, $add_query);

                if(!$brand_id) {
                    $conn->createCommand()->insert('brand', [
                        'category_id'   => $category_id,
                        'name'          => $brand,
                        'alias'         => $alias,
                    ])->execute();
                    $brand_id = $this->getIdByAlias('brand', $alias, $add_query);
                }
            }

            if($model != $prev_model) {
                $alias = $this->createAlias($model);
                $brand_id = (!empty($brand_id)) ? $brand_id : $prev_brand_id;
                $add_query = " AND brand_id = $brand_id"; 
                $model_id = $this->getIdByAlias('model', $alias, $add_query);
                    
                if(!$model_id) {
                $conn->createCommand()->insert('model', [
                    'brand_id'  => $brand_id,
                    'name'      => $model,
                    'alias'     => $alias,
                ])->execute();
                $model_id = $this->getIdByAlias('model', $alias);
                }
            }   

            $model_id = (!empty($model_id)) ? $model_id : $prev_model_id;

            $manufacturer = $this->tuningManufacturerName($manufacturer);
            $alias = $this->createAlias($manufacturer);
            $manufacturer_id = $this->getIdByAlias('manufacturer', $alias);
            if(!$manufacturer_id && !empty($manufacturer)) {
                    $conn->createCommand()->insert('manufacturer', [
                        'name'    => $manufacturer,
                        'alias'   => $alias,
                    ])->execute();
                $manufacturer_id = $this->getIdByAlias('manufacturer', $alias);
            }    

            $usageOutput = $this->convertUsage($usage);

            $conn->createCommand()->insert('product', 
                [
                    'manufacturer_id'   => $manufacturer_id,
                    'category_id'       => $category_id,
                    'brand_id'          => $brand_id,
                    'model_id'          => $model_id,
                    'type'              => Product::TYPE_COMMON,
                    'state'             => Product::STATE_ACTIVE,
                    'name'              => $name,
                    'partnumber'        => $partnumber,
                    'interchange'       => $interchange,
                    'warranty'          => $warranty,
                    'price'             => 0,
                    'engine'            => $usageOutput['engine'],
                    'volume'            => $usageOutput['volume'],
                    'power'             => $usageOutput['power'],
                    'date_from'         => $usageOutput['date_from'],
                    'date_to'           => $usageOutput['date_to'],
                    'is_yml'            => 0,
                ])->execute();
            
            $prev_category      = $category;
            $prev_brand         = $brand;
            $prev_model         = $model;
            $prev_category_id   = $category_id;
            $prev_brand_id      = $brand_id;
            $prev_model_id      = $model_id;
        }   // foreach excel row

    }
    
    public function loadPrice($priceManager) 
    {
        $mapCells = [
            0 => 'partnumber',
            1 => 'manufacturer',
            2 => 'type',
            3 => 'price',
        ];

        $priceManager->cleanPricesInProductTable();
        $count = $this->getNumberRows();

        for($row = 1; $row <= $count; ++$row) {
            foreach($mapCells as $k => $cell) {
                ${$cell} = $this->getCellValue($k, $row);
            } 
            $priceManager->populatePrice($partnumber, $manufacturer, $type, $price);
        } 
    }

    
    public function loadTuning() 
    {
        $exceptionsArray = [];
        Product::deleteAll('type = ' .Product::TYPE_TUNING); 

        $mapCells = [
            0 => 'category_id',
            1 => 'name',
            2 => 'partnumber',
            3 => 'manufacturer',
            4 => 'usage',
            5 => 'price',
        ];

        $count = $this->getNumberRows() - 1;
        for ($row = 2; $row <= $count; ++$row) {
            foreach($mapCells as $k => $cell) {
                ${$cell} = $this->getCellValue($k, $row);
            } 

            $conn = $this->getConnection();  

            $manufacturer = $this->tuningManufacturerName($manufacturer);
            $alias = $this->createAlias($manufacturer);
            $manufacturer_id = $this->getIdByAlias('manufacturer', $alias);
            if(!$manufacturer_id) {
                $manufacturer_id = 1;
            }    

            if(!strpos($name, 'Турбина')) {
                $name = 'Турбина ' .$name;
            }  

            $usageOutput = $this->convertUsage($usage);

            $conn->createCommand()->insert('product', 
            [
                'manufacturer_id' => $manufacturer_id,
                'category_id'     => $category_id,
                'type'            => Product::TYPE_TUNING,
                'state'           => 1,
                'name'            => $name,
                'partnumber'      => $partnumber,
                // 'warranty'     => $warranty,
                'price'           => (int)$price,
                'engine'          => $usageOutput['engine'],
                'volume'          => $usageOutput['volume'],
                'power'           => $usageOutput['power'],
                'date_from'       => $usageOutput['date_from'],
                'date_to'         => $usageOutput['date_to'],
            ])->execute();
        }   //for

    }  


    public function loadMarket() 
    {
        $exsistPriceArray = [];
        $mapCells = [
            0 => 'partnumber',
            1 => 'price',
        ];

        Product::updateAll(['is_yml' => 0]);
        $count = $this->getNumberRows();
        
        for ($row = 1; $row <= $count; ++$row) {
            foreach($mapCells as $k => $cell) {
                ${$cell} = $this->getCellValue($k, $row);
            }
            
            $products = Product::find()
                ->where(['partnumber' => $partnumber])
                ->orWhere(['like', 'interchange', $partnumber])
                ->all();

            if(!$products) {
                $this->_notFoundItems[] = $partnumber;
            }  else {  

                foreach($products as $product) {
                    // пропусить восстановленные турбины
                    if($product['type'] == Product::TYPE_REFURBISH) {
                        continue;
                    }
                    
                    if($product['partnumber'] == $partnumber) {
                        $exsistPriceArray[] = $product->id;
                        $product->price = $price;
                        $product->is_yml = 1;
                        $product->save();

                    } elseif(!in_array($product->id, $exsistPriceArray)) {
                        $product->price = $price;
                        $product->is_yml = 1;
                        $product->save();
                    }
                }
            }  //if update exsisting     
        }   //for each row
    }    


    public function createReportFile($prefixName = '') 
    {
        $reportFile = '';
        if(count($this->_notFoundItems) > 0) {
            $reportFile = $prefixName .'-errors_' .date('Y-m-d_H-i');
            $file = Yii::getAlias('@backend/web/excel/') .$reportFile .'.txt';
            $f = fopen($file, 'w');
            foreach($this->_notFoundItems as $line) {
                fwrite($f, $line . "\n");
            }
            fclose($f);
        }    
        return  $reportFile;
    }


    // service methods: .......................................

    private function getConnection() 
    {
        if($this->_connection === null) {
            $this->_connection =  \Yii::$app->db;
        }
        return  $this->_connection;
    }  

    private  function createAlias($text, $maxLength = 120, $toLowCase = true)
    {      
        $text = mb_substr(trim($text), 0, $maxLength,  'utf-8');
        $letters = ["А" => "A","Б" => "B","В" => "V", "Г" => "G", "Д" => "D", "Е" => "E", "Ё" => "E", "Ж" => "J", "З" => "Z", "И" => "I", "Й" => "Y", "К" => "K", "Л" => "L", "М" => "M", "Н" => "N", "О" => "O", "П" => "P", "Р" => "R", "С" => "S", "Т" => "T", "У" => "U", "Ф" => "F", "Х" => "H", "Ц" => "TS", "Ч" => "CH", "Ш" => "SH", "Щ" => "SCH", "Ъ" => "", "Ы" => "I", "Ь" => "J", "Э" => "E", "Ю" => "YU", "Я" => "YA", "а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ё" => "e", "ж" => "j", "з" => "z", "и" => "i", "й" => "y", "к" => "k", "л" => "l", "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r", "с" => "s", "т" => "t", "у" => "u", "ф" => "f", "х" => "h", "ц" => "ts", "ч" => "ch", "ш" => "sh", "щ" => "sch", "ъ" => "y", "ы" => "i", "ь" => "j", "э" => "e", "ю" => "yu", "я" => "ya", " " => "_", "." => "", "/" => "_", "," => "", "-" => "_", "(" => "", ")" => "", "[" => "", "]" => "", "{" => "", "}" => "", "=" => "", "+" => "", "*" => "", "?" => "", "\"" => "", "'" => "", "$" => "", "&" => "", "%" => "", "#" => "", "@" => "", "!" => "", ";" => "", "№" => "", "^" => "", ":" => "", "`" => "", "~" => "", "\\" => "", "<" => "", ">" => "", "_" => "_", "|" => "", ];
        $translit = strtr(trim($text), $letters);
        if ($toLowCase) {
            $translit = strtolower($translit);
        }
        return $translit;
    }

    private function tuningManufacturerName($name) 
    {       
        $arrayBorgWarner = [
            'Borg Warner/Schwitzer/3K,Mitsubishi/MHI',
            'Honeywell/Garrett/Borg Warner/Schwitzer/3K',
            'Cat',
            'Borg Warner/Schwitzer/3K/Holset',
        ];
        $arrayHoneywellGarrett = ['GarrettHoneywell/Garrett', 'FORD'];
        $arrayCumminsHolset = ['Holset'];
        $name = trim($name);
        
        if(in_array($name, $arrayBorgWarner)) {
            $name = 'Borg Warner/Schwitzer/3K';
        } elseif(in_array($name, $arrayHoneywellGarrett)) {
            $name = 'Honeywell/Garrett';
        } elseif(in_array($name, $arrayCumminsHolset)) {
            $name = 'Cummins/Holset';
        }
        return $name;
    }

    private function tuningBrandName($name) 
    {       
        $arraySsangYong  = ['Ssang Yong','Ssang-Yong'];
        $name = trim($name);
        if(in_array($name, $arraySsangYong)) {
            $name = 'SsangYong';
        } 
        return $name;
    }

    private function convertUsage($usage) 
    {
        $output = [
                    'engine'    => '',
                    'volume'    => 0,
                    'power'     => 0,
                    'date_from' => '',
                    'date_to'   => '',
                 ];
                
        $usageArray = explode('|', $usage);
        if($usageArray) {
            $output['engine'] = trim(str_replace('XXX', '', $usageArray[0]));
            
            if(isset($usageArray[1])) {
                $output['volume'] = trim(str_replace('куб.см', '', $usageArray[1]));
            }
            if(isset($usageArray[2])) {
                $output['power'] = trim(str_replace('л.с.', '', $usageArray[2]));
            }
            if(isset($usageArray[3])) {
                $dateArray = explode('-', $usageArray[3]);
                if(count($dateArray) < 2) {
                    $output['date_from'] = trim($usageArray[3]);
                } else {
                    $output['date_from'] = trim($dateArray[0]);
                }
                if(isset($dateArray[1])) {
                    $output['date_to'] = trim($dateArray[1]);
                }
                $output['date_from'] = str_replace(' ', '', $output['date_from']);
                $output['date_to']   = str_replace(' ', '', $output['date_to']);
            }
        }
        return $output;
    }


    private function getIdByAlias($table, $alias, $add = null) 
    {
        $alias = trim($alias);
        $query = "SELECT id
            FROM $table 
            WHERE alias = '$alias'";
        if($add) {
             $query .= $add;
        }  

        $conn = $this->getConnection();
        $row = $conn->createCommand($query)->queryOne();
        return $row ? $row['id'] : false;
    }    

}
