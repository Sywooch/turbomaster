<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "photo_article".
 *
 * @property integer $id
 * @property integer $article_id
 * @property string $src
 * @property string $subscribe
 * @property integer $pos
 * @property integer $subpos
 * @property integer $layout
 * @property integer $is_main
 */
class PhotoArticle extends \yii\db\ActiveRecord
{
    const LAYOUT_BOTTOM   = 1;
    const LAYOUT_LEFT     = 2;
    const LAYOUT_RIGHT    = 3;

    public $file;
    
    public static function tableName()
    {
        return 'photo_article';
    }


    public static function getStandardPattern() {
        return   [
            '800' => [  
                        'width'     => 800,
                        'height'    => 800,
                        'quality'   => 86,
                        // 'sharpen'   => 4
                    ],
             '250' => [
                        'width'     => 250,
                        'height'    => 250,
                        // 'sharpen'   => 4
                    ],       
             '100_square' => [
                        'crop'      => true, 
                        'width'     => 100,
                        'height'    => 100,
                        // 'sharpen'   => 4
                    ]];
    }

   

    public function rules()
    {
        return [
            [['file'], 'file', 'extensions'=> ['jpg', 'gif', 'png']],
            // [['article_id', 'src'], 'required'],
            [['article_id', 'pos', 'subpos', 'layout', 'is_main'], 'integer'],
            [['src'], 'string', 'max' => 40],
            [['subscribe'], 'string', 'max' => 700]
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => '',
            'article_id' => '',
            'src' => '',
            'subscribe' => '',
            'pos' => '',
            'layout' => '',
            'file' => '',
        ];
    }


    //.....................................
    
    public function beforeSave($insert) 
    {
        if(parent::beforeSave($insert)) {
            if($this->isNewRecord) {
                $max = \common\models\Utilities::findMaxFrom(\common\models\PhotoArticle::tableName(), [
                        'field'     => 'subpos',
                        'condition' => 
                            'article_id = ' .$this->article_id .' AND pos = ' .$this->pos 
                        ]);
                $subpos = ($max) ? $max+1 : 1;
                $this->subpos = $subpos;
            }
            return true;
        }
        return false;
    }

}
