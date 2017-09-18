<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/blog/Public/user/css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>佛布朗博客-找回密码</title>
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
				<form method="post" id="getpwdform">
			         <div>
						<span><label>手机号</label></span>
						<span> <input type="text" class="textbox" name="phone" id="phone" placeholder="手机号"></span>
					 </div>
					 <div>
						<span><label>验证码</label></span>
					    <span><input type="text" class="password" name="code" id="code" placeholder="验证码"></span>
					 </div>
					<div class="sign">
                        <div class="submit">
						  <input type="button" onclick="getcode()" id="send" value="验证码" >
						</div>
						<div class="submit">
						  <input type="button" onclick="getpwd()" value="提交" >
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
/*请求发送验证码*/
  function getcode(){
	  var phone=$("#phone").val();
	  var myreg=/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
	  if(phone==""){
		  layer.msg('亲，请输入手机号码!');   
      }else{
		   if(phone.length==11){
			    if(!myreg.test(phone)){
			       layer.msg('亲，请输入正确的手机号码!');
				}else{
			/*********/
				var ajaxSidUrl='<?php echo U("Code/getcode");?>'; 
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
                         layer.msg('不存在该用户!');           
                       }
                       else{
                         layer.msg('未知错误!');   
                       }
                      ////根据ajax返回参数判断验证码发送情况
                    }
               });
		   /********/
		    settime();
				}
		   }else{
			   layer.msg('亲，请确保手机号码为11位!');   
		   }
	  } 
  }
  
  /****提交验证****/
  function getpwd(){
	  var myreg=/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
	  var phone=$("#phone").val();
	  var code=$("#code").val();
	  var data = $('#getpwdform').serialize();
	  //
	  if(phone==""){
		  layer.msg('亲，请输入手机号码!');   
      }else{
		   if(phone.length==11){
			    if(!myreg.test(phone)){
			       layer.msg('亲，请输入正确的手机号码!');
				}else{
	                if(code.length!=0){
				/********/
				      $.post('<?php echo U("Code/getpwd");?>',data,function(response){
                        if(response.status=='1'){
                             layer.msg('请先请求验证码!');   
                           }else if(response.status=='0'){
                             window.location.href="<?php echo U('Home/Login/setpwd');?>"; 				                           
                           }else if(response.status=='2'){
                             layer.msg('手机号与验证码不匹配!');
                           }
                      }) ;
				/*******/
					}else if(code.length==0){
						layer.msg('亲，请输入验证码!');
					}
				}
		   }else{
			   layer.msg('亲，请确保手机号码为11位!');   
		   }
	  } 
	  //
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