<?php

$settings = array(
    'defaultController' => 'homepage',
    'components' => array(
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                // home page
                '' => 'resume/display',
                'user/active/<activecode:[^\/]+>' => array('user/active'),
                'user/reactive' => array('user/reactive'),
                'resume/addnew' => array('resume/addnew'),
                'resume/edit-layout/<cid:[0-9]+>-[\w-]+\.html' => array('resume/editlayout', '.html'),
                'my-resumes' => array('resume/myresumes'),
            ),
        ),
        'user' => array(
            'loginUrl' => array('user/login'),
        ),
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=resume',
            'emulatePrepare' => true,
            'username' => 'resume',
            'password' => 'resume',
            'charset' => 'utf8',
            'tablePrefix' => 'tbl_',
        ),
        // uncomment the following to use a MySQL database
        'dbuser' => array(
            'connectionString' => 'mysql:host=localhost;dbname=jobsearch_users',
            'emulatePrepare' => true,
            'username' => 'jobsearch',
            'password' => 'joba123!@#',
            'charset' => 'utf8',
            'tablePrefix' => 'job_',
            'class'  => 'CDbConnection' ,
        ),
        'session' => array(
            'class' => 'CHttpSession',
            'sessionName' => md5("front-end-yii:193jjo2ueqd!@3ad"),
        ),
    ),
    'import' => array(
        'application.models.*',
        'application.models.frontend.*',
        'application.includes.*',
        'application.includes.libs.*',
        'application.components.widget.*',        
    ),
    'params' => array(
        // time out minute
        'timeout' => 60, 
         'adminEmail' => 'hoang.daoxuan@binhhoang.com',
        'siteoffline' => 0,
        'offlineMessage' => "This site is down for maintenance. Please check back again soon.",        
    ),
);
return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), $settings
);
?>