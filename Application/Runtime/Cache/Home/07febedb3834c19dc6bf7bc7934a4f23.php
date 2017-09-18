<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/blog/Public/user/css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>佛布朗博客-密码修改</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700|Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
<!-- 导入外部样式 -->
<link rel="stylesheet" type="text/css" href="/blog/Public/css/style.css">
<link rel="stylesheet" type="text/css" href="/blog/Public/css/login.css">
<link rel="stylesheet" type="text/css" href="/blog/Public/layer/skin/layer.css">
<link rel="stylesheet" type="text/css" href="/blog/Public/zui/css/zui.css">
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
				<form method="post" id="setpwdform">
			         <div>
						<span><label>用户名</label></span>
						<span><label type="text" class="textbox" name="phone" id="phone"><?php echo ($_SESSION['phones']); ?></label></span>
					 </div>
					 <div>
						<span><label>密码</label></span>
					    <span><input type="password" class="password" name="userpwd" id="userpwd" placeholder="密码"></span>
					 </div>
                     <div>
						<span><label>确认密码</label></span>
					    <span><input type="password" class="password" name="userpwds" id="userpwds" placeholder="重复密码"></span>
					 </div>
					<div class="sign">
						<div class="submit">
						  <input type="button" onclick="onset()" value="提交" >
						</div>
						<span class="forget-pass">
							
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
       function onset(){
		   var password=$("#userpwd").val();
		   var passwords=$("#userpwds").val();
		   var vcode=/^[\@A-Za-z0-9]/;
		   if(password.length!=0){
			     if(passwords!=0){
					    if(!vcode.test(password)){
							layer.msg("亲，密码存在非法字符！");
						}else{
							 if(password==passwords){
								//
								window.location.href="<?php echo U('Home/Login/changepwd');?>";
								//
							 }else if(password!=passwords){
								 layer.msg("亲，两次密码不一致！");
							 }
						}
				 }else{
					layer.msg("亲，请输入二次密码！");
				 }
		   }else{
			   layer.msg("亲，请输入密码！");
		   }
	 }
</script>
</html>