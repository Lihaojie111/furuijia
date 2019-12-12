<?php

namespace app\admin\controller;

use think\Controller; //引入控制器类

use think\Image;      //引入图像

use think\Db;         //引入底层Db类



class News extends Allow

{



		

    public function getindex()

    {

  

    

        $data=Db::table('new')->order('id desc')->paginate(10);

        return $this->fetch('New/index',['data'=>$data]);

    }



    // 添加页面

    public function getadd()

    {

    	return $this->fetch('New/add');

    }



    // 处理添加

    public function postinsert(){

      $request = request();
      $data =$request->only(['title','pic','key','source','content','state']);
   	
      $data['time']=date('Y-m-d H:i:s');
   	
   	  $file=$request->file('pic');

      $result=$this->validate(['file1'=>$file],['file1'=>'require|image'],['file1.require'=>'上传文件不能为空','file1.img'=>'上传文件必须是图像类型']);

        if(true !== $result){

            $this->error($result,'/news/index');

        }



        //移动

        $info=$file->move(ROOT_PATH.'public'.DS.'uploads');

        $path=$info->getSavename();

        $data['pic']=$path;





        

    	if(Db::table('new')->insert($data)){

    		 echo '<script>alert("添加成功");window.location.href="/news/index"</script>';

    	}else{

    		 echo '<script>alert("添加失败");window.location.href="/news/index"</script>';

    	}

    

    }



    //编辑

    public function getedit(){

    	 $request =request();

        $id=$request->param('id');

        $data=Db::table('new')->find($id);

        return $this->fetch('New/edit',['data'=>$data]);

    

    }



 



    //编辑处理

    public function postupdate()

    {

    	  $request=request();
           $data =$request->only(['title','pic','time','key','source','content','state','id']);


     





    	if(Db::table('new')->update($data)){

    		  echo '<script>alert("修改成功");window.location.href="/news/index"</script>';

        

    	}else{

    		echo '<script>alert("修改成功");window.location.href="/news/index"</script>';

    	}

    }



    //删除

    public function getdelete()

    {

      $request=request();

      $id=$request->param('id');

      //获取删除数据

    	$new=Db::table('new')->where('id',"{$id}")->find();

      //获取内容

      $source=$new['source'];

      preg_match_all('/<img.*?src="(.*?)".*?>/is',$source,$array);

    	if(Db::table('new')->where('id',"{$id}")->delete()){

    		if(isset($array[1])){

            foreach($array[1] as $k=>$v){

                //删除百度编辑器图片

                unlink('.'.$v);



            }



        }



        return $this->success('删除成功','/news/index');

    	}else{

    		



        return $this->error('删除失败','/news/index');

    	}

    }






}

	

?>