<?php
namespace app\api\controller;
use think\Controller;
use think\Db;
class Api extends Controller{
//首页
	public function index(){
		$result=[];
		$result['banner']=Db::table('map')->column('img');
		$result['room']=Db::table('room')->field('name,describe,pic')->order('id desc')->limit(0,6)->select();
		$result['room2']=Db::table('room')->field('name,describe,pic')->order('id desc')->limit(6,4)->select();
		$news=Db::table('new')->field('id,title,content,time')->where('state','0')->limit(5)->select();
		foreach ($news as $key => $value) {
			$value['content']=strip_tags(htmlspecialchars_decode($value['content']));
			$value['content']=mb_substr($value['content'],0,36);
			$news[$key]['content']=$value['content'].'...';
		}
		$result['news']=$news;
		return json($result)->getcontent();
	}
	//新闻列表
	public function news_list(){
		$page=input('post.page');
		$page=isset($page) ? $page : 1;
		$page_limit=($page-1)*5;
		$news=Db::table('new')->field('id,pic,title,content,time')->where('state','0')->limit($page_limit,5)->select();
		foreach ($news as $key => $value) {
			$value['content']=strip_tags(htmlspecialchars_decode($value['content']));
			$value['content']=mb_substr($value['content'],0,36);
			$news[$key]['content']=$value['content'].'...';
		}
		$result['news']=$news;
		return json($result)->getcontent();
	}
//新闻详情
	public function news_detail(){

		$id=input('post.id');
		$result=Db::table('new')->where("id = '$id'")->find();

		$result['content']=strip_tags(htmlspecialchars_decode($result['content']));
		return json($result)->getcontent();
	}
//分类列表
	public function cate_list(){
		$cate=Db::table('roomcate')->select();
		foreach ($cate as $key => $value) {
			$room=Db::table('room')->field('pic,describe')->where('title',$value['rid'])->select();
			$cate[$key]['child']=$room;
		}
		return json($cate)->getcontent();
	}
//招商加盟
	public function zhaoshang(){
		$post=input('post.');
		Db::table('zhaoshang')->insert($post);
		return '提交成功';
	}
//资质荣誉
	public function honor(){
		$glory=Db::table('glory')->order('id desc')->select();
		return json($glory)->getcontent();
	}
//图片生成
	public function img_sc(){
		$img=input('param.url');
		if(!$img)
		{
			return '';
		}
		$img=str_replace('\\', '/',$img);
		$mobile_img=explode('/',$img);
		$mb_img='/public/mobile_img/'.$mobile_img[1];
		if(!file_exists($mb_img))
		{
			$image = \think\Image::open('./public/uploads/'.$img);
			$image->thumb(750,750)->save('.'.$mb_img);
		}
		$info=getimagesize('.'.$mb_img);
		header('Content-Type:'.$info['mime']);
		$mb_img_aa = file_get_contents('.'.$mb_img);
		echo $mb_img_aa;

	}
}