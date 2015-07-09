<?php

namespace common\models;

use Yii;
use common\models\Product;
use common\models\Category;
use common\models\PhotoProduct;
use yii\helpers\Html;
use yii\helpers\Url;

class Yml 
{

    private $_content = '';
    private $_fileName;
    
    private function getParams() {
        return [
          'name' => 'ТурбоМастер',
          'company' => 'Интернет-магазин "ТурбоМастер"',
          'url' => 'http://www.turbomaster.ru',
          // 'deliveryCost' => 300,
          'currencyIso' => 'RUR',
          'currencyRate' => 1,
          'email' => 'ol3012@yandex.ru',
        ];
    }    


    private function setTimeZone() {
        date_default_timezone_set("Europe/Moscow");
    }

    private function createFileName() {
        $this->_fileName = 'yandex_market_' .date('Y-m-d_H-i') .'.xml';
    }

    public function getCreatedFilePath($fileName)  {
        // return Yii::getAlias('@frontend/web/yml/') .$fileName;
        return Yii::getAlias('@public/yml/') .$fileName;
    }


    public function createYandexMarketFile()
    {   
        $this->createYandexYML();
        return $this->_fileName;      
    }


    public function createYandexYML($fileName = null) {   
        $this->setTimeZone();

        $this->write('<?xml version="1.0" encoding="utf-8"?>');
        $this->write('<!DOCTYPE yml_catalog SYSTEM "shops.dtd">');
        $this->write('<yml_catalog date="'.date('Y-m-d H:i').'">');
        $this->write('<shop>');
        $this->renderShopData();
        $this->renderCurrencies();
        $this->renderCategories();
        $this->renderProducts();
        $this->write('</shop>');
        $this->write('</yml_catalog>');

        // for create static (cron) file:
        if ($fileName) {
            $file = $this->getCreatedFilePath($fileName .'.xml');
        // for create dinamic file:
        } else {
            $this->createFileName();
            $file = $this->getCreatedFilePath($this->_fileName);
        }

        $fileHandler = fopen($file, 'w');
        fwrite($fileHandler, $this->_content);
        fclose($fileHandler);
    }
    
    private function write($string) {
        $this->_content .= $string ."\n";
    }

    private function writeTag($data)  {
        $beginTag = '<'.$data[0] .'>';
        $endTag = '</'.$data[0] .'>';
        $string= $beginTag .$data[1] .$endTag;
        $this->_content .= $string ."\n";
    }

    private function renderShopData() { 
        $params = $this->getParams();
        $this->writeTag(['name', $this->cleanText($params['name'])]);
        $this->writeTag(['company', $this->cleanText($params['company'])]);
        $this->writeTag(['url', $this->cleanText($params['url'])]);
        $this->writeTag(['email', $this->cleanText($params['email'])]);
    }

    private function renderCurrencies() {   
        $params = $this->getParams();
        $this->write('<currencies>');
        $this->write('<currency id="'.$params['currencyIso'].'" rate="' .$params['currencyRate'] .'"/>');
        $this->write('</currencies>');
    }
    
    private function renderCategories() {
        $categories = [[   
                'id' => 1,
                'name' => 'Турбины (турбокомпрессоры)',
            ]];
        $this->write('<categories>');
        foreach ($categories as $category) {
            $this->write('<category id="' .$category['id'] .'">' .$category['name'].'</category>');
        }
        $this->write('</categories>');
    }


