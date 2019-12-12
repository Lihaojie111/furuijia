<?php

namespace app\admin\controller;
use think\Controller;
use think\Session;
class Allow extends Controller{
	public function _initialize(){
		//加载后台首页模板(解析模板)
		//判断session是否存在
		if(!Session::get('islogin')){
			$this->error('请先登录后台','/adminlogin/login');
		}
		



	}
}