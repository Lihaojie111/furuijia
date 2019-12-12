<?php
namespace app\admin\controller;
//导入Controller
use think\Controller;
//导入Db
use think\Db;
//导入Session
use think\Session;
class Login extends Controller
{
    public function getlogin()
    {
        //加载加载后台登录模板(解析模板)
        return $this->fetch("Index/login");
    }

    //执行登录
    public function postdologin(){
    	//创建请求对象
    	$request=request();
    	//获取输入的验证码
        
    	$fcode=$request->param('fcode');
    	//获取用户名和密码
    	$user=$request->param('name');
    	$password=md5($request->param('password'));
        

    	//校验验证码
        //
    	if(captcha_check($fcode)){
    		// echo "ok";
    		//检测用户名和密码
    		$row=Db::table("adminuser")->where("user='{$user}' and password='{$password}'")->select();
    		if($row){
    			//把用户登录信息存储在session
    			Session::set('islogin',2);
    			Session::set('adminuserid',$row[0]['id']);
    			Session::set('adminuser',$row[0]['user']);//
    			


 
    			//跳转到后台首页
    			$this->success("登录成功","/admin/index");
    		}else{
    			$this->error("用户名或者密码有误","/adminlogin/login");
    		}
    		
    	}else{
    		// echo "error";
    		$this->error("验证码输入有误,请重新输入","/adminlogin/login");
    	}

    }

    //执行退出
    public function getlogout(){
    	Session::delete('islogin');
    	Session::delete('adminuserid');
    	Session::delete('adminuser');
    	$this->success("用户退出成功","/adminlogin/login");
    }

}
