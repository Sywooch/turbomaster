<?php

namespace backend\controllers;

use backend\controllers\AdminController;  
use Yii;
use common\models\Image;
use common\models\Utilities;
use common\models\PhotoArticle;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\UploadedFile;


class PhotoArticleController extends AdminController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'create' => ['post'],
                    // 'delete' => ['post'],
                ],
            ],
        ];
    }


    public function actionCreate()
    {   
        $model = new PhotoArticle;
        $model->load(Yii::$app->request->post()); 

        $model->file = UploadedFile::getInstance($model, 'file');
        if(!is_null($model->file)) {

            $uploadedFile = $model->file->tempName;
            $subDirectory = 'article';
            $model->src   = Utilities::createRandomName() .'.jpg';
            
            if($model->save()) {
                Image::createImagesByPattern($uploadedFile, $subDirectory, $model->src, PhotoArticle::getStandardPattern());

                return $this->redirect(['article/media', 'id' => $model->article_id, '#'=>$model->pos]);
            } 
        }
        return $this->redirect(['article/media', 'id' => $model->article_id]);
    }

    
    

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        
        if($model->delete()) {
            $arraySubDirectories = array_keys(PhotoArticle::getStandardPattern());
            Image::deleteImages($model->src, 'article', $arraySubDirectories);
        }

        Utilities::retroGoBack();
        // return $this->redirect(['article/view', 'id' => $model->article_id, '#'=>$model->pos]);
    }


    protected function findModel($id)
    {
        if (($model = PhotoArticle::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionPopulate()
    {   

        $connection = \Yii::$app->db;
        $command = $connection->createCommand('SELECT * FROM tbm_treearticles  ORDER BY id');
        $rows = $command->queryAll();

        $pagesIgnored = ['contact', 'vacancy', 'feedback', 'warranty', 'delivery', 'payment', 'wholesale', 'turboservice', 'price', 'turboservice_gallery', 'turborepair', 'repair-price'];
        
        foreach($rows as $row) {
            $command = $connection->createCommand('SELECT * FROM article  WHERE older_alias = "' .$row['url'] .'"');
            $article = $command->queryOne();

            if(!$article || in_array($row['url'], $pagesIgnored)) continue;
            $content = $row['description'];
            $paragraphs = explode("\r\n", $content); 
            
            foreach($paragraphs as $k => $parag)   {

                preg_match('/<img.*?alt=&quot;(.*?)&quot;.*?src=&quot;(.*?)&quot;.*>/i', $parag, $match);

                if(isset($match) && count($match)>0) {

                    $alt =  $match[1];
                    $src =  $match[2];
                    $src = str_replace('/files/Image/', '', $match[2]);
                    $imageFile = Yii::getAlias('@public') .'/older_images/' .$src;

                    $model = new PhotoArticle;

                    $model->article_id = $article['id'];
                    $model->pos = $k;
                    $model->subpos = 0;

                    if(!is_null($imageFile)) {
                        $subDirectory = 'article';
                        $model->src   = Utilities::createRandomName() .'.jpg';
                        if($model->save()) {
                            Image::createImagesByPattern($imageFile, $subDirectory, $model->src, PhotoArticle::getStandardPattern());
                        } 
                    }
                }
            }    
        }
       echo 'Ready';
    }



}
