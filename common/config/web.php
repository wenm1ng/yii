<?php
if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return [
    'components' => [
        'urlManager' => [
2             'enablePrettyUrl' => true,
3             'showScriptName' => false,//隐藏index.php 
4             //'enableStrictParsing' => false,
5             'suffix' => '.html',//后缀，如果设置了此项，那么浏览器地址栏就必须带上.html后缀，否则会报404错误
6             'rules' => [
7                 //'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
8             ],
9         ],
    ],
    
];
