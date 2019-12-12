<?php
namespace app\admin\controller;
date_default_timezone_set('PRC');
use think\Controller; //引入控制器类
use think\Image;      //引入图像
use think\Db;         //引入底层Db类
class Cate extends Allow
{
	//调整类别顺序 加分隔符
	public function getcate(){
		$cate=Db::query("select *,concat(path,',',id) as paths from cate order by paths");
		foreach($cate as $key=>$value){
			//获取path
      $path=$value['path'];
			//转换成数组
			$arr=explode(',',$path);
			//var_dump($arr);exit;
			$len=count($arr)-1;
			
      $cate[$key]['name']=str_repeat('❤',$len).$value['name'];

		}
		return $cate;

	}


    public function getindex()
    {
    	
      $cate=$this->getcate();
      $request=request();
    	
    	
       return $this->fetch('Cate/index',['cate'=>$cate]);
     
    }

    //删除
    public function getdelete(){
    	$request=request();
    	$id=$request->param('id');
      //获取当前类别下的个数
      $count=Db::table('cate')->where('pid',"{$id}")->Count();
    	//代表图片删除成功
    	if($count>0){
        echo '<script>alert("请先删除子类信息");window.location.href="/cate/index"</script>';exit;


      }

      if(Db::table('cate')->delete($id)){
    		echo '<script>alert("删除成功");window.location.href="/cate/index"</script>';
    	}else{
        echo '<script>alert("删除失败");window.location.href="/cate/index"</script>';

      }
    

    }

    //添加
    public function getadd(){
    	$cate=Db::table("cate")->select();
      
       return $this->fetch('Cate/add',['cate'=>$cate]);
    }
   

    //增加操作
    public function postinsert(){
    	$request=request();
    
      $data =$request->only(['pid','name','path','state','style','type','acreage']);
  
    	$pid=$data['pid'];

    
    	
		//判断是否是顶级分类
    	if($pid==0){
    		//顶级分类
    		$data['path']=0;
    	
    	}else{
    		$info=Db::table('cate')->where("id","{$pid}")->find($pid);
    		//拼接path
        $data['path']=$info['path'].','.$info['id'];
    	
    	}
      
    	if(Db::table('cate')->insert($data)){
    		echo '<script>alert("添加成功");window.location.href="/cate/index"</script>';
    	}else{
        echo '<script>alert("添加失败");window.location.href="/cate/index"</script>';

      } 	
    }


    //修改
    public function getedit(){
    
    	$request=request();
    	$id=$request->param('id');
    	
      	$info=Db::table('cate')->where("id","{$id}")->find();
        //获取所有类别
      	 $data=Db::table("cate")->select();
      

      	return $this->fetch('Cate/edit',['data'=>$data,'info'=>$info]);  	
    
    }
   	


    //修改操作
    public function postupdate(){
      $request=request();
    	$data =$request->only(['pid','name','path','state','style','type','acreage','id']);
     
    	if(Db::table('cate')->update($data)){

      			echo '<script>alert("修改成功");window.location.href="/cate/index"</script>';
      	
      		}else{
      			echo '<script>alert("修改失败");window.location.href="/cate/index"</script>';
      		}
    
    }


      //作品展示

        public function getexhibition(){
    
        $request=request();
      
        $data=Db::table('exhibition')->select();

        return $this->fetch('Cate/exhibition',['data'=>$data]);   
    
    }
    	




    //作品添加
      public function geteadd(){
    
      $cate=Db::table("cate")->select();
       return $this->fetch('Cate/eadd',['cate'=>$cate]);
    }
    
     public function posteinsert(){
      
        $request =request();
        $data =$request->only(['cate_id','name','pic','desifner','style','content']);


        $file=$request->file('pic');
       $result=$this->validate(['file1'=>$file],['file1'=>'require|image'],['file1.require'=>'上传文件不能为空','file1.img'=>'上传文件必须是图像类型']);
        if(true !== $result){
            $this->error($result,'/Cate/exhibition');
        }

        //移动
        $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
        $path=$info->getSavename();

        
        $data['pic']=$path;
    
        if(Db::table('exhibition')->insert($data)){
            echo '<script>alert("添加成功");window.location.href="/Cate/exhibition"</script>';
        }   
    
      
    
    }

