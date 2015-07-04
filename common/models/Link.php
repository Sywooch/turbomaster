<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "link".
 *
 * @property integer $id
 * @property string $url
 * @property string $title
 * @property string $brief
 * @property integer $pos
 */
class Link extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'link';
    }

    public function rules()
    {
        return [
            [['pos'], 'integer'],
            [['url', 'title'], 'string', 'max' => 550],
            [['brief'], 'string', 'max' => 1000]
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => '',
            'url' => 'Url',
            'title' => 'Заголовок',
            'brief' => 'Текст',
            'pos' => 'Позиция',
        ];
    }

    public static function getRandomInterestingLink()
    {
        return self::find()
            ->orderBy('RAND()')
            ->one();
    }



}
