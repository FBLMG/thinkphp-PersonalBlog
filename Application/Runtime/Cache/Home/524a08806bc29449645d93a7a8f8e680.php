<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/blog/Public/user/css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>佛布朗帮助中心——注册</title>
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
				<form method="post" id="regform">
			         <div>
						<span><label>用户名</label></span>
						<span><input type="text" class="textbox" name="username" id="username" placeholder="用户名"></span>
					 </div>
					 <div>
						<span><label>密码</label></span>
					    <span><input type="password" class="password" name="userpwd" id="userpwd" placeholder="密码"></span>
					 </div>
                     <div>
						<span><label>确认密码</label></span>
					    <span><input type="password" class="password" name="userpwds" id="userpwds" placeholder="确认密码"></span>
					 </div>
                     <div>
						<span><label>手机号</label></span>
						<span><input type="text" class="textbox"  name="phone" id="phone" placeholder="手机号"></span>
					 </div>
                     <div>
						<span><label>验证码</label></span>
						<span><input type="text" class="textbox"  name="code" id="code" placeholder="验证码"></span>
					 </div>
					<div class="sign">
						<div class="submit">
						  <input type="button" onclick="getcode()" id="send" value="验证码">
						</div>
                        <div class="submit">
						  <input type="button" onclick="onsend()" value="提交" >
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
    function getcode(){
		var myreg=/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
		var phone=$("#phone").val();
		if(phone==""){
			layer.msg("亲，请输手机号码！");
		}else if(phone!=""){
			  if(phone.length==11){
				   if(!myreg.test(phone)){
					   layer.msg("亲，手机格式不正确！");
				   }else{
			/*******/
			    var ajaxSidUrl='<?php echo U("Code/sendcode");?>'; 
				$.ajax({
                       //提交数据的类型 POST GET
                       type: "POST",
                       //提交的网址
                       url: ajaxSidUrl,
                       //提交的数据
                       data: {phone: phone},
                       //返回数据的格式
                       datatype: "json",
                      //成功返回之后调用的函数
                       success: function (data) {
                      ////根据ajax返回参数判断验证码发送情况
                       if(data['status']=="0"){
                          layer.msg('短信已成功发送!');   
                       }
                       else if(data['status']=="1"){
                         layer.msg('存在该用户!');           
                       }
                       else{
                         layer.msg('未知错误!');   
                       }
                      ////根据ajax返回参数判断验证码发送情况
                    }
               });
		 ///60秒限制    
          settime();
         ///60秒限制 
			/*******/
				   }
			  }else{
				  layer.msg("亲，手机号码长度不是11位数！");
			  }
		}
}
/* 倒计时时间类 */
    // var iTime = 60; 
    if(<?php echo ($showtime); ?>>59){
      var iTime=60;
    }else{
      var iTime=60-<?php echo ($showtime); ?>;   
    }   
    var Account;
    function settime(){
      document.getElementById('send').disabled = true;
      var iSecond,sSecond="",sTime="";
      if (iTime >= 0){
          iSecond = parseInt(iTime%60);
          iMinute = parseInt(iTime/60)
          if (iSecond >= 0){
            if(iMinute>0){
                sSecond = iMinute + "分" + iSecond + "秒";
              }else{
                sSecond = iSecond + "秒";
              }
            }
            sTime="倒计时"+sSecond;
            if(iTime==0){
                clearTimeout(Account);
                sTime='验证码';
                iTime = 60;
                document.getElementById('send').disabled = false;
            }else{
                Account = setTimeout("settime()",1000);
                iTime=iTime-1;
            }
        }else{
           sTime='验证码';
        }
        document.getElementById('send').value = sTime;
  }  
/* 倒计时类 */  	
<!--注册请求-->
  function onsend(){
	    var myreg=/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
	    var vcode=/^[\@A-Za-z0-9]{6,22}$/;
		var phone=$("#phone").val();
		var code=$("#code").val();
		var username=$("#username").val();
		var password=$("#userpwd").val();
		var passwords=$("#userpwds").val();
		var data = $('#regform').serialize();
		if(phone==""){
			layer.msg("亲，请输手机号码！");
		}else if(phone!=""){
			  if(phone.length==11){
				   if(!myreg.test(phone)){
					   layer.msg("亲，手机格式不正确！");
				   }else{
			/*******/
			        if(code==""){
					   layer.msg("亲，请输入验证码！");
					}else{
		//// 
		             if((password!="")&&(passwords!="")){
						 //
						    if(!vcode.test(password)){
							   layer.msg("亲，密码存在非法字符！");
							}else{
								  //
								  if(password!=passwords){
									  layer.msg("亲，两次密码不一致！");
								  }else{
									  //
									   if(username==""){
									      layer.msg("亲，请输入用户名！");
								       }else{
										   //
										   //////////////
	                                       $.post('<?php echo U("Code/onsend");?>',data,function(response){
                                              if(response.status=='1'){
                                                 layer.msg('请先请求验证码!');   
                                              }else if(response.status=='0'){
                                              window.location.href="<?php echo U('Home/Login/login');?>"; 				                           
                                              }else if(response.status=='2'){
                                                 layer.msg('手机号与验证码不匹配!');
                                              }else if(response.status=='-2'){
                                                 layer.msg('用户名存在!');
                                              }
                                          }) ;
										  /////////////
								       }
									  //
								  }							 
								  //
							}
						 //
					 }else if((password=="")||(passwords=="")){
						 layer.msg("亲，请输入密码！");
					 }
		////
					}
			/*******/
				   }
			  }else{
				  layer.msg("亲，手机号码长度不是11位数！");
			  }
		}
  }
</script>
<script type="text/javascript">
/************防止刷新倒计时被刷掉*****************/
      if(<?php echo ($showtime); ?>>59){  //60S以后不做处理
      }else{         //60s以内倒计时继续进行
      var iTimes=60-<?php echo ($showtime); ?>;   //计算当前剩余时间
      var Accounts;
      document.getElementById('send').disabled = true;
      var iSeconds,sSeconds="",sTimes="";
      if (iTimes >= 0){
          iSeconds = parseInt(iTimes%60);
          iMinutes = parseInt(iTimes/60)
          if (iSeconds >= 0){
            if(iMinutes>0){
                sSeconds = iMinutes + "分" + iSeconds + "秒";
              }else{
                sSeconds = iSeconds + "秒";
              }
            }
            sTimes="倒计时"+sSeconds;
            if(iTimes==0){
                clearTimeout(Accounts);
                sTimes='验证码';
                iTimes = 60;
                document.getElementById('send').disabled = false;
            }else{
                Accounts = setTimeout("settime()",1000);
                iTimes=iTimes-1;
            }
        }
        document.getElementById('send').value = sTimes;
    }
/*******************************************/
</script>
</html>