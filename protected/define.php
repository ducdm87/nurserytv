<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define("ENABLE_MULTISITE", 1);
/*
 * Define Category Type
 */
define('NEWS_TYPE', 0);
define('VIDEO_TYPE', 1);
define('IMAGE_TYPE', 2);
define('VIDEO_SPORT', 3);
/*
 * 
 * Define Film Type
 */
define('FILM', 1);
define('CLIP', 2);
define('HAI', 3);
define('AM_NHAC', 4);


//$domain = "vietbao.vn";

$news_scope = "";
if (ENABLE_MULTISITE == 1) {
    $domain = $_SERVER['HTTP_HOST'];
    switch ($domain) {        
        case "dev.nurserytv.com";
        case "192.168.1.12:83";
        default : 
            $config_frontend = "app.php";
            $news_scope = 'app';
            $_GET['scope'] = 'app';
            $_REQUEST['scope'] = 'app';
            break;
       
    }
}

define("MAILFROM", "ducdm87@gmail.com");
define("WEB_SITE", $domain);
define("WEB_URL", "http://$domain");
define("TIME_OUT_ACTIVE_ACCOUNT", "2");
define("TIME_OUT_ACTIVE_UNIT", "days");
define("DEFAULT_GROUPID", 19);
define("PATH_SITE", dirname(__FILE__));

define("ENABLE_SSO", 0);

define("ROOT_PATH", dirname(dirname(__FILE__)) . "/");
define('PATH_APIFILE', ROOT_PATH . "tmp/apifile/");

global $sys_config, $sys_menu;
$sys_menu = $sys_config = array();

setSysConfig("colright.display", true);
setSysConfig("page.classSuffix", "");
setSysConfig("news.scope", $news_scope);
setSysConfig("news.detail.showpath", 1);
setSysConfig("news.limit", 10);

/*
 * controll: 0
 * action: 1 
 * page-tpl: 2
 * layout: 3
 *  */

