<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Config;
// 应用公共文件

//接受短信验证
function sends($p){
//导入三方类
Vendor("lib.Ucpaas");


//初始化必填


//填写在开发者控制台首页上的Account Sid
$options['accountsid']='9f57d881e9a6484c2cbf1aa0a2bc5414';
//填写在开发者控制台首页上的Auth Token
$options['token']='5b19cdaf8f3ad7d418976f5e67d10c99';

//初始化 $options必填
$ucpass = new Ucpaas($options);
$appid = "cd176702fd634d16886b66985aae39dc";	//应用的ID，可在开发者控制台内的短信产品下查看
$templateid = "316252";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
$param =rand(1000,9999); 
//设置cookie 60秒过期
setcookie('vcode',$param,time()+180);
//多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
$mobile = $p;
$uid = "";

//70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。

echo $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
}

//发送邮件公共函数
//$to 接收方 $title 邮件主题 $content 发送的内容 
function sendemail($to,$title,$content){
	//导入核心类
	 $mail = new \Org\Util\PHPMailer();
	 //设置字符集
	$mail->CharSet="utf-8";
	//设置采用SMTP方式发送邮件
	$mail->IsSMTP();
	//设置邮件服务器地址
	$mail->Host="smtp.163.com";//C 获取配置文件信息 
	//设置邮件服务器的端口 默认的是25  如果需要谷歌邮箱的话 443 端口号
	$mail->Port=25;
	//设置发件人的邮箱地址
	$mail->From="liu851911902@163.com"; //
	// $mail->FromName='我';//
	//设置SMTP是否需要密码验证
	$mail->SMTPAuth=true;
	//发送方
	$mail->Username="liu851911902@163.com";
	$mail->Password="liu851911902";//C客户端的授权密码
	//发送邮件的主题
	$mail->Subject=$title;
	//内容类型 文本型
	$mail->AltBody="text/html";
	//发送的内容
	$mail->Body=$content;
	//设置内容是否为html格式
	$mail->IsHTML(true);
	//设置接收方
	$mail->AddAddress(trim($to));
	if(!$mail->Send()){
		return false;
		// echo "失败".$mail->ErrorInfo;
	}else{
		return true;
	}

}


//生成缩率图
function mobile_img($img)
{
  $img='/public/uploads/'.$img;
  $img=str_replace('\\', '/', $img);
  $mobile_img=explode('/',$img);
  $mb_img='/public/mobile_img/'.$mobile_img[4];
  if(!file_exists($mb_img))
  {
    $image = \think\Image::open('.'.$img);
    $image->thumb(150, 150)->save('.'.$mb_img);
  }
  return $mb_img;
}



