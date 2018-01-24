<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'aliases' => [
        '@name1' => '@app/path/to/path1',
        '@name2' => 'path/to/path2',
    ],
    'modules' => [
        'admin' => [        
            'class' => 'mdm\admin\Module', 
            'layout' => 'left-menu',//yii2-admin的导航菜单  
        ],
    ],
    // 'as access' => [
    //     'class' => 'mdm\admin\components\AccessControl',
    //     'allowActions' => [
    //         //这里是允许访问的action，不受权限控制
    //         //controller/action
    //         'site/*',
    //         '*'
    //     ]
    // ],
    'as theme' => [
        'class' => 'backend\components\ThemeControl',
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'assetManager' => [
            'linkAssets' => true,
        ],
        'urlManager' => [
            //简洁网址(PrettyUrl)配置:
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'user',
                    // 'pluralize'=>false,//禁用复数形式，建议使用
                ],
            ],
        ],
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'view' => [
            'theme' => [
                // 'basePath' => '@app/themes/spring',
                // 'baseUrl' => '@web/themes/spring',
                'pathMap' => [ 
                    '@frontend/views' => [ 
                        '@frontend/themes/spring',
                    ]
                ],
            ],
        ],
    ],
    'params' => $params,
    'controllerMap' => [
        
    ],
    'language' => 'zh-CN',
];


/*return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'aliases' => [
        '@name1' => '@app/path/to/path1',
        '@name2' => 'path/to/path2',
        '@mdm/admin' => '@vendor/mdmsoft/yii2-admin',
    ],
     'modules' => [
        'admin' => [        
            'class' => 'mdm\admin\Module',   
        ],
        //......
    ],
    'components' => [
        //......
        'authManager' => [        
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],    
        ],
        //......
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            //这里是允许访问的action，不受权限控制
            //controller/action
        ]
    ],
    'params' => $params,
    'controllerMap' => [
        'article' => [
            'class' => 'frontend\controllers\PostController',
            'enableCsrfValidation' => false,
        ],
    ],
    'language' => 'zh-CN',
];*/