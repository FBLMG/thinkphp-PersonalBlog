<?php
namespace Admin\Controller;
use Think\Controller;
class MapController extends Controller {
    public function map(){
		if($_SESSION['adminname']==""){
			  $this->redirect('Admin/Login/login');
		  }
		 $systemtime=date('Y-m-d H:i:s',time());    //当前系统时间
		 $adminuser=$_SESSION['adminname'];
		 $z=M('user');
		 $b['username']=$adminuser;
		 $lasttime=$z->where($b)->getField('lasttime');
		 $this->assign('systemtime',$systemtime);
		 $this->assign('adminuser',$adminuser);
		 $this->assign('lasttime',$lasttime);
         $this->display();
    }
}