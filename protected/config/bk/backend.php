<?php

$settings = array(
    'defaultController' => 'cpanel',
    'components' => array(
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                'backend/ ' => 'cpanel/display',
                'backend' => 'cpanel/display',
                'backend/<controller>' => '<controller>',
                'backend/<controller>/<action>' => '<controller>/<action>',
            ),
        ),
        'user' => array(
            'loginUrl' => array('user/login'),
        ),
        'session' => array(
            'class' => 'CHttpSession',
            'sessionName' => md5("back-end-yii:bdasbdabdbasjdaj"),
        ),
    ),
    'import' => array(
        'application.models.*',
        'application.models.backend.*',
        'application.includes.*',
        'application.includes.libs.*',
    ),
);
return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), $settings
);
