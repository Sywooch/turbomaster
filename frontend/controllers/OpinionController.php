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
            
            $this->sendEmails($model);
            return ['state' => 'success'];
        } 
        else {
            return ['state' => 'fail'];
        }
    }


    private function sendEmails($model)  
    {
        $messages = [];
        $subject =  'Новый отзыв о магазине Tурбомастер';

        foreach(Yii::$app->params['adminShopEmails'] as $emailTo) {
            $messages[] = Yii::$app->mail
                ->compose([
                        'text' => 'opinion-text',
                    ], 
                    [
                        'model' => $model,
                    ])
                ->setFrom(Yii::$app->params['informatorEmail'])
                ->setTo($emailTo)
                ->setSubject($subject); 
        }
        Yii::$app->mail->sendMultiple($messages);
    }



}
