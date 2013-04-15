<?php
class SiteAdModel extends Model{
	/**
	 * 字段映射 'name'=>'username',
	 * 把表单中name映射到数据表的username字段
	 * @var unknown_type
	 */
	protected $_map = array(	
       'adName'=>'name',//广告位标识
       'adTitle'=>'title',//广告位名称
       'adCode'=>'code',//代码
       'defaultAdCode'=>'default_code',//默认代码
       'startAt'=>'start_at',//开始时间
       'endAt'=>'end_at',//结束时间
       'createAt'=>'created_at',//创建时间
	);
	
	/**
	 * 自动验证
	 * array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_validate = array(
	   array('adName','require','广告位标识不能为空!'),
	   array('adName','','该广告位标识已经存在',0,'unique',1),//在新增的时候验证登录名字段是否唯一
	   array('adTitle','require','广告位名称不能为空!'),
	);
	
	/**
	 * 自动完成
	 * @var unknown_type
	 */
	protected $_auto = array(
	   array('createAt','getTime',1,'callback'),
	);
    function getTime(){
		return date("Y-m-d H:i:s");
	}
}
?>