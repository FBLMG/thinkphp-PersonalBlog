<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>佛布朗论坛 - 管理者</title>
<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
<link href="/blog/Public/admin/css/font-awesome.min.css" rel="stylesheet">
<link href="/blog/Public/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="/blog/Public/admin/css/templatemo-style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/blog/Public/layer/skin/layer.css">
<script src="/blog/Public/admin/js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
<script src="/blog/Public/admin/js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
<script src="https://www.google.com/jsapi"></script> <!-- Google Chart -->
<script type="text/javascript" src="/blog/Public/admin/js/templatemo-script.js"></script>
<script type="text/javascript" src="/blog/Public/js/bootstrap.min.js"></script>
<!--文本编辑器-->
<script type="text/javascript" src="/blog/Public/admin/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/blog/Public/admin/js/ueditor/ueditor.all.js"></script>
<!--文本编辑器-->
<script src="/blog/Public/layer/layer.js"></script>
</head>

<body>
<!----->
 <!-- Left column -->
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square">
          </div>
          <h1>
     <!-- **放入管理者名字** -->
    <a data-toggle="modal" data-target="#editpwd"><?php echo ($adminuser); ?></a>
     <!-- **放入管理者名字** -->
          </h1>
        </header>
        <div class="profile-photo-container">
     
      <img src="/blog/Public/admin/images/profile-photo.jpg" alt="Profile Photo" class="img-responsive" > 
           
          <div class="profile-photo-overlay"></div>
        </div>      
        <!-- Search box -->
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">          
          <ul>
            <li><a href="<?php echo U('Admin/Index/index');?>" class="active"><i class="fa fa-home fa-fw"></i>首页</a></li>
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
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-2" style="width:354px;height:269px;overflow:hidden;text-overflow:ellipsis;">
              <i class="fa fa-times"></i>
              <div class="square"></div>
              <h2 class="templatemo-inline-block">最新文章</h2><hr>
              <p>
                <!-- 放入评论数最多文章 -->
                <?php if(is_array($hostcontent)): $i = 0; $__LIST__ = $hostcontent;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["content"]); endforeach; endif; else: echo "" ;endif; ?>
                <!-- 放入评论数最多文章 -->
              </p>
              <p></p>              
            </div>
            <div class="templatemo-content-widget white-bg col-1 text-center">
              <i class="fa fa-times"></i>
              <h3 class="text-uppercase margin-bottom-10">最新上传图片</h3>
              <img src="/blog/Public/img/uploads/imgs/<?php echo ($imgaddress); ?>" alt="Bicycle" class="img-circle img-thumbnail" style="height:180px;width:180px;">
            <!-- 最新上传图片 -->
            <!-- 最新上传图片 -->
            </div>
            <div class="templatemo-content-widget white-bg col-1">
              <i class="fa fa-times"></i>
              <h3 class="text-uppercase">数据统计</h3><hr>
              <div class="progress">
                用户人数
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($usercount); ?>;"></div>
              </div>
              <div class="progress">
               留言数量
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($messcount); ?>;"></div>
              </div>
              <div class="progress">
              评论数量
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($pingluncount); ?>;"></div>
              </div>                          
            </div>
          </div>
          <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">              
              <div class="templatemo-content-widget orange-bg">
                <i class="fa fa-times"></i>                
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object img-circle" src="/blog/Public/admin/images/sunset.jpg" alt="Sunset">

                    </a>
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">最新评论</h2>
                    <p>
                      <!-- 放入最新评论 -->
                      <?php echo ($pl); ?>
                      <!-- 放入最新评论 -->
                    </p>  
                  </div>        
                </div>                
              </div>            
              <div class="templatemo-content-widget white-bg">
                <i class="fa fa-times"></i>
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object img-circle" src="/blog/Public/img/uploads/fileimg/<?php echo ($fileimg); ?>" alt="最新博客" width="64px" height="64px">
                    </a>
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">最新发表</h2>
                    <p>
                      <!-- 放入最新文章 -->
                      <span class="text-info" style="font-size:12px"><?php echo ($filetitle); ?></span>
                      <!-- 放入最新文章 -->
                    </p>  
                  </div>
                </div>                
              </div>            
            </div>
            <div class="col-1">
              <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                <i class="fa fa-times"></i>
                <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">最近登陆用户</h2></div>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <td>No.</td>
                        <td>用户名</td>
                        <td>状态</td>
                        <td>登陆时间</td>
                      </tr>
                    </thead>
                  <!---循环读取用户--->
                <?php if(is_array($users)): foreach($users as $key=>$user): ?><tbody>
                      <tr>
                        <td><?php echo ($key+1); ?>.</td>
                        <td><?php echo ($user["username"]); ?></td>
                       <!--判断用户状态--->
                       <?php if($user["status"] == 0 ): ?><td>自由评论</td>
                       <?php else: ?><td>禁言状态</td><?php endif; ?>
                        <!--判断用户状态--->
                        <td><?php echo ($user["lasttime"]); ?></td>
                      </tr>         
                    </tbody><?php endforeach; endif; ?>
                  <!---循环读取用户--->
                  </table>    
                </div>                          
              </div>
            </div>           
          </div> <!-- Second row ends -->
          <div class="copyrights">Collect from <a href="#" >佛布朗博客</a></div>
          <div class="templatemo-flex-row flex-content-row templatemo-overflow-hidden"> <!-- overflow hidden for iPad mini landscape view-->
            <div class="col-1 templatemo-overflow-hidden">
              <div class="templatemo-content-widget white-bg templatemo-overflow-hidden">
                <i class="fa fa-times"></i>
                <div class="templatemo-flex-row flex-content-row"> 
                  <div class="col-1 col-lg-6 col-md-12" style="height:550px;">
                    <h2 class="text-center">留言列表<span class="badge">new</span></h2>
                    <div id="bar_chart_div" class="templatemo-chart"><br/><br/>
              <!-- 放入评论列表 -->
                  <?php if(is_array($data)): foreach($data as $key=>$data): if($data["isreme"] == 1): ?><ul class="list-group">
             <li class="list-group-item">
                <span class="badge" data-toggle="modal" data-target="#myModal">
                   已回复
                </span>
                  用户：<?php echo ($data["username"]); ?>&nbsp;&nbsp;于<?php echo ($data["publishtime"]); ?>留言：<?php echo ($data["messagecontent"]); ?>
                   <input type="hidden" value="<?php echo ($data["id"]); ?>" id="mid" />
                   <input type="hidden" value="<?php echo ($data["uid"]); ?>" id="muid" />
             </li>
          </ul>
      <?php else: ?>
          <ul class="list-group">
             <li class="list-group-item">
                <span class="badge" data-toggle="modal" data-target="#myModal">
                   未回复
                </span>
                  用户：<?php echo ($data["username"]); ?>&nbsp;&nbsp;于<?php echo ($data["publishtime"]); ?>留言：<?php echo ($data["messagecontent"]); ?>
                   <input type="hidden" value="<?php echo ($data["id"]); ?>" id="mid" />
                   <input type="hidden" value="<?php echo ($data["uid"]); ?>" id="muid" />
             </li>
          </ul><?php endif; endforeach; endif; ?>
              <!-- 放入评论列表 -->
                    </div> <!-- Bar chart div -->
                  </div>     
                  </div>    
    <!-- 分页 -->       
       <div class="clearfix"></div>
            <div class="text-center"><?php echo ($page); ?></div>
       </div> 
    <!-- 分页 --> 
            </div>  
              </div>
          </div>
          <footer class="text-right">
            <p>Copyright &copy; 2016 Company Name 
            | More Templates <a href="#" target="_blank" title="佛布朗博客">佛布朗博客</a> - Collect from <a href="#" title="佛布朗博客" target="_blank">佛布朗博客</a></p>
          </footer>         
        </div>
      </div>
    </div>
