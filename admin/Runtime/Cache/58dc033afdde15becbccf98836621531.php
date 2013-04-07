<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo ($title); ?></title>
<link href="__PUBLIC__/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="__PUBLIC__/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
</head>
<body>
<div class="container">
<form action="__URL__/add" method="post">
<fieldset>
    <legend>Legend</legend>
    <label>Label name</label>
    <input type="text" placeholder="Type something…">
    <span class="help-block">Example block-level help text here.</span>
    <label class="checkbox">
      <input type="checkbox"> Check me out
    </label>
    <button type="submit" class="btn">Submit</button>
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