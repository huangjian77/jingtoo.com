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
	  'parent_id'=>'parent_id',//父类Id
	  'name'=>'name',       //分类名称
	  ''=>'display_order',  //排序值
	  ''=>'is_show',//是否显示
	  ''=>'url',    //访问该栏目的url
	  ''=>'content_type',//分类展示的内容的类型:0文章列表、1指定文章、2内部链接、3外部连接
	  ''=>'link_url',//链接地址
	  ''=>'link_target',//链接的目标
	  ''=>'article_id',//显示文章的id
	  ''=>'keyword',//分类的关键字
	  ''=>'description',//分类的描述
	  ''=>'created_at',//创建时间
	);
}
?>