<?php
namespace app\mobile\widget;
//导入 Controller
use think\Controller;
use think\Db;
use think\Session;	
class Cate extends Controller{
		//加载公共头
		public function header(){
			$request=request();
			$home=Session::get('login_home');
			$nav=Db::table('navigation')->select();
            foreach ($nav as $index=>$item){
                $nav[$index]['url']=str_replace("home","mobile",$item['url']);
            }
			 $url=$request->url();	
			return $this->fetch("Cate:header",['nav'=>$nav,'url'=>$url]);

		}

		//加载公共尾
		public function footer(){
			$link =Db::table("link")->select();
            $peizhi =Db::table("config")->where('id',1)->find();
			return $this->fetch("Cate:footer",["link"=>$link,"peizhi" => $peizhi]);
          
			}

}








?>