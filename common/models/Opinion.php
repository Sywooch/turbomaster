<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "opinion".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $name
 * @property string $email
 * @property string $company
 * @property string $city
 * @property string $content
 * @property integer $approved
 */
class Opinion extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'opinion';
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
            [['name', 'email', 'content'], 'required', 'message' => 'Заполните поле'],
            [['created_at', 'city'], 'safe'],
            [['email'], 'email', 'message' => 'Неправильный формат'],
            [['content'], 'string'],
            [['approved'], 'integer'],
            [['name', 'company', 'city', 'email'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '',
            'created_at' => '',
            'name' => '',
            'email' => '',
            'city' => '',
            'company' => '',
            'content' => '',
            'approved' => '',
        ];
    }




}
