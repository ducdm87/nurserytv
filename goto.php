<?php 
//error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED & ~E_STRICT);
error_reporting(E_ALL);
global $classSuffix;
$classSuffix = "";
require_once dirname(__FILE__).'/protected/includes/libs/request.php';
$config_frontend = "app.php";
require_once dirname(__FILE__).'/protected/functions.php';
require_once dirname(__FILE__).'/protected/define.php';


$yii = dirname(__FILE__).'/framework/yii.php';
$config = dirname(__FILE__)."/protected/config/$config_frontend";

// Remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
 
require_once($yii);

$controll = Request::getVar('control',null);
$action = Request::getVar('action',null);
$params = Request::getVar('params',null);
if($params != null){
    $params = urldecode($params);
    $params = json_decode($params);
    $arr_new = array();
    foreach ($params as $k=>$v){
        $arr_new[$k] = $v;
    }
    $params = $arr_new;
}else $params = array();

$config = dirname(__FILE__)."/protected/config/app.php";
$app = Yii::createWebApplication($config);
 

$link = Yii::app()->createUrl("$controll/$action", $params);

header("Location: $link");


