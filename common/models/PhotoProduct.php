<?php

namespace common\models;

use Yii;
use common\models\Product;
use common\models\Utilities;

/**
 * This is the model class for table "photo_product".
 *
 * @property integer $id
 * @property integer $partnumber
 * @property string  $src
 * @property integer $pos
 */
class PhotoProduct extends \yii\db\ActiveRecord
{
    public $file;

    private $_id;
    private $_partnumber;

    public static function tableName()
    {
        return 'photo_product';
    }


    public static function getStandardPattern() {
        return   [
            'big' => [  
                        'crop'      => true, 
                        'width'     => 800,
                        'height'    => 600,
                        'quality'   => 86,
                        'sharpen'   => 6,
                        'watermark' => [
                            'fileName'  => Yii::getAlias('@public/images/') .'watermark-turbomaster-big.png',
                            'opacity'   => 100,
                        ],
                    ],
            '240' => [
                        'crop'      => true, 
                        'width'     => 240,
                        'height'    => 240,
                        'quality'   => 92,
                        'sharpen'   => 4
                    ]];
    }
 
    public function rules()
    {
        return [
            [['file'], 'file', 'extensions'=> ['jpg', 'gif', 'png']],
            [['src', 'partnumber'], 'required'],
            [['src', 'partnumber'], 'string', 'max' => 255],
            [['pos'], 'integer'],
        ];
    }

    public function getProduct()
    {
        // return $this->hasOne(Product::className(), ['id' => 'product_id']);
        return $this->hasOne(Product::className(), ['partnumber' => 'partnumber']);
    }


    public function attributeLabels()
    {
        return [
            'id' => '',
            'partnumber' => '',
            'src' => '',
            'pos' => '',
            'file' => '',
        ];
    }


    // refactoring ::basic query
    private static function findList()
    {
        return static::find()
            ->select('photo_product.*')
            ->leftJoin('product', 'photo_product.partnumber = product.partnumber')
            // ->groupBy('photo_product.id')
            ->orderBy('product.id, pos');
    }  

    // refactoring
    public static function findByPartnumber($partnumber)
    {
        return static::findList()
            ->andWhere(['photo_product.partnumber' => $partnumber])
            ->asArray()
            ->all();
    }  

    // refactoring
    public static function findByInterchange($product)
    {
        $interchangeArray = Product::getInterchangeArray($product);
        if(!$interchangeArray) {
            return null;
        }
        return static::findList()
            ->andWhere(['in', 'product.partnumber', $interchangeArray])
            ->asArray()
            ->all();
    }  

    public static function findByPartnumberOrInterchange($product)
    {
        $query = static::findList()
            ->andWhere(['photo_product.partnumber' => $product['partnumber']]);

        $interchangeArray = Product::getInterchangeArray($product);
        if(!$interchangeArray) {
            $query
                ->orWhere(['in', 'product.partnumber', $interchangeArray]);
        }
        return $query
            ->asArray()
            ->all();
    }  


     //.....................................
    
    public function beforeSave($insert) 
    {
        if(parent::beforeSave($insert)) {
            if($this->isNewRecord) {
                $max = \common\models\Utilities::findMaxFrom(\common\models\PhotoProduct::tableName(), ['condition' => "partnumber = '" .$this->partnumber ."'"]);
                $pos = ($max) ? $max+1 : 1;
                $this->pos = $pos;
            }
            return true;
        }
        return false;
    }


    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $this->_partnumber = $this->partnumber;
            return true;
        }
        return false;
    }

    public function afterDelete()
    {   
        parent::afterDelete();
        $params = ['condition' => 'partnumber = \'' .$this->_partnumber .'\''];
        Utilities::normalizePositions(new PhotoProduct, $params);   
    }


    

}
