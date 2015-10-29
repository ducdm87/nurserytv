<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
global $path_module;
$path_module = dirname(__FILE__);


function fnLoadModules($position = "top")
{
    
}


function fnLoadModule($moduleName, $title, $module_id, $params)
{
    global $path_module;
    if(file_exists($path_module."/$moduleName/$moduleName.php"))
        require_once $path_module."/$moduleName/$moduleName.php";
}