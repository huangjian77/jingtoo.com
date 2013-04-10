<?php
class ContentAction extends CommonAction{
   /**
	 * 内容管理
	 * Enter description here ...
	 */
	public function contentManage(){
		$this->assign('title','栏目管理');  //指定页面标题
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
		$conList = $this->getContOptionList(0);
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
			if(false!==$content->add($data)){
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
		$conList = $this->getContOptionList(0,$data['parent_id'],$data['id']);
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
			//根据父节点，生成排序值
			$newDisplayOrder=$this->CreateDisplayOrder($data['parent_id'],$data['display_order']);
			$data['display_order']=$newDisplayOrder;
			//设置修改条件
			$where['id']=$data['id'];
			$content->where($where)->save($data);//save中的$data必须加，否则display_order修改无效
			//修改该节点下的所有子节点的display_order
			$this->changeChildDisplayOrder($data['id'],$newDisplayOrder);
			$this->assign('jumpUrl',"__APP__/Content/contentManage");
		    $this->success('修改成功');			
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
    * @param $needRoot  是否需要根节点  0 需要，其它不需要
    * @param $pid  父节点Id 默认为空
    * @param $id   本节点Id 默认为空
    */
	public function getContOptionList($needRoot,$pid=0,$id=-1){
		$content = new CmsCategoryModel();
		$lst = $content->order('display_order')->select();
		$res='';
		if($needRoot==0){
			$res='<option value="0">根节点</option>';
		}
		$filter=array($id);
		for ($i = 0; $i < count($lst); $i++) {
			$data = $lst[$i];
			if(in_array($data['id'],$filter) || in_array($data['parent_id'],$filter)){
				array_push($filter, $data['id']);
				continue;//跳过
			}
			$res.='<option value="';
			$res.=$data['id'];
            if($data['id']==$pid){
            	$res.='" selected="selected">';
            }else{
            	$res.='">';
            }			
			for($j=0;$j<strlen($data['display_order']);$j++){
				$res.='&nbsp;&nbsp;';
			}
			$res.='|-&nbsp;'.$data['name'];
			$res.="</option>";
		}
		return $res;
	}

	/**
	 * 根据父节点，生成排序值
	 * @param int $pid 新的父节点id 
	 * @param string $displayOrder 旧的排序值
	 */
	public function CreateDisplayOrder($pid,$displayOrder='00'){
		$content = new CmsCategoryModel();
		$where['parent_id']=$pid;
		$lst = $content->where($where)->order('display_order')->select();
		$count = count($lst);
		//遍历数据集，找出中间断号或最大的display_order
		$cur=0;
		for ($i = 0; $i < $count; $i++) {
			$disOrder=$lst[$i]['display_order'];
			$oderStr=$disOrder;
			if(strlen($disOrder)!=2){//说明不是一级栏目
				$oderStr=substr($disOrder, strlen($disOrder)-2,2);
			}			
			if($cur+1==(int)$oderStr){
				$cur = (int)$oderStr;
			}else{
				$cur =$cur+1;
				break;
			}
		}
		$res='';
	    if($cur>9){//二位的则直接转换成字符串
			$res=$cur.'';
		}else if($cur==$count){//说明排序没有断号，是连续的，即总数加一就是新的排序值
			$res='0'.($count+1);
		}else{//不足二位的前面补0
			$res='0'.$cur;
		}
		
		$param['id']=$pid;
		$parent = $content->where($param)->find();
		if(!is_null($parent)){//说明父节点不为空，即这不是一个根栏目
			if($displayOrder=='00'){//新增数据时调用
				$res=$parent['display_order'].$res;
			}else{//修改栏目时调用				
				$head=substr($displayOrder,0,strlen($displayOrder)-2);				
				$nHead=$parent['display_order'].'';
				$res=$nHead.$res;
			}
		}	
		return $res;
	}
	
	public function changeChildDisplayOrder($id,$displayOrder){
		$content = new CmsCategoryModel();   
        //查询父节点为$id的所有子节点
		$where['parent_id']=$id;
		$lst = $content->where($where)->order('display_order')->select();
		for ($i = 0; $i < count($lst); $i++) {
		   $childId=$lst[$i]['id'];
		   $oldDisplayOrder=$lst[$i]['display_order'];
		   $order=substr($oldDisplayOrder,strlen($oldDisplayOrder)-2, 2);
		   $data = array('display_order'=>$displayOrder.$order);
		   $content->where('id='.$childId)->setField($data);
		   $this->changeChildDisplayOrder($childId,$displayOrder.$order);
		}
	}
	/**
	 * 文章管理
	 * 分页显示
	 */
    public function docManage(){
		$this->assign('title','文章管理');  //指定页面标题
		$this->assign('name',C('CONTENT_M') );//控制菜单栏焦点
		$article = new CmsArticleViewModel();
		import('ORG.Util.Page');//导入分页类
		$where['category_id']=$_GET['categoryId'];
		$count = $article->where()->count();//查询满足要求的总记录数
		$Page  = new Page($count,10);//实例化分页类，传入总记录数；每页显示10条数据
		//进行分页数据查询，注意page方法的参数的前面部分是当前的页数使用$_GET[p]获取
		$nowPage = isset($_GET[C('VAR_PAGE')])?$_GET[C('VAR_PAGE')]:1;//C(''VAR_PAGE')获取分页变量名称
		
		$list=$article->where()->order('CmsArticle.display_order')->page($nowPage.','.$Page->listRows)->select();
		
		$show  = $Page->show();//分页显示输出
		$this->assign('page',$show);
		$this->assign('list',$list);
		$conList = $this->getContOptionList(0);
		$this->assign('contentList',$conList);
	  	$this->display('docManage');
	}	
	/**
	 * 新增文章
	 */
    public function addArticle(){
		$this->assign('title','新增文章');
		$conList = $this->getContOptionList(1);
		$this->assign('conList',$conList);
		$writerList = $this->getWriterOptionList();
		$this->assign('writerList',$writerList);
		$this->display();
	}
	/**
	 *新增文章动作 
	 */
	public function doAddArticle(){
		$article = new CmsArticleModel();
		if($data=$article->create()){
			//表单验证成功，进行数据插入操作
		if(false!==$article->add()){
				//获取最新数据的编号 ，自动增长列
				$this->assign('jumpUrl',"__APP__/Content/docManage");
		        $this->success('新增成功');
			}else{
				echo '创建失败';
			}
		}
	}
	public function editArticle($contId){
		$article = new CmsArticleModel();
		$where['id']=$contId;
		$data = $article->where($where)->find();
		$conList = $this->getContOptionList(1,$data['category_id']);
		$this->assign('data',$data);
		$this->assign('conList',$conList);
		$writerList = $this->getWriterOptionList($data['author_id']);
		$this->assign('writerList',$writerList);
		$this->assign('title','修改文章');
		$this->display('editArticle');
		
	}
	/**
	 *编辑文章动作 
	 */
	public function doEditArticle(){
		$article = new CmsArticleModel();
		$data=$article->create();
		if($data){
			$where['id']=$data['id'];
			$article->where($where)->save();
			$this->assign('jumpUrl',"__APP__/Content/docManage");
		    $this->success('修改文章成功');			
		}else{
			//$this->assign('jumpUrl',"__URL__");
			//$this->error($article->getError());
			exit($article->getError());
		}		
	}
	/**
	 *获取作者列表，即用户列表 
	 * @param unknown_type $id
	 */
	public function getWriterOptionList($id=0){
		$user = new AdminModel();
		$lst = $user->select();
		$res='';
		for ($i = 0; $i < count($lst); $i++) {
			$data = $lst[$i];
			$res.='<option value="';
			$res.=$data['id'];
            if($data['id']==$id){
            	$res.='" selected="selected">';
            }else{
            	$res.='">';
            }			
			$res.=$data['name'];
			$res.="</option>";
		}
		return $res;
	} 
}
?>