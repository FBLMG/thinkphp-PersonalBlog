<?php if (!defined('THINK_PATH')) exit();?><!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/blog/Public/user/css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700|Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
<!-- 导入外部样式 -->
<link rel="stylesheet" type="text/css" href="/blog/Public/css/style.css">
<link rel="stylesheet" type="text/css" href="/blog/Public/css/login.css">
<link rel="stylesheet" type="text/css" href="/blog/Public/layer/skin/layer.css">
<link rel="stylesheet" type="text/css" href="/blog/Public/zui/css/zui.css">
<link rel="stylesheet" type="text/css" href="/blog/Public/layer/skin/layer.css">
<link rel="stylesheet" type="text/css" href="/blog/Public/zui/css/zui.css">
<title>佛布朗博客-登陆</title>
<script src="/blog/Public/js/jquery-1.11.3.min.js"></script>
<script src="/blog/Public/layer/layer.js"></script>
<!-- 导入外部样式 -->
</head>
 
<body background="/blog/Public/user/images/bg.jpg">
	<div class="main">
		<div class="user">
			<img src="/blog/Public/user/images/user.png" alt="">
		</div>
		<div class="login">
			<div class="inset">
				<!-----start-main---->
				<form method="post" id="loginform">
			         <div>
						<span><label>用户名</label></span>
						<span><input type="text" class="textbox" id="active" name="username" id="username" placeholder="用户名"></span>
					 </div>
					 <div>
						<span><label>密码</label></span>
					    <span><input type="password" class="password" name="userpwd" id="userpwd" placeholder="密码"></span>
					 </div>
					<div class="sign">
						<div class="submit">
						  <input type="button" onclick="dologin()" value="提交">
						</div>
                        <div class="submit">
						  <input type="button" onclick="window.location.href='<?php echo U('Home/Login/register');?>'" value="注册">
						</div>
						<span class="forget-pass">
							<a href="<?php echo U('Home/Login/getpwd');?>">忘记密码?</a>
						</span>
							<div class="clear"> </div>
					</div>
					</form>
				</div>
			</div>
		<!-----//end-main---->
		</div>
		 <!-----start-copyright---->
   					<div class="copy-right">
						<p>佛布朗博客<a href="<?php echo U('Home/Index/index');?>">首页</a></p> 
					</div>
				<!-----//end-copyright---->
	 
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
			$.post('<?php echo U("Login/dologin");?>',data,function(response){
             if(response.status=='1'){
               layer.msg('亲，用户名或密码错误!');   
             }else if(response.status=='0'){
               //正确跳转到修改密码界面
               window.location.href="<?php echo U('Home/Index/index');?>";
			   
               //               
             }
         }) ;
			 <!--  -->
		 }
	 }
</script>
</html>