<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>登录界面</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
<link href="Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script type="text/javascript">
function fleshVerify(){
	//重载验证码
	alert('d');
	var time = new Date().getTime();
    document.getElementById('verifyImg').src= '__APP__/Index/verify/'+time;
}
}
</script>
</head>
<body>
<form class="form-horizontal" action="__URL__/doCheckLogin" method="post" >
  <div class="control-group">
    <label class="control-label" for="inputUsername">用户名:</label>
    <div class="controls">
      <input type="text" name="inputUsername" placeholder="Username">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">密码:</label>
    <div class="controls">
      <input type="password" name="inputPassword" placeholder="Password">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputVerify">验证码:</label>
    <div class="controls">
      <input type="text" name="inputVerify" placeholder="Verify">
      <img id="verifyImg" src='__APP__/Index/verify/' onclick="fleshVerify()" />
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <label class="checkbox">
        <input type="checkbox"> 记住我
      </label>
      <button type="submit" class="btn btn-primary">登入</button>
    </div>
  </div>
</form>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="Public/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>