<?php

$itemsmenu = array();
$itemsmenu[] = array("Trang chủ", null,null,null,"http://vietbao.vn",0);
$itemsmenu[] = array("Giá xăng dầu", "benhvienphusan","display",null,WEB_URL,1);
$itemsmenu[] = array("Tin tức", "news","display",null,null,0);
$itemsmenu[] = array("Biểu đồ giá", "benhvienphusan","chart",null,null,0);
$itemsmenu[] = array("Bản đồ cây xăng", "benhvienphusan","maps",null,null,0);
$itemsmenu[] = array("Minh bạch xăng dầu", "news","category","minh-bach-xang-dau","/minh-bach-xang-dau/",0);
$itemsmenu[] = array("Cây xăng gian lận", "news","category","cay-xang-gian-lan","/cay-xang-gian-lan/",0);
fnSetMenuItems($itemsmenu, $type = "mainmenu");
$settings = array(
    'defaultController' => 'app',
    'components' => array(
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                // home page
                '/' => array('app/display'),
                '' => array('app/'),
                
                'tin-tuc' => array('articles/', 'urlSuffix'=>'/'),                 
                'tin-tuc/<alias:[\d\w-]+>/trang-<page:[0-9]+>' => array('articles/category', 'urlSuffix'=>'/'),
                'tin-tuc/<alias:[\d\w-]+>' => array('articles/category', 'urlSuffix'=>'/'),
                'tin-tuc/<id:[0-9]+>-<alias:.*>' => array('articles/detail','urlSuffix'=>'.html'),
                
                'videos/<id:[0-9]+>-<alias:.*>-<stt:[0-9]+>'=> array('playlist/detail/', 'urlSuffix'=>'/'),//chi tiet playlist
                'videos/<id:[0-9]+>-<alias:.*>'=> array('playlist/detail/', 'urlSuffix'=>'/'),
                'video/<id:[0-9]+>-<alias:.*>/<vid:[0-9]+>-<valias:.*>'=> array('playlist/detail', 'urlSuffix'=>'.html'),
                'video/<id:[0-9]+>-<alias:.*>'=> array('videos/detail','urlSuffix'=>'.html'),
                'videosc/<id:[0-9]+>-<alias:.*>' => array('videoscat/','urlSuffix'=>'/'),
            ),
        ),
        
        'user' => array(
            'loginUrl' => array('user/login'),
        ),
        'session' => array(
            'class' => 'CHttpSession',
            'sessionName' => md5("front-end-yii:193jjo2ue"),
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
         'adminEmail' => 'ducdm@binhhoang.com',
        'siteoffline' => 0,
        'offlineMessage' => "This site is down for maintenance. Please check back again soon.",
       // 'defaultApp' => 'app',
    ),
);
return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), $settings
);
?>