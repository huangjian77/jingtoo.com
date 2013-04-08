<?php
class SiteAction extends CommonAction{
   /**
	 * 站点管理
	 * Enter description here ...
	 */
	public function index(){
		$this->assign('title','站点管理');
		$this->assign('name',C('SITE_M') );
	  	$this->display('siteManage');
	}
}
?>