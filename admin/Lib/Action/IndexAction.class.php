<?php
// 本类由系统自动生成，仅供测试用途
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
		$username=$_POST['inputUsername'];
		$password=$_POST['inputPassword'];
		$verify=$_POST['inputVerify'];
	    if (empty($username)){
			$this->error('用户名不能为空！');
		}
		if (empty($password)){
			$this->error('登录密码不能为空！');
		}
		if(session('verify') != md5($verify)){
			$this->error('验证码错误!');
		}
		if ($username !='admin'){
			$this->error('用户名不存在，请检查！');
		}else{
			$_SESSION['jt_admin']='admin';
			$this->assign('jumpUrl',"__APP__/Main");
			$this->success('登录成功！');
		}
		
	}
}