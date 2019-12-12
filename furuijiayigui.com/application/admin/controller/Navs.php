<?php

namespace app\admin\controller;

use think\Controller; //引入控制器类

use think\Db;

// use think\Captcha;     // 引入验证码

class Navs extends Allow

{

	

    public function getindex()

    {



       

       $data=Db::table('navigation')->select();

        return $this->fetch('Nav/index',['data'=>$data]);



    



    }



    public function getadd()

    {

        //前台会员添加

        return $this->fetch('Nav/add');

    }





    //执行数据的添加

    public function postinsert(){

        $request =request();
         $file=$request->file("pic");


    	$data =$request->only(['title','url','pic']);


        $file=$request->file("pic");
          //设置上传规则

        $result = $this->validate(['file1'=>$file],['file1'=>'require|image'],['file1.require'=>'上传文件不能为空','file1.image'=>'上传文件必须是图片类型']);

        if(true !==$result){



            $this->error($result,'/navs/add');



        }
        
         //移动

        $info =$file->move(ROOT_PATH.'public'.DS.'uploads');

        

        //获取上传文件信息

        $path=$info->getSavename();

        $data['pic']=$path;
        $data['state']=0;    	

        

        

        if(Db::table('navigation')->insert($data)){

            echo '<script>alert("添加成功");window.location.href="/navs/index"</script>';

        }   


     }



     //用户修改

        public function getedit(){

        $request =request();

        $id=$request->param('id');

        $data=DB::table('navigation')->find($id);

        return $this->fetch('Nav/edit',['data'=>$data]);



     }

   

     //标题修改

     public function postdoedit(){



        $request=request();

        $data =$request->only(['title','id','pic','url']);   

         $id=$request->param('id');   
         $datas=DB::table('navigation')->find($id);
       
        $file=$request->file('pic');
                //判断是否上传图片
        if(!$file==null){
            //删除旧的图片
            unlink(ROOT_PATH.'public/uploads/'.$datas['pic']);
            //移入新的图片
           $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
            // var_dump($info);exit;
            //获取文件路径
            $data['pic']=$info->getSavename();

            }
        
        if(Db::table('navigation')->update($data)){



                echo '<script>alert("修改成功");window.location.href="/navs/index"</script>';

        

            }else{

                echo '<script>alert("修改失败");window.location.href="/navs/index"</script>';

            }

    

     }



     //标题删除

     public  function getdelete(){



        $request=request();

        $id=$request->param('id');   
         $data=DB::table('navigation')->find($id);
         $path=$data['pic'];
          unlink(ROOT_PATH.'public/uploads/'.$path);

        if(Db::table('navigation')->delete($id)){



                echo '<script>alert("删除成功");window.location.href="/navs/index"</script>';

        

            }else{

                echo '<script>alert("修改失败");window.location.href="/navs/index"</script>';

            }

     }



}



?>