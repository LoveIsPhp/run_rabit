<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'YmhHQsHNtOqq5OmGwN6nniDGdQC5N_fW',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
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
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'queue' => [
            'class' => \yii\queue\amqp\Queue::class,
            'host' => 'localhost',
            'port' => 5672,
            'user' => 'guest',
            'password' => 'guest',
            'queueName' => 'queue',
        ]
    ],
    'controllerMap' => [
//        'batch' => [
//            'class' => 'schmunk42\giiant\commands\BatchController',
//            'overwrite' => true,
//            'modelNamespace' => $crudNs . '\models',
//            'modelQueryNamespace' => $crudNs . '\models\query',
//            'crudControllerNamespace' => $crudNs . '\\controllers',
//            'crudSearchModelNamespace' => $crudNs . '\models\search',
//            'crudViewPath' => '@app/modules/crud/views',
//            'crudPathPrefix' => '/crud/',
//            'crudTidyOutput' => true,
//            'crudActionButtonColumnPosition' => 'right', //left by default
//            'crudProviders' => [
//                \schmunk42\giiant\generators\crud\providers\core\OptsProvider::className()
//            ],
//            'tablePrefix' => '',
//            'tables' => [
//                'news',
//            ]
//        ],
//  docker compose  exec php yii giiant-batch/index --crudControllerNamespace=app\\modules\\crud\\controllers --modelNamespace=

//        'fixture' => [ // Fixture generation command line.
//            'class' => 'yii\faker\FixtureController',
//        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
