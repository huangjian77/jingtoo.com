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
	/**
	 * 广告管理
	 * Enter description here ...
	 */
	public function adManage(){
		$this->assign('title','站点管理');
		$this->assign('name',C('SITE_M') );
		$ads = new SiteAdModel();
		$list = $ads->select();
		$this->assign('list',$list);
		$this->display('adManage');
	}
	public function addAd(){
		$this->display();
	}
	public function doAddAd(){
		$ads = new SiteAdModel();
		$data = $ads->create();
		if($data){
			if($ads->add()){
				$this->assign('jumpUrl',"__APP__/Site/adManage");
			    $this->success('新增成功');
			}else{
				//$this->assign('jumpUrl',"__APP__/Site/adManage");
				$this->error($ads->getError());
			}
		}else{
			$ads->getError();
		}
	}
	public function editAd($adId){
		$ads = new SiteAdModel();
		$where['id']=$adId;
		$data = $ads->where($where)->find();
		$this->assign('data',$data);
		$this->display();
	}
	public function doDelAd($adId){
		$ads = new SiteAdModel();
		$where['id']=$adId;
		if($ads->where($where)->delete()){
			$ads->getError();
		}
			$this->assign('jumpUrl',"__APP__/Site/adManage");
		    $this->success('删除成功');
	
	}
	public function doEditAd(){
		$ads = new SiteAdModel();
		$data = $ads->create();
		if($data){
			$id = $_POST['id'];
			$where['id']=$id;
			$ads->where($where)->save($data);
			$this->assign('jumpUrl',"__APP__/Site/adManage");
			$this->success('修改成功');
		}else{
			$ads->getError();
		}
	}
	/**
	 * 友情链接
	 * Enter description here ...
	 */
	public function friendLink(){
		$this->assign('title','站点管理');
		$this->assign('name',C('SITE_M') );
		$friendLink = new SiteFriendlinkModel();
		$list = $friendLink->order('display_order')->select();
		$this->assign('list',$list);
		$this->display('friendLink');
	}
	/**
	 * 新增友情链接
	 * Enter description here ...
	 */
	public function addFriendLink(){
		$this->display();
	}
	public function doAddFriendlink(){
		$friendLink = new SiteFriendlinkModel();
		$data = $friendLink->create();
		if($data){
			if($friendLink->add()){
				$this->assign('jumpUrl',"__APP__/Site/friendLink");
			    $this->success('新增成功');
			}else{
				$this->error('新增失败！');
			}
		}else{
			$friendLink->getError();
		}
	}
	public function editFriendLink($linkId){
		$friendLink = new SiteFriendlinkModel();
		$where['id']=$linkId;
		$data = $friendLink->where($where)->find();
		$this->assign('data',$data);
		$this->display();
	}
	
	public function doEditFriendlink(){
		$friendLink = new SiteFriendlinkModel();
		$where['id']=$_POST['id'];
		if($friendLink->create()){			
			if($friendLink->where($where)->save()){	
				$this->assign('jumpUrl',"__APP__/Site/friendLink");			
			    $this->success('修改成功');
			}else{
				$this->assign('jumpUrl',"__APP__/Site/friendLink");
				$this->error('修改失败！');
			}
		}else{
			$friendLink->getError();
		}
	}
}
?>