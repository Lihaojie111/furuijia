<?php
namespace app\admin\controller;
use think\Controller; //引入控制器类
// use think\Captcha;	  // 引入验证码
use think\Image;      //引入图像
use think\Db;         //引入底层Db类
use think\Session;
class Index extends Allow
{
  public function getindex()

  {
    
    $request=request();
    return $this->fetch('Index/index');
  }
  public function getshezhi()
  {
    $request=request();
    $result=Db::table('config')->where('id = 1')->find();
    $this->assign('result',$result);
    return $this->fetch('Index/shezhi');
  }
  public function postshezhi_chuli(){

    $post=input('post.');
    DB::table('config')->where('id = 1')->update($post);
    $this->success('信息更改成功');
  }
}
