<?php
class MainAction extends CommonAction{
	/**
	 * 首页管理
	 * Enter description here ...
	 */
	public function index(){
		$this->assign('title','首页管理');
		$this->assign('name',C('HOME_M'));
		$this->display('adminMain');
	}
	
	/**
	 * 内容管理
	 * Enter description here ...
	 */
	public function contentM(){
		$this->assign('title','内容管理');
		$this->assign('name',C('CONTENT_M') );
	  	$this->display('contentManage');
	}
	
	/**
	 * 站点管理
	 * Enter description here ...
	 */
	public function siteM(){
		$this->assign('title','站点管理');
		$this->assign('name',C('SITE_M') );
	  	$this->display('siteManage');
	}
	
}
?>