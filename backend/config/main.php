<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'modules' => [],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'o945z0n43LQxhHjZFh_E6PCGmntUO410',
        ],
        // 'assetManager' => [
        //     'bundles' => [
        //         'yii\web\YiiAsset' => ['js' => []],
        //         'yii\web\JqueryAsset' => ['js' => []],    
        //         'yii\bootstrap\BootstrapAsset' => ['css' => []],
        //     ],
        // ],
        'urlManager' => [
            'rules'=> [
                // '/'=>'excel/catalog_loader',
                '/'=>'product/index',
                'login'=>'site/login',
                'logout'=>'site/logout',
                'product/update/<id:\d+>' => 'product/update',
            ],
        ],

        'user' => [
            'identityClass' => 'common\models\Admin',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
