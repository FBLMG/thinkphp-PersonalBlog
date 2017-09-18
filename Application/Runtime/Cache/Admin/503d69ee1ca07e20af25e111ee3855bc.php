<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>佛布朗论坛 - 地图</title>
<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
<link href="/blog/Public/admin/css/font-awesome.min.css" rel="stylesheet">
<link href="/blog/Public/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="/blog/Public/admin/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" /> 
<link href="/blog/Public/admin/css/templatemo-style.css" rel="stylesheet">
<script type="text/javascript" src="/blog/Public/admin/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/blog/Public/admin/js/ueditor/ueditor.all.js"></script>
<script src="/blog/Public/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/blog/Public/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/blog/Public/layer/skin/layer.css">
<script type="text/javascript" src="/blog/Public/layer/layer.js"></script>
</head>
<!---->
 <!-- Left column -->
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square"></div>
          <h1>
            <!-- 放入用户名 -->
              <a data-toggle="modal" data-target="#editpwd"><?php echo ($adminuser); ?></a>
            <!-- 放入用户名 -->
          </h1>
        </header>
        <div class="profile-photo-container">
          <img src="/blog/Public/admin/images/profile-photo.jpg" alt="Profile Photo" class="img-responsive">  
          <div class="profile-photo-overlay"></div>
        </div>      
        <!-- Search box -->
        <form class="templatemo-search-form" role="search">
        </form>
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
          </div>
        <nav class="templatemo-left-nav">          
          <ul>
            <li><a href="<?php echo U('Admin/Index/index');?>"><i class="fa fa-home fa-fw"></i>首页</a></li>
            <li><a href="<?php echo U('Admin/Post/post');?>"><i class="fa fa-bar-chart fa-fw"></i>发表</a></li>
            <li><a href="<?php echo U('Admin/Filemannger/files');?>"><i class="fa fa-database fa-fw"></i>博客管理</a></li>
            <li><a href="<?php echo U('Admin/Map/map');?>"  class="active"><i class="fa fa-map-marker fa-fw"></i>地图</a></li>
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
            <h2 class="margin-bottom-10">世界地图</h2>
            <p class="margin-bottom-0">此插件提供方 <a href="http://jqvmap.com" target="_parent">JQVMap</a>.</p>              
          </div>
          <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">              
              <div class="panel panel-default margin-10">
                <div class="panel-heading"><h2>世界</h2></div>
                <div class="panel-body">
                  <div id="vmap_world" class="vmap"></div>
                </div>                
              </div>
            </div> 
            <div class="col-1">              
              <div class="panel panel-default margin-10">
                <div class="panel-heading"><h2>非洲</h2></div>
                <div class="panel-body">
                  <div id="vmap_africa" class="vmap"></div>
                </div>                
              </div>
            </div>                                 
          </div>   
          <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">              
              <div class="panel panel-default margin-10">
                <div class="panel-heading"><h2>亚洲</h2></div>
                <div class="panel-body">
                  <div id="vmap_asia" class="vmap"></div>
                </div>                
              </div>
            </div> 
            <div class="col-1">              
              <div class="panel panel-default margin-10">
                <div class="panel-heading"><h2>大洋洲</h2></div>
                <div class="panel-body">
                  <div id="vmap_australia" class="vmap"></div>
                </div>                
              </div>
            </div>                                 
          </div>    
          <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">              
              <div class="panel panel-default margin-10">
                <div class="panel-heading"><h2>欧洲</h2></div>
                <div class="panel-body">
                  <div id="vmap_europe" class="vmap"></div>
                </div>                
              </div>
            </div> 
            <!--  -->
            <div class="col-1">              
              <div class="panel panel-default margin-10">
                <div class="panel-heading"><h2>南美洲</h2></div>
                <div class="panel-body">
                  <div id="vmap_southamerica" class="vmap"></div>
                </div>                
              </div>
            </div> 
          <!--  -->
          </div>    
          <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">              
              <div class="panel panel-default margin-10">
                <div class="panel-heading"><h2>北美洲</h2></div>
                <div class="panel-body">
                  <div id="vmap_northamerica" class="vmap"></div>
                </div>                
              </div>
            </div> 
            <div class="col-1">              
              
            </div>   
          </div>    
          <footer class="text-right">
            <p>Copyright &copy; 2016 Company Name 
            | More Templates <a href="#" target="_blank" title="佛布朗博客">佛布朗博客</a> - Collect from <a href="#" title="佛布朗博客" target="_blank">佛布朗博客</a></p>
          </footer>         
        </div>
      </div>
    </div>
