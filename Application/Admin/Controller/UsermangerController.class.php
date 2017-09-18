<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Upload;
use Think\Image;
class UsermangerController extends Controller {
	///用户管理
	 public function user(){
		 if($_SESSION['adminname']==""){
			  $this->redirect('Admin/Login/login');
		  }
		 $systemtime=date('Y-m-d H:i:s',time());    //当前系统时间
		 $adminuser=$_SESSION['adminname'];
		 $z=M('user');
		 $b['username']=$adminuser;
		 $lasttime=$z->where($b)->getField('lasttime');
		 //输出用户//
		 $user=M('user');
		 $count1=$user->count();
		 $Page = new \Think\Page($count1,$listRows=6);// 实例化分页类 传入总记录数和每页显示的记录数
		 $Page->lastSuffix = false;
         $Page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;每页<b>'.$listRows.'</b>条&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
         $Page->setConfig('prev','上一页');
         $Page->setConfig('next','下一页');
         $Page->setConfig('last','末页');
         $Page->setConfig('first','首页');
         $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		 $users=$user->limit($Page->firstRow.','.$Page->listRows)->select();
         $show = $Page->show();// 分页显示输出
		 $this->assign('users',$users);
		 $this->assign('page',$show);// 赋值分页输出
		 //输出用户//
		 $this->assign('systemtime',$systemtime);
		 $this->assign('adminuser',$adminuser);
		 $this->assign('lasttime',$lasttime);
		 $this->display();
	 }
	 ////用户禁言
	 public function jy(){
		 $users=M('user');
		   if($_GET){
             if($_GET['id']){
				  $uid=$_GET['id'];
				  $re['status']=1;
				  $res=$users->where("uid=$uid")->save($re);
				  $this->redirect('Usermanger/user');
			 }
		   }
	}
	 ////用户发言
	  public function fy(){
		   $users=M('user');
		   if($_GET){
             if($_GET['id']){
				  $re['status']=0;
				  $uid=$_GET['id'];
				  $res=$users->where("uid=$uid")->save($re);
				  $this->redirect('Usermanger/user');
			 }
		   }
	}
	 ////用户删除
	 public function deluser(){
		  $users=M('user');
		   if($_GET){
             if($_GET['id']){
				  $uid=$_GET['id'];
				  $res=$users->where("uid=$uid")->delete();
				  $this->redirect('Usermanger/user');
			 }
		   }
	 } 
	 ////新增用户
	 public function adduser(){
		 if(IS_POST){
			 ///
			 $re['username']=$_POST['user'];
			 $re['userpwd']=$_POST['password'];
			 $re['state']=$_POST['status'];
			 $re['status']=0;
			 $re['user_img']='user.png';
			 $user=M('user');
			 if(($re['username']=="")||($re['userpwd']=="")||($re['state']=="")){
				 $this->redirect('Usermanger/user');
			 }else{
				$us=$user->add($re);
			    if($us){
				   $this->redirect('Usermanger/user');
			    }
			 }	
			 ///
		 }
	 }
	 //获取用户信息
	 public function update(){
		 $uid=$_GET['id'];
		 $user=M('user');
		 $date=$user->where('uid='.$uid)->select();
		 $this->assign('date',$date);
		 ///获取用户信息///
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
		 $this->assign('uid',$uid);
         $this->display();
		 ///获取用户信息///
	 }
	 //编辑
	 public function edit(){
		 $user=M('user');
		 $a['uid']=$_POST['uid'];
		 $data['username']=$_POST['username'];
		 $data['phone']=$_POST['phone'];
		 $data['qq']=$_POST['qq'];
		 $data['address']=$_POST['address'];
		 $data['state']=$_POST['state'];
		 $re=$user->where($a)->save($data);
		 if($re){
			 $data['status']=1;          
             $this->ajaxReturn($data);
		 }else{
			 $data['status']=-1;        
             $this->ajaxReturn($data);
		 }
	 }
	 //客户编辑
	 public function edituserpwd(){
		 $pwd=$_POST['pwd'];
		 $user=M('user');
		 $data['userpwd']=$_POST['pwd'];
		 $where['uid']=$_POST['id'];
		 $ispwd=$user->where($where)->getField('userpwd');
		 if($ispwd==$pwd){
			 $data['status']=2;          
             $this->ajaxReturn($data);
		 }
		 $re=$user->where($where)->save($data);
		 if($re){
			 $data['status']=1;          
             $this->ajaxReturn($data);
		 }else{
			 $data['status']=0;          
             $this->ajaxReturn($data);
		 }
	 }
  //图片切割上传//
   public function postimg(){
	  $M = M('user');
	  $uid=$_GET['id'];
  	  $config=array(
            'rootPath'=>"./Public/img/uploads/userimg/",
            'maxSize' =>'1048579',
            'saveName'=>$uid,
             'autoSub'=> false,
            'replace'=>true,      
      );
      $Upload = new Upload($config);
      $info = $Upload->upload();
      if ($info) {
         // 
         $saveName = $info['avatar_file']['savename'];
         $avatarData=json_decode(htmlspecialchars_decode(I('avatar_data')),true);
         $return['result']=$saveName;
         $image = new \Think\Image(); 
         $image->open("./Public/img/uploads/userimg/".$saveName);
         //将图片裁剪为400x400并保存为corp.jpg
         $image->crop($avatarData['width'],$avatarData['height'],$avatarData['x'], $avatarData['y'])->save("./Public/img/uploads/userimg/".$saveName);        
         $username=$_SESSION['username'];
         $map['user_img']=$saveName;
         $M->where('uid='.$uid)->save($map);
         $this->ajaxReturn($return);
      	 // 
      }else{
      	$this->ajaxReturn($Upload->getError());
      }
  }
//图片切割上传//
}
?>