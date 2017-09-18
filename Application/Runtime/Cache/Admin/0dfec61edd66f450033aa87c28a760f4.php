<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">  
	    <title>管理者登陆</title>
        <meta name="description" content="">
        <meta name="author" content="templatemo">  
	    <link href='http://fonts.useso.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
	    <link href="/blog/Public/admin/css/font-awesome.min.css" rel="stylesheet">
	    <link href="/blog/Public/admin/css/bootstrap.min.css" rel="stylesheet">
	    <link href="/blog/Public/admin/css/templatemo-style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/blog/Public/layer/skin/layer.css">
	    <script src="/blog/Public/js/jquery-1.11.3.min.js"></script>
        <script src="/blog/Public/layer/layer.js"></script>
	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body class="light-gray-bg">
		<div class="templatemo-content-widget templatemo-login-widget white-bg">
			<header class="text-center">
	          <div class="square"></div>
	          <h1>管理者登陆</h1>
	        </header>
	        <form  class="templatemo-login-form" method="post" id="loginform">
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>	        		
		              	<input type="text" class="form-control" name="username" id="username" placeholder="用户名">           
		          	</div>	
	        	</div>
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>	        		
		              	<input type="password" class="form-control" name="userpwd" id="userpwd" placeholder="密码">           
		          	</div>	
	        	</div>	          	
	          	<div class="form-group">
				    <div class="checkbox squaredTwo">
				        <input type="checkbox" id="c1" name="cc" />
						<label for="c1"><span></span>Remember me</label>
				    </div>				    
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-primary" onclick="dologin()">提交</button> 
				</div>
	        </form>
		</div>
        <div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
			<p>佛布朗博客<strong><a href="#" class="blue-text">Sign up now!</a></strong></p>
		</div>
      <!--
		<div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
			<p>Not a registered user yet? <strong><a href="#" class="blue-text">Sign up now!</a></strong></p>
		</div>
      -->
	</body>
 <script type="text/javascript">
     function dologin(){
		 var username=$("#username").val();
		 var userpwd=$("#userpwd").val();
		 if((username=="")||(userpwd=="")){
			 <!---->
	        layer.msg('亲，请输入用户名或密码!');
             <!---->
	     }else if((username!="")||(userpwd!="")){
			 <!-- 用户名与密码不为空 -->
			var data=$("#loginform").serialize();
			$.post('<?php echo U("Admin/Login/login");?>',data,function(response){
             if(response.status=='1'){
               layer.msg('亲，用户名或密码错误!');   
             }else if(response.status=='0'){
               //正确跳转到修改密码界面
               window.location.href="<?php echo U('Admin/Index/index');?>";
			   
               //               
             }
         }) ;
			 <!--  -->
		 }
	 }
</script>
</html>