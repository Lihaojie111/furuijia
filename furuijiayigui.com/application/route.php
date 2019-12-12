<?php

use think\Route;

//前台首页
Route::controller('/home','home/Index','GET|POST');
Route::controller('/mobile','mobile/Index','GET|POST');
 //芙瑞伽商学院
Route::controller('/college','home/College');
Route::controller('/college','mobile/College');


//后台首页
Route::controller('/admin','admin/Index');
//后台登录
Route::controller('/adminlogin','admin/Login');
//前台用户 后台显示
Route::controller('/user','admin/User');
//管理员添加
Route::controller('/adminuser','admin/Adminuser');



//导航管理
Route::controller('/navs','admin/Navs');
//轮播图
Route::controller('/map','admin/Map');
//分类
Route::controller('/cate','admin/Cate');
//产品分类
Route::controller('/room','admin/Room');
//新闻资讯
Route::controller('/news','admin/News');

//设计师管理
Route::controller('/designer','admin/Designer');
//企业管理  关于我们
Route::controller('/enterprise','admin/Enterprise');
//友情链接
Route::controller('/link','admin/Link');
//招商管理
Route::controller('/zhaoshang','admin/Zhaoshang');







