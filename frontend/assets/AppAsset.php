<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
    ];
    public $js = [
         'js/jquery.flexslider-min.js',
        'js/scripts.js',
        'js/jquery.cycle2.js',
        'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js',
        'js/jquery.cycle2.core.js',
//        'http://code.jquery.com/jquery.min.js',
//        '//vk.com/js/api/openapi.js?63'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
