<?php

$itemsmenu = array();
//"title", "controller","action","data-id|data-alias","link",is_homepage,[array_param]
$itemsmenu[] = array("Trang chủ", null,null,null,"http://vietbao.vn",0);
$itemsmenu[] = array("Giá điện", "news","detail","bieu-gia-ban-dien","",1);
$itemsmenu[] = array("Cách tính giá điện", "news","detail","cach-tinh-gia-dien","",0);

$itemsmenu[] = array("Tin tức", "news","display",null,null,0);
$itemsmenu[] = array("Lịch cắt điện", "giadien","lichcatdien","",null,0);
$itemsmenu[] = array("Tiết kiệm điện", "news","category","tiet-kiem-dien",null,0);
$itemsmenu[] = array("Thủ tục cấp điện", "news","detail","thu-tuc-cap-dien",null,0);
$itemsmenu[] = array("Xử lý vi phạm", "news","category","xu-ly-vi-pham",null,0);
$itemsmenu[] = array("Hỏi đáp", "giadien","hoidap",null,null,0);

//$itemsmenu[7]['_subitem'] = array();
//$itemsmenu[7]['_subitem'][] = array("Vi phạm thời hạn thanh toán", "news","detail","vi-pham-thoi-gian-thanh-toan","",0, array("cid"=>214,"cat_alias"=>"xu-ly-vi-pham"));
//$itemsmenu[7]['_subitem'][] = array("Xử lý vi phạm trộm cắp điện", "news","detail","xu-ly-vi-pham-trom-cap-dien","",0, array("cid"=>213,"cat_alias"=>"xu-ly-vi-pham"));

fnSetMenuItems($itemsmenu, $type = "mainmenu");

$settings = array(
    'defaultController' => 'homepage',
    'components' => array(
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                // home page
                '' => array('news/detail','urlSuffix'=>'.html','defaultParams'=>array("alias"=>"bieu-gia-ban-dien","showpath"=>0)),
                'cach-tinh-gia-dien/' => array('news/detail','urlSuffix'=>'.html','defaultParams'=>array("alias"=>"cach-tinh-gia-dien","showpath"=>0)),
                
                'lich-cat-dien/<location_alias:[\w-\d]+>/ngay-<date:\d{1,2}-\d{1,2}-\d\d\d\d>' => array('giadien/lichcatdien','urlSuffix'=>'.html'),
                'lich-cat-dien/<location_alias:[\w-\d]+>' => array('giadien/lichcatdien','urlSuffix'=>'.html'),
                'lich-cat-dien/' => array('giadien/lichcatdien'),
                
                'tiet-kiem-dien/' => array('news/category','defaultParams'=>array("alias"=>"tiet-kiem-dien" )),
                'tiet-kiem-dien/trang-<page:[0-9]+>' => array('news/category','defaultParams'=>array("alias"=>"tiet-kiem-dien" )),
                'tiet-kiem-dien/<cid:[0-9]+>-<alias:.*>' => array('news/detail','urlSuffix'=>'.html','defaultParams'=>array("alias"=>"tiet-kiem-dien")),
                
                'xu-ly-vi-pham/' => array('news/category','defaultParams'=>array("alias"=>"xu-ly-vi-pham")),
                'xu-ly-vi-pham/trang-<page:[0-9]+>' => array('news/category','defaultParams'=>array("alias"=>"xu-ly-vi-pham")),
                'xu-ly-vi-pham/<cid:[0-9]+>-<alias:.*>' => array('news/detail','urlSuffix'=>'.html','defaultParams'=>array("cat_alias"=>"xu-ly-vi-pham")),
                
                'hoi-dap/' => array('giadien/hoidap'),
                'hoi-dap/trang-<page:[0-9]+>' => array('giadien/hoidap'),
                'hoi-dap/<cid:[0-9]+>-<alias:.*>' => array('giadien/hoidapdetail','urlSuffix'=>'.html','defaultParams'=>array("ItemID"=>8)),
                
                
                'thu-tuc-cap-dien/' => array('news/detail',".html",'defaultParams'=>array("alias"=>"thu-tuc-cap-dien"  )), 
                
                'tin-tuc/' => array('news/display'),
                'tin-tuc/<alias:[\d\w-]+>' => array('news/category'),
                'tin-tuc/<alias:[\d\w-]+>/trang-<page:[0-9]+>' => array('news/category'),
                'tin-tuc/<cat_alias:[\d\w-]+>/<cid:[0-9]+>-<alias:.*>' => array('news/detail','urlSuffix'=>'.html'),
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
    ),
);
return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), $settings
);
?>