<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>登录界面</title>
</head>
<body>
<h1><?php echo ($showme); ?></h1>
<form action="__URL__/Main/checklogin" method="post">
 用户名:<input type="text" name="username" /><br/>
 密码:<input type="password" name="password" /><br/>
 验证验：<input type="text" name="verify" />
 <img alt="验证码" src="__URL__/verify">
<input type="submit"  value="登录" />
</form>
</body>
</html>