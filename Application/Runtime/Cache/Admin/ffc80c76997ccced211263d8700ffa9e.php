<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>佛布朗论坛 -图片上传</title>
<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
<link href="/blog/Public/admin/css/font-awesome.min.css" rel="stylesheet">
<link href="/blog/Public/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="/blog/Public/admin/css/templatemo-style.css" rel="stylesheet">
<script type="text/javascript" src="/blog/Public/admin/js/templatemo-script.js"></script> 
<script type="text/javascript" src="/blog/Public/admin/js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
<script type="text/javascript" src="/blog/Public/admin/js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script> <!-- Google Chart -->
<script type="text/javascript" src="/blog/Public/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/blog/Public/layer/skin/layer.css">
<script type="text/javascript" src="/blog/Public/layer/layer.js"></script>
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
            <li><a href="<?php echo U('Admin/Images/postimge');?>"  class="active"><i class="fa fa-sliders fa-fw"></i>图片管理</a></li>
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
            <h2 class="margin-bottom-10">图片管理
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
               新增类型
            </button>
            <button type="button" class="btn btn-default btn-info" onclick="imgmanger()" style="width:80px;height:32px;border-radius:0px;">图片管理</button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edittype" style="width:80px;height:32px;border-radius:0px;">修改类型</button>
            </h2>  
            <p>请上传图片.</p>
            <!---图片区域---->
             <form class="imgesform" action="<?php echo U('Images/dopostimg');?>" enctype="multipart/form-data" method="post">
             <!--图片标签-->
                 <div class="input-group">
                   <span class="input-group-addon">标签</span>
                   <input type="text" class="form-control" placeholder="图片标签" id="title" name="title">
                 </div>
             <!--图片标签-->
                 <br/>
             <!--图片类型-->
                 <div class="input-group">
                   <span class="input-group-addon">图片类型</span>
                   <select name="section" id="section" class="form-control">
                        <?php foreach($type as $k=>$v):?>
                            <option value="<?php echo ($v["type"]); ?>" ><?php echo ($v["type"]); ?></option>
                        <?php endforeach;?>
                    </select>
                 </div>
              <!--图片类型-->
                 <br/>
              <!--上传图片-->
                 <div class="input-group">
                   <span class="input-group-addon">请选择图片</span>
                   <input class="form-control" id="avatarInput" name="avatar_file" type="file">
                 </div>
              <!--上传图片-->
                 <br/>
              <!--按钮-->
                 <div class="input-group">
                     <button type="submit" class="btn btn-default btn-success">上传</button>
                 </div>
              <!--按钮-->
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
<!---新增图片类型--->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>       </button>
        <h4 class="modal-title" id="myModalLabel">新增图片类型</h4>
      </div>
   <form role="form" action="<?php echo U('Images/addtype');?>" method="post">    
      <div class="modal-body">    
           <div class="form-group">
           <label for="">图片类型</label>
           <input type="text" class="form-control" id="imagetype" name="imagetype" placeholder="图片类型">
           </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
          <button type="submit" class="btn btn-primary">确定</button>
      </div>
   </form>
    </div>
  </div>
</div>
<!---新增图片类型--->
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
<!---->
<div class="modal fade" id="edittype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">类型修改</h4>
      </div>
     <!--内容区--->
   <form method="post" id="edittype" name="edittype">
      <div class="modal-body">
        <!------>
        <div class="input-group">
         <span class="input-group-addon">原类型</span>
         <select name="oldtype" id="oldtype" class="form-control">
                        <?php foreach($type as $k=>$v):?>
                            <option value="<?php echo ($v["id"]); ?>" ><?php echo ($v["type"]); ?></option>
                        <?php endforeach;?>
         </select>
        </div>
        <br/><br/>
        <div class="input-group">
         <span class="input-group-addon">新类型</span>
         <input type="text" class="form-control" id="newtype" name="newtype" placeholder="新名称">
        </div>
        <!------>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="deletetype()">删除</button>
        <button type="button" class="btn btn-primary" onclick="editype()">修改</button>
      </div>
   </form>
     <!--内容区--->
    </div>
  </div>
</div>
<!---->
</body>
<script type="text/javascript">  
   function imgmanger(){
	    window.location.href="<?php echo U('Images/imgmanger');?>";
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
   ////修改图片类型
   function editype(){
	   var id=$('#oldtype').val();
	   var newtype=$('#newtype').val();
	   if(newtype==''){
		   layer.msg('输入类型不允许为空!');
		   return false;
	   }
	   var ajaxSidUrl='<?php echo U("Images/edittyp");?>'; 
	   /**/
	   $.ajax({
           //提交数据的类型 POST GET
          type: "POST",
           //提交的网址
          url: ajaxSidUrl,
           //提交的数据
          data: {id:id,type:newtype},
           //返回数据的格式
          datatype: "json",
          //成功返回之后调用的函数
          success: function (data) {
          ////根据ajax返回参数判断验证码发送情况
          if(data['status']=="1"){  
            layer.msg('修改成功！');
			window.location.reload();
          }else if(data['status']=="-2"){
			layer.msg('已存在相同类型！');
		  }else{
			layer.msg('修改失败！');
			window.location.reload();
		  }
		 }
      });
	   /**/
   }
   ////删除图片类型
  function deletetype(){
	  var id=$('#oldtype').val();
	  var ajaxSidUrl='<?php echo U("Images/deletetype");?>'; 
	  ////
	  $.ajax({
           //提交数据的类型 POST GET
          type: "POST",
           //提交的网址
          url: ajaxSidUrl,
           //提交的数据
          data: {id:id},
           //返回数据的格式
          datatype: "json",
          //成功返回之后调用的函数
          success: function (data) {
          ////根据ajax返回参数判断验证码发送情况
          if(data['status']=="1"){  
            layer.msg('删除成功！');
			window.location.reload();
          }else{
			layer.msg('删除失败！');
			window.location.reload();
		  }
		 }
      });
	  ////
  }
</script>
</html>