<!---->
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
<!------->
 <!-- JS -->
    <script type="text/javascript" src="/blog/Public/admin/js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script type="text/javascript" src="/blog/Public/admin/js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
    <script type="text/javascript" src="/blog/Public/admin/js/templatemo-script.js"></script>      <!-- Templatemo Script -->
    <script type="text/javascript" src="/blog/Public/admin/jqvmap/jquery.vmap.js"></script>
    <script type="text/javascript" src="/blog/Public/admin/jqvmap/maps/jquery.vmap.world.js"></script>
    <script type="text/javascript" src="/blog/Public/admin/jqvmap/data/jquery.vmap.sampledata.js"></script>
    <script src="/blog/Public/admin/jqvmap/maps/continents/jquery.vmap.africa.js" type="text/javascript"></script>
    <script src="/blog/Public/admin/jqvmap/maps/continents/jquery.vmap.asia.js" type="text/javascript"></script>
    <script src="/blog/Public/admin/jqvmap/maps/continents/jquery.vmap.australia.js" type="text/javascript"></script>
    <script src="/blog/Public/admin/jqvmap/maps/continents/jquery.vmap.europe.js" type="text/javascript"></script>
    <script src="/blog/Public/admin/jqvmap/maps/continents/jquery.vmap.north-america.js" type="text/javascript"></script>
    <script src="/blog/Public/admin/jqvmap/maps/continents/jquery.vmap.south-america.js" type="text/javascript"></script>
    <script type="text/javascript">
      
      function drawMaps(){
        $('#vmap_world').vectorMap({
          map: 'world_en',
          backgroundColor: '#ffffff',
          color: '#333',
          hoverOpacity: 0.7,
          selectedColor: '#666666',
          enableZoom: true,
          showTooltip: true,
          values: sample_data,
          scaleColors: ['#C8EEFF', '#006491'],
          normalizeFunction: 'polynomial'
        });
        $('#vmap_africa').vectorMap({
          map: 'africa_en',
          backgroundColor: '#ffffff',
          color: '#333333',
          hoverOpacity: 0.7,
          selectedColor: '#666666',
          enableZoom: true,
          showTooltip: true,
          values: sample_data,
          scaleColors: ['#C8EEFF', '#006491'],
          normalizeFunction: 'polynomial'
        }); 
        $('#vmap_asia').vectorMap({
          map: 'asia_en',
          backgroundColor: '#ffffff',
          color: '#333333',
          hoverOpacity: 0.7,
          selectedColor: '#666666',
          enableZoom: true,
          showTooltip: true,
          values: sample_data,
          scaleColors: ['#C8EEFF', '#006491'],
          normalizeFunction: 'polynomial'
        });
        $('#vmap_australia').vectorMap({
          map: 'australia_en',
          backgroundColor: '#ffffff',
          color: '#333333',
          hoverOpacity: 0.7,
          selectedColor: '#666666',
          enableZoom: true,
          showTooltip: true,
          values: sample_data,
          scaleColors: ['#C8EEFF', '#006491'],
          normalizeFunction: 'polynomial'
        });
        $('#vmap_europe').vectorMap({
          map: 'europe_en',
          backgroundColor: '#ffffff',
          color: '#333333',
          hoverOpacity: 0.7,
          selectedColor: '#666666',
          enableZoom: true,
          showTooltip: true,
          values: sample_data,
          scaleColors: ['#C8EEFF', '#006491'],
          normalizeFunction: 'polynomial'
        });
        $('#vmap_northamerica').vectorMap({
          map: 'north-america_en',
          backgroundColor: '#ffffff',
          color: '#333333',
          hoverOpacity: 0.7,
          selectedColor: '#666666',
          enableZoom: true,
          showTooltip: true,
          values: sample_data,
          scaleColors: ['#C8EEFF', '#006491'],
          normalizeFunction: 'polynomial'
        });
        $('#vmap_southamerica').vectorMap({
          map: 'south-america_en',
          backgroundColor: '#ffffff',
          color: '#333333',
          hoverOpacity: 0.7,
          selectedColor: '#666666',
          enableZoom: true,
          showTooltip: true,
          values: sample_data,
          scaleColors: ['#C8EEFF', '#006491'],
          normalizeFunction: 'polynomial'
        }); 
      } // end function drawMaps

      $(document).ready(function() {

        if($.browser.mozilla) {
          //refresh page on browser resize
          // http://www.sitepoint.com/jquery-refresh-page-browser-resize/
          $(window).bind('resize', function(e)
          {
            if (window.RT) clearTimeout(window.RT);
            window.RT = setTimeout(function()
            {
              this.location.reload(false); /* false to get page from cache */
            }, 200);
          });      
        } else {
          $(window).resize(function(){
            drawMaps();
          });  
        }
        
        drawMaps();

      });
    </script>
<!------->
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
<body>
</body>
</html>