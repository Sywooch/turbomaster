<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'cookieValidationKey' => 'o945z0n43LQxhHjZFh_E6PCGmntUO410',
        ],

        'assetManager' => [
            'bundles' => false,
            
            // 'class' => 'yii\web\AssetManager',
            // 'bundles' => [
            //     'yii\web\JqueryAsset' => [
            //         'js' => ['jquery.min.js'],
            //     ],
            //     'yii\bootstrap\BootstrapAsset' => [
            //         'css' => ['css/bootstrap.min.css'],
            //     ],
            //     'yii\bootstrap\BootstrapPluginAsset' => [
            //         'js' => ['js/bootstrap.min.js'],
            //     ],
            // ],
        ],
        
        'urlManager' => [
            'rules'=> [
                '<view:(about|contact|requisite|vacancy|warranty|delivery|payment|wholesale|turboservice|price|turboservice_gallery|turborepair|repair-price|quality-turbines|diagnostics|expertise|diagnostika|sales-map)>' => 'site/static',  
                'page/<view>' => 'site/static',  

                'product/<id:\d+>'  => 'product/view',
                'tuning/<tuning_id:\d+>'  => 'product/view',
                'sparepart/<sparepart_id:\d+>' => 'product/view',
                'goods/<brand_alias:>/<model_alias:>/<partnumber:>' => 'product/view',
                
                'list/<category_id:\d+>'  => 'product/index',
                'turboshop/tuning'  => 'product/tuning',
                'turboshop/refurbish' => 'product/refurbish',
                // 'turboshop/cartridges' => 'product/cartridges',
                'turboshop/sparepart/<alias:>' => 'product/sparepart',
                'turboshop/manufacturers/<manufacturer_alias:>' => 'product/index',
                'turboshop/<category_alias:>/<brand_alias:>/<model_alias:>' => 'product/index',
                'turboshop/<category_alias:>/<brand_alias:>'  => 'product/index',
                'turboshop/<category_alias:>'  => 'product/index',

                'rubrics/<alias:>'  => 'article/rubrics',

                'articles/<alias:>'  => 'article/index',
                'turboread/<alias:>'  => 'article/index',
                
                'article/<alias:>'    => 'article/view',
                'turboinfo/<alias:>'    => 'article/view',
                'feedback' => 'opinion/index',
                
                'sitemap.xml' => 'site/sitemap',
                // 'post/<id:\d+>'=>'post/read',
                // 'post/<year:\d{4}>/<title>'=>'post/read',
            ],
        ],

        'user' => [
            'identityClass' => 'common\models\User',
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
