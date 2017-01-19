<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application DashboardAsset bundle.
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
        'css/AdminLTE.min.css',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        'css/skins/skin-blue.min.css',
        'css/site.css',
    ];
    public $js = [
        'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
        'plugins/jQuery/jquery-2.2.3.min.js',
        'js/bootstrap.min.js',
        'plugins/fastclick/fastclick.js',
        'js/app.min.js',
        'plugins/sparkline/jquery.sparkline.min.js',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'plugins/slimScroll/jquery.slimscroll.min.js',
        'plugins/chartjs/Chart.min.js',
        'js/pages/dashboard2.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}

