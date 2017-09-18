<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>佛布朗论坛 -博客修改</title>
<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
<link href="/blog/Public/admin/css/font-awesome.min.css" rel="stylesheet">
<link href="/blog/Public/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="/blog/Public/admin/css/templatemo-style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/blog/Public/layer/skin/layer.css">
<!--文本编辑器-->
<script type="text/javascript" src="/blog/Public/admin/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/blog/Public/admin/js/ueditor/ueditor.all.js"></script>
<script src="/blog/Public/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/blog/Public/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/blog/Public/layer/skin/layer.css">
<script type="text/javascript" src="/blog/Public/layer/layer.js"></script>
<!--文本编辑器-->
</head>

<body>
<!----->
 <!-- Left column -->
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square"></div>
          <h1>
            <!-- **放入管理者名字** -->
             <a data-toggle="modal" data-target="#editpwd"><?php echo ($adminuser); ?></a>
            <!-- **放入管理者名字** -->
          </h1>
        </header>
        <div class="profile-photo-container">
          <img src="/blog/Public/admin/images/profile-photo.jpg" alt="Profile Photo" class="img-responsive">
          <div class="profile-photo-overlay"></div>
        </div>
        <!-- Search box -->
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
          </div>
        <nav class="templatemo-left-nav">
          <ul>
            <li><a href="<?php echo U('Admin/Index/index');?>"><i class="fa fa-home fa-fw"></i>首页</a></li>
            <li><a href="<?php echo U('Admin/Post/post');?>"><i class="fa fa-bar-chart fa-fw"></i>发表</a></li>
            <li><a href="<?php echo U('Admin/Filemannger/files');?>"><i class="fa fa-database fa-fw"></i>博客管理</a></li>
            <li><a href="<?php echo U('Admin/Message/index');?>"><i class="fa fa-map-marker fa-fw"></i>留言管理</a></li>
            <li><a href="<?php echo U('Admin/Usermanger/user');?>"><i class="fa fa-users fa-fw"></i>用户管理</a></li>
            <li><a href="<?php echo U('Admin/Images/postimge');?>"><i class="fa fa-sliders fa-fw"></i>图片管理</a></li>
            <li><a href="<?php echo U('Admin/Login/doout');?>"><i class="fa fa-eject fa-fw"></i>退出</a></li>
          </ul>
        </nav>
      </div>
      <!-- Main content -->
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
             <!-- 插入时间，欢迎标语 -->
             <span class="text-muted">欢迎使用管理者端</span>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <span class="text-success">北京时间：<?php echo ($systemtime); ?></span>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <span style="float: right;" class="text-danger">登陆时间：<?php echo ($lasttime); ?></span>
            <!--  -->
            </nav>
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">文章修改</h2>
            <!---图片区域---->
             <form class="imgesform" enctype="multipart/form-data" method="post" id="filesform">
                 <div class="form-group">
                   <label for="exampleInputEmail1" class="text-primary">标题</label>
                   <input type="text" class="form-control" id="title" name="title" value="<?php echo ($result["title"]); ?>">
                 </div>
                 <br/>
                 <div class="form-group">
                   <label for="exampleInputEmail1" class="text-primary">摘要</label>
                   <input type="text" class="form-control" id="abstract" name="abstract" value="<?php echo ($result["abstract"]); ?>">
                 </div>
                 <br/>
                 <div class="form-group">
                   <label for="" class="text-primary">类型</label>
                    <select class="form-control" id="typeid" name="typeid" style="width:200px;">
                  <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($result['typeid'] == $vo['id']){ $sel="selected='selected'"; }else{ $sel=""; } ?>
                     <option <?php echo ($sel); ?> value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                 </div>
                 <br/>
                 <div class="form-group" style="height:150px;">
                   <label for="exampleInputEmail1" class="text-primary">封面</label>
                   <!---封面图片---->
                   <div class="ibox-content">
                      <div class="row">
                         <div id="crop-avatar" class="col-md-6">
                          <div class="avatar-view" style="width:150px;height:150px" title="点击修改图片">
                            <input  id="img" name="img" type="hidden" value="<?php echo ($vo["img"]); ?>">
                            <input  id="aspectRatio" type="hidden" value="1">
                            <input  id="img_root_url" type="hidden" value="/blog/Public/img/uploads/fileimg">
                            <img src="/blog/Public/img/uploads/fileimg/<?php echo ($result["img"]); ?>" alt="点击修改图片" style="width:150px;height:150px">
                          </div>
                         </div>
                    </div>
                  </div>
                   <!---封面图片---->
                 </div>
                 <br/>
                 <div class="form-group">
                   <label for="exampleInputEmail1" class="text-primary">内容</label>
                   <textarea id="content" name="content"><?php echo ($result["content"]); ?></textarea>      
                 </div>
                 <br/>   
            <!---按钮-->
                 <div class="input-group">
                     <button type="button" class="btn btn-default btn-success" onclick="edit()">修改</button>
                 </div>
            <!---按钮--> 
             </form>
            <!----图片区域--->
          </div>
          <footer class="text-right">
             <p>Copyright &copy; 2016 Company Name 
            | More Templates <a href="#" target="_blank" title="佛布朗博客">佛布朗博客</a> - Collect from <a href="#" title="佛布朗博客" target="_blank">佛布朗博客</a></p>
          </footer>
        </div>
      </div>
    </div>
