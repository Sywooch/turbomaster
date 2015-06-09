<?php
namespace frontend\controllers;

use Yii;
// use common\models\Article;
// use common\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
// use yii\filters\VerbFilter;


class PrepareFirstController extends Controller
{
   private $_tables = [];
   private $_connection;
    // pk: an auto-incremental primary key type, will be converted into "int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY"
    // string: string type, will be converted into "varchar(255)"
    // text: a long string type, will be converted into "text"
    // smallint: a small integer type, will be converted into "smallint(6)"
    // integer: integer type, will be converted into "int(11)"
    // bigint: a big integer type, will be converted into "bigint(20)"
    // datetime: datetime type, will be converted into "datetime"
    // timestamp: timestamp type, will be converted into "timestamp"
    // time: time type, will be converted into "time"
    // date: date type, will be converted into "date"


    public function actionCreate_cars_tables()
    {
        $connection = \Yii::$app->db;
        $schema = $connection->getSchema();
        $this->_tables = $schema->getTableNames();
        

        // create table 'category'
        $table_name = 'category';
        $this->dropTable($table_name);

        $command = $connection->createCommand();
        $command->createTable($table_name, [
                'id'            => 'pk',
                'name'          => 'string',
                'alias'         => 'string',
                'title_name'    => 'string',
                'h1'            => 'string',
                'pos'           => 'integer',
            ]);
        $command ->execute();
        echo "table '$table_name' created <br>"; 

        // fill table 'category'
        $connection->createCommand()->insert($table_name, [
                'name'          => 'Легковые автомобили',
                'alias'         => 'passenger',
                'title_name'    => 'Каталог турбин для легковых автомобилей, только новые турбины!',
                'h1'            => 'Каталог турбин для легковых автомобилей',
                'pos'           => 1,
                ])->execute();

        $connection->createCommand()->insert($table_name, [
                'name'          => 'Грузовые автомобили',
                'alias'         => 'trucks',
                'title_name'    => 'Продажа турбин для грузовых автомобилей и автобусов',
                'h1'            => 'Турбины для грузовиков и автобусов',
                'pos'           => 2,
                ])->execute();

        $connection->createCommand()->insert($table_name, [
                'name'          => 'Судовые турбины',
                'alias'         => 'ship',
                'title_name'    => 'Продажа судовых турбин',
                'h1'            => 'Судовые турбины',
                'pos'           => 3,
                ])->execute();

         $connection->createCommand()->insert($table_name, [
                'name'          => 'Картриджи для турбин',
                'alias'         => 'cartridges',
                'title_name'    => 'Картриджи для турбин',
                'h1'            => 'Картриджи для турбин',
                'pos'           => 4,
                ])->execute();

        echo "table '$table_name' filled <br>";



        // create table 'brand'
        $table_name = 'brand';
        $this->dropTable($table_name);

        $command = $connection->createCommand();
        $command->createTable($table_name, [
                'id'        => 'pk',
                'name'      => 'string',
                // 'type'      => 'smallint',
                'alias'     => 'string',
                'state'     => 'smallint',
                'older_id'  => 'integer',
            ]);
        $command ->execute();
        echo "table '$table_name' created <br>"; 


         // create table 'brand_category'
        $table_name = 'brand_category';
        $this->dropTable($table_name);

        $command = $connection->createCommand();
        $command->createTable($table_name, [
                'id'           => 'pk',
                'brand_id'     => 'integer',
                'category_id'  => 'integer',
                'older_id'     => 'integer',
            ]);
        $command ->execute();
        echo "table '$table_name' created <br>"; 


        
        // create table 'car'
        $table_name = 'car';
        $this->dropTable($table_name);
        
        $connection->createCommand()->createTable($table_name, [
                'id'        => 'pk',
                'brand_category_id'  => 'integer',
                'name'      => 'string',
                'state'     => 'smallint',
                'alias'      => 'string',
                'older_id'  => 'integer',
            ])->execute();

        echo "table  '$table_name' created <br>";     
        

        // fill  'brand'
        $command = $connection->createCommand('SELECT * FROM tbm_treesections WHERE parent_id IN (7,8)  ORDER BY name, parent_id');
        $rows = $command->queryAll();
        
        foreach ($rows as $k => $row) {
           $type = ($row['parent_id'] == 7) ? 1 : 2; 

        $command = $connection->createCommand('SELECT * FROM brand WHERE name = ' . "'" .$row['name'] . "'");
        $rows = $command->queryAll();

            if(!isset($rows) || count($rows)==0) {
             $connection->createCommand()->insert('brand', [
                                'name'      => $row['name'],
                                'alias'     => $row['url'],
                                'older_id'  => $row['id'],
                            ])->execute();
            }

            $command = $connection->createCommand('SELECT * FROM brand WHERE name = ' . "'" .$row['name'] . "' limit 1");
            $r = $command->queryOne();

            $connection->createCommand()->insert('brand_category', [
                'brand_id'          => $r['id'],
                'category_id'       => $type,
                'older_id'          => $row['id'],
                ])->execute();
        }






        echo "tables  'brand' and 'brand_category' filled <br>";

        // fill  'car'

        // $command = $connection->createCommand('SELECT * FROM brand  ORDER BY id');
        $command = $connection->createCommand('SELECT * FROM brand_category  ORDER BY id');
        // $command = $connection->createCommand('SELECT * FROM brand_category LEFT JOIN  brand  ON brand_category.brand_id = brand.id ORDER BY id');
        $rows = $command->queryAll();
        
        foreach ($rows as $row) {

            $command = $connection->createCommand('SELECT * FROM tbm_treesections WHERE parent_id = ' .$row['older_id'] . '  ORDER BY id');

            $rows2 = $command->queryAll();
            if(isset($rows2) && count($rows2)>0) {
                foreach ($rows2 as $row2) {

                    $connection->createCommand()->insert('car', [
                            'brand_category_id' => $row['id'],
                            'name'              => $row2['name'],
                            'alias'             => $row2['url'],
                            'older_id'          => $row2['id'],
                        ])->execute();
                }
            }
        }
        echo "table  'car_model' filled <br>";

        exit;
    }

// ..........................................

