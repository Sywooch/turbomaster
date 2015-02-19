<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fact".
 *
 * @property string $id
 * @property string $content
 * @property integer $is_active
 * @property string $pos
 */
class Fact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'is_active'], 'required'],
            [['content'], 'string'],
            [['is_active', 'pos'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'is_active' => 'Is Active',
            'pos' => 'Pos',
        ];
    }
}
