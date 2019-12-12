<?php

namespace app\admin\controller;
use think\Controller; //引入控制器类
use think\Image;      //引入图像
use think\Db;         //引入底层Db类

class Link extends Allow

{

    public function getindex()

    {

    	$request=request();

       $data=Db::table('link')->select();

       

       //订单列表

       return $this->fetch('Link/index',['data'=>$data]);

    }



    //删除友情链接

    public function getdelete(){

    	$request=request();

    	$id=$request->param('id');

            if(Db::table('link')->delete($id)){

                        echo '<script>alert("删除成功");window.location.href="/link/index"</script>';

                }

    	


    }



    //增加链接

    public function getadd(){

    	

    	return $this->fetch('Link/add');

    }

    //增加操作

    public function postinsert(){

    	$request=request();

    	

    	 $data =$request->only(['name','url']);




    	if(Db::table('link')->insert($data)){

    		echo '<script>alert("添加成功");window.location.href="/link/index"</script>';

    	}else{





        } 	

    }






    //修改

    public function getedit(){

    	//var_dump($_GET);

    	$request=request();

    	$id=$request->param('id');

    	$data=Db::table('link')->find($id);

      	//var_dump(ROOT_PATH);exit;

      	return $this->fetch('Link/edit',['data'=>$data]);  	

    

    }

    //修改操作

    public function postupdate(){

    	//var_dump($_POST);

    	$request=request();

        $data =$request->only(['name','url','id']);

    	

    		if(Db::table('link')->update($data)){



      			echo '<script>alert("修改成功");window.location.href="/link/index"</script>';

      	

      		}else{

      			echo '<script>alert("修改失败");window.location.href="/link/index"</script>';

      		}

    

    }





   



}

	

?>