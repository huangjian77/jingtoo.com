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
	   'newPwd'=>'password',        //登录密码
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
	   array('loginName','','帐号名称已经存在',0,'unique',1),//在新增的时候验证登录名字段是否唯一
	   array('oldPwd','require','旧密码不能为空!'),
	   array('newPwd','require','新密码不能为空!'),
	   array('confirmPwd','require','确认密码不能为空!'),
	   //array('confirmPwd','newPwd','确认密码与新密码不一致!',0,'confirm'),//验证确认密码是否和密码一致
	   
	);
	
	/**
	 * 自动完成
	 * @var unknown_type
	 */
	protected $_auto = array(
	   array('password','md5',3,'function'),//新增时对密码进行md5加密
	   array('lastTime','getTime',2,'callback'),
	);
    function getTime(){
		return date("Y-m-d H:i:s");
	}
}
?>