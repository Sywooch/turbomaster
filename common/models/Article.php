<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use common\behaviors\TransliterateBehavior;
use common\models\PhotoArticle;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $category_id
 * @property string $title
 * @property string $content
 * @property string $brief
 * @property integer $state
 * @property string $photo_main
 * @property string $metadesc
 * @property string $metakey
 * @property string $alias
 * @property integer $pos
 * @property string $older_images
 * @property string $older_gallery
 * @property string $older_alias
 * @property integer $older_id
 */
class Article extends \yii\db\ActiveRecord
{
    const STATE_INACTIVE = 0;
    const STATE_ACTIVE   = 1;

    public $category_name;
    public $category_alias;
    public $maincategory_name;
    public $maincategory_alias;

    public static $isActiveOnly = false; 
    public static $pages; 
    
    private static $splitTags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'table', 'ul'];    
    

    
    public static function tableName()
    {
        return 'article';
    }


    public function behaviors()
    {
        return [
            'timestampBehavior' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'transliterate' => [
                'class' => TransliterateBehavior::className(),
                'attributes' => [
                      ActiveRecord::EVENT_BEFORE_INSERT => ['title' => 'alias'],
                      ActiveRecord::EVENT_BEFORE_UPDATE => ['title' => 'alias'],
                ],
            ],
        ];    
     }


    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'content', 'category_id'], 'required', 'message' => 'Заполните поле'],
            [['category_id', 'state', 'pos', 'older_id'], 'integer'],
            [['content', 'brief', 'metadesc'], 'string'],
            [['title', 'photo_main', 'alias', 'metakey', 'older_images', 'older_gallery', 'older_alias'], 'string', 'max' => 255]
        ];
    }

 
    public function attributeLabels()
    {
        return [
            'created_at' => '',
            'updated_at' => '',
            'category_id' => '',
            'title' => '',
            'content' => '',
            'brief' => '',
            'state' => '',
            'photo_main' => 'Фото',
            'alias' => '',
            'metadesc' => 'Meta Description',
            'metakey' => 'Meta Keys',
        ];
    }


    public function getPhotoArrayByArticleId($id)
    {   
        $photos = PhotoArticle::find()
            ->where('article_id = :id', [':id' => (int)$id])
            ->orderBy('pos, subpos')
            ->asArray()->all();
       
        $arPhotos = [];
        foreach ($photos as  $photo) {
            $arPhotos[$photo['pos']][] = $photo;
        }
        return $arPhotos;
    }
    

    private static function createPaginator($query) 
    {
        static::$pages = new \yii\data\Pagination([
                'defaultPageSize' => 20,
                'totalCount' => $query->count(),
            ]);
    }

    public static function queryArticleFull()
    {   
        $query = static::find()
            ->select('article.*, rubric.name as category_name, mainrubric.name as maincategory_name, rubric.alias as category_alias, mainrubric.alias as maincategory_alias, photo_article.src as mainphoto_src')
            ->leftJoin('rubric', 'article.category_id = rubric.id')
            ->leftJoin('rubric mainrubric', 'rubric.parent_id = mainrubric.id')
            ->leftJoin('photo_article', 'article.id = photo_article.article_id AND photo_article.is_main = 1');

        // если выбрать только активные: 
        if(static::$isActiveOnly === true)  {
            $query->andWhere('article.state = ' . static::STATE_ACTIVE);
        }
        return $query;
    }
    

    public static function findById($id)
    {
        $article = static::queryArticleFull()
            ->andWhere('article.id = :id', [':id' => (int)$id])
            // ->asArray()
            ->one();
        return $article;
    }    

    public static function findByAlias($alias)
    {
        $alias = static::clearParam($alias);

        $article = static::queryArticleFull()
            ->andWhere('article.alias = :alias', [':alias' => $alias])
            // ->asArray()
            ->one();
        return $article;
    }


    public static function listByRubricAlias($alias)
    {
        $query = static::queryArticleFull()
            ->andWhere(['rubric.alias' => $alias])
            ->orderBy('created_at DESC')
            ->asArray();
        $paginator = static::createPaginator($query);
        return  $query->offset(static::$pages->offset)->limit(static::$pages->limit)->all();
    }  

    public static function listForMainpage()
    {
        return static::queryArticleFull()
            ->andWhere('article.is_main = 1')
            ->orderBy('article.pos, article.id DESC')
            ->limit(4)
            ->asArray()
            ->all();
    } 


    public static function listAll()
    {
        $query = static::queryArticleFull();

        if($rubric_id = Yii::$app->request->get('rubric_id')) {
            $query->andWhere('rubric.id = :rubric_id', [':rubric_id'=> $rubric_id]);
        }
        if(!$order_by = Yii::$app->request->get('order_by')) {
            $orderBy = 'created_at DESC';
        }    
        $query
            ->orderBy($orderBy)
            ->asArray();
    
        $paginator = static::createPaginator($query);
        return  $query->offset(static::$pages->offset)->limit(static::$pages->limit)->all();
    } 


    public static function contentViewFormat($string)
    {
        $string = preg_replace("/\n/i", "<br>", $string);
        // $string = preg_replace("/(<\/h4>|<hr>|<\/ul>)\s*<br>/i", "$1\n", $string);
        return $string;    
    }
    

    //.....................................
    
    public static function getClosedTagsForSplitPattern()
    {
        $tags = static::$splitTags;
        foreach ($tags as &$tag) {
            $tag = '\/' .$tag .'>';
        }
        $output = implode('|', $tags);
        $output = '/(' .$output .')\s*/i';
        return $output;
    }    


    public static function checkIsParagraph($string)
    {   
        $tags = static::$splitTags;
        foreach ($tags as &$tag) {
            $tag = '<' .$tag;
        }
        $pattern = implode('|', $tags);
        return (preg_match('/^('. $pattern .')/i', ltrim($string), $matches)) ? false : true;
    }


    public static function contentDbFormat($string)
    {   
        $string = preg_replace("/(\n)|(\r)/i", " ", $string);
        $string = preg_replace("/\s*<br>\s*/i", "\n", $string);
        $string = preg_replace(static::getClosedTagsForSplitPattern(), "$1\n", $string);
        $string = preg_replace("/\s*\n{2,}\s*/i", "\n", $string);
        return $string;
    }

    private static function clearParam($string) 
    {   
        return str_replace('.html', '',  $string);
    }

    //.....................................
    
    public function beforeSave($insert) 
    {
        if(parent::beforeSave($insert)) {
            $this->content = static::contentDbFormat($this->content);
            return true;
        }
        return false;
    }

    // public function afterFind()
    // {
    //     parent::afterFind();
    //     $this->content = static::contentViewFormat($this->content);
    // }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            
            $photos = PhotoArticle::find()->where('article_id = :article_id', [':article_id' => $this->id])->all();
            $arraySubdirectories = array_keys(PhotoArticle::getStandardPattern());

            foreach($photos as $photo) {
                Image::deleteImages($photo->src, 'article', $arraySubdirectories);
                $photo->delete();
            }
            return true;
        }
        return false;
    }

    

}
