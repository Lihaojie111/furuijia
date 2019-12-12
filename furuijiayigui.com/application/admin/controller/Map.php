<?php
namespace app\admin\controller;
use think\Controller; //引入控制器类
use think\Db;
// use think\Captcha;     // 引入验证码
class Map extends Allow
{
	
    public function getindex()
    {

        $request = request();
        $map=Db::table('map')->select();
        //获取用户总数

         return $this->fetch('Map/index',['map'=>$map]);

    

    }

    public function getadd()
    {
        //添加轮播图
        return $this->fetch('Map/add');
    }


    //执行数据的添加
    public function postinsert(){
        $request =request();
        //获取图片数据
        $file=$request->file("img");
        //设置上传规则
        $result = $this->validate(['file1'=>$file],['file1'=>'require|image'],['file1.require'=>'上传文件不能为空','file1.image'=>'上传文件必须是图片类型']);
        if(true !==$result){

            $this->error($result,'/map/add');

        }
        //移动
        $info =$file->move(ROOT_PATH.'public'.DS.'uploads');
        
        //获取上传文件信息
        $path=$info->getSavename();
        $data =$request->only(['name','img']);
    	$data['state']=0;
        $data['img']=$path;
        if(Db::table('map')->insert($data)){
            echo '<script>alert("添加成功");window.location.href="/map/index"</script>';
        }   
    }

    //删除
    public function getdelete(){

        $request=request();
        $id=$request->param('id');
        $data=DB::table('map')->find($id);
        
        $path=$data['img'];
        //删除图片
        
        unlink(ROOT_PATH.'public/uploads/'.$path);
        //如果图片删除 同时也删除内容
        
            if(Db::table('map')->delete($id)){
                echo '<script>alert("删除成功");window.location.href="/map/index"</script>';


        }

    

  }



}

?>