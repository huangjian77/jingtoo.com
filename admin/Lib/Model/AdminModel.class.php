<?php
/**
 * 管理员表
 * @author ZhengNL
 *
 */
class AdminModel extends Model{
	/**
	 * 字段映射 'name'=>'username',
	 * 把表单中name映射到数据表的username字段
	 * @var unknown_type
	 */
	protected $_map = array(
	   'loginName'=>'login_name',//登录名
	   'userName'=>'name',       //用户名
	   'pwd'=>'password',        //登录密码
	   'lastTime'=>'last_time',  //最后登录时间
	   'lastIP'=>'last_ip'       //最后登录IP
	);
	
	/**
	 * 自动验证
	 * array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
	 * Enter description here ...
	 * @var unknown_type
	 */
	protected $_validate = array(
	   array('loginName','require','登录名不能为空!'),
	   array('pwd','require','密码不能为空!'),
	);
	
	/**
	 * 自动完成
	 * @var unknown_type
	 */
	protected $_auto = array(
	   array('password','md5',1,'function'),//新增时对密码进行md5加密
	   array('lastTime','getTime',2,'callback'),
	);
    function getTime(){
		return date("Y-m-d H:i:s");
	}
}
?>