<?php
namespace app\admin\controller;
use think\Controller; //引入控制器类
use think\Db;
// use think\Captcha;     // 引入验证码



class Enterprise extends Allow
{
	   //企业简介
    public function getynopsis()
    {

        //创建请求对象
        $request=request();       
        $data=Db::table('ynopsis')->find();
        

        return $this->fetch('Enterprise/ynopsis',['data'=>$data]);

    

    }
    //执行添加
    public function postyinsert(){

        $request =request();
       
         $data =$request->only(['title','pic','content','state']);
        $data=$request->param();
         $data['state']=1;
         unset($data['action']);
         if(Db::table('ynopsis')->insert($data)){
            echo '<script>alert("添加成功");window.location.href="/enterprise/ynopsis"</script>';
        }   

    }
  
    //修改
    public function postyedit(){
        $request=request();
     $data =$request->only(['title','pic','content','state','id']);
       
        if(Db::table('ynopsis')->update($data)){

                echo '<script>alert("修改成功");window.location.href="/enterprise/ynopsis"</script>';
        
            }else{
                echo '<script>alert("修改失败");window.location.href="/enterprise/ynopsis"</script>';
            }        

    }
   


    //企业文化
      public function getculture()
    {

       $request=request();       
        $data=Db::table('culture')->find();
    
        return $this->fetch('Enterprise/culture',['data'=>$data]);

    }

     //执行添加
    public function postcinsert(){

        $request =request();
         $data =$request->only(['content']);
         $data['state']=1;
         unset($data['action']);
         if(Db::table('culture')->insert($data)){
            echo '<script>alert("添加成功");window.location.href="/exhibition/culture"</script>';
        }   

    }
  
     //修改
    public function postcedit(){
        $request=request();
        
        $data =$request->only(['content','id']);
    
        if(Db::table('culture')->update($data)){

                echo '<script>alert("修改成功");window.location.href="/enterprise/culture"</script>';
        
            }else{
                echo '<script>alert("修改失败");window.location.href="/enterprise/culture"</script>';
            }        

    }

    //企业荣耀
        public function getglory()
    {

        //创建请求对象
        $request=request();       
        $data=Db::table('glory')->paginate(5);
        

        return $this->fetch('Enterprise/gindex',['data'=>$data]);

    

    }
    //添加
     //执行添加
    public function getgadd(){

        return $this->fetch('Enterprise/gadd');
           

    }

    //执行数据的添加
    public function postginsert(){
        $request =request();
        //获取图片数据
        $file=$request->file("pic");
        //设置上传规则
        $result = $this->validate(['file1'=>$file],['file1'=>'require|image'],['file1.require'=>'上传文件不能为空','file1.image'=>'上传文件必须是图片类型']);
        if(true !==$result){

            $this->error($result,'/enterprise/glory');

        }
        //移动
        $info =$file->move(ROOT_PATH.'public'.DS.'uploads');
        
        //获取上传文件信息
        $path=$info->getSavename();
        $data =$request->only(['pic']);
    
        $data['pic']=$path;
        if(Db::table('glory')->insert($data)){
            echo '<script>alert("添加成功");window.location.href="/enterprise/glory"</script>';
        }   
    }

    //删除
    public function getgdelete(){

        $request=request();
        $id=$request->param('id');
        $data=DB::table('glory')->find($id);
        
        $path=$data['pic'];
        //删除图片
        
        unlink(ROOT_PATH.'public/uploads/'.$path);
        //如果图片删除 同时也删除内容
        
            if(Db::table('glory')->delete($id)){
                echo '<script>alert("删除成功");window.location.href="/enterprise/glory"</script>';


        }

    

  }















}

?>