<?php
namespace common\models;

use Yii;
use common\models\Product;
use common\models\Category;

/**
 * This is the model class for table "price_temp".
 *
 * @property integer $id
 * @property string $partnumber
 * @property string $type
 * @property string $price_var
 * @property integer $price
 */

class Price extends \yii\db\ActiveRecord
{

    private $_connection = null;
    private $_notFoundProducts = [];


    public static function tableName()
    {
        return 'price';
    }

    
    public function rules()
    {
        return [
            [['partnumber', 'price'], 'required'],
            [['price'], 'integer'],
            [['partnumber', 'price_var'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 55]
        ];
    }

   
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'partnumber' => 'Partnumber',
            'type' => 'Type',
            'price' => 'Price',
        ];
    }


    public function cleanPricesInProductTable() 
    {   
        Product::deleteAll(['type' => Product::TYPE_REFURBISH ]);
        
        $categoryArray = [Category::CAR, Category::TRUCK, Category::SHIP];
        Product::updateAll(['price' => 0], ['category_id' => $categoryArray]);
    }

    public function getNotFoundProducts() 
    {
        return $this->_notFoundProducts;
    }

    public static function listPriceDublicated() 
    {
        return static::find()
            ->where('price_var IS NOT NULL')
            ->orderBy('partnumber, type')
            ->asArray()
            ->all();
    }

    public static function getCountPriceDublicated() 
    {
        return static::find()->where('price_var IS NOT NULL')->count();
    }

    public function populatePriceTempTable($partnumber, $type, $price)
    {
        $existPrice = Price::find()
            ->where(['partnumber' => $partnumber,
                     'type' => $type])
            ->one();

        if($existPrice) {
            if($existPrice->price == $price) {
                return;
            }

            if($existPrice->price_var == null) {
                $existPrice->price_var = $existPrice->price;
            }
            $existPrice->price_var .= '|' .$price;
            $existPrice->save();
        
        } else {
            $priceTemp = new Price;
            $priceTemp->partnumber = $partnumber;
            $priceTemp->type = $type;
            $priceTemp->price = $price;
            $priceTemp->save();
        }
    }



    public function populatePrice($partnumber, $type, $price) 
    {   
        $productProperties = ['manufacturer_id', 'category_id', 'brand_id', 'model_id', 'state', 'name', 'interchange', 'engine', 'volume', 'power', 'date_from', 'date_to'];

        $exsistPriceArray = [];

        $type = (!empty($type) && strtolower($type) == 'x') ? Product::TYPE_REFURBISH : Product::TYPE_NEW;

        $preparePartnumber = ($type == Product::TYPE_REFURBISH && substr($partnumber, -1) == 'X') ? substr($partnumber, 0, -1) : $partnumber;
        
        $products = Product::find()
            ->andWhere(['partnumber' => $preparePartnumber])
            ->orWhere(['like', 'interchange', $preparePartnumber])
            ->all();

        // if (strlen($preparePartnumber) > 5) {
        // if ($type == Product::TYPE_NEW) {
        //     $sql->orWhere(['like', 'interchange', $preparePartnumber]);
        // }
        // $products = $sql->all();

        if (!$products) {
            $this->_notFoundProducts[] = $partnumber;
        
        // для оборотного артикула из прайса создать оборотный дубликат турбины:
        }  elseif ($type == Product::TYPE_REFURBISH) {

            foreach($products as $product) {

                $interchangeArray = explode(',', $product->interchange);

                // Проверить артикул оборотной турбины из excel-таблицы 
                // (без последнего знака 'X')
                // на точное соответствие с одной из interchange-турбин,
                // а также убедиться, что найденная турбина новая (не делать
                // дубликаты оборотных турбин):

                if(!in_array($preparePartnumber, $interchangeArray) && $product->type != Product::TYPE_NEW) {
                    continue;
                }

                $refurbish = new Product;
                foreach ($productProperties as $prop) {
                    $refurbish->{$prop} = $product->{$prop};
                } 
                $refurbish->partnumber  = $partnumber;
                $refurbish->type        = $type;
                $refurbish->warranty    = '6 мес';
                $refurbish->price       = $price;
                $refurbish->save();
            }

        // для нового артикула из прайса - обновить цены на найденные новые турбины и аналоги:
        }  elseif ($type == Product::TYPE_NEW) {

            foreach($products as $product) {
                if ($product->partnumber == $partnumber && $product->type == $type) {
                    
                    $exsistPriceArray[] = $product->id;
                    $product->price = $price;
                    $product->save();

                } elseif (!in_array($product->id, $exsistPriceArray)) {
                    $product->price = $price;
                    $product->save();
                }
            }
        }  //if update exsisting     

    }
    // ............ end populatePrice()
    


    public function createReportFile() 
    {
        $priceReportFile = '';
        $notFoundProducts = $this->getNotFoundProducts();
        if(count($notFoundProducts) > 0) {
            $priceReportFile = 'price-errors_' .date('Y-m-d_H-i');
            $file = Yii::getAlias('@backend/web/excel/') .$priceReportFile .'.txt';
            $f = fopen($file, 'w');
            foreach($notFoundProducts as $line) {
                fwrite($f, $line . "\n");
            }
            fclose($f);
        }    
        return  $priceReportFile;
    }

    // service methods: .......................................

    private function getConnection() 
    {
        if($this->_connection === null) {
            $this->_connection =  \Yii::$app->db;
        }
        return  $this->_connection;
    }  

    

}
