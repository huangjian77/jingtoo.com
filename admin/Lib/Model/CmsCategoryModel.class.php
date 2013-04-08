<?php
/**
 * 栏目表
 * Enter description here ...
 * @author ZhengNL
 *
 */
class CmsCategoryModel extends Model{

	/**
	 * 字段映射 'name'=>'username',
	 * 把表单中name映射到数据表的username字段
	 * @var unknown_type
	 */
	protected $_map = array(
	  'parentId'=>'parent_id',//父类Id
	  'contName'=>'name',       //分类名称
	  'displayOrder'=>'display_order',  //排序值
	  'isShow'=>'is_show',//是否显示
	  'urlAddr'=>'url',    //访问该栏目的url
	  'contType'=>'content_type',//分类展示的内容的类型:0文章列表、1指定文章、2内部链接、3外部连接
	  'LinkUrlAddr'=>'link_url',//链接地址
	  'linkTarget'=>'link_target',//链接的目标
	  'articleId'=>'article_id',//显示文章的id
	  'keyWord'=>'keyword',//分类的关键字
	  'descrip'=>'description',//分类的描述
	  //''=>'created_at',//创建时间
	);
	
	/**
	 * 自动验证
	 * array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_validate = array(
	  array('parent_id','require','父类Id不能为空！'),
	  array('name','require','栏目名称不能为空！'),
	  array('is_show',array(0,1),'值的范围不正确！',0,'in'),
	  array('created_at','require','创建时间不能为空！'),
	);
	/**
	 * 自动完成
	 * @var unknown_type
	 */
	protected $_auto = array(
	  array('created_at','getTime',1,'callback'),// 对created_at字段在更新的时候写入当前时间戳
	  array('display_order','getDisplayOrder',1,'callback'),
	);
	function getTime(){
		return date("Y-m-d H:i:s");
	}
	/**
	 * 生成排序值
	 * Enter description here ...
	 */
	function getDisplayOrder(){
		return "0";
	}
}
?>