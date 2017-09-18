<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人微博--博客</title>
<!--导入样式文件-->
<link rel='stylesheet' type='text/css' href='http://fonts.useso.com/css?family=Open+Sans:300,400,600,700,400italic'>
<link rel="stylesheet" type="text/css" href="/blog/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/blog/Public/font-awesome/css/font-awesome.min.css">    
<link rel="stylesheet" type="text/css" href="/blog/Public/css/style.css">
<link rel="stylesheet" type="text/css" href="/blog/Public/layer/skin/layer.css">
<link rel="stylesheet" type="text/css" href="/blog/Public/zui/css/zui.min.css">
<script src="/blog/Public/js/jquery-1.11.3.min.js"></script>
<script src="/blog/Public/layer/layer.js"></script>
<script src="/blog/Public/js/bootstrap.min.js"></script>
<script src="/blog/Public/js/jq.js"></script>
<script type="text/javascript" src="/blog/Public/bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="/blog/Public/bootstrap/js/bootstrap.js"></script>
<style type="text/css">
.carousel-captions{position:absolute;right:15%;bottom:20px;left:15%;z-index:10;padding-top:20px;padding-bottom:20px;color:#fff;text-align:center;text-shadow:0 1px 2px rgba(0,0,0,.6);text-shadow:none}
.carousel-captions{right:20%;left:20%;padding-bottom:30px}
.menu-captions{
	float: left;
	width: 100%;
	background-color: #cfb011;
	text-align: center;
	left: 0px;
	bottom: 0px;
	position: absolute;
	top: 67%;
	opacity: 0.7;
	padding-top: 15px;
	padding-bottom: 0px;
	padding-left: 0px;
	padding-right: 0px;
	text-transform: uppercase;
}
</style>
<!--导入样式文件-->
</head>
<body class="contact-page">
<!---->
 <div class="main-body">
        <div class="container">
            <div class="row">

                <div class="main-page">
                    <aside class="main-navigation">
                        <div class="main-menu">

                            <div class="menu-container">
                                <div class="block-keep-ratio block-keep-ratio-2-1 block-width-full home">                                    
                                    <a href="<?php echo U('Home/Index/index');?>" class="block-keep-ratio__content  main-menu-link">
                                        <span class="main-menu-link-text">
                                            首页    
                                        </span>                                        
                                    </a>
                                </div>                                
                            </div>

                            <div class="menu-container">                                
                                <div class="block-keep-ratio  block-keep-ratio-1-1  block-width-half  pull-left  about-main">                                    
                                    <a href="<?php echo U('Home/Reader/reader');?>" class="main-menu-link about block-keep-ratio__content flexbox-center">
                                        <i class="fa fa-user fa-4x main-menu-link-icon"></i>
                                        读者天地
                                    </a>                                    
                                </div>

                                <div class="block-keep-ratio  block-keep-ratio-1-1  block-width-half  pull-right  contact-main">
                                    <a href="<?php echo U('Home/Index/contact');?>" class="main-menu-link contact block-keep-ratio__content flexbox-center">
                                        <i class="fa fa-envelope-o fa-4x main-menu-link-icon"></i>
                                        留言
                                    </a>                                
                                </div>    
                            </div>   

                            <div class="menu-container">
                                <div class="block-keep-ratio block-keep-ratio-1-1 block-keep-ratio-md-2-1 block-width-full gallery">                                    
                                    <a href="<?php echo U('Home/Blog/index');?>" class="main-menu-link  block-keep-ratio__content">
                                        <span class="main-menu-link-text">
                                            博客    
                                        </span>                                            
                                    </a>                                    
                                </div>                                
                            </div>
                            <!-- sidebar carousel -->
                            <div class="menu-container">
                                <div class="mauris">
                                    <div id="carousel-menu" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                           <div class="item active">
                                            <a href="<?php echo U('Home/Image/image');?>">
                                                <img src="/blog/Public/images/slider-img-1.png" alt="slider">
                                                <div class="carousel-captions menu-captions">
                                                   个人风采
                                                </div>
                                            </a>
                                            </div>
                                            <div class="item">
                                            <a href="<?php echo U('Home/Image/image');?>">
                                                <img src="/blog/Public/images/menu-bg-home.png" alt="slider">
                                                <div class="carousel-captions menu-captions">
                                                   奇观异景
                                                </div>
                                            </a>
                                            </div>
                                        </div>

                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#carousel-menu" role="button" data-slide="prev">
                                            <span class="fa fa-caret-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-menu" role="button" data-slide="next">
                                            <span class="fa fa-caret-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div> <!-- .mauris -->
                            </div>
                        </div> <!-- main-menu -->
                    </aside> <!-- main-navigation -->

                    <div class="content-main contact-content">
                     <!----存放文章分类---->
                     <br/>
                     <!----存放文章分类---->
                     <!----文章存放----->
                        <div class="contact-content-upper"> 
                            <div class="row"> 
                          <!---文章-->
                     <?php if(is_array($files)): $i = 0; $__LIST__ = $files;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!----->
                    <article class="article">
  <header>
    <h1 class="text-center"><?php echo ($vo["title"]); ?></h1>
    <dl class="dl-inline">
      <dt>来源：</dt>
      <dd>本网站</dd>
      <dt>发表时间：</dt>
      <dd><?php echo ($vo["publishtime"]); ?></dd>
      <dt></dt>
    </dl>
    <section class="abstract">
      <p><strong>摘要：</strong><?php echo ($vo["abstract"]); ?></p>
    </section>
  </header>
  <section class="content">
    <img src="/blog/Public/img/uploads/fileimg/<?php echo ($vo["img"]); ?>" alt="" width="1014px" height="324px">
    <h3>正文：</h3>
    <p><?php echo ($vo["content"]); ?></p>
  </section>
  <footer>
    <p class="pull-right text-muted">本文在知识共享 署名-相同方式共享 3.0协议之条款下提供。</p>
    <p class="text-important">评论量：<?php echo ($knoecomment); ?>&nbsp;&nbsp;
    <button class="btn btn-info btn-mini" type="button" onclick="zan(<?php echo ($vo["id"]); ?>)">赞</button>
  </footer>
<!-- JiaThis Button BEGIN -->
<div class="jiathis_style">
	<span class="jiathis_txt">分享到：</span>
	<a class="jiathis_button_qzone">QQ空间</a>
	<a class="jiathis_button_tsina">新浪微博</a>
	<a class="jiathis_button_weixin">微信</a>
	<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更多</a>
	<a class="jiathis_counter_style"></a>
</div>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
<!-- JiaThis Button END -->
</article>
                    <!-----><?php endforeach; endif; else: echo "" ;endif; ?>  
                          <!---文章-->
                            </div> <!-- .row -->
                        </div>
                     <!----文章存放----->
                     <!---评论-->
                      <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div id="google-map" style="padding-left:20px; padding-right:20px;">
                              <!---评论--->
  <header>
    <div class="pull-right"></div>
    <h3>所有评论</h3>
  </header>
  <?php if(is_array($msdata)): foreach($msdata as $key=>$vo): ?><img src="/blog/Public/img/uploads/userimg/<?php echo ($vo["user_img"]); ?>" alt=""  width="42px" height="42px" class="img-rounded" style="float:left; margin-top:10px;">
     <div class="comments">
  <section class="comments-list">
      <div class="comment">
        <div class="content">
          <div class="pull-right text-muted"><?php echo ($vo["publishtime"]); ?></div> 
          <div><strong><?php echo ($vo["uname"]); ?></strong></div>
          <div class="text"><?php echo ($vo["content"]); ?></div>
        </div>
      </div>
  </section>
      </div><?php endforeach; endif; ?>
   <br/>
   <div class="text-center"><?php echo ($page); ?></div>
   <br/>
   <!---写评论--->
    <form class="form"  method="post" id="postform">
        <div class="form-group">
          <textarea class="form-control new-comment-text" rows="2" placeholder="撰写评论..." id="content" name="content"></textarea>
          <input type="hidden" value="<?php echo ($fiid); ?>" id="fid" name="fid" />
        </div>
        <div class="form-group comment-user">
          <div class="row">
            <div class="col-md-3">
              <a href="<?php echo U('Home/Login/login');?>">登录</a> &nbsp;<a href="<?php echo U('Home/Login/register');?>">注册</a>
            </div>
            <?php if($_SESSION['username']!= "" ): ?><div class="col-md-2" style="float:right;"><button type="button" class="btn btn-block btn-primary" onclick="post()">发表</button></div><?php endif; ?>
          </div>
        </div>
      </form>
   <!----写评论-->
                              <!---评论--->
                                </div>
                            </div>                            
                      </div>
                     <!---评论-->
                    </div> <!-- .contact-content -->
                </div> <!-- .main-page -->
            </div> <!-- .row -->

            <footer class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 footer">
                    <p class="copyright">Copyright © 2016 Company Name
                    
                    | More Templates <a href="#" target="_blank" title="佛布朗博客">佛布朗斯基</a> - Collect from <a href="http://www.cssmoban.com/" title="佛布朗博客" target="_blank">佛布朗博客</a></p>
                </div>    
            </footer>  <!-- .row -->   

        </div> <!-- .container -->
    </div> <!-- .main-body -->   
</body>
<script type="text/javascript">
     function post(){
		    var content=$('#content').val();
			if(content==''){
				  layer.msg('亲，请说点什么吧!');  
				  return false;
			}
		    var data=$("#postform").serialize();
			$.post('<?php echo U("Home/Blog/postpinglun");?>',data,function(response){
             if(response.status=='1'){
               layer.msg('亲，发表成功!');   
			   window.location.reload()
             }else if(response.status=='0'){
               //正确跳转到修改密码界面
               layer.msg('亲，发表失败!');
               //               
             }
         }) ;
	 }
	 //赞//
	 function zan(id){
		 var id=id;
		 var ajaxSidUrl='<?php echo U("Blog/zan");?>'; 
				$.ajax({
                       //提交数据的类型 POST GET
                       type: "POST",
                       //提交的网址
                       url: ajaxSidUrl,
                       //提交的数据
                       data: {id: id},
                       //返回数据的格式
                       datatype: "json",
                      //成功返回之后调用的函数
                       success: function (data) {
                      ////根据ajax返回参数判断验证码发送情况
                       if(data['status']=="1"){
                          layer.msg('点赞成功!');   
                       }
                       else{
                         layer.msg('未知错误!');   
                       }
                      ////根据ajax返回参数判断验证码发送情况
                    }
               });
	 }
</script>

</html>