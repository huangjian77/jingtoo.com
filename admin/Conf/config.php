<?php
$config = require './../config.inc.php';
$array =  array(
	//'配置项'=>'配置值'
	'LOG_RECORD' => true,
    'SHOW_PAGE_TRACE'=>true,   // 显示页面Trace信息
	
    'HOME_M'=>1,     //首页管理
    'CONTENT_M'=>2,  //内容管理
	'SITE_M'=>3,     //站点管理

);
//合并数组
return array_merge($config,$array);
?>