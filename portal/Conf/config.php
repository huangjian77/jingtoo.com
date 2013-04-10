<?php
$config = require './../config.inc.php';
$array= array(
	//'配置项'=>'配置值'
	'LOG_RECORD' => true,
    'SHOW_PAGE_TRACE'=>true,   // 显示页面Trace信息
);
//合并数组
return array_merge($config,$array);
?>