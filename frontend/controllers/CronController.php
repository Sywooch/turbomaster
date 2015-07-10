<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Yml;


class CronController extends Controller
{

    // */10 * * * wget http://turbomaster.ru/cron/create-static-yml
    public function actionCreateStaticYml()
    {   
        $this->layout = false;
        
        $market = new Yml();
        $market->createYandexYML('static_yml');
        Yii::$app->end();
    }


}
