<?php
namespace app\home\controller;
//导入Controller
use think\Controller;
//导入Session
use think\Session;
class Allow extends Controller
{
    //Controller ；类初始化方法
    public function _initialize(){
    	//检测用户session信息
    	if(!Session::get('logins')){
    		//跳转到后台登录界面
    		$this->redirect('/home/login');
    	}
    }

}
