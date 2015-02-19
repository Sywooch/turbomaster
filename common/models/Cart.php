<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $session_id
 *
 */

class Cart extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'cart';
    }


    public function rules()
    {
        return [
            [['created_at', 'session_id'], 'required'],
            [['created_at'], 'safe'],
            [['session_id'], 'string', 'max' => 40]
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'session_id' => 'Session ID',
        ];
    }


  
    // my ..............................

    public function getLines()
    {
        return $this->hasMany(CartProduct::className(), ['cart_id' => 'id']);
    }


    // alias
    public static function current() 
    {
        return static::findBySessionIdOrCreate();
    }

 
    public static function findBySessionIdOrCreate() 
    {
        $session_id = session_id();
        $cart= static::find()->where('session_id = :session_id', [':session_id' => $session_id])->one();

        if(!$cart)  {
            $cart = new static;
            $cart->session_id = $session_id;
            $cart->created_at = new \yii\db\Expression('NOW()');
            $cart->save();
        }     
        return $cart;
    }
    

    public static function updateSessionCountProduct()
    { 
        $cart_total = 0;
        if (!isset($_SESSION['cart_total']))   {
            $_SESSION['cart_total'] = 1;
            return;
        }
        $items = static::listCartProducts();
        foreach ($items as $item)  {
            $cart_total += $item['quantity'];
        }
        $_SESSION['cart_total'] = $cart_total;
    }

    public static function resetSessionCountProduct()
    {
        unset($_SESSION['cart_total']);
    }


    public static function listCartProducts()
    {
        return static::find()
            ->select('product.id, product.partnumber, product.name, product.price, cart_product.quantity, cart_product.id as line_id')
            ->from('cart_product')
            ->leftJoin('product', 'cart_product.product_id = product.id')
            ->where('cart_product.cart_id = :cart_id', [':cart_id' => Cart::current()->id])
            ->orderBy('product.partnumber')
            ->asArray()
            ->all();

        // return $this->hasMany(Product::className(), ['id' => 'product_id'])
        //     ->viaTable('cart_product', ['order_id' => 'id']);
    }


    /// ...................

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
