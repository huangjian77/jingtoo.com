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
	    			$child = $childList[$j];
	    			$res.='<li><a href="#'.'">'.$child['name'].'</a></li>';
	    		}
    		}else{//没有子菜单，则直接使用URL
    			$res.='<h2><a href="'.$rootMenu['url'].'">'.$rootMenu['name'].'</a></h2><ul>';
    		}
    		
    		$res.='</ul></li>';
    	}
    	$res.='</ul>';
    	return $res;
    }
}