    public function actionCreate_product_table()
    {
        
        $connection = \Yii::$app->db;
        $schema = $connection->getSchema();
        $this->_tables = $schema->getTableNames();

        // create table 'product'
        $table_name = 'product';
        $this->dropTable($table_name);

        $command = $connection->createCommand();

        $command->createTable($table_name, [
                'id'                => 'pk',
                'category_id'       => 'integer',
                'manufacturer_id'   => 'integer',
                'car_id'            => 'integer',
                'state'             => 'smallint',  // продается/активно - 1; нет в продаже - 0
                'type'              => 'smallint',  // new - 1;  оборотная - 2; tuning -3
                'partnumber'        => 'string',
                'name'              => 'text',
                'description'       => 'string',
                'interchange'       => 'text',
                'price'             => 'integer',
                'warranty'          => 'string',
                'engine'            => 'string',
                'volume'            => 'integer',
                'power'             => 'integer',
                'date_from'         => 'string',
                'date_to'           => 'string',
                'older_good_id'     => 'integer',
                'older_good_link_id' => 'integer',
            ]);
        $command ->execute();
        echo "table '$table_name' created <br>"; 

        // fill  'product'
        $map = [
                '378'=>'1',
                '682'=>'1',
                '879'=>'1',
                '1088'=>'1',
                '1194'=>'1',
                '379'=>'2',
                '385'=>'3',
                '1229'=>'3',
                '387'=>'4',
                '394'=>'8',
                '461'=>'5',
                '510'=>'6',
                '748'=>'7',
                ];

        $command = $connection->createCommand('SELECT g.*, l.goods_name, l.model_id, l.goods_usage, car.id as car_id, category.id as category_id

            FROM tbm_goods  as g
            INNER JOIN tbm_goods_linked as l    ON g.id = l.goods_id
            LEFT JOIN  car                      ON car.older_id = l.model_id
            LEFT JOIN  brand_category           ON car.brand_category_id = brand_category.id
            LEFT JOIN  category                 ON brand_category.category_id = category.id
            ORDER BY   id');

        $rows = $command->queryAll();
        
  
        foreach ($rows as $row) {

                $manufacturer_id = ( isset($row['manufacturer_id']) && isset( $map[$row['manufacturer_id']]) ) ? $map[$row['manufacturer_id']] : 8;

                // $car_id = $row['car_id'];

                $full_data = $row['goods_usage'];
                $decode = json_decode($full_data, true);

                $engine = $decode['engines'];
                $volume = (int) $decode['volume'];
                $power  = (int) $decode['power'];

                $date_from  = $decode['dates'][0];
                $date_from  = str_replace(" ", "", $date_from);

                $interchange = str_replace(" ", "", $row['interchange']);
                $interchange = trim( $interchange, ',');

                $date_to    = (isset($decode['dates'][1])) ? $decode['dates'][1] : null;
                $date_to    = str_replace(" ", "", $date_to);

                    // $car_id =  $command = $connection->createCommand('SELECT id FROM car WHERE older_id = ' .$row['model_id']);
                    // $car_id = $command->queryScalar();
                    // if(!$car_id) $car_id = 0;
                // var_dump($decode); 

                $type = 1;                                          // normal (new) turbine
                if($row['cond'] == 1) {                             // oborotnaja  turbine
                    $type = 2;
                }
                elseif(strpos($row['goods_name'], 'Garrett')) {     //  tuning  turbine
                    $type = 3; 
                }          

            $connection->createCommand()->insert('product', [
                    
                    'category_id'       => $row['category_id'],
                    'manufacturer_id'   => $manufacturer_id,
                    'car_id'            => $row['car_id'],
                    'partnumber'        => $row['partnumber'],
                    'state'             => $row['active'],
                    'type'              => $type,
                    'name'              => $row['goods_name'],
                    'description'       => $row['description'],
                    'interchange'       => $interchange,
                    'price'             => $row['price'],
                    'warranty'          => '12 мес',
                    'engine'            => $engine,
                    'volume'            => $volume,
                    'power'             => $power,
                    'date_from'         => $date_from,
                    'date_to'           => $date_to,
                    'older_good_id'     => $row['id'],
            ])->execute();
        }

        echo "table  'product' filled <br>";
        exit;
    }


// ..............................

    public function actionCreate_products_photos()
    {
        $connection = \Yii::$app->db;
        $photoDir = Yii::getAlias('@public')  .DIRECTORY_SEPARATOR .'photo' .DIRECTORY_SEPARATOR .'product' .DIRECTORY_SEPARATOR;

        $oldDir = $photoDir . '_older';

        $list = glob($oldDir .DIRECTORY_SEPARATOR .'*.jpg');

         $prev_older_good_id = 0;
         $prev_numer         = 0;

        foreach($list as $file) {

            $path_parts = pathinfo($file); 
            $fileName = $path_parts['filename'];
            $fileNameArray = explode('.', $fileName);

            $segment_older_good_id  = $fileNameArray[0];
            $segment_numer          = $fileNameArray[1];
            $segment_size           = $fileNameArray[2];

            if($prev_older_good_id != $segment_older_good_id || $prev_numer != $segment_numer) {

                $command = $connection->createCommand('SELECT id FROM product WHERE older_good_id = ' .$segment_older_good_id);
                $product_id = $command->queryScalar();

                $newName = $this->createRandomName();

                $connection->createCommand()->insert('photo_product', [
                        'product_id'        => $product_id,
                        'src'              => $newName,
                        'pos'               => (int)$segment_numer,
                        ])->execute();
            }

            $newFile = $photoDir .$segment_size .DIRECTORY_SEPARATOR. $newName;
            @copy($file, $newFile);

            $prev_older_good_id = $segment_older_good_id;
            $prev_numer = $segment_numer;
        }
        
        echo 'READY!'; exit;
    }



    public function actionCreate_products_photos_xxx()
    {
        $connection = \Yii::$app->db;
        $command = $connection->createCommand('SELECT * FROM product  ORDER BY id');
        $rows = $command->queryAll();
        
        $photoDir = Yii::getAlias('@public') .DIRECTORY_SEPARATOR .'photo' .DIRECTORY_SEPARATOR .'product' .DIRECTORY_SEPARATOR;

        $oldDir = $photoDir . '_older';

        $numerical = ['001', '002', '003', '004', '005'];
        $sizes = ['80', '115', '240', '450', 'big'];
            
        foreach ($rows as $row) {

            $probaFile = $oldDir .DIRECTORY_SEPARATOR .$row['older_good_id'] .'.001.115.jpg';
            
            if(is_file($probaFile)) {
                
                foreach ($numerical as $k=>$numer) {
                
                    $newName = $this->createRandomName();
                    $connection->createCommand()->insert('photo_product', [
                            'product_id'        => $row['id'],
                            'name'              => $newName,
                            'pos'               => $k+1,
                            ])->execute();
                    
                    foreach ($sizes as  $size) {
                        $filename = $row['older_good_id'] .'.' .$numer .'.' .$size . '.jpg';
                        $oldFile = $oldDir .DIRECTORY_SEPARATOR .$filename;

                        if(is_file($oldFile)) {
                            $newFile = $photoDir .$size .DIRECTORY_SEPARATOR. $newName;
                            
                            @copy($oldFile, $newFile);
                        }
                    }   
                }     
            }
        }    

        exit;
    }
    
    // ....................................................

    public function actionCreate_articles_tables()
    {
        $connection = \Yii::$app->db;
        $schema = $connection->getSchema();
        $this->_tables = $schema->getTableNames();

        // create table 'article'
        $table_name = 'article';
        $this->dropTable($table_name);

        $command = $connection->createCommand();
        $command->createTable($table_name, [
                'id'            => 'pk',
                'created_at'    => 'datetime',
                'updated_at'    => 'datetime',
                'category_id'   => 'integer',
                'title'         => 'string',
                'content'       => 'text',
                'brief'         => 'text',
                'state'         => 'smallint',
                'photo_main'    => 'string',
                'alias'         => 'string',
                'pos'           => 'integer',
                'older_images'  => 'string',
                'older_gallery' => 'string',
                'older_alias'   => 'string',
                'older_id'      => 'integer',
            ]);
        $command ->execute();
        echo "table '$table_name' created <br>"; 


         // create table 'articles_category'
        $table_name = 'articles_category';
        $this->dropTable($table_name);

        $command = $connection->createCommand();
        $command->createTable($table_name, [
                'id'            => 'pk',
                'parent_id'     => 'integer',
                'name'          => 'string',
                'alias'         => 'string',
                'pos'           => 'smallint',
                'older_id'      => 'integer',
            ]);
        $command ->execute();
        echo "table '$table_name' created <br>";

         
        // select all previos categories
        $command = $connection->createCommand('SELECT parent_id FROM tbm_treearticles  ORDER BY id');
        $rows = $command->queryAll();

        $previos_categories = [];
        
        foreach($rows as $row) {
            $previos_categories[] = (int)$row['parent_id'];
        }

        $previos_categories = array_unique($previos_categories);
        sort($previos_categories);

        $categoryMap = [];

        foreach($previos_categories as $k=>$prev_category_id) {

            $command = $connection->createCommand('SELECT * FROM tbm_treesections  WHERE id = ' .$prev_category_id);
            $row = $command->queryOne();

            $pos = $k+1;

            $connection->createCommand()->insert('articles_category', [
                            
                            'parent_id'     => '1',
                            'name'          => $row['name'],
                            'alias'         => $row['url'],
                            'pos'           => $pos,
                            'older_id'      => $prev_category_id,

                            ])->execute();

            $categoryMap[$prev_category_id] = $pos;
        }
        echo "table '$table_name' filled <br>"; 

        // fill article table

        $command = $connection->createCommand('SELECT * FROM tbm_treearticles  ORDER BY id');
        $rows = $command->queryAll();


        foreach($rows as $row) {
           
           $arCleaned = $this->cleanArticleContent($row['description']);
           $content       = $arCleaned[0];
           $older_images  = $arCleaned[1];
           $older_gallery = $arCleaned[2];
           
           $connection->createCommand()->insert('article', [
                
                'created_at'    => $row['modified'],
                'updated_at'    => $row['modified'],
                'category_id'   => $categoryMap[$row['parent_id']],

                'title'         => $row['name'],
                'content'       => $content,
                'brief'         => $row['short_description'],
                'state'         => 1,
                // 'photo_main'    => 'string',
                'alias'         => $row['url'],
                'pos'           => 1,
                'older_images'  => $older_images,
                'older_gallery' => $older_gallery,
                'older_alias'   => $row['url'],
                'older_id'      => $row['id'],

            ])->execute();
        }
        echo "table 'article' filled <br>"; 
    }


    // ============================================

    public function cleanArticleContent($content)
    {
        // $connection = \Yii::$app->db;
        // $schema = $connection->getSchema();
        // $command = $connection->createCommand('SELECT content FROM article  WHERE id = 55');
        // $row = $command->queryOne();
        $content = trim($content);

            $imgArray=[];
            $galleryArray=[];

            $paragraphs = explode("</p>", $content); 
            foreach($paragraphs as $k=>$parag)   {
                if(strpos($parag, "<img")) {
                    $imgArray[] = $k;
                } 

                if(strpos($parag, "%%")) {
                    $galleryArray[] = $k;
                }    
            }

            if(count($imgArray)>0) {
                $imgArray = array_values($imgArray);
                $imgArrayCommaSeparated = implode(", ", $imgArray);
            }  else {
                $imgArrayCommaSeparated ='';
            }  

            if(count($galleryArray)>0) {
                $galleryArray = array_values($galleryArray);
                $imgGalleryCommaSeparated = implode(", ", $galleryArray);
            }  else {
                $imgGalleryCommaSeparated ='';
            }  

        $content = str_replace("\</p>", "</p>\n", $content);

        $result = strip_tags($content, '<b><ul><ol><li><h1><h2><h3><h4><h5><strong><table><tr><td><th><tbody><thead><tfoot><class><style>');

        $result = preg_replace("/%%(.+)%%/i", " ", $result);
        $result = preg_replace("/(\r){1,}/i", " ", $result);
        $result = preg_replace("/(<br \/>){1,}/i", "\n", $result);
        $result = preg_replace("/(\r\n){1,}/i", "\n", $result);
        $result = preg_replace("/\s*\n{1,}\s*/i", "\n", $result);

        return [$result, $imgArrayCommaSeparated, $imgGalleryCommaSeparated];
    }



    // ============================================================

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

    public function createRandomName($length=12) 
    {
        $letters = 'abcdefghijklmnopqrstuvwxyz';
        $allchar = 'abcdefghijklmnopqrstuvwxyz123456789';
        mt_srand (( double) microtime() * 1000000 );        
        $str = substr($letters, mt_rand (0,26), 1);
        
        for ($i = 0; $i<$length-1 ; $i++) {    
            $str .= substr($allchar, mt_rand (0,34), 1);
        }
        $str .= '.jpg';
        return $str;
    }

}