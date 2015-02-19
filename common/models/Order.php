<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $created_at
 * @property integer $state
 * @property integer $delivery
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $note
 *
 * @property OrderProduct[] $orderProducts
 */
class Order extends \yii\db\ActiveRecord
{

    const STATE_NEW         = 1;
    const STATE_CONFIRMED   = 2;
    const STATE_EXECUTED    = 3;
    const STATE_ERROR       = 4;


    public static function tableName()
    {
        return 'order';
    }


    public function behaviors()
    {
        return [
            'timestampBehavior' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];    
     }
     
    public function scenarios()
    {
        return [
            'buyer' => ['state', 'name', 'phone', 'email', 'address'],
            'admin' => ['state', 'name', 'phone', 'email', 'address', 'delivery', 'note'],
        ];
    }


    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'address'], 'required', 'on' => 'buyer', 'message' => 'Заполните поле'],
            // [['created_at, note, state, delivery'], 'safe'],
            [['state', 'delivery'], 'integer'],
            [['name'], 'string', 'max' => 120],
            [['phone'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 40],
            [['email'], 'email', 'message' => 'Неправильный формат'],
            [['address', 'note'], 'string', 'max' => 255]
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => '',
            'created_at' => '',
            'state' => '',
            'delivery' => '',
            'name' => '',
            'phone' => '',
            'email' => '',
            'address' => '',
            'note' => '',
        ];
    }


    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])
            ->viaTable('order_product', ['order_id' => 'id']);
    }

    public function getLines()
    {
        return $this->hasMany(OrderProduct::className(), ['order_id' => 'id']);
    }

    
    public static function queryOrderFull($state = null)
    {   

        $query = static::find()
            ->select('order.*, 
                p.id AS product_id, p.name AS product_name, p.partnumber, 
                op.quantity,
                SUM(op.price * op.quantity) AS total_price,
                GROUP_CONCAT(p.name SEPARATOR \' | \') AS products_names
                ');
        if($state) {
            $query->where('order.state = :state', [':state' => (int)$state]);
        }
        return $query
            ->leftJoin('order_product op',  'op.order_id = order.id')
            ->leftJoin('product p',  'p.id = op.product_id')
            ->orderBy('order.id desc')
            ->groupBy('order.id')
            ->asArray();
    }


    public static function getList($state = null)
    {
        $query = static::queryOrderFull($state);

        $pages = new \yii\data\Pagination(['totalCount' => $query->count()]);
        $items = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return  [ 'items' => $items,
                  'pages' => $pages ];
    }


    public static function getItem($id)
    {
        return static::queryOrderFull()
            ->where('order.id = :id', ['id' => (int)$id])
            ->one();     
    }    

    ///................................
   
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                if (!$this->state) {
                    $this->state =  self::STATE_NEW;
                }
                if (!$this->delivery) {
                    $this->delivery = 1;
                }
            }
            return true;
        }
        return false;
    }


    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            if ($this->lines) {
                foreach ($this->lines as $line) {
                    $line->delete();
                }
            }
            return true;
        }
        return false;
    }


}