    private function renderProducts() {
        
        $params = $this->getParams();

        $countIsYml = Product::find()->select('id')->where(['is_yml' => 1])->count();

        $sql = Product::queryProductFull()
            ->andWhere([
                'product.state' => Product::STATE_ACTIVE,
                'product.type' => Product::TYPE_NEW,
                'category.id' => Category::CAR,
                ])
            ->andWhere('price > 0');

        if($countIsYml > 0) {
            $sql->andWhere(['is_yml' => 1]);
        }
        $products = $sql->asArray()->all();
        
        $this->write('<offers>');

        $writedArray = [];
        $bid = 1;

        foreach($products as $p) {
            
            if(empty($p['price']) || empty($p['brand_alias']) || empty($p['model_alias']) || empty($p['partnumber'])) {
                continue;
            }

            $signatureProduct = $p['model_alias'] .'|' .$p['partnumber'];
            if(in_array($signatureProduct, $writedArray)) {
                continue;
            }   else {
                $writedArray[] = $signatureProduct;
            }
            
            $url = 'http://www.turbomaster.ru/goods/' .urlencode($p['brand_alias']) .'/' .urlencode($p['model_alias']) .'/' .urlencode($p['partnumber']);

            $photos = PhotoProduct::findByPartnumberOrInterchange($p);
            
            $this->write('<offer id="' .$p['id'] .'" type="vendor.model"  available="true" bid="' .$bid .'">');
            $this->writeTag(['url', $url]);
            $this->writeTag(['price', $p['price']]);
            $this->writeTag(['currencyId', $params['currencyIso']]);
            $this->writeTag(['categoryId', 1]);
            $this->writeTag(['market_category', Html::encode('Авто/Запчасти/Двигатель')]);
            // $this->writeTag(['delivery', 'true']);
            // $this->writeTag(['pickup', 'true']);
            
            foreach($photos as $photo) {
                $photoSrc = '/photo/product/big/'.$photo['src'];
                $photoFile = Yii::getAlias('@public') .$photoSrc;
                if(is_file($photoFile)) {
                    $this->writeTag(['picture', 'http://www.turbomaster.ru' . $photoSrc]);
                }
            }
            $this->writeTag(['vendor', Html::encode($p['manufacturer_name']) ]);
            $this->writeTag(['vendorCode', $p['partnumber'] ]);

            $modelName = $this->cleanText($p['name']);
            if($rusCarName = $this->getRusCarName($p)) {
                $modelName .= ', ' .$rusCarName;
            }
            $this->writeTag(['model', $modelName]);
            $this->writeTag(['description', $this->cleanText( $this->createProductDescription($p), 500) ]);
            $this->writeTag(['manufacturer_warranty', 'true']);        
            $this->write('</offer>');

            ++$bid;
        }
        $this->write('</offers>');
    }


 
    private function createProductDescription($product) 
    {   
        $name = str_replace('Турбина', 'Турбина на', $product['name']);
        
        if($rusCarName = $this->getRusCarName($product)) {
            $name .= " / $rusCarName"; 
        }

        $interchange = str_replace(',', ', ', $product['interchange']);

        $str = $name .', ' .$product['partnumber'] .' (OEM ' .$interchange .'), двигатель ' .$product['engine'] .', ' .(int)$product['volume'] .' ccm. Турбина ' .$product['manufacturer_name'];
        return $str;
    }   


    // private function removeNonPrintableCharacters($str)
    // {   
    //     $str = str_replace("%C2%A0", "", $str);
    //     return trim(preg_replace("/\s+/", "", $str));
    // }


    private function cleanText($str, $max = null)
    {
        $bads = ["\n", "\t", "\0", "\r", "\r\n", "  ", "   ", "    ",  "скидка", "распродажа", "дешевый", "подарок", "бесплатно", "акция", "специальная цена", "только", "новинка", "new", "аналог",  "заказ"];
        $str = str_ireplace($bads, ' ', $str);
        $str = str_replace('\"', '&quot;', $str);
        $str = str_replace('&', '&amp;', $str);
        $str = str_replace('>', '&gt;', $str);
        $str = str_replace('<', '&lt;', $str);
        $str = str_replace('\'', '&apos;', $str);
        // $str = str_replace(' ', '&nbsp;', $str);

        $str = Html::encode(strip_tags($str));

        if($max && mb_strlen($str, 'utf-8') > $max) {
            $str = mb_substr($limitedText, 0, $max, 'utf-8');
        }
        return $str;
    }


    private function getRusCarName($product)
    {
       return ($product['rus_brand'] && $product['rus_model']) ? $product['rus_brand'] .' ' .$product['rus_model'] : null;
    }



}
