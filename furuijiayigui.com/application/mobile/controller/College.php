<?php
namespace app\mobile\controller;
use think\Controller;
use think\Db;
use think\Session;


// class  College extends Controller
// {
 
//      //芙瑞伽商学院
//      public function  getcollege(){
//      	$request=request();
      
//       $news=Db::table('new')->select();
        
      
//       return $this->fetch("Home/shangxue",['news'=>$news]);


//      }


// }

class College extends Allow
{

    //芙瑞伽商学院
     public function  getcollege(){
     	$request=request();
      	$url=$request->url();
      	$s=substr($url, -2);
      	$nid=(int)$s;
      	$nav=Db::table('navigation')->where('id',"{$nid}")->find();
      	$news=Db::table('new')->where('state','1')->paginate(2);;
       	return $this->fetch("Home/shangxue",['news'=>$news,'nav'=>$nav]);


     }
     
    

 
}



