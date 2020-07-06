<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/../../panel/config/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'modules' => [
        'v1' => [
            'class' => 'api\modules\v1\Module',
        ],
    ],
    'components' => [
      'Kavenegar' => [
            'class' => 'Kavenegar\Yii2\Kavenegar',
            'apikey' => '685272424D706D516439506179657437704A44344731476D7351624A774B4E6C6B4B6B5570555A5A6D524D3D',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            // uncomment if you want to cache RBAC items hierarchy
            // 'cache' => 'cache',
        ],
        'response'=>[
            'format'=>\yii\web\Response::FORMAT_JSON
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            // 'cookieValidationKey' => 'rZqd3jYypLrmKlcRh2XGernm931sViMV',
            'enableCookieValidation'=>false,
            'enableCsrfValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser'
            ]
        ],
        // 'cache' => [
        //     'class' => 'yii\caching\FileCache',
        // ],
        'user' => [
            'identityClass' => 'api\modules\v1\models\User',
            'enableAutoLogin' => true,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'encryption' => 'ssl',
                'host' => 'vps.sellegram.com',
                'port' => '465',
                'username' => 'job@sellegram.com',
                'password' => 'YCRLr5CB#hF.',
//                'streamOptions' => [
//                    'ssl' => [
//
//                        'allow_self_signed' => true,
//                        'verify_peer' => false,
//                        'verify_peer_name' => false,
//
//                    ]
//                ],
            ],
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

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'enableStrictParsing'=>true,
            'rules' => [
                [
                    'class'=>'yii\rest\UrlRule',
                    'controller'=>[
                        'v1/oauth',
                        'v1/test'
                        ]
                ],
            ],
        ],

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
