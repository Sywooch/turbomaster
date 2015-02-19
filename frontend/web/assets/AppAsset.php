<?php

namespace frontend\assets;

use yii\web\AssetBundle;


class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
        // 'css/jquery-ui-1.10.4.min.css',
        'css/jquery-ui.min.css',
        'css/jquery.mSimpleSlidebox.css',
        'css/jquery.fancybox.css',
        'css/jquery.jcarousel.basic.css',
        'css/jquery.bxslider.css',
        'css/jquery.formstyler.css',
        'css/site.css',
    ];

    public $js = [
        // 'js/core/jquery-1.11.1.min.js',
        // 'js/core/jquery-ui-1.10.4.min.js',
        'js/core/jquery-ui.min.js',        // castom  minimize ui, only autocomplete
        'js/core/jquery.formstyler.js',
        'js/core/modernizr.custom.js',
        'js/core/jquery.easing.1.3.js',
        'js/core/jquery.mSimpleSlidebox.js',
        'js/core/jquery.fancybox.pack.js',
        'js/core/jquery.jcarousel.min.js',
        'js/core/jquery.bxslider.min.js',
        'js/core/jquery.columnizer.min.js',
        'js/core/jquery.maskedinput.js',
        'js/search.js',
        'js/_common.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
