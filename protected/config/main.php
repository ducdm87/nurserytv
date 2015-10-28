<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Web Application',
        'preload' => array('log'),
        'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
                'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'admin',
            'generatorPaths' => array(
                'ext.gtc'             ),
                        'ipFilters' => array('127.0.0.1', '::1'),
            'newFileMode' => 0666,
            'newDirMode' => 0777,
        ),
        'tophits',
    ),
    'defaultController' => 'index',
    'behaviors' => array(
        'runEnd' => array(
            'class' => 'application.components.WebApplicationEndBehavior',
        ),
    ),
        'components' => array(
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => false,
        ),
        'user' => array(
                        'allowAutoLogin' => true,
        ), 
                'db' => array(
            'connectionString' => 'mysql:dbname=nurserytv;host=localhost',
            'emulatePrepare' => true,
            'username' => 'nurserytv',
            'password' => 'vaiGnJhp5hp#',
            'charset' => 'utf8',
            'tablePrefix' => 'tbl_',
        ),
        'errorHandler' => array(
             'errorAction'=>'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
            'params' => array(
                'adminEmail' => 'webmaster@example.com',
    ),
);
