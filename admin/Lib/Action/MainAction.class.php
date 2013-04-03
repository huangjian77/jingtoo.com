<?php
class MainAction extends CommonAction{
	public function index(){
		$this->display('adminMain');
	}
	
	public function show(){
		$this->assign('param1','sdfd');
	  	$this->display('adminMain');
	}
	
}
?>