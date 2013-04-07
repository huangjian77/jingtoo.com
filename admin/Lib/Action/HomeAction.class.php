<?php
class HomeAction extends CommonAction{
	/**
	 * 首页管理
	 * Enter description here ...
	 */
	public function index(){
		$this->assign('title','首页管理');
		$this->assign('name',C('HOME_M'));
		$this->display('adminMain');
	}	
}
?>