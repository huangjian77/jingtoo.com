<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo ($title); ?></title>
<link href="__PUBLIC__/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="__PUBLIC__/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
</head>
<body>
<div class="container" >
<form action="__URL__/doEditContent" method="post">
<fieldset>
    <legend>修改栏目</legend>
    <label>父节点：<!--<input type="text" name="parentId" value="<?php echo ($data['parent_id']); ?>"> -->
      <select name="parentId">
        <?php echo ($conList); ?>
      </select>
    </label>
    <label>栏目名称：<input type="text" name="contName" value="<?php echo ($data['name']); ?>"></label>
    <input type="hidden" name="id" value="<?php echo ($data['id']); ?>">
    <label>是否显示：
      <select name="isShow" >
      <?php if(($data['is_show'] == 1 )): ?><option value="1" selected="selected">是</option>
        <option value="0">否</option>
      <?php else: ?>
        <option value="1">是</option>
        <option value="0" selected="selected">否</option><?php endif; ?>  
      </select>    
    </label>
    <label>URL地址：<input type="text" name="urlAddr" value="<?php echo ($data['url']); ?>"></label>
    <label>内容类型：
      <select name="contType" >
       <?php if(($data['content_type'] == 0)): ?><option value="0" selected="selected" >文章列表</option>
          <option value="1">指定文章</option>
          <option value="2">内部链接</option>
          <option value="3">外部连接</option>
       <?php elseif(($data['content_type'] == 1)): ?>
          <option value="0">文章列表</option>
          <option value="1" selected="selected" >指定文章</option>
          <option value="2">内部链接</option>
          <option value="3">外部连接</option>
       <?php elseif(($data['content_type'] == 2)): ?>
          <option value="0">文章列表</option>
          <option value="1">指定文章</option>
          <option value="2" selected="selected" >内部链接</option>
          <option value="3">外部连接</option>
       <?php elseif(($data['content_type'] == 3)): ?>
          <option value="0">文章列表</option>
          <option value="1">指定文章</option>
          <option value="2">内部链接</option>
          <option value="3" selected="selected" >外部连接</option><?php endif; ?>       
     </select>
    </label>
    <label>链接地址：<input type="text" name="LinkUrlAddr" value="<?php echo ($data['link_url']); ?>"></label>
    <label>链接目标：<input type="text" name="linkTarget" value="<?php echo ($data['link_target']); ?>"></label>
    <label>显示文章：<input type="text" name="articleId" value="<?php echo ($data['article_id']); ?>"></label>
    <label>关键字：<input type="text" name="keyWord" value="<?php echo ($data['keyword']); ?>"></label>
    <label>描述：
      <textarea rows="4" cols="20" name="descrip"><?php echo ($data['description']); ?></textarea>
    </label>
    
    <button type="submit" class="btn">提交</button>
  </fieldset>
</form>
</div>

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