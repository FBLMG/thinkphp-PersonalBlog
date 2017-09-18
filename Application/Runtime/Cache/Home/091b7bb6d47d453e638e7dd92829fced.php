<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人微博--个人中心</title>
<!--导入样式文件-->
<link rel='stylesheet' type='text/css' href='http://fonts.useso.com/css?family=Open+Sans:300,400,600,700,400italic'>
<link rel="stylesheet" type="text/css" href="/blog/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/blog/Public/font-awesome/css/font-awesome.min.css">    
<link rel="stylesheet" type="text/css" href="/blog/Public/css/style.css">
<link rel="stylesheet" type="text/css" href="/blog/Public/layer/skin/layer.css">
<script src="/blog/Public/js/jquery-1.11.3.min.js"></script>
<script src="/blog/Public/js/bootstrap.min.js"></script>
<script src="/blog/Public/js/jq.js"></script>
<script src="/blog/Public/layer/layer.js"></script>
<script type="text/javascript" src="/blog/Public/bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="/blog/Public/bootstrap/js/bootstrap.js"></script>
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
                                                <div class="carousel-caption menu-caption">
                                                   个人风采
                                                </div>
                                            </a>
                                            </div>
                                            <div class="item">
                                            <a href="<?php echo U('Home/Image/image');?>">
                                                <img src="/blog/Public/images/menu-bg-home.png" alt="slider">
                                                <div class="carousel-caption menu-caption">
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
                        <div class="contact-content-upper">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="gallery_title">
                                        <h3>个人中心</h3>
                                        <h4>欢迎回家<?php echo ($_SESSION['username']); ?></h4>
                                    </div>    
                                </div>                            
                            </div>
     
                            <div class="row">  
                                <div class="col-sm-12 col-md-6 contact_left">
                                <!--**************************-->     
                              <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><form class="form-horizontal" method="post" id="userform">
          
                                        <div class="form-group"> 
                                            <span class="text-muted">用户名</span>                                   
                                            <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo ($_SESSION['username']); ?>"  value="" readOnly="true">                                    
                                        </div>         
                                        <div class="form-group">
                                            <span class="text-danger">QQ号</span>    
                                            <input type="text" class="form-control" id="qq" name="qq" placeholder="<?php echo ($vo["qq"]); ?>" value="">      
                                        </div>
          
                                        <div class="form-group">
                                            <span class="text-important">地址</span>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="<?php echo ($vo["address"]); ?>"  value="">        
                                        </div>
                                         <div class="form-group">
                                            <span class="text-primary">手机号码</span>
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo ($vo["phone"]); ?>" value="">        
                                        </div>  
                                        <div class="form-group">
                                            <span class="text-warning">级别</span>
                                     <?php if($vo["state"] == 0 ): ?><input type="text" class="form-control" id="state" name="state" placeholder="博主" readOnly="true">                                     <?php else: ?><input type="text" class="form-control" id="state" name="state" placeholder="读者" readOnly="true"><?php endif; ?>
                                        </div>                                                                             
                                        <div class="form-group">
                                            <input id="submit" name="submit" type="button" value="修改" class="btn btn-info"
                                            onclick="update()">
                                        </div>            
                                    
                                    </form><?php endforeach; endif; else: echo "" ;endif; ?> 
                             <!--**************************-->       
                                </div> <!-- .contact-left -->
      
                                <div class="col-sm-12 col-md-6 contact_right">
                                    
                                    <div class="col-md-12 contact_title">
                                       修改图片
                                    </div>
                                    <div class="col-md-12 contact_sub_title">
                                        上传图片
                                    </div>
                               
                                    <div class="col-md-12 contact_text">
                          <!---头像位置---->
                          <form class="form-horizontal form-add_user" style="width: 600px" method="post">
	<div class="form-group">
	  <div class="">
       <div class="ibox-content">
          <div class="row">
            <div id="crop-avatar" class="col-md-6">
              <div class="avatar-view" style="width:160px;height:160px" title="点击修改图片">
               <input  id="img" name="img" type="hidden" value="<?php echo ($vo["user_img"]); ?>">
               <input  id="aspectRatio" type="hidden" value="1">
                <input  id="img_root_url" type="hidden" value="/blog/Public/img/uploads/userimg">
                  <img src="/blog/Public/img/uploads/userimg/<?php echo ($vo["user_img"]); ?>" alt="点击修改图片">
                </div>
            </div>
          </div>
       </div>
      </div>
	</div>
		</form>
		<div >
		<button type="submit" class="btn btn-primary" id='updata'>确　定</button>
		</div>
         <!-- 切割上传 -->
