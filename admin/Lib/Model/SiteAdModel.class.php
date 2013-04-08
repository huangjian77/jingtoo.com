<?php
class SiteAdModel extends Model{
	/**
	 * 字段映射 'name'=>'username',
	 * 把表单中name映射到数据表的username字段
	 * @var unknown_type
	 */
	protected $_map = array(	
       ''=>'title',//标题
       ''=>'short_title',//短标题
       ''=>'category_id',//所属栏目ID
       ''=>'source',//来源
       ''=>'author_id',//作者
       ''=>'author',//作者ID
       ''=>'keyword',//文章关键字
       ''=>'description',//文章描述
       ''=>'views',//浏览次数
       ''=>'display_order',//排序值
       ''=>'is_show',//是否显示
       ''=>'created_at',//创建时间
       ''=>'updated_at',//最后更新时间
       ''=>'picture',//缩略图地址
       ''=>'content',//内容
	);
	
	/**
	 * 自动验证
	 * array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_validate = array();
	
	/**
	 * 自动完成
	 * @var unknown_type
	 */
	protected $_auto = array();
}
?>