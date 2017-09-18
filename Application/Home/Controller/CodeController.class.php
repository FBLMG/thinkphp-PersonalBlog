<?php
namespace Home\Controller;
use Think\Controller;
class CodeController extends Controller{
    public function sendcode(){
		$_SESSION['stime']=0;      // 设置第一次点击时间
	    $_SESSION['phone']='';
        $_SESSION['code']='';
        if($_SESSION['phone']!=''){
           session("phone", null);
        }
         if($_SESSION['code']!=''){
           session("code", null);
        }
		 $ftime=$_SESSION['stime'];    //储存当前时间戳
         $ltime=time();    
     //*60s防刷新*//
	if(($ltime-$ftime)>59){
		 $_SESSION['stime']=$ltime;   //一分钟以内重新对当前时间戳赋值
		 $phone=I('post.phone');  //获取用户输入的手机号码		 
         $abc =M('user');
         $aa['phone']=$phone;
         $re=$abc->where($aa)->find();
		 if($re){
			$data['status']= 1;
			$this->ajaxReturn($data); 
		 }else{
       //
           //获取随机数
           $code=rand_number();
           // url中{function}/{operation}?部分
           $funAndOperate = "industrySMS/sendSMS";
           // 参数详述请参考http://miaodiyun.com/https-xinxichaxun.html
           // 生成body
           $body = createBasicAuthData();
           // 在基本认证参数的基础上添加短信内容和发送目标号码的参数
           $body['smsContent'] = "【佛布朗博客】亲爱的用户，您此次的验证码为".$code; 
           $body['to'] = $phone;
       // 提交请求
           $result = post($funAndOperate, $body); 
		   if($result=="00000"){
			 $_SESSION['phone']=$phone;
			 $_SESSION['code']=$code;
			 $data['status']= 0;
			 $this->ajaxReturn($data);
		   }
		   else{
			 $data['status']= -1;
			 $this->ajaxReturn($data); 
		   }
	    }
	}else{   //提醒用户倒计时未结束
      $_SESSION['stime']=time();  //将当前时间戳存入最近一次时间起点 
    }
	//*60s防刷新*//	
   }
	
	 /*用户注册*/
	 public function onsend(){
		 if(IS_POST){
	//
	        if( $_SESSION['code']==''){
				   $data['status']=1;       
                   $this->ajaxReturn($data);
		    }else if( $_SESSION['code']!=''){
				  $phone=$_POST['phone'];
				  $code=$_POST['code'];
				  $username=$_POST['username'];
				  $userpwd=$_POST['userpwd'];
				/////
				   $user=M('user');
				   $re['username']=$username;
				   $ab=$user->where($re)->find();
				   if($ab){
					    $data['status']=-2;       
                        $this->ajaxReturn($data);
				   }else{
					   /**/
					   if(($phone==$_SESSION['phone'])&&($code==$_SESSION['code'])){
					      /*匹配成功进行注册*/
						  $us['username']=$username;
				          $us['userpwd']=$userpwd;
				          $us['phone']=$phone;
				          $us['state']=1;
						  $us['user_img']='user.png';
						  $us['status']=0;
						  $bc=$user->add($us);
						  if($bc){
							   $_SESSION['phone']='';
                               $_SESSION['code']='';
							   $data['status']=0;       
                               $this->ajaxReturn($data);
							   
						  }else{
							   $data['status']=-4;       
                               $this->ajaxReturn($data);
						  }
					     /**/
				       }else if(($phone!=$_SESSION['phone'])||($code!=$_SESSION['code'])){
					      $data['status']=2;       
                          $this->ajaxReturn($data);
				        }
					   /**/
				   }			  
			  }
		 }
	 }
	 /**用户找回密码请求验证码**/
public function getcode(){
	    $_SESSION['stime']=0;      // 设置第一次点击时间 
	    $_SESSION['phones']='';
        $_SESSION['codes']='';
        if($_SESSION['phones']!=''){
           session("phones", null);
        }
        if($_SESSION['codes']!=''){
           session("codes", null);
        }
		 $phone=I('post.phone');  //获取用户输入的手机号码		 
         $abc =M('user');
         $aa['phone']=$phone;
         $re=$abc->where($aa)->find();
		 $ftime=$_SESSION['stime'];    //储存当前时间戳
         $ltime=time();   
/*60S防刷新*/
   if(($ltime-$ftime)>59){
         $_SESSION['stime']=$ltime;   //一分钟以内重新对当前时间戳赋值
	     if(!$re){
			 $data['status']= 1;
			 $this->ajaxReturn($data); 
		 }else if($re){
           //获取随机数
           $code=rand_number();
           // url中{function}/{operation}?部分
           $funAndOperate = "industrySMS/sendSMS";
           // 参数详述请参考http://miaodiyun.com/https-xinxichaxun.html
           // 生成body
           $body = createBasicAuthData();
           // 在基本认证参数的基础上添加短信内容和发送目标号码的参数
           $body['smsContent'] = "【佛布朗博客】亲爱的用户，您此次的验证码为".$code; 
           $body['to'] = $phone;
       // 提交请求
           $result = post($funAndOperate, $body); 
		   if($result=="00000"){
			 $_SESSION['phones']=$phone;
			 $_SESSION['codes']=$code;
			 $data['status']= 0;
			 $this->ajaxReturn($data);
		   }
		   else{
			 $data['status']= -1;
			 $this->ajaxReturn($data); 
		   }
	    }		
  }else{   //提醒用户倒计时未结束
      $_SESSION['stime']=time();  //将当前时间戳存入最近一次时间起点 
  }
/*60S防刷新*/ 		 
}
	 /***用户找回密码****/
	 public function getpwd(){
		 //
		 if(IS_POST){
			 //
			 if($_SESSION['codes']==''){
				   $data['status']=1;       
                   $this->ajaxReturn($data);
			 }else if($_SESSION['codes']!=''){
				 //
				 $code=$_POST['code'];
				 $phone=$_POST['phone'];
				 if(($code==$_SESSION['codes'])&&($phone==$_SESSION['phones'])){
					 $_SESSION['codes']=="";
					// $_SESSION['phones']=="";
					 $data['status']=0;       
                     $this->ajaxReturn($data);
				 }else if(($code!=$_SESSION['codes'])||($phone!=$_SESSION['phones'])){
					 $data['status']=2;       
                     $this->ajaxReturn($data);
				 }
				 //
			 }
			 //
		 }
		 //
	 }
//	 
}
?>