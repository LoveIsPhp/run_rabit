<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$crudNs = 'app\\modules\\crud';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'queue',
        'log',
        'redis',
        'elasticsearch',
        'cache'
    ],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'components' => [
//        'cache' => [
//            'class' => 'yii\caching\FileCache',
//        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'queue' => [
            'class' => \yii\queue\amqp_interop\Queue::class,
            'host' => 'rabbitmq',
            'port' => 5672,
            'user' => 'guest',
            'password' => 'guest',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => $_ENV['REDIS_HOST'],
            'port' => $_ENV['REDIS_PORT'],
            'database' => 0,
            'password' => $_ENV['REDIS_PASSWORD']
        ],
        'elasticsearch' => [
            'class' => 'yii\elasticsearch\Connection',
            'nodes' => [
                ['http_address' => 'elasticsearch:9200'],
                // configure more hosts if you have a cluster
            ],
            // set autodetectCluster to false if you don't want to auto detect nodes
            // 'autodetectCluster' => false,
            'dslVersion' => 7, // default is 5
        ],
        'cache' => [
            'class' => 'yii\caching\MemCache',
            'useMemcached' => true,
            'servers' => [
                [
                    'host' => 'memcached',
                    'port' => 11211,
                    'weight' => 60,
                ]
            ],
        ],
    ],
    'params' => $params,
    'controllerMap' => [
        'batch' => [
            'class' => 'schmunk42\giiant\commands\BatchController',
            'overwrite' => true,
            'modelNamespace' => $crudNs . '\models',
            'modelQueryNamespace' => $crudNs . '\models\query',
            'crudControllerNamespace' => $crudNs . '\\controllers',
            'crudSearchModelNamespace' => $crudNs . '\models\search',
            'crudViewPath' => '@app/modules/crud/views',
            'crudPathPrefix' => '/crud/',
            'crudTidyOutput' => true,
            'crudActionButtonColumnPosition' => 'right', //left by default
            'crudProviders' => [
                \schmunk42\giiant\generators\crud\providers\core\OptsProvider::className()
            ],
            'tablePrefix' => '',
            'tables' => [
                'news',
            ]
            // docker compose  exec php yii giiant-batch/index --crudControllerNamespace=app\\modules\\crud\\controllers --modelNamespace=
            /**
            ./yii giiant-batch \
            --interactive=0 \
            --overwrite=1 \
            --modelDb=db \
            --modelBaseClass=yii\\db\\ActiveRecord \
            --crudProviders=schmunk42\\giiant\\generators\\crud\\providers\\core\\optsProvider \
            --tables=news
             */
        ],
//        'fixture' => [ // Fixture generation command line.
//            'class' => 'yii\faker\FixtureController',
//        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
    // configuration adjustments for 'dev' environment
    // requires version `2.1.21` of yii2-debug module
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