<!------>
<!---动态模态框--->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">回复留言</h4>
      </div>
   <form role="form" method="post" action="<?php echo U('Index/returnmessage');?>">    
      <div class="modal-body">
        <!------->  
         <div class="form-group">
           <label for="">回复内容</label>
           <textarea id="content" name="content"></textarea>    
         </div> 
        <!------->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="sumbit" class="btn btn-primary" onclick="hf()">回复</button>
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
<!---编辑器-->
<script type="text/javascript">
          var ue = UE.getEditor('content',{
            elementPathEnabled :false,
            autoHeightEnabled: false,
			"initialFrameWidth" :570,
            "initialFrameHeight" : 300
        });  
</script>
    <!---编辑器--->
</body>
<script type="text/javascript">
                var uid=$("#muid").val();
				var mid=$("#mid").val();
                var ajaxSidUrl='<?php echo U("Index/ms");?>'; 
				$.ajax({
                       //提交数据的类型 POST GET
                       type: "POST",
                       //提交的网址
                       url: ajaxSidUrl,
                       //提交的数据
                       data: {uid:uid,mid:mid},
                       //返回数据的格式
                       datatype: "json",
                      //成功返回之后调用的函数
                       success: function (data) {
                      ////根据ajax返回参数判断验证码发送情况
                       if(data['status']=="0"){  
                       }
                      ////根据ajax返回参数判断验证码发送情况
                    }
               });
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
</html>>>>>