<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
use \yii\web\Request;
use kartik\datecontrol\Module;


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
                ],
        ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',

        ],
        'i18n' => [
            'translations' => [
                'frontend_' => [ 'class' => 'yii\i18n\PhpMessageSource', 'basePath' => '@common/messages', ],
                'backend_' => [ 'class' => 'yii\i18n\PhpMessageSource', 'basePath' => '@common/messages', ],
            ],
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
            'enablePrettyUrl' => true,
            'showScriptName' => false,
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
            ],
        ],
        
    ],
    'params' => $params,
];
