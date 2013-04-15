<?php
class HomeAction extends CommonAction{
	/**
	 * 首页管理
	 * Enter description here ...
	 */
	public function index(){
		$this->assign('title','首页管理');
		$this->assign('name',C('HOME_M'));
		$user = new AdminModel();
		$list = $user->order('login_name')->select();
		$this->assign('list',$list);
		$this->display('adminMain');
	}
	/**
	 * 新增用户
	 * Enter description here ...
	 */
	public function addUser(){
		$this->display();
	}
	public function doAddUser(){
		$user = new AdminModel();
		$data= $user->create();
		if($data){
			$newPwd = $_POST['newPwd'];
			$cofirmPwd=$_POST['confirmPwd'];
			if($newPwd != $cofirmPwd){
				$this->error('确认密码与密码不一致！');
			}else{
				if(false!==$user->add($data)){
					$this->assign('jumpUrl',"__APP__/Home/index");
			        $this->success('新增成功');
				}else{
					$this->error('创建失败');
				}
			}
		}else{
		   $user->getError();
		}
	}
    public function editUser($Id){
    	$user = new AdminModel();
    	$where['id']=$Id;
    	$data = $user->where($where)->find();
    	$this->assign('data',$data);
		$this->display();
	}
	public function doEditUser(){		
		$user = new AdminModel();	
		$data= $user->create();
		if($data){//基本验证通过
			$oldPwd = $_POST['oldPwd'];
			$newPwd = $_POST['newPwd'];
			$cofirmPwd=$_POST['confirmPwd'];
		    $Id = $_POST['id'];
		    if($cofirmPwd !=$newPwd){
		    	$this->error('确认密码与密码不一致！');
		    }else{		    	
		        $where['id']=$Id;
		        $u = $user->where($where)->find();
		        if(!empty($u)){
				    if($u['password'] !=md5($oldPwd)){
				    	$this->error('旧密码输入不正确！');
				    }else{
				    	$user->where($where)->save($data);
				    	$this->success('用户信息修改成功！');
				    }
		        }else{
		        	$this->error('修改失败');
		        }
		    }		    
		}else{
		   $user->getError();
		}
	}
    public function doDelUser($Id){
		 echo '暂时没有实现'.$Id;
	}
}
?>