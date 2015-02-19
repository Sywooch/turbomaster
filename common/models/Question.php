<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "question".
 *
 * @property integer $id
 * @property string $created_at
 * @property integer $product_id
 * @property integer $state
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $content
 */
class Question extends \yii\db\ActiveRecord
{
    const STATUS_NEW        = 1;
    const STATUS_ANSWERED   = 2;
    const STATUS_ERROR      = 3;

    const TYPE_COMMON_QUESTION  = 1;
    const TYPE_PRICE_REQUEST    = 2;


    public static function tableName()
    {
        return 'question';
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


    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'content', 'product_id'], 'required', 'message' => 'Заполните поле'],
            [['product_id', 'type'], 'integer', 'min' => 1],
            ['state', 'integer'],
            [['name'], 'string', 'max' => 120],
            [['phone'], 'string', 'min' => 9, 'max' => 20],
            [['email'], 'string', 'max' => 40],
            ['email', 'email', 'message' => 'Неправильный формат'],
            ['content', 'string', 'max' => 255, 'message' => 'Слишком длинный вопрос'],
            ['content', 'validateNoSpam'],
        ];
    }

    public function validateNoSpam($attribute, $params)
    {
        if (preg_match('/href=/', $this->$attribute)) {
            $this->addError($attribute, 'This is a spam');
        }
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => '',
            'type' => '',
            'state' => '',
            'name' => '',
            'phone' => '',
            'email' => '',
            'content' => '',
        ];
    }

    ///................................
   
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                if (!$this->state) {
                    $this->state =  self::STATUS_NEW;
                }
            }
            return true;
        }
        return false;
    }


}
