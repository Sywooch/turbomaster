<?php

namespace app\models;

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
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pos'], 'integer'],
            [['url', 'title'], 'string', 'max' => 550],
            [['brief'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'title' => 'Title',
            'brief' => 'Brief',
            'pos' => 'Pos',
        ];
    }
}
