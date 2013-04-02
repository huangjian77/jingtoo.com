<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
	    $this->display();
    }
    
    public function login(){
    	$this->assign('showme','你好呀，记得要登录哦');
    	$this->display();
    }

    public function verify(){
    	import('ORG.Util.Image');
		Image::buildImageVerify();
    }
    
}