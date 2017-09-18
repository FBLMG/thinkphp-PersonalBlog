<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>佛布朗论坛-用户管理</title>
<!---引用样式---->
<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
<link href="/blog/Public/admin/css/font-awesome.min.css" rel="stylesheet">
<link href="/blog/Public/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="/blog/Public/admin/css/templatemo-style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/blog/Public/layer/skin/layer.css">
<script type="text/javascript" src="/blog/Public/admin/js/templatemo-script.js"></script> 
<script type="text/javascript" src="/blog/Public/admin/js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
<script type="text/javascript" src="/blog/Public/admin/js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script> <!-- Google Chart -->
<script type="text/javascript" src="/blog/Public/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/blog/Public/layer/skin/layer.css">
<script type="text/javascript" src="/blog/Public/layer/layer.js"></script>
<!---引用样式---->
</head>

<body>
<!------>
<!------>
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
            <li><a href="<?php echo U('Admin/Usermanger/user');?>" class="active"><i class="fa fa-users fa-fw"></i>用户管理</a></li>
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
            <h2 class="margin-bottom-10">用户管理
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">添加用户
               </button> 
            </h2>
            <div class="panel panel-default no-border">
              <div class="panel-heading border-radius-10">
                <h2>   
                </h2> 
              </div>
              <!---放入用户--->
                <table class="table table-hover">
                  <tr>
                    <td>用户名</td>
                    <td>用户级别</td>
                    <td>最近登陆时间</td>
                    <td>状态</td>
                    <td>操作</td>
                  </tr>
                <?php if(is_array($users)): foreach($users as $key=>$user): ?><tr>
                       <td><?php echo ($user["username"]); ?></td>
                   <!------>
                     <?php if($user["state"] == 1 ): ?><td>普通用户</td>
                     <?php else: ?><td>管理员</td><?php endif; ?>
                   <!------>
                       <td><?php echo ($user["lasttime"]); ?></td>
                    <!---判断用户状态--->
                    <?php if($user["status"] == 0 ): ?><td>
                         自由发表
                       </td>
                    <?php else: ?>
                       <td>
                        已被禁言
                       </td><?php endif; ?>
                    <!---判断用户状态--->
                    <td>
                       <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo U('Usermanger/jy','','');?>/id/<?php echo ($user["uid"]); ?>'">禁言</button>
                       <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo U('Usermanger/fy','','');?>/id/<?php echo ($user["uid"]); ?>'">发言</button>
                       <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo U('Usermanger/deluser','','');?>/id/<?php echo ($user["uid"]); ?>'">删除</button>
                        <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo U('Usermanger/update','','');?>/id/<?php echo ($user["uid"]); ?>'">编辑</button>
                    </td>
                    </tr><?php endforeach; endif; ?>
                </table>
                
                <!---放入用户--->
                <!-- 页数 -->
              <div class="clearfix"></div>
                 <div class="text-center"><?php echo ($page); ?></div>
              </div>
                <!-- 页数 -->  
            <!-----准备删除---->
      
            <!----准备删除----->          
          </div>
          <footer class="text-right">
            <p>Copyright &copy; 2016 Company Name 
            | More Templates <a href="#" target="_blank" title="佛布朗博客">佛布朗博客</a> - Collect from <a href="#" title="佛布朗博客" target="_blank">佛布朗博客</a></p>
          </footer>         
        </div>
      </div>
    </div>
<!---动态模态框--->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">用户添加</h4>
      </div>
   <form role="form" method="post" action="<?php echo U('Usermanger/adduser');?>">    
      <div class="modal-body">
        <!------->  
         <div class="form-group">
           <label for="">用户名</label>
           <input type="text" class="form-control" id="user" name="user" placeholder="用户名">
         </div>
         <div class="form-group">
           <label for="">密码</label>
           <input type="password" class="form-control" id="password" name="password" placeholder="密码">
         </div> 
         <div>
            <label for="">用户级别</label>
            <select class="form-control" id="status" name="status">
              <option value="1">普通用户</option>
              <option value="0">博主</option>
            </select>
         </div>
        <!------->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="sumbit" class="btn btn-primary">添加</button>
      </div>
     </form>
    </div>
  </div>
</div>
<!---动态模态框--->
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
</body>
</html>
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