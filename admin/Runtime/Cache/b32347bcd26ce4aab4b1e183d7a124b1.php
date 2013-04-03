<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>登录界面</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="__PUBLIC__/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      

    </style>
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
<div class="container">
<form class="form-signin" action="__URL__/doCheckLogin" method="post" >
  <h2 class="form-signin-heading">请登录</h2>
  <div class="control-group">
    <label class="control-label" for="inputUsername">用户名:</label>
    <div class="controls">
      <input type="text" name="inputUsername" placeholder="用户名">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">密码:</label>
    <div class="controls">
      <input type="password" name="inputPassword" placeholder="密码">
    </div>
  </div>
  <!--<div class="control-group">
    <label class="control-label" for="inputVerify">验证码:</label>
    <div class="controls">
      <input type="text" name="inputVerify" placeholder="">
      <img id="verifyImg" src='__APP__/Index/verify/' onclick="fleshVerify()" />
    </div>
  </div>
  --><div class="control-group">
    <div class="controls">
      <label class="checkbox">
        <input type="checkbox"> 记住我
      </label>
      <button type="submit" class="btn btn-primary">登入</button>
    </div>
  </div>
</form>
</div>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
</body>
</html>