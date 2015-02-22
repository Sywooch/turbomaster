<?php

namespace frontend\assets;

use yii\web\AssetBundle;


class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
        'css/font-awesome.css',
        'css/jquery.formstyler.css',

        'css/jquery.jcarousel.basic.css',
        'css/jquery.fancybox.css',
        // 'css/jquery.mSimpleSlidebox.css',
        // 'css/jquery.bxslider.css',
        
        'css/style.css',
    ];

    public $js = [
        'js/jquery-ui.min.js',        // castom  minimize ui, only autocomplete
        'js/bootstrap.min.js',
        'js/jquery.formstyler.min.js',
        'js/jquery.maskedinput.min.js',

        'js/jquery.jcarousel.min.js',
        'js/jquery.fancybox.pack.js',
        'js/jquery.columnizer.min.js',
        // 'js/modernizr.custom.js',
        // 'js/jquery.easing.1.3.js',
        // 'js/jquery.mSimpleSlidebox.js',
        // 'js/jquery.bxslider.min.js',

        'js/site.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
