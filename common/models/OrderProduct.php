<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_product".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $quantity
 * @property integer $price
 *
 * @property Product $product
 * @property Order $order
 */
class OrderProduct extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'order_product';
    }


    public function rules()
    {
        return [
            [['order_id', 'product_id', 'quantity'], 'required'],
            [['order_id', 'product_id', 'quantity', 'price'], 'integer']
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
            'price' => 'Price',
        ];
    }


    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }


    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }


    public static function getLines($order_id)
    {
        return static::find()
            ->select('order_product.*, product.id AS product_id, product.name AS product_name, partnumber,
                (order_product.price * quantity) AS total_price')
            ->leftJoin('product', 'product.id = order_product.product_id')
            ->where('order_id = :order_id', [':order_id' => $order_id])
            ->orderBy('order_product.price desc, product.name')
            ->asArray()
            ->all();
    }


}
