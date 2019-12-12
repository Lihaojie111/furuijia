<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use think\Cookie;

class Index extends  Base{
      public function _initialize()
    {
      if ($this->ismobile()){
    return $this->redirect('http://www.furuijiayigui.com/mobile');
    }
   
    }
   //无限分类递归数据遍历
  public function getcatesbypid($pid){
    $data=Db::table("cate")->where("pid","{$pid}")->select();
    $data1=array();
    //遍历
    foreach($data as $value){
      //获取子类信息
      $value['shop']=$this->getcatesbypid($value['id']);
      $data1[]=$value;
    }
    return $data1;
  }

  public function getindex()   
  {
	
    $request=request();
        //轮播图
    $map=Db::table('map')->select();
    $map2=Db::table('map')->select();
        //促销

    $promotion=Db::table('promotion')->limit(3)->select();
        //分类
    $cate=$this->getcatesbypid(0);
        //案例案例
    $exhibition=Db::table('exhibition')->limit(8)->select();
        //房间展示
    $room=Db::table('room')->order('id desc')->limit(0,6)->select();
    $room2=Db::table('room')->order('id desc')->limit(6,3)->select();
        //关于我们
    $ynopsis=Db::table('ynopsis')->find();
        //资讯中心
    $news=Db::table('new')->where('state','0')->order('id desc')->limit(5)->select();
      //加载前台首页
    return $this->fetch("Home/index",['map'=>$map,'cate'=>$cate,'promotion'=>$promotion,'room'=>$room,'ynopsis'=>$ynopsis,'exhibition'=>$exhibition,'news'=>$news,'room2' => $room2,'map2'=>$map2]);



  }

    //登录
  public function getlogin(){


    return $this->fetch("/Home/login");     

  }
    //执行登录
  public function postdologin(){
   $request=request();
   $name=$request->param('name');
   $password=md5($request->param('password'));
   $row=Db::table("user")->where("name='{$name}' and password='{$password}' and state=1")->select();
   if($row){
            // echo "前台首页";
            //把用户登录的信息存储在session里
    Session::set('logins',2);
    Session::set('uid',$row[0]['id']);
    Session::set('username',$row[0]['name']);
    $this->success("登录成功","/college/College");
  }else{

    $this->error("用户名或者密码有误","/college/College");

  }
}

    //关于我们
public function getprofile(){

  $request=request();
          //简介
  $yonpsis=Db::table('ynopsis')->find();
          //文化
  $culture=Db::table('culture')->find();
        // $yonpsis=Db::table('ynopsis')->find();
         //荣誉
  $glory=Db::table('glory')->paginate('12');
   $url=$request->url();
   $s=substr($url, -1);
    $nid=(int)$s;
    $nav=Db::table('navigation')->where('id',"{$nid}")->find();

  return $this->fetch("Home/profile",['yonpsis'=>$yonpsis,'culture'=>$culture,'glory'=>$glory,'nav'=>$nav]);

}

    //新闻资讯
public function getnews(){
 $request=request();

 $news=Db::table('new')->where('state',0)->order('id desc')->paginate(5);
   $url=$request->url();
   $s=substr($url, -1);
   $nid=(int)$s;
   $nav=Db::table('navigation')->where('id',"{$nid}")->find();





 return $this->fetch("Home/news",['news'=>$news,'nav'=>$nav]);


}
    //新闻查看
public  function getnewlook(){
  $request=request();

  $id=$request->param('id');
  $look=Db::table('new')->where("id","{$id}")->find();

   $sy=Db::table('new')->where(['state'=>$look['state']])->where('id','<',$look['id'])->order(['id'=>'desc'])->find();
   $xy=Db::table('new')->where(['state'=>$look['state']])->where('id','>',$look['id'])->order(['id'=>'asc'])->find();
     
    


  return $this->fetch("Home/news-dec",['look'=>$look,'sy'=>$sy,'xy'=>$xy]);


}
    //产品分类
public function  getclassify(){
 $request=request();

$data=array();
 $cate=Db::table('roomcate')->select();
foreach ($cate as $key => $value) {
  $room=Db::table('room')->where('title',$value['rid'])->select();
      $data[$key]=$room;
}
 
       $url=$request->url();
      $s=substr($url, -2);
      $nid=(int)$s;
      $nav=Db::table('navigation')->where('id',"{$nid}")->find();

 return $this->fetch("Home/team",['data'=>$data,'cate'=>$cate,'nav'=>$nav]);

}

    //案例展示
public function  getexhibition(){
  $request=request();
  $map=array(); $data=array();
  if(Cookie::get('fengge')){$map['style'] = urldecode(Cookie::get('fengge')); }
  if(Cookie::get('huxing')){$map['type'] = urldecode(Cookie::get('huxing')); }
  if(Cookie::get('mianji')){$map['acreage'] = urldecode(Cookie::get('mianji')); }
  $cate=Db::table('cate')->select();
  $cate2=Db::table('cate')->where($map)->select(); 
  foreach ($cate2 as $value) {
    $data[]=$value['id'];  
  }
  $where['cate_id']=array("in",$data);

  $exhibition=Db::table('exhibition')->where($where)->select();  
     $url=$request->url();
      $s=substr($url, -2);
      $nid=(int)$s;
      $nav=Db::table('navigation')->where('id',"{$nid}")->find();
    

  return $this->fetch("Home/decorate-eigth",['exhibition'=>$exhibition,'cate'=>$cate,'nav'=>$nav]);


}

    //案例展示
public function  getdetails(){
  $request=request();
     
      $url=$request->url();
      $s=substr($url, -2);
      $nid=(int)$s;
      $nav=Db::table('navigation')->where('id',"{$nid}")->find();


  $id=$request->param('id');
  $exhi=Db::table('exhibition')->where("id","{$id}")->find();
  $sy=Db::table('exhibition')->where("id",$id-1)->find();
  $xy=Db::table('exhibition')->where("id",$id+1)->find();
  
  return $this->fetch("Home/decorate-nine",["exhi"=>$exhi,"sy"=>$sy,"xy"=>$xy,'nav'=>$nav]);


}
    //案例分类

public function  getdostyle(){
        // $request=request();
        // $cate=Db::table('cate')->select();

        //  $id=$request->param('id');
        // $exhi=Db::table('exhibition')->where("id","{$id}")->select();
        // return $this->fetch("Home/decorate-eigth",['exhibition'=>$exhi,'cate'=>$cate]);


}


    //招商加盟
public function  getzhaoshang(){
      
      $request=request();
     
      $url=$request->url();
      $s=substr($url, -2);
      $nid=(int)$s;
      $nav=Db::table('navigation')->where('id',"{$nid}")->find();
  

  return $this->fetch("Home/zhaoshang",['nav'=>$nav]);


}
    //招商加盟添加
public function  postzhaoshang(){

  $request=input('post.');


  if(Db::table('zhaoshang')->insert($request)){
    echo '<script>alert("提交成功");window.location.href="/Home/zhaoshang"</script>';
  }else{

    echo '<script>alert("提交失败");window.location.href="/Home/zhaoshang"</script>';

  }




}
     //产品分类描述
public function getdescribes(){

  $request=request();
    $url=$request->url();
    $s=substr($url, -2);
    $nid=(int)$s;
    $nav=Db::table('navigation')->where('id',"{$nid}")->find();
  $id=$request->param('id');
  $room=Db::table('room')->where("id","{$id}")->find();
  $room2=Db::table('room')->where("title",$room['title'])->limit(3)->select();
  return $this->fetch("Home/opiys",["room"=>$room,'room2' => $room2,'nav'=>$nav]);

}

}
