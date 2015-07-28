<?php
namespace frontend\controllers;

use Yii;
use common\models\Article;
use common\models\Rubric;
use common\models\Link;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class ArticleController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    public function actionIndex($alias)
    {   
        Article::$isActiveOnly = true;
        $items = Article::listByRubricAlias($alias);

        if($items) {
            $rubrics = Rubric::getListSubrubricHasPublishArticles();
            return $this->render('index', compact('items', 'rubrics'));
            
        }  else {
            throw new NotFoundHttpException();
        }
    }

    public function actionRubrics($alias)
    {   
        $rubrics = Rubric::getRubricListByMainRubricAlias($alias);
        if($rubrics) {
            return $this->render('list_rubric', ['rubrics' => $rubrics]);
            
        }  else {
            throw new NotFoundHttpException();
        }
    }
 

    public function actionView($alias)
    {   
        Article::$isActiveOnly = true;
        $article = Article::findByAlias($alias);

        if($article) {
            $photos  = Article::getPhotoArrayByArticleId($article['id']);
            $rubrics = Rubric::getListSubrubricHasPublishArticles();
            $similars = Article::getSimilars($article);
            $interestLink = Link::getRandomInterestLink();

            return $this->render('view', compact('article', 'photos', 'rubrics', 'similars', 'interestLink'));
        
        }  else {
            throw new NotFoundHttpException();
        }

    }





    public function actionCreate()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
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
            throw new NotFoundHttpException();
        }
    }
}