   //作品修改
    public function getexhiedit(){
    
    	$request=request();
    	$id=$request->param('id');
    	
      	$info=Db::table('exhibition')->where("id","{$id}")->find();
        //获取所有类别
      	 $data=Db::table("cate")->select();
      

      	return $this->fetch('Cate/exhiedit',['data'=>$data,'info'=>$info]);  	
    
    }
     public function posteupdate(){
           
      $request = request();
      $data =$request->only(['cate_id','name','pic','desifner','style','content','id']);

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
    
      if(Db::table('exhibition')->update($data)){

            echo '<script>alert("修改成功");window.location.href="/Cate/exhibition"</script>';
        
          }else{
            echo '<script>alert("修改失败");window.location.href="/Cate/exhibition"</script>';
          }
    
    }
    

    //删除
     public function getedelete(){
        $request=request();
        //获取需要删除的数据id
        $id=$request->param('id');
        //获取需要删除数据
        $info=Db::table("exhibition")->where("id","{$id}")->find();
        //获取pic
        
        $path=$info['pic'];
        //删除图片
        
               //获取opic
       
        //获取descr
        $descr=$info['content'];
        // echo $descr;
        preg_match_all('/<img.*?src="(.*?)".*?>/is',$descr,$array);
        // echo "<pre>";
        // var_dump($array);

        // echo $opic;
        // echo $pic; // /uploads/publicimg/1527128294.jpg
        
        if(Db::table("exhibition")->where("id","{$id}")->delete()){
            //判断
            if(isset($array[1])){
                
                //遍历
                foreach($array[1] as $k=>$v){
                    //直接删除百度编辑器上传图片
                    unlink('.'.$v);
                }
            }
    
          
            //删除原图
             unlink(ROOT_PATH.'public/uploads/'.$path);

            //删除百度编辑器上传的图片
            $this->success("数据删除成功","/Cate/exhibition");
        }else{
            $this->error("数据删除失败");
        }
    }




    //房间展示
    public function getroom()
    {
      
    
      $request=request();
      $data=Db::table('room')->select();
      
       return $this->fetch('Cate/room',['data'=>$data]);
     
    }
        //添加
      public function getradd(){
    
  
       return $this->fetch('Cate/radd');
    }
   
    public function postrinsert(){
      
        $request =request();
        $data =$request->only(['title','name','pic','describe']);
        $file=$request->file('pic');
       $result=$this->validate(['file1'=>$file],['file1'=>'require|image'],['file1.require'=>'上传文件不能为空','file1.img'=>'上传文件必须是图像类型']);
        if(true !== $result){
            $this->error($result,'/Cate/room');
        }

        //移动
        $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
        $path=$info->getSavename();

        
        $data['pic']=$path;
    
        if(Db::table('room')->insert($data)){
            echo '<script>alert("添加成功");window.location.href="/cate/room"</script>';
        }   
    
      
    
    }

      //删除
      public function getrdelete(){

        $request=request();
        $id=$request->param('id');
        $data=DB::table('room')->find($id);
        
        $path=$data['pic'];
        //删除图片
        
        unlink(ROOT_PATH.'public/uploads/'.$path);
        //如果图片删除 同时也删除内容
        
            if(Db::table('room')->delete($id)){
                echo '<script>alert("删除成功");window.location.href="/cate/room/"</script>';


        }

    

  }




    //促销管理
    
    public function getpromotion()
    {
      
    
      $request=request();
      $data=Db::table('promotion')->select();
      
       return $this->fetch('Cate/promotion',['data'=>$data]);
     
    }
        //添加
      public function getpadd(){
    
  
       return $this->fetch('Cate/padd');
    }
    public function postpinsert(){
      
        $request =request();
         $data =$request->only(['price','name','pic','describe']);
        $file=$request->file('pic');
       $result=$this->validate(['file1'=>$file],['file1'=>'require|image'],['file1.require'=>'上传文件不能为空','file1.img'=>'上传文件必须是图像类型']);
        if(true !== $result){
            $this->error($result,'/Cate/promotion');
        }

        //移动
        $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
        $path=$info->getSavename();

        
        $data['pic']=$path;
    
        if(Db::table('promotion')->insert($data)){
            echo '<script>alert("添加成功");window.location.href="/Cate/promotion"</script>';
        }   
    
      
    
    }

      //删除
    public function getpdelete(){

        $request=request();
        $id=$request->param('id');
        $data=DB::table('promotion')->find($id);
        
        $path=$data['pic'];
        //删除图片
        
       // unlink(ROOT_PATH.'public/uploads/'.$path);
        //如果图片删除 同时也删除内容
        
            if(Db::table('promotion')->delete($id)){
            echo '<script>alert("删除成功");window.location.href="/Cate/promotion/"</script>';


        }

    

  }




}
	
?>