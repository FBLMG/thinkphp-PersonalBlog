<?php
namespace Home\Controller;
use Think\Controller;
    class LoginController extends Controller{
	   /*登陆界面*/
		public function login(){
			$this->display();
		}
	   /*注册界面*/
		public function register(){
		   $ft=$_SESSION['stime'];
           $lt=time();
           $showtime=$lt-$ft;
           $this->assign('showtime',$showtime);
		   $this->display();
	    }
		/*找回密码界面*/
		public function getpwd(){
			$ft=$_SESSION['stime'];
            $lt=time();
            $showtime=$lt-$ft;
            $this->assign('showtime',$showtime);
			$this->display();
		}
		/*修改密码*/
		public function setpwd(){
			$this->display();
		}
	   /*处理用户登陆*/
		public function dologin(){
		  if(IS_POST){
            $username=$_POST['username'];    //获取用户名
            $userpwd=$_POST['userpwd'];      //获取密码
            $user=M('user');                  //实例化用户表
			$re['username']=$username;
			$re['userpwd']=$userpwd;
			$re['state']=1;
			$res=$user->where($re)->find();
         //判断用户输入的用户名与手机号是否相对应
            if($res){
                   $data['status']=0;         //成功返回参数
				   $_SESSION['username']=$username;
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
	}
	/*用户退出*/
	public function dologout(){
		$_SESSION['username']='';
		$this->redirect('Home/Index/index');
	}
	/*用户修改密码*/
	public function changepwd(){
		$password=$_POST['userpwd'];
		$user=M('user');
		$ab['userpwd']=$password;
		$bc['phone']=$_SESSION['phones'];
		$re=$user->where($bc)->save($ab);
		if($re){
			$_SESSION['phones']=="";
			$this->redirect('Home/Login/login');
		}else{
			$this->redirect('Home/Login/setpwd');
		}
	}
/*****************************/
}
?>