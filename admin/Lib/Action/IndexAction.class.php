<?php

class IndexAction extends Action {
    public function index(){
	   $this->display('login');
    }
    /**
     * 验证码
     * Enter description here ...
     */
    Public function verify(){
        import('ORG.Util.Image');
        Image::buildImageVerify(4,1,'png',40,30);
    }
    
    public function doCheckLogin(){
		$username=$_POST['loginName'];
		$password=$_POST['pwd'];
		$verify=$_POST['inputVerify'];
	    if (empty($username)){
			$this->error('用户名不能为空！');
		}
		if (empty($password)){
			$this->error('登录密码不能为空！');
		}
		/*if(session('verify') != md5($verify)){
			$this->error('验证码错误!');
		}*/
		$User = new AdminModel();
		$where['login_name']=$username;
		$data=$User->where($where)->find();
		if(is_null($data)){
			$this->error('用户不存在，请检查！');
		}else{
			if($data['password'] !=md5($password)){
				$this->error('登录密码不对，请检查！'.md5($password));
			}else{
				$_SESSION['jt_admin']=$username;
			    $this->assign('jumpUrl',"__APP__/Home");
			    $this->success('登录成功！');
			}
		}		
	}
    public function loginOut(){
    	session_destroy();
		session(null);//清空session
		$this->success('登出成功！');
		$this->assign('jumpUrl',"__ROOT__");
		//$this->display('Index:index');
	}
}