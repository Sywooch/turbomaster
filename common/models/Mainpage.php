<?php
namespace common\models;

use Yii;
use common\models\Utilities;

/**
 * This is the model class for table "mainpage".
 *
 * @property integer $id
 * @property string  $type
 * @property integer $product_id
 * @property string  $priority_src
 * @property string  $brand_alias
 * @property string  $model_alias
 * @property string  $partnumber
 * @property string  $description
 * @property integer $pos
 * @property string  $image_src
 */
class Mainpage extends \yii\db\ActiveRecord
{
    public $file;
    private $_type;

    public static function getName($alias) 
    {   
        $types = [
            'sweet' => 'Сладкие цены',
            'attention' => 'Дефицит',
        ];
        return $types[$alias];
    }

    public static function tableName()
    {
        return 'mainpage';
    }
 
    public function rules()
    {
        return [
            [['file'], 'file', 'extensions'=> ['jpg', 'gif', 'png']],
            [['type'], 'required'],
            [['product_id', 'pos'], 'integer'],
            [['description', 'brand_alias', 'model_alias', 'partnumber'], 'string'],
            [['type'], 'string', 'max' => 12],
            [['image_src'], 'string', 'max' => 50],
            [['priority_src'], 'string', 'max' => 255],
        ];
    }
 
    public function attributeLabels()
    {
        return [
            'id' => '',
            'type' => '',
            'product_id' => '',
            'description' => '',
            'priority_src' => '',
            'brand_alias' => '',
            'model_alias' => '', 
            'partnumber' => '',
            'pos' => '',
            'image_src' => '',
            'file' => '',
        ];
    }


    public static function queryFull()
    {
       return (new \yii\db\Query())
            ->from(static::tableName())
            ->select('mainpage.*, 
                      photo.src as photo_src')
            ->leftJoin('photo_product photo', 'mainpage.partnumber = photo.partnumber AND photo.pos = 1')
            ->groupBy('mainpage.id')
            ->orderBy('mainpage.pos');
    }

    public static function getImageSrc($item) 
    {
        $imgSrc = ($item['image_src']) ? '/photo/mainpage/133/' .$item['image_src'] : '';
        if(!$imgSrc && $item['photo_src']) {
            $imgSrc = '/photo/product/240/' .$item['photo_src'];
        }
        return $imgSrc;
    }

    /////////////////////
     public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $this->_type = $this->type;
            return true;
        }
        return false;
    }

    public function afterDelete()
    {   
        parent::afterDelete();
        $params = ['condition' => 'type = \'' .$this->_type .'\''];
        Utilities::normalizePositions(new Mainpage, $params);   
    }

}
