<?php

namespace app\admin\controller;

use think\Controller; //引入控制器类

use think\Db;

// use think\Captcha;     // 引入验证码







class User extends Allow

{

	

    public function getindex()

    {



       

         $data=Db::table('user')->paginate(8);

        //获取用户总数

        $num=count($data);

       

     

        //获取搜索的关键字  

        // $search =$request->param('search');

    	

    	//获取所有数据 和分页status 

    	

       return $this->fetch('User/index',['data'=>$data,'num'=>$num]);



    



    }



    public function getadd()

    {

        //前台会员添加

        return $this->fetch('User/add');

    }





    //执行数据的添加

    public function postinsert(){

        $request =request();



    	$data =$request->only(['name','password']);

    	$data['state']=1;

    	$data['password']=md5($data['password']);

        $data['time']=time();

        

        if(Db::table('user')->insert($data)){

            echo '<script>alert("添加成功");window.location.href="/user/index"</script>';

        }   

    



     





     }



     //用户修改

     public function getedit(){

        $request =request();

        $id=$request->param('id');

        $data=DB::table('user')->find($id);



        return $this->fetch('User/updates',['data'=>$data]);



     }

     //用户状态修改

     public function postupdates(){



        $request=request();

        $data =$request->only(['id','name','password']);   

       	$data['password']=md5($data['password']);

        if(Db::table('user')->update($data)){



                echo '<script>alert("修改成功");window.location.href="/user/index"</script>';

        

            }else{

                echo '<script>alert("修改失败");window.location.href="/user/index"</script>';

            }

    

     }

     //删除
      public function getdelete(){

        $request=request();

        

        $id=$request->only('id');

        if(Db::table('user')->delete($id)){

            

            echo "<script>alert('删除成功');window.location.href='/user/index';</script>";

        }

    }

}



?>