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
<script src="/blog/Public/js/bootstrap.min.js"></script>
<script src="/blog/Public/js/jq.js"></script>
<script src="/blog/Public/layer/layer.js"></script>
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
                      <!---分类--->
                      <div style="text-align:center">
                            <span class="label label-danger" style="font-size:15px;">
                                <a href="<?php echo U('Blog/index');?>?id=" style="color:#FFF;">
                                所有
                                </a>
                            </span>&nbsp;&nbsp;
                               <?php if(is_array($type)): foreach($type as $key=>$vo): ?><span class="label label-warning"  style="font-size:15px;">
                                 <a href="<?php echo U('Blog/index');?>?id=<?php echo ($vo["id"]); ?>" style="color:#FFF;">  
                                   <?php echo ($vo["title"]); ?>
                                  </a>
                               </span>&nbsp;&nbsp;<?php endforeach; endif; ?>
                        </div>
                          <!---分类--->
                     <!----存放文章分类---->
                     <!----文章存放----->
                        <div class="contact-content-upper"> 
                            <div class="row"> 
                          <!---循环存放文章--->
                          <!---文章-->
          <?php if(is_array($data)): foreach($data as $key=>$vo): ?><div class="items">
                   <div class="item">
                     <div class="item-heading">
                      <div class="pull-right label label-success"><?php echo ($key+1); ?></div>
                        <h4><a href="<?php echo U('Blog/files');?>?id=<?php echo ($vo["id"]); ?>" style="font-size:16px"><?php echo ($vo["title"]); ?></a></h4>
                     </div>
                     <div class="item-content">
                        <div class="media pull-left"><img src="/blog/Public/img/uploads/fileimg/<?php echo ($vo["img"]); ?>" alt="" width="160px" height="160px"></div>
                        <div class="text" style="font-size:14px"><?php echo ($vo["abstract"]); ?></div>
                    </div>
                    <div class="item-footer">
                    <span class="text-muted"><i class="icon-comments"></i> 发表时间：</span> &nbsp; <span class="text-muted"><?php echo ($vo["publishtime"]); ?></span>
                    </div>
                </div><?php endforeach; endif; ?>
                          <!---文章-->
                          <div class="clearfix"></div>
                                    <div class="text-center"><?php echo ($page); ?></div>
                          </div>
                          <!---循环存放文章--->
                            </div> <!-- .row -->
                        </div>
                     <!----文章存放----->
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
  
</script>
</html>