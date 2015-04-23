<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $title_name
 * @property string $h1
 * @property integer $pos
 */
class Category extends \yii\db\ActiveRecord
{

    const CAR       = 1; 
    const TRUCK     = 2; 
    const SHIP      = 3; 
    const TUNING    = 4; 
    const CARTRIDGE = 5;
    const ACTUATOR  = 6;


    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pos'], 'integer'],
            [['name', 'alias', 'title_name', 'h1'], 'string', 'max' => 255]
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
            'title_name' => 'Title Name',
            'h1' => 'H1',
            'pos' => 'Pos',
        ];
    }
}
