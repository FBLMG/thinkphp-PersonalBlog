<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Upload;
use Think\Image;
class MessageController extends Controller {
	public function index(){
		 if($_SESSION['adminname']==""){
			  $this->redirect('Admin/Login/login');
		  }
		 $systemtime=date('Y-m-d H:i:s',time());    //当前系统时间
		 $adminuser=$_SESSION['adminname'];
		 $z=M('user');
		 $b['username']=$adminuser;
		 $lasttime=$z->where($b)->getField('lasttime');
		 ///内容区///
		
		 $count1=M('message')->count();
		 $Page = new \Think\Page($count1,$listRows=6);// 实例化分页类 传入总记录数和每页显示的记录数
		 $Page->lastSuffix = false;
        $Page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;每页<b>'.$listRows.'</b>条&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','末页');
        $Page->setConfig('first','首页');
        $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $show = $Page->show();// 分页显示输出
		$result=M('message')->order('publishtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		 //判断是否已回复//
		 foreach ($result as $key => $value) {
            $meid=$value['id'];
            $remess=M('returnmessage');
			$isre=$remess->where('mid='.$meid)->find();	
			if($isre){
				$result[$key]['isreme']=1;
			}else{
			    $result[$key]['isreme']=0;
			}
         }
		 //判断是否已回复//
		 $this->assign('result',$result);
		 $this->assign('page',$show);// 赋值分页输出
         
		 ///内容区///
		
		 $this->assign('systemtime',$systemtime);
		 $this->assign('adminuser',$adminuser);
		 $this->assign('lasttime',$lasttime);
		 $this->display();
	}
	//留言删除//
	public function deletmess(){
		$mid=$_GET['id'];
		$Mess=M('message');
		$ReMess=M('returnmessage');
		$delet=$Mess->where('id='.$mid)->delete();
		$isMess=M('returnmessage')->where('mid='.$mid)->find();
		if($isMess){
			$deletre=M('returnmessage')->where('mid='.$mid)->delete();
		}
		$this->redirect('Message/index');
		
	}
	//留言删除//
	//留言查看//
	public function editmes(){
		/////
		if($_SESSION['adminname']==""){
			  $this->redirect('Admin/Login/login');
		  }
		 $systemtime=date('Y-m-d H:i:s',time());    //当前系统时间
		 $adminuser=$_SESSION['adminname'];
		 $z=M('user');
		 $b['username']=$adminuser;
		 $lasttime=$z->where($b)->getField('lasttime');
		/////
		$mid=$_GET['id'];
		$ReMess=M('returnmessage');
		$Mess=M('message');
		//获取留言//
		$meresult=$Mess->where('id='.$mid)->select();
		//获取留言//
		//获取回复留言//
		$count1=$ReMess->where('mid='.$mid)->count();
		$Page = new \Think\Page($count1,$listRows=4);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->lastSuffix = false;
        $Page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;每页<b>'.$listRows.'</b>条&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','末页');
        $Page->setConfig('first','首页');
        $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $show = $Page->show();// 分页显示输出
        $result=$ReMess->where('mid='.$mid)->select();
		//获取回复留言//
		$this->assign('result',$result);
		$this->assign('meresult',$meresult);
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('systemtime',$systemtime);
		$this->assign('adminuser',$adminuser);
		$this->assign('lasttime',$lasttime);
		$this->assign('mid',$mid);
		$this->display();
	}
	//留言查看//
	//留言回复
	public  function returnmessage(){
		$mid=$_POST['mid'];
		$content=$_POST['content'];
		$remess=M('returnmessage');
		$mess=M('message');
		$uid=$mess->where('id='.$mid)->getField('uid');
		$data['republishtime']=date('Y-m-d H:i:s',time());
		$data['mid']=$mid;
		$data['rname']=$_SESSION['adminname'];
		$data['mcontent']="<p>".$content."</p>";
		$data['uid']=$uid;
		$result=$remess->add($data);
		if($result){
			$data['status']= 1;
		    $this->ajaxReturn($data);
		}else{
			$data['status']= 2;
		    $this->ajaxReturn($data);
		}
	}
	
	//留言回复
}
?>