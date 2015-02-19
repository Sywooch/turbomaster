<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "manufacturer".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property integer $pos
 */
class Manufacturer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manufacturer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['pos'], 'integer'],
            [['name', 'alias'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'alias' => 'Alias',
            'pos' => 'Pos',
        ];
    }
}
