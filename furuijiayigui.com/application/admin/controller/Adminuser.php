<?php

namespace app\admin\controller;

use think\Controller; //引入控制器类

use think\Image;      //引入图像

use think\Db;



class AdminUser extends Allow{

    public function getindex(){

    	//$request=request();

    	$data=Db::table('adminuser')->select();

    	

    	//var_dump($role);

    	$num=count($data);

    	return $this->fetch('Adminuser/index',['data'=>$data,'num'=>$num]);

    }





    public function getadd(){

        

    

    	return $this->fetch('Adminuser/add');

    }



    public function postinsert(){



        $request=request();

        $data=$request->only(['user','password']);
		$data['state']=0;


     // 	$result=$this->validate($data,'Adminuser');

     //      	if(true !== $result){

    	// 	//阻止页面提交 显示错误的信息

    	// 	$this->error($result);

    	// }

    	$data['password']=md5($data['password']);

        

        if(Db::table('adminuser')->insert($data)){

        	

        	echo "<script>alert('添加成功');window.location.href='/adminuser/index';</script>";



        }



    }

    //删除

    public function getdelete(){

    	$request=request();

    	

    	$id=$request->param('id');

         
        $data=Db::table('adminuser')->where("id","{$id}")->find();  
      

        if($data['state']=='1'){
           echo "<script>alert('无法删除超级管理员');window.location.href='/adminuser/index';</script>";


        }else{
        
        	if(Db::table('adminuser')->where('id',$id)->delete($data)){

    		echo "<script>alert('删除成功');window.location.href='/adminuser/index';</script>";

    	}else{

    		echo "<script>alert('删除失败');window.location.href='/adminuser/index';</script>";

    	}

        	
        
        }
		
    	
     
    	

    }

    //编辑

    public function getedit(){

    	$request=request();

    	

    	$id=$request->param('id');

    	$data=Db::table('adminuser')->find($id);

    

		return $this->fetch('Adminuser/edit',['data'=>$data]);



    }

    //修改

    public function postupdate(){

    	$request=request();

    	

    	

    	  $data=$request->only(['user','password','id']);

    	  $id=$data['id'];
      		$data['password']=md5($data['password']);

    

    	if(Db::table('adminuser')->where('id',$id)->update($data)){

    		echo "<script>alert('修改成功');window.location.href='/adminuser/index';</script>";

    	}else{

    		echo "<script>alert('删除失败');window.location.href='/adminuser/index';</script>";

    	}

		

    }






























}





?>