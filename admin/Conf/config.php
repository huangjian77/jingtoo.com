<?php
$config=require './config.inc.php';
return array(
	//'配置项'=>'配置值'
	
    'USER_AUTH_ON'=>true,//开启认证
	'USER_AUTH_TYPE'=>1,//使用Session进行标记
	'USER_AUTH_KEY'=>'authId',//设置Session标记名称
	'ADMIN_AUTH_KEY'=>'administrator',//设置管理员用户标记
	'USER_AUTH_MODEL'=>'User',//验证用户表的模型cms_user
	//'AUTH_PWD_ENCODER'=>'md5',//用户认证密码加密方式
	'USER_AUTH_GATEWAY'=>'/Login/login',//默认的认证网关
	'NOT_AUTH_MODULE'=>'Public',//默认不需要认证的模块，多个以","分隔开来如：A,B,C
	'REQUIRE_AUTH_MODULE'=>'',//默认必须要认证的模块
	'NOT_AUTH_ACTIOIN'=>'',//默认不需要认证的动作
	'REQUIRE_AUTH_ACTION'=>'',//默认需要认证的动作
	'GUEST_AUTH_ON'=>false,//是否开启游客授权访问
	'GUEST_AUTH_ID'=>0,//游客标记
	
    'RBAC_ROLE_TABLE'=>'cms_role',//角色表明细
	'RBAC_USER_TABLE'=>'cms_role_user',
    'RBAC_ACCESS_TABLE'=>'cms_access',
);

//合并数组
return array_merge($config,$array);
?>