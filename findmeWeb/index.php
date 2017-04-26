<?php
header("content-type:text/html;charset=utf8");
// 应用入口文件
// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

define('APP_DEBUG',True);
// 定义应用目录
define('APP_PATH','./FanMi/');
//define('BIND_MODULE','Home');
//定义CSS
define('URL','http://localhost/findmeWeb/');
define('APP_HOME_STYLE', URL.'FanMi/Home/resource/style/');
define('APP_HOME_IMG', URL.'FanMi/Home/resource/imgs/');
define('FM_HOME_JS',URL.'FanMi/Home/resource/Js/');
define('APP_COMMON_JS', URL.'Public/JS/');
//定义后台CSS以及JS、Img
define('FM_ADMIN_CSS',URL.'FanMi/Admin/resource/Styles/');
define('FM_ADMIN_JS',URL.'FanMi/Admin/resource/Js/');
define('FM_ADMIN_IMG',URL.'FanMi/Admin/resource/Images/');
/***
define('APP_HOME_STYLE', 'http://www.findme.wang/FanMi/Home/resource/style/');
define('APP_HOME_IMG', 'http://www.findme.wang/FanMi/Home/resource/imgs/');
define('APP_COMMON_JS', 'http://www.findme.wang/Public/JS/');
**/
require './ThinkPHP/ThinkPHP.php';
