<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
use \yii\web\Request;

<<<<<<< HEAD
//use \yii\web\Request;
//$baseUrl = str_replace('/backend/web', '/cpanel', (new Request)->getBaseUrl());

=======
$baseUrl = str_replace('/web', '', (new Request)->getBaseUrl());
>>>>>>> master
return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => [
        'log',
        'admin',
        ],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',
        ]
        ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
<<<<<<< HEAD
            'baseUrl' => $baseUrl,
=======
               'baseUrl' => $baseUrl,
>>>>>>> master
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'authManager' => [
            'class' => 'yii\rbac\DbManager', 
        ],
        
        'urlManager' => [
            'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
<<<<<<< HEAD
            'rules' => [
            ],
        ],
        
         'urlManagerFrontend' => [
            'baseUrl' => 'http://ad.myblog.tk',
            'hostInfo' => 'http://ad.myblog.tk',
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<action>/<id:\d+>' => 'site/<action>',
                '<action>' => 'site/<action>',
=======
//            'rules' => [
//            ],
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\urlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<action:\w+>/<id:\d+>' => 'site/<action>',
//                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<action:\w+>' => 'site/<action>',                           
>>>>>>> master
            ],
        ],
        
    ],
    'params' => $params,
];
