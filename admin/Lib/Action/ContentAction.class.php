<?php
class ContentAction extends CommonAction{
   /**
	 * 内容管理
	 * Enter description here ...
	 */
	public function contentManage(){
		$this->assign('title','内容管理');  //指定页面标题
		$this->assign('name',C('CONTENT_M') );//控制菜单栏焦点
		$content = new CmsCategoryModel();
		$list = $content->order('display_order')->select();
		for ($i = 0; $i < count($list); $i++) {
			$blank='';
			for ($j = 0; $j < strlen($list[$i]['display_order']); $j++) {
			  $blank.='&nbsp;&nbsp;';	
			}
			$list[$i]['name']=$blank.'|--'.$list[$i]['name'];
		}
		$this->assign('list',$list);
	  	$this->display('contentManage');
	}
	
	public function addContent(){
		$this->assign('title','新增栏目');
		$conList = $this->getContOptionList();
		$this->assign('conList',$conList);
		$this->display();
	}
	//插入栏目
	public function doAddContent(){
		$content = new CmsCategoryModel();		
		
	    if($data = $content->create()){
			//表单验证成功，进行数据插入操作
		    if(empty($data['is_show'])){
				$data['is_show']=0;
			}else{
				$data['is_show']=1;
			}
			//根据父节点，生成排序值
			$data['display_order']=$this->CreateDisplayOrder($data['parent_id']);
			if(false!==$content->add()){
				//获取最新数据的编号 ，自动增长列
				$userId = $content->getLastInsID();
				echo '创建成功,用户编号是：'.$userId;
				$this->assign('jumpUrl',"__APP__/Content/contentManage");
		        $this->success('新增成功');
			}else{
				echo '创建失败';
			}
		}else{
			//验证失败
			echo $content->getError();
		}		
	}
   
	public function editContent($contId){
		$content = new CmsCategoryModel();
		$where['id']=$contId;
		$data = $content->where($where)->find();
		$conList = $this->getContOptionList($data['parent_id']);
		$this->assign('data',$data);
		$this->assign('conList',$conList);
		$this->assign('title','修改栏目');
		$this->display('editContent');
	}
	
    public function doEditContent(){
    	
        $content = new CmsCategoryModel();		
		
	    if($data = $content->create()){
			//表单验证成功，进行数据插入操作
		    if(empty($data['is_show'])){
				$data['is_show']=0;
			}else{
				$data['is_show']=1;
			}
			$where['id']=$data['id'];
			$content->where($where)->save();
			$this->assign('jumpUrl',"__APP__/Content/contentManage");
		    $this->success('修改成功');			
			/*if(false!==$content->add()){
				//获取最新数据的编号 ，自动增长列
				$userId = $content->getLastInsID();
				echo '创建成功,用户编号是：'.$userId;
				$this->assign('jumpUrl',"__APP__/Content/contentManage");
		        $this->success('新增成功');
			}else{
				echo '创建失败';
			}*/
		}else{
			//验证失败
			echo $content->getError();
		}
	}
	
	public function doDelContent($contId){
		$content = new CmsCategoryModel();
		$where['id']=$contId;
		if($content->where($where)->delete()){
			echo $content->getError();
		}	
		$this->assign('jumpUrl',"__APP__/Content/contentManage");
		$this->success('删除成功');	
	}
	
   /**
	 * 根据排序方式列出栏目hmtl中Select元素
	 */
	public function getContOptionList($pid=0){
		$content = new CmsCategoryModel();
		$lst = $content->order('display_order')->select();
		$res='<option value="0">根节点</option>';
		for ($i = 0; $i < count($lst); $i++) {
			$res.='<option value="';
			$res.=$lst[$i]['id'];
            if($lst[$i]['id']==$pid){
            	$res.='" selected="selected">';
            }else{
            	$res.='">';
            }			
			for($j=0;$j<strlen($lst[$i]['display_order']);$j++){
				$res.='&nbsp;&nbsp;';
			}
			$res.='|-&nbsp;'.$lst[$i]['name'];
			$res.="</option>";
		}
		return $res;
	}
	//递归生成栏目
	public function getContOptionList1($pid=0){
		$content = new CmsCategoryModel();
		$where['parent_id']=$pid;
		$lst = $content->where($where)->order('display_order')->select();
		$res = '';
		if($pid==0){
			$res='<option value="0">根节点</option>';
		}
		for ($i = 0; $i < count($lst); $i++) {			
			$res.='<option value="';
			$res.=$lst[$i]['id'];
			$res.='">';
			for($j=0;$j<strlen($lst[$i]['display_order']);$j++){
				$res.='&nbsp;&nbsp;';
			}
			//$res.='['.strlen($lst[$i]['display_order']).'级]';
			$res.='|-&nbsp;'.$lst[$i]['name'];
			$res.="</option>";
			$res.=$this->getContOptionList1($lst[$i]['id']);
		}
		return $res;
	}
	/**
	 * 根据父节点，生成排序值
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	public function CreateDisplayOrder($pid,$displayOrder=0){
		$content = new CmsCategoryModel();
		$where['parent_id']=$pid;
		$lst = $content->where($where)->order('display_order')->select();
		$count = count($lst).'';
		$res='';
		if($displayOrder==0){//新增数据时调用
			
		}else{
			
		}
		return $res;
	}
	
	/**
	 * 文章管理
	 * Enter description here ...
	 */
    public function docManage(){
		$this->assign('title','内容管理');  //指定页面标题
		$this->assign('name',C('CONTENT_M') );//控制菜单栏焦点
		$content = new CmsCategoryModel();
		$list = null;
		$this->assign('list',$list);
	  	$this->display('docManage');
	}	
}
?>