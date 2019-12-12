<?php
namespace app\admin\model;
//导入系统的模型类
use think\Model;
class Users extends Model{
	//设置模型类对应的数据表
	protected $table="user";
	//获取器 获取到的数据自动转换
	//status 状态
	public function  getStatusAttr($value){
		$status=[0=>'开启',1=>'禁用',2=>'邮箱已认证'];
		return $status[$value];

	} 
	
	
	
}








?>