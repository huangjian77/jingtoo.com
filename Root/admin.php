<?php
//开启调试模式
define('APP_DEBUG',TRUE);

//define( 'CMS_ROOT', dirname( __FILE__ ).'/' );
//资源路径
define('PUBLIC_PATH','./../Public/');
//ThinkPHP路径
define('THINK_PATH','./../ThinkPHP/');
//定义项目名称和路径
define('APP_NAME', 'Admin');
define('APP_PATH', './../Admin/');
// 加载框架入口文件
require( THINK_PATH.'ThinkPHP.php');
