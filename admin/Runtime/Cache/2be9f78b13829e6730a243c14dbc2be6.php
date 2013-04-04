<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo ($title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ZhengNL">
    
    <!-- Le styles -->
    <link href="__PUBLIC__/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <link href="__PUBLIC__/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="__PUBLIC__/bootstrap/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="__PUBLIC__/bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="__PUBLIC__/bootstrap/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="__PUBLIC__/bootstrap/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="__PUBLIC__/bootstrap/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="__PUBLIC__/images/favicon.png">
  </head>

  <body>
  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">浙江京图科技有限公司</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
                                  登出&gt;&gt; <a href="__APP__/Index/loginOut" class="navbar-link"><?php echo (session('jt_admin')); ?></a> &lt;&lt;
            </p>
            <ul class="nav">
              <li class='<?php if($name==1) echo'active' ?>'><a href="__URL__/index">首页管理</a></li>
              <li class="<?php if($name==2) echo'active' ?>"><a href="__URL__/contentM">内容管理</a></li>
              <li class="<?php if($name==3) echo'active' ?>"><a href="__URL__/siteM">站点管理</a></li>
            </ul>
           </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">菜单栏管理</li>
              <li class="active"><a href="__URL__/show/3344/4455">新增栏目</a></li>
              <li><a href="#">新增栏目</a></li>
              <li><a href="#">新增栏目</a></li>
              <li><a href="#">新增栏目</a></li>
              <li class="nav-header">文章管理</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
            <h1>Hello, world!</h1>
            <p><?php echo ($param1); ?>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p>
          </div>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="__PUBLIC__/bootstrap/js/jquery.js"></script>
    <script src="__PUBLIC__/bootstrap/js/bootstrap-transition.js"></script>
    <script src="__PUBLIC__/bootstrap/js/bootstrap-alert.js"></script>
    <script src="__PUBLIC__/bootstrap/js/bootstrap-modal.js"></script>
    <script src="__PUBLIC__/bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="__PUBLIC__/bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="__PUBLIC__/bootstrap/js/bootstrap-tab.js"></script>
    <script src="__PUBLIC__/bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="__PUBLIC__/bootstrap/js/bootstrap-popover.js"></script>
    <script src="__PUBLIC__/bootstrap/js/bootstrap-button.js"></script>
    <script src="__PUBLIC__/bootstrap/js/bootstrap-collapse.js"></script>
    <script src="__PUBLIC__/bootstrap/js/bootstrap-carousel.js"></script>
    <script src="__PUBLIC__/bootstrap/js/bootstrap-typeahead.js"></script>
  </body>
</html>