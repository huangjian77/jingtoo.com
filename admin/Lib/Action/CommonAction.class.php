<?php
//基础Action，系统其他Action都继承这个
class CommonAction extends Action {
	function _initialize(){
		//设置客户端浏览器的字符集
		header('Content-Type:text/html;charset=utf-8');
		
		//第一步：判断是否开启了认证，判断当前控制模块是否不需要认证
		if(C('USER_AUTH_ON') && !in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE')))){
			//第二步：开始认证，导入RBAC类
			import('ORG.Util.RBAC');
			//判断不通过认证
			if(!RBAC::AccessDecision()){
				//第三步：当认证不通过时，如何处理
				//判断Session是否已存放了用户标记
				if(!$_SESSION[C('USER_AUTH_KEY')]){
					//用户没有登录
					$this->assign('jumpUrl',__ROOT__);
					//$this->error('对不起，您没有登录，请进行登录');
					echo '没有登录';
				}//else 代表用户已经登录
				
				//判断是否开启游客功能
				if(C('GUEST_AUTH_ON')){
					//开启则跳转到游客页面
				}
				
				$this->error('对不起，您好没有操作权限 ');
				echo '没有权限';
			}//else 认证通过了
		}//else 没有开启认证或者当前控制模块不需要认证，则通过
	}
}