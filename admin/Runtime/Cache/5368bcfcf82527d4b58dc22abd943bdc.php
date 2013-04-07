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
    <link href="__PUBLIC__/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
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
                                 您好, <?php echo (session('jt_admin')); ?>[<a href="__APP__/Index/loginOut" class="navbar-link"> 登出</a>]
            </p>
            <ul class="nav">
<?php  if($name==1){ echo '<li class="active"><a href="__APP__/Home">首页管理</a></li>'. '<li><a href="__APP__/Content/contentManage">内容管理</a></li>'. '<li><a href="__APP__/Site">站点管理</a></li>'; }else if($name==2){ echo '<li><a href="__APP__/Home">首页管理</a></li>'. '<li class="active"><a href="__APP__/Content/contentManage">内容管理</a></li>'. '<li><a href="__APP__/Site">站点管理</a></li>'; }else if($name==3){ echo '<li><a href="__APP__/Home">首页管理</a></li>'. '<li><a href="__APP__/Content/contentManage">内容管理</a></li>'. '<li class="active"><a href="__APP__/Site">站点管理</a></li>'; } ?>
            </ul>
           </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span2">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">  
              <li class="nav-header"><h4>内容管理</h4></li>    
              <li><a href="__URL__/contentManage">栏目管理</a></li>
              <li  class="active"><a href="__URL__/docManage">文章管理</a></li>                    
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span10">
		<div>
		  <table class="table">
		  <caption>栏目列表</caption>
		  <thead class="info">
		    <tr>
		      <th>排序</th>
		      <th>栏目名称</th>
		      <th>访问地址</th>
		      <th>栏目内容</th>
		      <th>是否显示</th>
		      <th>描述</th>
		      <th>操作</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="">
		      <td><?php echo ($vo["display_order"]); ?></td>
		      <td><?php echo ($vo["name"]); ?></td>
		      <td><?php echo ($vo["url"]); ?></td>
		      <td><?php echo ($vo["content_type"]); ?></td>
		      <td><?php echo ($vo["is_show"]); ?></td>
		      <td><?php echo ($vo["description"]); ?></td>
		      <td>
		        <button class="btn btn-mini btn-info" type="button">修改</button>
		        <button class="btn btn-mini btn-warning" type="button">删除</button>
		      </td>
		     </tr><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
		  </tbody>
		</table>
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