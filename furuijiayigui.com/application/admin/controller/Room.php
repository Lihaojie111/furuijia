<?php

namespace app\admin\controller;

use think\Controller; //引入控制器类

use think\Image;      //引入图像

use think\Db;         //引入底层Db类

use think\Paginator;

class Room extends Allow

{
    

    //产品分类
     public function getcate(){
        $request=request();
        $data=Db::table('roomcate')->select();

         return $this->fetch('Room/cate',['data'=>$data]);

     }
     //分类添加
       public function getadd(){
             
       return $this->fetch('Room/add');
    }
   
     public function postinsert(){
      
        $request =request();
         $data =$request->only(['name']);
        if(Db::table('roomcate')->insert($data)){
            echo '<script>alert("添加成功");window.location.href="/room/cate"</script>';
        }   
    
      
    
    }

     //修改
    public function getedit(){
    
        $request=request();
        $id=$request->param('id');
        
        $data=Db::table('roomcate')->where("rid","{$id}")->find();
        //获取所有类别
      
      

        return $this->fetch('Room/edit',['data'=>$data]);     
    
    }
    
      //修改操作
    public function postupdate(){
      $request=request();
        $data =$request->only(['name','rid']);
     
        if(Db::table('roomcate')->update($data)){

                echo '<script>alert("修改成功");window.location.href="/room/cate"</script>';
        
            }else{
                echo '<script>alert("修改失败");window.location.href="/room/cate"</script>';
            }
    
    }










  //    //删除
    public function getdelete(){



        $request=request();
        $id=$request->param('id');
      //  $data=Db::table('roomcate')->where('rid',"{$id}")->find();

        $room=Db::table('room')->where('title',"{$id}")->find();
        if($room){


           echo '<script>alert("请先删除商品");window.location.href="/room/cate"</script>';


        }else{



          $result=Db::table('roomcate')->delete($id);
          if($result){ echo '<script>alert("删除成功");window.location.href="/room/cate"</script>';
        }else{

          echo '<script>alert("删除失败");window.location.href="/room/cate"</script>';
        }

        }
   
               



        }
        
      
          

        
  





     //房间展示
    public function getroom()
    {
      
    
      $request=request();
      $data=Db::table('room')->order('id desc')->paginate(5);
      
       return $this->fetch('Room/room',['data'=>$data]);
     
    }
        //添加
      public function getradd(){
    
          $request=request();
         $data=Db::table('roomcate')->select();
        //获取所有类别
       return $this->fetch('Room/radd',['data'=>$data]);
    }
   
    public function postrinsert(){
      
        $request =request();
        $data =$request->only(['title','name','pic','describe','content']);
        $file=$request->file('pic');
       $result=$this->validate(['file1'=>$file],['file1'=>'require|image'],['file1.require'=>'上传文件不能为空','file1.img'=>'上传文件必须是图像类型']);
        if(true !== $result){
            $this->error($result,'/Room/room');
        }

        //移动
        $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
        
        $path=$info->getSavename();
        
        $data['pic']=$path;
    
        if(Db::table('room')->insert($data)){
            echo '<script>alert("添加成功");window.location.href="/Room/room"</script>';
        }   
    
      
    
    }

	
	
	//修改
    public function getredit(){
    
    	$request=request();
    	$id=$request->param('id');
    	
      	$info=Db::table('room')->where("id","{$id}")->find();
        //获取所有类别
      	 $data=Db::table("roomcate")->select();
      

      	return $this->fetch('Room/redit',['data'=>$data,'info'=>$info]);  	
    
    }

     public function postrupdate(){
           
      $request = request();
       $data =$request->only(['title','name','pic','describe','content','id']);

      //获取图片
      $file=$request->file('pic');
  
    //判断是否上传图片
    if(!$file==null){
      //删除旧的图片
     unlink(ROOT_PATH.'public/uploads/'.$data['pic']);
      //unlink(ROOT_PATH.'public'.DS.'uploads\\'.$data['pic']);
      //移入新的图片
      $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
      // var_dump($info);exit;
      //获取文件路径
      $data['pic']=$info->getSavename();
      // var_dump($data);exit;

    } 
    
      if(Db::table('room')->update($data)){

            echo '<script>alert("修改成功");window.location.href="/room/room"</script>';
        
          }else{
            echo '<script>alert("修改失败");window.location.href="/room/room"</script>';
          }
    
    }
	
	
	
	
      //删除
      public function getrdelete(){

        $request=request();
        $id=$request->param('id');
        $data=DB::table('room')->where('id',"{$id}")->find($id);
        
        $path=$data['pic'];
        //删除图片
        
        unlink(ROOT_PATH.'public/uploads/'.$path);
       //如果图片删除 同时也删除内容
        $descr=$data['content'];
         preg_match_all('/<img.*?src="(.*?)".*?>/is',$descr,$array);

            if(Db::table('room')->delete($id)){
               
                 if(isset($array[1])){
                
                //遍历
                foreach($array[1] as $k=>$v){
                    //直接删除百度编辑器上传图片
                    unlink('.'.$v);
                }
            }







                echo '<script>alert("删除成功");window.location.href="/Room/room/"</script>';


        }

    

  }


	


}

	

?>