<!-- 图片切割上传 -->
<link href="/blog/Public/img_cut_upload/css/cropper.min.css" rel="stylesheet">
<link href="/blog/Public/img_cut_upload/css/sitelogo.css" rel="stylesheet">
<script src="/blog/Public/img_cut_upload/js/cropper.min.js"></script>
<script src="/blog/Public/img_cut_upload/js/sitelogo.js"></script>
<div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-lg"  style="width:1000px;">
    <div class="modal-content">
      <form class="avatar-form" action="<?php echo U('User/postimg',array('id'=>$_SESSION['username']));?>" enctype="multipart/form-data" method="post">
        <div class="modal-header">
          <button class="close" data-dismiss="modal" type="button">&times;</button>
          <h4 class="modal-title" id="avatar-modal-label">用户头像</h4>
        </div>
        <div class="modal-body">
          <div class="avatar-body">
            <div class="avatar-upload">
              <input class="avatar-src" name="avatar_src" id="avatar_src" type="hidden">
              <input class="avatar-data" name="avatar_data" type="hidden">
              <label for="avatarInput">图片上传</label>
              <input class="avatar-input" id="avatarInput" name="avatar_file" type="file" style="display:none;"></div>
              <img src="/blog/Public/images/shangchuang.png" onclick="$('#avatarInput').click();">
            <div class="row">
              <div class="col-md-9">
                <div class="avatar-wrapper"></div>
              </div>
              <div class="col-md-3">
                <div class="avatar-preview preview-lg"></div>
                <div class="avatar-preview preview-md"></div>
                <div class="avatar-preview preview-sm"></div>
              </div>
            </div>
            <div class="row avatar-btns">
              <div class="col-md-9">
                <div class="btn-group">
                  <button class="btn" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees"><i class="fa fa-undo"></i> 向左旋转</button>
                </div>
                <div class="btn-group">
                  <button class="btn" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees"><i class="fa fa-repeat"></i> 向右旋转</button>
                </div>
              </div>
              <div class="col-md-3">
                <button class="btn btn-success btn-block avatar-save" type="submit"><i class="fa fa-save"></i> 保存修改</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
<!-- 图片切割上传 end -->
<!-- 切割上传 -->
                          <!---头像位置---->
                                    </div>
                                    
                                    <div class="col-md-12 contact_info">
                                       <!----->
                                       <!----->
                                    </div>

                                    <div class="col-md-12">    
                                       <!------>
                                       <!------>
                                    </div>
                              
                                </div> <!-- .contact_right -->

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
                    
                    | More Templates <a href="#" target="_blank" title="佛布朗博客">佛布朗斯基</a> - Collect from <a href="http://www.cssmoban.com/" title="佛布朗博客" target="_blank">佛布朗博客</a></p>
                </div>    
            </footer>  <!-- .row -->   

        </div> <!-- .container -->
    </div> <!-- .main-body -->   
</body>
<script type="text/javascript">
   function update(){
	  ////
	    //post请求//
		var data=$("#userform").serialize();
		$.post('<?php echo U("User/updateuser");?>',data,function(response){
             if(response.status=='1'){
               layer.msg('修改用户信息成功!');   
             }else if(response.status=='0'){
				 layer.msg('用户信息修该失败!');      
             }else if(response.status=='-1'){
				 layer.msg('用户没有修改任何信息!'); 
			 }
         }) ;
		//post请求//
	  ////
   }
</script>
</html>