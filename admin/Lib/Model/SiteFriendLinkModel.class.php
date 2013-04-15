<?php
class SiteFriendlinkModel extends Model{
	/**
	 * 字段映射 'name'=>'username',
	 * 把表单中name映射到数据表的username字段
	 * @var unknown_type
	 */
	protected $_map = array(	
       'linkTitle'=>'title',//名称
       'linkUrl'=>'url',//地址
	   //''=>'display_order',//排序值
       'logoUrl'=>'logo_url',//logo地址
       'logoPic'=>'logo_pic',//logo上传图片地址
       'descr'=>'description',//网站描述
       'ownerEmail'=>'owner_email',//站长email      
       'createAt'=>'create_at',//创建时间
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