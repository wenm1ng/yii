<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-red',
                ],
            ],
        ],
        "authManager" => [        
            "class" => 'yii\rbac\DbManager',
        ],
        // // 使路径格式的URL
        'urlManager' => [
            //'class' => 'yii\web\UrlManager',
            'showScriptName' => true,
            'enablePrettyUrl' => true,
        //将此rules删除后，frontend的单复数形式访问就一切正常了！
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ],
    ],
    'bootstrap' => ['gii'],
     'modules' => [
        'gii' => ['class' => 'yii\gii\Module'],
    ],
];
