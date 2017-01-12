<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'i18n' => [
            'translations' => [
                'frontend_' => [ 'class' => 'yii\i18n\PhpMessageSource', 'basePath' => '@common/messages', ],
                'backend_' => [ 'class' => 'yii\i18n\PhpMessageSource', 'basePath' => '@common/messages', ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    
    ],
];
