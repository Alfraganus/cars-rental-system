<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'aen',

    'sourceLanguage' => 'en',
    'on beforeAction' => function ($event) {
        \Yii::$app->language = \Yii::$app->getRequest()->getCookies()->getValue('language', 'en');

    },
 
    'components' => [

'socialShareBlog' => [
        'class' => \ymaker\social\share\configurators\Configurator::class,
        'enableDefaultIcons' => true,
         
        'socialNetworks' => [
            'facebook' => [
                'class' => \ymaker\social\share\drivers\Facebook::class,
                'label' => Yii::t('app', 'Facebook'),
            ],
            'twitter' => [
                'class' => \ymaker\social\share\drivers\Twitter::class,
                'label' => Yii::t('app', 'Twitter'),
            ],
            'googlePlus' => [
                'class' => \ymaker\social\share\drivers\GooglePlus::class,
                'label' => Yii::t('app', '+Google'),
            ],
            


        ],
    ],
    'socialShareMessangers' => [
        'class' => \ymaker\social\share\configurators\Configurator::class,
        'socialNetworks' => [
            'telegram' => [
                'class' => \ymaker\social\share\drivers\other\Telegram::class,
                'label' => Yii::t('app', 'Telegram'),
            ],
            'viber' => [
                'class' => \ymaker\social\share\drivers\other\mobile\Viber::class,
                'label' => Yii::t('app', 'Viber'),
            ],
            'whatsApp' => [
                'class' => \ymaker\social\share\drivers\other\mobile\WhatsApp::class,
                'label' => Yii::t('app', 'Whats app'),
            ],
        ],
    ],
    /*'mailer' => [
            // '__class' => yii\swiftmailer\Mailer::class,
            'transport' => [
               // '__class' => Swift_SmtpTransport::class,
                'host' => 'pop3.forpsi.com',
                'username' => 'postmaster@rentalcarsnow.cz',
                'password' => 'D-G7LBMXgJ',
                'port' => '587',
                'encryption' => 'tls',
            'useFileTransport' => false,

            ],
        ],*/


        'mailer' => [
         'useFileTransport' => false,
      'class' => 'yii\swiftmailer\Mailer',
      'transport' => [
        'class' => 'Swift_SmtpTransport',
       'host' => 'smtp.forpsi.com',
       'username' => 'postmaster@rentalcarsnow.cz',
       'password' => 'D-G7LBMXgJ',
        'port' => '587',
        'encryption' => 'tls',
      ],
    ],

       
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'dqwdqw',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'loginUrl' => ['site/login'],

        ],
        'dateformatter' => [
            'class' => 'app\components\DateFormat',
        ],

        'formatter' => [
            'dateFormat' => 'dd-MM-yyyy',
            'datetimeFormat' => 'php:d-m-Y H:i:s',
            'timeFormat' => 'php:H:i:s',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'Rs.',
            'class' => 'yii\i18n\Formatter',
        ],

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
       

        'sourceLanguage' => 'en',
        /*'on beforeAction' => function ($event) {
            \Yii::$app->language = \Yii::$app->getRequest()->getCookies()->getValue('language', 'en');

        },*/
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'main' => 'main.php',
                        'app/error' => 'error.php',
                    ],
                ],
                'yii*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii/messages',
                ],
                'main*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],


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
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\module',

        ],

        'rbac' => [

            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    /* 'userClassName' => 'app\models\User', */
                    'idField' => 'id',
                    'usernameField' => 'username',

                ]

            ],
            'layout' => 'left-menu',
            'mainLayout' => '@app/modules/admin/views/layouts/main.php',
        ]

    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            // 'site/*',
            'site/*',
            'events/*',
            // 'admin/*',
            // 'admin/car/airbagindex',
            'rbac/*',
            'car/*',
            'users/*',
            'type/*',
            'gii/*',
            'debug/*',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
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
