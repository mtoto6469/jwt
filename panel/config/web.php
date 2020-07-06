<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$basePath = str_replace('/panel/web', '', (new \yii\web\Request())->baseUrl);

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'fa',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@api'   => '../../api',
    ],
    'modules' => [
        'blog' => [
            'class' => 'app\modules\blog\Module',
        ],
    ],
    'components' => [

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'VmnIGXsT2v7dVb94qn33RZs7upIz1LSE',
            'baseUrl'=>$basePath
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
            'rules' => [
                'contact-us'=>'site/contact',
                'about-us'=>'site/about',
                'login'=>'site/login',
                ''=>'site/default',
                'index'=>'site/index',
                'verify'=>'site/verify',
                'logout'=>'site/logout',
                'signup'=>'site/signup',
                'articles'=>'site/articles',
                'NewsList'=>'site/news',
                'FundCost'=>'site/fundcost',
                'FundGoals'=>'site/fundgoals',
                'FundStatute'=>'site/fundstatute',
                'FundProspectus'=>'site/fundprospectus',
                'FundBankAccounts'=>'site/fundbankaccounts',
                'FundInvestmentHelp'=>'site/fundinvestmenthelp',
                'FundBranchs'=>'site/fundbranchs',
                'FundGeneralInfo'=>'site/fundgeneralinfo',
                'FundContactUs'=>'site/fundcontactus',
                'FundComplaint'=>'site/fundcomplaint',
                'Auditor'=>'site/auditor',
                'Guarantee'=>'site/auditor',
                'InvestmentManager'=>'site/auditor',
                'Manager'=>'site/auditor',
                'Trustee'=>'site/auditor',
                'FundBroker'=>'site/auditor',
                'FundRegistrationManager'=>'site/auditor',
                'SuperUnits'=>'site/superunits',
                'FinancialStatements'=>'site/financialstatements',
                'Meeting'=>'site/meeting',
                'EfficiencyForDifferentPeriods'=>'site/efficiencyfordifferentperiods',
                'DailyEfficiency'=>'site/dailyefficiency',
                'AssetDistributionForDifferentPeriods'=>'site/assetdistributionfordifferentperiods',
                'DailyAssetDistribution'=>'site/dailyassetdistribution',
                'DailyAssetDistributionp'=>'site/dailyassetdistributionp',
//                'NewsList'=>'site/news',
                'new/<id:\d+>'=>'site/new',
                'article/<id:\d+>/<tag>'=>'site/article',
                'articles/<id:\d+>/<tag>'=>'site/articles',
                'company/<id:\d+>/<tag>'=>'site/company',
                '<modules>/<controller>/<action>/<id:\d+>'=>'<modules>/<controller>/<action>'
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
