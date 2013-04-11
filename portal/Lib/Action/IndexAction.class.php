<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	$menus = $this->getMenus();
    	$this->assign('menus',$menus);
	    $this->display();
    }   

    public function login(){
    	$this->display('Admin:login');
    }
    /**
     * 获取菜单列表
     * @return string
     */
    private function getMenus(){
    	$category = D('Admin://CmsCategory');
    	//先查询出父节点
    	$list = $category->where('parent_id=0')->order('display_order')->select();
    	$res = '<ul class="bar_menu">';
    	for ($i = 0; $i < count($list); $i++) {
    		$rootMenu = $list[$i];
    		$res.='<li>';    		
    		//二级菜单查询
    		$childList = $category->where('parent_id='.$rootMenu['id'])->order('display_order')->select();
    		$childCount = count($childList);
    		if($childCount>0){//说明该节点有子菜单
    			$res.='<h2>'.$rootMenu['name'].'</h2><ul>';
    			//添加子菜单
	    		for ($j = 0; $j < $childCount; $j++) {	    			
	    			//$child = $childList[$j];
	    			//$res.='<li><a href="#'.'">'.$child['name'].'</a></li>';
	    			$res.='<li>';
	    			$res.=$this->getContentType($childList[$j]);
	    			$res.='</li>';
	    		}
    		}else{//没有子菜单，则直接使用URL    			
    			//$res.='<h2><a href="'.$rootMenu['url'].'">'.$rootMenu['name'].'</a></h2><ul>';
    			$res.='<h2>';
    			$res.=$this->getContentType($rootMenu);
    			$res.='</h2><ul>';
    		}    		
    		$res.='</ul></li>';
    	}
    	$res.='</ul>';
    	return $res;
    }
    /**
     * 返回菜单项目的一下展示方式
     * @param $category
     */
    private function getContentType($category){
    	$res='';
        $contentType=$category['content_type'];
    	switch ($contentType) {
    		case 0://文章列表
    		    $res = '<a target="_blank" href="__URL__/showArtList/categoryId/'.$category['id'].'">'.$category['name'].'</a>';
    		    break;
    		case 1://指定文章
    		    $res = '<a target="_blank" href="__URL__/showCustomArt/artId/'.$category['article_id'].'">'.$category['name'].'</a>';
    		    break;
    		case 2://展示定制内容
    			$url=$category['url'];
    			if(substr($url, 0,1)!='/'){//判断是否以'/'开始，不是则添加
    				$url='/'.$url;
    			}
    		    $res = '<a target="_blank" href="__URL__/showCustomPage/pageName'.$url.'">'.$category['name'].'</a>';
    		    break;
    		case 3://外部链接
    			$url=$category['link_url'];
    			if(substr($url, 0,7)!='http://'){
    				$url='http://'.$url;
    			}
    		    $res = '<a target="'.$category['link_target'].'" href="'.$url.'">'.$category['name'].'</a>';
    		    break;
    		default:
    			$res = '<a target="_blank" href="#">'.$category['name'].'</a>';
    		    break;
    	}
    	return $res;
    }
    /**
     * 展示指定栏目下的所有文章列表
     * @param unknown_type $categoryId
     */
    public function showArtList($categoryId){
    	$article = D('Admin://CmsArticle');
		import('ORG.Util.Page');//导入分页类
		$where['category_id']=$_GET['categoryId'];
		$count = $article->where($where)->count();//查询满足要求的总记录数
		$Page  = new Page($count,10);//实例化分页类，传入总记录数；每页显示10条数据
		//进行分页数据查询，注意page方法的参数的前面部分是当前的页数使用$_GET[p]获取
		$nowPage = isset($_GET[C('VAR_PAGE')])?$_GET[C('VAR_PAGE')]:1;//C(''VAR_PAGE')获取分页变量名称
		
		$list=$article->where($where)->order('jt_cms_article.display_order')->page($nowPage.','.$Page->listRows)->select();
		
		$show  = $Page->show();//分页显示输出
		$this->assign('page',$show);
		$this->assign('list',$list);
	  	$this->display();
    }
    /**
     * 根据文章Id显示指定文章
     * @param $artId
     */
    public function showCustomArt($artId){
    	$this->assign('title','文章显示');
    	if(is_numeric($artId)){
    		//多表查询，这里为了方便直接写了SQL语句
    		$Model = new Model();
    		$sql = 'SELECT art.*,admin.`name` AS author_name,category.`name` AS category_name  ';
    		$sql.=' FROM jt_cms_article AS art,jt_admin AS admin,jt_cms_category AS category ';
    		$sql.=' WHERE art.`id`='.$artId.' AND admin.`id`=art.`author_id` AND category.`id`=art.`category_id` ';
    	    $voList = $Model->query($sql);
    	    $data = $voList[0];
    	    $this->assign('artitle',$data);
    	    //访问次数加1
    	    $article = D('Admin://CmsArticle');
    	    $article->where('id='.$artId)->setInc('views',1);
    	    //显示页面
    	    $this->display();
    	}else{
    		$this->error('没有相关文章!');
    	}    	
    }
    /**
     * 显示指定的页面
     * @param unknown_type $pageName
     */
    public function showCustomPage($pageName){
    	$this->display($pageName);
    }
}