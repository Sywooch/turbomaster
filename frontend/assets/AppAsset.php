<?php

namespace frontend\assets;

use yii\web\AssetBundle;


class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
        'css/style.css',
    ];

    public $js = [
        'js/jquery-ui.min.js',        // castom  minimize ui, only autocomplete
        'js/bootstrap.min.js',
        'js/site.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
