<?php

namespace frontend\assets;

use yii\web\AssetBundle;


class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
        'css/font-awesome.min.css',
        'css/jquery-ui.min.css',
        'css/jquery.fancybox.css',
        'css/style.min.css',
    ];

    public $js = [
        'js/jquery-ui.min.js',        // castom  minimize ui, only autocomplete
        // 'js/bootstrap.min.js',
        'js/jquery.formstyler.min.js',
        'js/jquery.maskedinput.min.js',
        'js/jquery.unoslider.min.js',
        'js/jquery.fancybox.pack.js',
        'js/jquery.columnizer.min.js',
        // 'js/modernizr.custom.js',
        'js/site.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
