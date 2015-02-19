<?php

namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use common\models\Opinion;
use yii\filters\VerbFilter;


class OpinionController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'create' => ['post'],
                ],
            ],
        ];
    }

    
    public function actionIndex() 
    {
        $provider = new ActiveDataProvider([
            'query' => Opinion::find()->where(['approved' => 1]),
            'sort'=> ['defaultOrder' => ['created_at' => SORT_DESC]],
            'pagination' => ['pageSize' => 10],
        ]);

        return $this->render('index', [
                                'items' => $provider->getModels(),
                                'pagination'=> $provider->pagination
                             ]);
    }

    public function actionCreate()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new Opinion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            // $this->sendEmails($model);
            return ['state' => 'success'];
        } 
        else {
            return ['state' => 'fail'];
        }
    }


    private function sendEmails($model)  
    {   
        $subject = ($model->type == Question::TYPE_COMMON_QUESTION) ? 'Новый вопрос о товаре' : 'Новый запрос цены товара';
        date_default_timezone_set("Europe/Moscow");
        $subject .= ' - ' .date("d.m.Y H:i");    

        foreach(Yii::$app->params['adminShopEmails'] as $emailTo) {
            Yii::$app->mail
                ->compose(
                    [
                        'html' => 'question-html',
                        'text' => 'question-text',
                    ], 
                    ['question' => $model])
                ->setFrom(Yii::$app->params['informatorEmail'])
                ->setTo($emailTo)
                ->setSubject($subject)
                ->send(); 
        }
    }



}
