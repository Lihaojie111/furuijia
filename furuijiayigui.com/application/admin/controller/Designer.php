<?php
namespace app\admin\controller;
use think\Controller; //引入控制器类
use think\Db;
use think\Image;      //引入图像



class Designer extends Allow
{
	
    public function getindex()
    {

       $request=request();
       $data=Db::table('designer')->select();
        return $this->fetch('Designer/index',['data'=>$data]);

    

    }

    public function getadd()
    {

        return $this->fetch('Designer/add');
    }


    //执行数据的添加
    public function postinsert(){
        $request =request();
        $data=$request->param();
        unset($data['action']);
        $file=$request->file('portrait');
    
        
        $result=$this->validate(['file1'=>$file],['file1'=>'require|image'],['file1.require'=>'上传文件不能为空','file1.img'=>'上传文件必须是图像类型']);
        if(true !== $result){
            $this->error($result,'/file/index');
        }

        //移动
        $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
        $path=$info->getSavename();

        
        $data['portrait']=$path;
    
        if(Db::table('designer')->insert($data)){
            echo '<script>alert("添加成功");window.location.href="/designer/index"</script>';
        }   
    

     


     }

     //修改
        public function getedit(){
        $request =request();
        $id=$request->param('id');
        $data=DB::table('designer')->find($id);
        return $this->fetch('designer/edit',['data'=>$data]);

     }
   
     //执行修改
     public function postdoedit(){

        $request=request();
        $data=$request->param();
        $file=$request->file('portrait');
        unset($data['action']);
        if(!$file==null){
            $img=unlink(ROOT_PATH.'public/uploads/'.$data['portrait']);
            $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
            $data['picture']=$info->getSavename();
        }exit;
        
         if(Db::table('designer')->update($data)){

                echo '<script>alert("修改成功");window.location.href="/designer/index"</script>';
        
            }else{
                echo '<script>alert("修改失败");window.location.href="/designer/index"</script>';
            }
    
     }

     //删除
     public  function getdelete(){

        $request=request();
        $id=$request->param('id');
        $data=Db::table('designer')->find($id);
        
        $path=$data['portrait'];
        $bool=unlink(ROOT_PATH.'public/uploads/'.$path);
        if(Db::table('designer')->delete($id)){

                echo '<script>alert("删除成功");window.location.href="/designer/index"</script>';
        
            }else{
                echo '<script>alert("修改失败");window.location.href="/designer/index"</script>';
            }
     }

     //设计作品添加
        public function getworks()
    {

       

       $request=request();
       $id=$request->param('id');
       $data=DB::table('designer')->find($id);
        return $this->fetch('Designer/works',['data'=>$data]);

    }

     //执行数据的添加
    public function postworks(){
        $request =request();
        $data=$request->param();
        unset($data['action']);
        $file=$request->file('picture');
        
        
        $result=$this->validate(['file1'=>$file],['file1'=>'require|image'],['file1.require'=>'上传文件不能为空','file1.img'=>'上传文件必须是图像类型']);
        if(true !== $result){
            $this->error($result,'/file/index');
        }

        //移动
        $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
        $path=$info->getSavename();

        
        $data['picture']=$path;
    
        if(Db::table('works')->insert($data)){
            echo '<script>alert("添加成功");window.location.href="/designer/index"</script>';
        }   
    

     


     }










}

?>