<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],        
    ],
    'modules' => [
    'user' => [
        'class' => Da\User\Module::class,
        // ...other configs from here: [Configuration Options](installation/configuration-options.md), e.g.
        'administrators' => ['admin'], // this is required for accessing administrative actions
        // 'generatePasswords' => true,
        // 'switchIdentitySessionKey' => 'myown_usuario_admin_user_key',
    ]
]
];
