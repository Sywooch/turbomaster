<?php

namespace backend\assets;

use yii\web\AssetBundle;


class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    // public $sourcePath = '@webroot';
    
    public $css = [
        'css/admin.css',
        'css/jquery-ui-1.10.4.min.css',
    ];

    public $js = [
        // 'js/core/jquery-1.11.1.min.js',
        'js/core/jquery-ui-1.10.4.min.js',
        'js/core/jquery.easing.1.3.js',
        'js/core/jquery.formstyler.js',
        'js/core/jquery.cookie.js',
        'js/core/jquery.phantomDot.js',
        'js/core/jquery.phantomInput.js',
        'js/core/jquery.phantomSelect.js',
        'js/core/jquery.synctranslit.js',
        'js/_common.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];




}
