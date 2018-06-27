<?php 


$currentPath = $_SERVER['PHP_SELF'];

// output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index )
$pathInfo = pathinfo($currentPath);

// output: localhost
$hostName = $_SERVER['HTTP_HOST'];

// output: http://
$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';

$path = $protocol.$hostName.$currentPath.'/';

define('BASE_PATH',$path);

$database = BASE_PATH.'config/';    
    
define('CONFIG_PATH',$database);

$system = BASE_PATH.'system/';

define('SYSTEM_PATH',$database);

$system = BASE_PATH.'operations/';

define('OPERATON_PATH',$database);


require('config/Config.php');
require('config/Database.php');
require('system/connect.php');
require('operations/db_operations.php');
require('functions/ArrayFunction.php');
?>