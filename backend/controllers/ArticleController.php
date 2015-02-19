<?php

namespace backend\controllers;

use backend\controllers\AdminController;  
use Yii;
use common\models\Article;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class ArticleController extends AdminController
{
    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 // 'delete' => ['post'],
    //             ],
    //         ],
    //     ];
    // }


    public function actionIndex()
    {   
        \common\models\Utilities::setBackUrl(Yii::$app->request->url);

        $articles = Article::listAll();
        if (!$articles)  $articles = [];

        return $this->render('index', [
                                        'items' => $articles,
                                        'pages' => Article::$pages,
                                       ]);
    }

    public function actionMedia($id)
    {   
        if(is_numeric($id)) {
            $article = $this->findModel($id);
        }  else {
            $article = Article::findByAlias($id);
            $id = $article['id'];
        }

        $photos = Article::getPhotoArrayByArticleId($id);
        return $this->render('media', [
                                        'article' => $article,
                                        'photos'  => $photos,
                                       ]);
    }


    public function actionCreate()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Статья создана');
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    
    public function actionUpdate($id)
    {   
        if(is_numeric($id)) {
            $model = $this->findModel($id);
        }  else {
            $model = Article::find()->where('alias = :alias', [':alias' => $id])->one();
        }
        
        if ($model->load(Yii::$app->request->post())  && $model->save()) {
            Yii::$app->session->setFlash('success', 'Статья сохранена');
            return $this->redirect(['update', 'id' => $model->id]);
        } elseif (isset($model)) {
            $model->content = Article::contentViewFormat($model->content);
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
