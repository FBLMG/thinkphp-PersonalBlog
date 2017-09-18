<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人微博--留言</title>
<!--导入样式文件-->
<link rel='stylesheet' type='text/css' href='http://fonts.useso.com/css?family=Open+Sans:300,400,600,700,400italic'>
<link rel="stylesheet" type="text/css" href="/blog/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/blog/Public/font-awesome/css/font-awesome.min.css">    
<link rel="stylesheet" type="text/css" href="/blog/Public/css/style.css">
<link rel="stylesheet" type="text/css" href="/blog/Public/zui/css/zui.min.css">
<script src="/blog/Public/js/jquery-1.11.3.min.js"></script>
<script src="/blog/Public/layer/layer.js"></script>
<script src="/blog/Public/js/bootstrap.min.js"></script>
<!--文本编辑器-->
<script type="text/javascript" src="/blog/Public/admin/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/blog/Public/admin/js/ueditor/ueditor.all.js"></script>
<!--文本编辑器-->
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
                                            <span class="sr-only">上一页</span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-menu" role="button" data-slide="next">
                                            <span class="fa fa-caret-right" aria-hidden="true"></span>
                                            <span class="sr-only">下一页</span>
                                        </a>
                                    </div>
                                </div> <!-- .mauris -->
                            </div>
                        </div> <!-- main-menu -->
                    </aside> <!-- main-navigation -->

                    <div class="content-main contact-content">
                        <div class="contact-content-upper">   
                            <div class="row">                               
                                <!---回复留言-->  
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    留言
</button><br/><br/>  
<?php if(is_array($msdata)): foreach($msdata as $key=>$vo): ?><!---放入留言---->
     <span class="label label-success"><?php echo ($key+1); ?></span>
     <div class="comment">
    <div class="media pull-left"><img src="/blog/Public/img/uploads/userimg/<?php echo ($uimg); ?>" alt=""  width="42px" height="42px" class="img-rounded"></div>
  <a href="" class="avatar">
    <i class="icon-camera-retro icon-2x">
    </i>
  </a>
  <div class="content">
    <div class="pull-right text-muted"><?php echo ($vo["publishtime"]); ?></div>
    <div><a href=""><strong>你发表</strong></a></div>
    <div class="text"><?php echo ($vo["messagecontent"]); ?></div>
    <div class="actions">
      <a href="">回复</a>
    </div>
  </div>
<?php if($vo["rname"] != "" ): ?><div class="comments-list">
    <div class="comment">
      <a href="" class="avatar">
        <i class="icon-user icon-2x"></i>
      </a>
      <div class="content">
        <div class="pull-right text-muted"><?php echo ($vo["republishtime"]); ?></div>
        <div><a href=""><strong><?php echo ($vo["rname"]); ?></strong></a> <span class="text-muted">回复</span> <a href="###">你</a></div>
        <div class="text"><?php echo ($vo["mcontent"]); ?></div>
      </div>
    </div>
  </div><?php endif; ?>
</div><br/><br/>
     <!---放入留言----><?php endforeach; endif; ?>
         <div class="text-center"><?php echo ($page); ?></div>
<br/><br/>
                                <!---回复留言-->   
                            </div> <!-- .row -->
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div id="google-map"></div>
                            </div>                            
                        </div>

                    </div> <!-- .contact-content -->
                </div> <!-- .main-page -->
            </div> <!-- .row -->

            <footer class="row">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 footer">
                    <p class="copyright">Copyright © 2016 Company Name 
                    
                    | More Templates <a href="#" target="_blank" title="佛布朗博客">佛布朗斯基</a> - Collect from <a href="#" title="佛布朗博客" target="_blank">佛布朗博客</a></p>
                </div>   
            </footer>  <!-- .row -->   

        </div> <!-- .container -->
    </div> <!-- .main-body -->
<!---动态模态框-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width:700px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">发表留言</h4>
      </div>
      <div class="modal-body" style="height:430px;">
        <!---发表留言区-->
         <form class="avatar-form"  enctype="multipart/form-data" method="post" id="postmessage">
               <textarea id="content" name="content"></textarea>  
          </form>

        <!---发表留言区-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" onclick="onpost()">发表留言</button>
      </div>
    </div>
  </div>
</div>
<!---动态模态框-->
    <!---编辑器-->
<script type="text/javascript">
          var ue = UE.getEditor('content',{
            elementPathEnabled :false,
            autoHeightEnabled: false,
			"initialFrameWidth" :640,
            "initialFrameHeight" : 250
        });  
</script>
    <!---编辑器-->
<script type="text/javascript">
    function onpost(){
		//
		var data=$("#postmessage").serialize();
			$.post('<?php echo U("Index/postmessage");?>',data,function(response){
             if(response.status=='1'){
               layer.msg('发表成功');
			   window.location.reload();
             }else if(response.status=='-1'){
               //正确跳转到修改密码界面
               layer.msg('内容为空!');      
             }else{
               //正确跳转到修改密码界面
               layer.msg(response.status);      
             }
         }) ;
		//
    }
</script> 
</body>
</html>