<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
use \yii\web\Request;

    $baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

use \yii\web\Request;
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());


return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'site/index',
    'components' => [
        
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => $baseUrl,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
<<<<<<< HEAD

        'urlManager' => [
            'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<action>/<id:\d+>' => 'site/<action>',
                '<action>' => 'site/<action>',
            ],
        ],
       
        'urlManagerBackend' => [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => 'http://ad.myblog.tk/backend/web',
            'hostInfo' => 'http://ad.myblog.tk',
=======
       
        'urlManager' => [
            'baseUrl' => $baseUrl,
>>>>>>> master
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<action:\w+>/<id:\d+>' => 'site/<action>',
//                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<action:\w+>' => 'site/<action>',                           
            ],
        ],
<<<<<<< HEAD
        
=======
        'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
//            'rules' => [
//            ],
        ],
//        'db' => require(__DIR__ . '/db.php'),
>>>>>>> master
    ],
    'params' => $params,
];
