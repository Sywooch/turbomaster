<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cart_product".
 *
 * @property integer $id
 * @property integer $cart_id
 * @property integer $product_id
 * @property integer $quantity
 * @property integer $price
 *
 * @property Product $product
 * @property Cart $cart
 */
class CartProduct extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'cart_product';
    }


    // public function rules()
    // {
    //     return [
    //         [['product_id'], 'required'],
    //         [['cart_id', 'product_id', 'quantity', 'price'], 'integer']
    //     ];
    // }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cart_id' => 'Cart ID',
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
            'price' => 'Price',
        ];
    }

 
    // public function getProduct()
    // {
    //     return $this->hasOne(Product::className(), ['id' => 'product_id']);
    // }

 
    public function getCart()
    {
        return $this->hasOne(Cart::className(), ['id' => 'cart_id']);
    }


    // my: ..................................

    public static function addProductToCart($product_id, $cart_id)
    {
        if($existLine = static::findExistLine($product_id, $cart_id)) {
            static::changeQuantity($existLine, 'plus');
            return;
        }
        static::createLine($product_id, $cart_id);
    }

    public static function createLine($product_id, $cart_id)
    {   
        $line = new static;
        $line->cart_id      = $cart_id;
        $line->product_id   = $product_id;
        $line->quantity     = 1;
        
        $product = Product::findOne((int)$product_id);
        $line->price        = (!empty($product->price)) ? $product->price : 0;
        
        return ($line->save()) ? true : false;
    }
        
    public static function findExistLine($product_id, $cart_id)
    {
        $line = static::find()
            ->where('product_id = :product_id and cart_id = :cart_id',
                    [':product_id' => $product_id, ':cart_id' => $cart_id])
            ->one();
        return ($line) ? $line : null;
    } 


    public static function changeQuantity($line, $sign)
    {   
        if($sign == 'minus')  {
            if($line->quantity == 1) {
                return false;
            }
            $line->quantity -= 1;

        } elseif($sign == 'plus') {
            $line->quantity += 1;
        }
        return ($line->save()) ? $line->quantity : false;   
    }

    
    public static function totalPriceByCartId($cart_id) 
    {   
        // не работает SUM из-за того, что по многим продуктам не определены цены:
        // $row = static::find()
        //     ->select('SUM(cart_product.price * cart_product.quantity) as total_price')
        //     ->leftJoin('cart_product as cp',  'cp.cart_id = cart_product.cart_id')
        //     ->where('cp.id = :line_id', [':line_id' => (int)$line_id])
        //     ->groupBy('cart_product.price')
        //     ->asArray()
        //     ->one();
        // return  $row['total_price'];   

        $rows = static::find()
            ->leftJoin('cart_product as cp',  'cp.cart_id = cart_product.cart_id')
            ->where('cp.cart_id = :cart_id', [':cart_id' => (int)$cart_id])
            ->asArray()
            ->all();
        $totalPrice = 0;
        foreach($rows as $row)  {
            if(!empty($row['price'])) {
                // $linePrice = $row['price'] * $row['quantity'];
                $totalPrice += $row['price'] * $row['quantity'];
            }
        }  
        return $totalPrice;
    }

  
}