<!----->
<!---密码-->
<div class="modal fade" id="editpwd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">密码修改</h4>
      </div>
<form method="post">
      <div class="modal-body">
         <div class="form-group">
          <label for="exampleInputPassword1">密码</label>
          <input type="password" class="form-control" id="pwd" name="pwd" placeholder="密码">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" onclick="changepwd()">保存</button>
      </div>
</form>
    </div>
  </div>
</div>
<!---密码-->
<!---切割图片--->
<link href="/blog/Public/img_cut_upload/css/cropper.min.css" rel="stylesheet">
<link href="/blog/Public/img_cut_upload/css/sitelogo.css" rel="stylesheet">
<script src="/blog/Public/img_cut_upload/js/cropper.min.js"></script>
<script src="/blog/Public/img_cut_upload/js/sitelogo.js"></script>
<div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-lg"  style="width:1000px;">
    <div class="modal-content">
      <form class="avatar-form" action="<?php echo U('Filemannger/updateimg',array('id'=>$fid));?>" enctype="multipart/form-data" method="post">
        <div class="modal-header">
          <button class="close" data-dismiss="modal" type="button">&times;</button>
          <h4 class="modal-title" id="avatar-modal-label">文章封面</h4>
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
<!---切割图片--->
<!---编辑器-->
 <script type="text/javascript">
          var ue = UE.getEditor('content',{
            elementPathEnabled :false,
            autoHeightEnabled: false,
			"initialFrameWidth" : 700,
            "initialFrameHeight" : 250
        });  
</script>
<!---编辑器--->
<!----->
</body>
<script type="text/javascript">
      function edit(){
        var data=$("#filesform").serialize();
		$.post('<?php echo U("Filemannger/edit");?>',data,function(response){
             if(response.status=='1'){
               layer.msg('修改成功!');   
             }else if(response.status=='-1'){
				 layer.msg('修改失败!');      
             }else{
				 layer.msg(response.status);  
			 }
         }) ;
}
</script>
<script type="text/javascript">
   function changepwd(){
	   var pwd=$('#pwd').val();
	   var ajaxSidUrl='<?php echo U("Index/savepwd");?>'; 
	   $.ajax({
            //提交数据的类型 POST GET
            type: "POST",
           //提交的网址
           url: ajaxSidUrl,
           //提交的数据
          data: {pwd:pwd},
           //返回数据的格式
          datatype: "json",
          //成功返回之后调用的函数
          success: function (data) {
          ////根据ajax返回参数判断验证码发送情况
          if(data['status']=="1"){  
            layer.msg('修改密码成功');
			window.location.reload();
         }else if(data['status']=="2"){
			layer.msg('原密码与旧密码相同');
			window.location.reload();
		 }else{
			layer.msg('修改密码失败');
			window.location.reload();
		 }
		  }
      });
   }
</script>
</html>>>>>>>>>>>>>>>>>