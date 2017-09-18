<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Think\Upload;
use Think\Image;
    class ReaderController extends Controller{
		//读者中心页面
		 public function reader(){
			 //进行联表查询//
			 $usermessage=M('usermessage');
			 $count1=$usermessage->alias('a')->join('__USER__ b ON b.uid= a.uid')->order('id desc')->count();   //获取总数
			 $Page = new \Think\Page($count1,$listRows=2);// 实例化分页类 传入总记录数和每页显示的记录数
			 $Page->lastSuffix = false;
             $Page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;每页<b>'.$listRows.'</b>条&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
             $Page->setConfig('prev','上一页');
             $Page->setConfig('next','下一页');
             $Page->setConfig('last','末页');
             $Page->setConfig('first','首页');
             $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
			 $result=$usermessage->alias('a')->join('__USER__ b ON b.uid= a.uid')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();  //获取数据
			 $show = $Page->show();// 分页显示输出
		     $this->assign('page',$show);// 赋值分页输出
		     $this->assign('result',$result);
			 //进行联表查询//
			 $this->display();
		 }
		 //详情页面
		 public function index(){
			 $mid=$_GET['id'];
			 $_SESSION['usermessage']=$mid;
			 //主题区域//
			 $usermessage=M('usermessage');
			 $result=$usermessage->alias('a')->join('__USER__ b ON b.uid= a.uid')->where('a.id='.$mid)->select();  //获取数据
			 $this->assign('result',$result);
			 //主题区域//
			 //评论//
			 $returnmessage=M('userremessage');
			 $count1=$returnmessage->alias('c')->join('__USER__ d ON d.uid= c.reuid')->where('c.mid='.$mid)->count();   //获取总数
			 $Page = new \Think\Page($count1,$listRows=5);// 实例化分页类 传入总记录数和每页显示的记录数
			 $Page->lastSuffix = false;
             $Page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;每页<b>'.$listRows.'</b>条&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
             $Page->setConfig('prev','上一页');
             $Page->setConfig('next','下一页');
             $Page->setConfig('last','末页');
             $Page->setConfig('first','首页');
             $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
			 $data=$returnmessage->alias('c')->join('__USER__ d ON d.uid= c.reuid')->limit($Page->firstRow.','.$Page->listRows)->where('c.mid='.$mid)->select();  //获取数据
			 $show = $Page->show();// 分页显示输出
		     $this->assign('page',$show);// 赋值分页输出
		     $this->assign('data',$data);
			 //评论//
			 $this->display();
		 }
		 //发表主题
		 public function postmessage(){
			 $title=$_POST['title'];
			 $content=$_POST['content'];
			 $user=M('user');
			 $message=M('usermessage');
			 $uid=$user->where('username='.$_SESSION['username'])->getField('uid');
			 $addmessage['uid']=$uid;
			 $addmessage['content']=$content;
			 $addmessage['title']=$title;
			 $addmessage['time']=date('Y-m-d H:i:s',time());
			 if($title==''){
				 $data['status']=-1;
			     $this->ajaxReturn($data);die;
			 }
			 if($content==''){
				 $data['status']=-2;
			     $this->ajaxReturn($data);die;
			 }
			 $result=$message->add($addmessage);
			 if($result){
				 $data['status']=1;
			     $this->ajaxReturn($data);die;
			 }
		 }
		 //发表回复
		 public function postreturn(){
			 $returnmessage=M('userremessage');
			 $message=M('usermessage');
			 $user=M('user');
			 $uid=$user->where('username='.$_SESSION['username'])->getField('uid');
			 $mid=$_SESSION['usermessage'];
			 $content=$_POST['content'];
			 $addre['mid']=$mid;
			 $addre['reuid']=$uid;
			 $addre['recontent']=$content;
			 $addre['retime']=date('Y-m-d H:i:s',time());
			 $result=$returnmessage->add($addre);
			 ////
			 $state=$message->where('id='.$mid)->getField('states');
			 $state=$state+1;
			 $a['states']=$state;
			 $re=$message->where('id='.$mid)->save($a);
			 ////
			 if($result>0){
				 $data['status']=1;
			     $this->ajaxReturn($data); 
		     }else{
				 $data['status']=2;
			     $this->ajaxReturn($data); 
			 }
		 }
	}
?>