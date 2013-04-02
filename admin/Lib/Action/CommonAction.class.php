<?php
class CommonAction extends Action{
	function _initialize(){
		header("Content-Type:text/html; charset=utf-8");
			 
		$a = $_SESSION['jt_admin'];
		$this->assign('user',$a);
		if(!empty($a) && $a=='admin'){			 
			$this->assign("jumpUrl","__URL__/index");
			 
		}else{
			$this->assign("jumpUrl","__ROOT__");
			$this->error("没有权限！！");			 
		}
	}
}
?>