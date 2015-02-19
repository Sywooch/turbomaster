<?php
namespace frontend\controllers;

use Yii;
use common\models\Article;
use common\models\Rubric;
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
        $articles = Article::listByRubricAlias($alias);
            
        if ($articles) {
            return $this->render('index', ['articles' => $articles,
                                          ]);
        } else {
             throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionRubrics($alias)
    {   
        $rubrics = Rubric::getRubricListByMainRubricAlias($alias);
        return $this->render('list_rubric', ['rubrics' => $rubrics]);
    }
 

    public function actionView($alias)
    {   
        Article::$isActiveOnly = true;
        $article = Article::findByAlias($alias);
        $photos  = Article::getPhotoArrayByArticleId($article['id']);

        if ($article) {
            return $this->render('view', [
                                            'article' => $article,
                                            'photos'  => $photos,
                                         ]);
        } else {
             throw new NotFoundHttpException('The requested page does not exist.');
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
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
