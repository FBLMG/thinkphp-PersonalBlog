<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Upload;
class LoginController extends Controller {
	   public function login(){
		   ///**//
		    if(IS_POST){
            $username=$_POST['username'];    //获取用户名
            $userpwd=$_POST['userpwd'];      //获取密码
            $user=M('user');                  //实例化用户表
			$re['username']=$username;
			$re['userpwd']=$userpwd;
			$re['state']=0;
			$res=$user->where($re)->find();
         //判断用户输入的用户名与手机号是否相对应
            if($res){
                   $data['status']=0;         //成功返回参数
				   $_SESSION['adminname']=$username;
				   //成功登陆插入当前时间///
				   $lo['username']=$username;
				   $lotime['lasttime']=date('Y-m-d H:i:s',time());
				   $res=$user->where($lo)->save($lotime);
				   //成功登陆插入当前时间/
                   $this->ajaxReturn($data);
            }else{
                   $data['status']=1;          //失败返回参数
                   $this->ajaxReturn($data);
            }
         //           
		 }
		   ///**///
		   $this->display();
	   }
	   /////退出
	   public function doout(){
		   $_SESSION['username']='';
		   $this->redirect('Admin/Login/login');   
	   }
} 
?>