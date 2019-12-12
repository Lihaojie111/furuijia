<?php
namespace app\admin\controller;
use think\Controller; //引入控制器类
use think\Db;
// use think\Captcha;     // 引入验证码



class Zhaoshang extends Allow
{
	
    public function getindex()
    {

       
       $data=Db::table('zhaoshang')->select();
        //获取用户总数
      
       
     
        //获取搜索的关键字  
        // $search =$request->param('search');
    	
    	//获取所有数据 和分页status 
    	
       return $this->fetch('Zhaoshang/index',['data'=>$data]);

    

    }


    public function getdelete(){

        $request=request();

        $id=$request->param('id');

            if(Db::table('zhaoshang')->delete($id)){

                        echo '<script>alert("删除成功");window.location.href="/zhaoshang/index"</script>';

                }

        


    }


   
}

?>