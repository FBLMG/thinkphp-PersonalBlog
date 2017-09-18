<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends Controller {
    public function index(){
		if($_SESSION['adminname']==""){
			  $this->redirect('Admin/Login/login');
		  }
		 $systemtime=date('Y-m-d H:i:s',time());    //当前系统时间
		 $adminuser=$_SESSION['adminname'];
		 $z=M('user');
		 $b['username']=$adminuser;
		 $lasttime=$z->where($b)->getField('lasttime');
		 $userimg=$z->where($b)->getField('user_img');
		 //显示当前登陆用户//
		 $User=M('user');
		 $a['state']=1;
		 $users=$User->where($a)->order('lasttime desc')->limit(5)->select();
		 //显示当前登陆用户//
		 //最新博客//
		 $file=M('knowledge');
		 $filetitle= $file->order('publishtime desc')->limit(1)->getField('title');
		 $fileimg  =$file->order('publishtime desc')->limit(1)->getField('img');
		 //最新博客//
		 //最新上传图片
		 $img=M('img');
		 $imgs= $img->order('publishtime desc')->limit(1)->getField('img');
		 //最新评论
		 $pinglun=M('pinglun');
		 $pl=$pinglun->order('publishtime desc')->limit(1)->getField('content');
		 //
		 //留言列表
		 $message=M('message');
		 $count1=$message->count();
		 $Page = new \Think\Page($count1,$listRows=5);// 实例化分页类 传入总记录数和每页显示的记录数
		 $mess=$message->order('publishtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		 foreach ($mess as $key => $value) {
            $meid=$value['id'];
            $remess=M('returnmessage');
			$isre=$remess->where('mid='.$meid)->find();
			if($isre){
				$mess[$key]['isreme']=1;
			}else{
			    $mess[$key]['isreme']=0;
			}
         }
		 $Page->lastSuffix = false;
         $Page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;每页<b>'.$listRows.'</b>条&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
         $Page->setConfig('prev','上一页');
         $Page->setConfig('next','下一页');
         $Page->setConfig('last','末页');
         $Page->setConfig('first','首页');
         $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		 //查看留言循环//
		
		 //查看留言循环//
         $show = $Page->show();// 分页显示输出
		 $this->assign('data',$mess);   //客服信息输出
         $this->assign('page',$show);// 赋值分页输出
		 //统计用户
		 $usercount=$z->where($a)->count();
		 $usercount=($usercount/100)*100;
		 $usercount=$usercount."%";
		 //统计留言
		 $messcount=$message->where($a)->count();
		 $messcount=($messcount/100)*100;
		 $messcount=$messcount."%";
		 //评论数量
		 $pingluncount=$pinglun->where($a)->count();
		 $pingluncount=($pingluncount/100)*100;
		 $pingluncount=$pingluncount."%";
		 //最火文章
		 $host=M('knowledge');
		 $hostcontent= $host->order('publishtime desc')->limit(1)->select();
		 $this->assign('hostcontent',$hostcontent);
		 //
		 $this->assign('pingluncount',$pingluncount);    //统计评论数量
		 $this->assign('messcount',$messcount);    //统计留言人数
		 $this->assign('usercount',$usercount);    //统计用户人数
		 $this->assign('pl',$pl);    //最新评论
		 $this->assign("imgaddress",$imgs);   //最新图片
		 $this->assign('users',$users);    //最近登陆用户
		 $this->assign('filetitle',$filetitle);    //最新博客标题
		 $this->assign('fileimg',$fileimg);       //最新博客图片
		 $this->assign('filets',$filets);
		 $this->assign('systemtime',$systemtime);
		 $this->assign('adminuser',$adminuser);
		 $this->assign('lasttime',$lasttime);
		 $this->assign('userimg',$userimg);
         $this->display();
    }
	/////回复
	public function ms(){
		$uid=I('post.uid'); 
		$mid=I('post.mid'); 
		$_SESSION['messageuid']=$uid;
		$_SESSION['messageid']=$mid;
		$data['status']= 0;
		$this->ajaxReturn($data);
	}
	////回复留言
	public function returnmessage(){
		 $rmessage=M('returnmessage');
		// $re['mid']=$_SESSION['messageid'];
		// $re['uid']=$_SESSION['messageuid'];
		 $re['mcontent']=$_POST['content'];
		 $re['republishtime']=date('Y-m-d H:i:s',time());
		 $re['rname']=$_SESSION['adminname'];
		 $result=$rmessage->where('mid='.$_SESSION['messageid'])->save($re);
		 if($result){
			 $_SESSION['messageuid']="";
		     $_SESSION['messageid']="";
			 $this->redirect('Index/index');
		 }
	}
	////修改密码
	public function savepwd(){
		$data['userpwd']=$_POST['pwd'];
		$da['username']=$_SESSION['adminname'];
		$ispwd=M('user')->where($da)->getField('userpwd');
		if($ispwd==$data['userpwd']){
			$data['status']= 2;
		    $this->ajaxReturn($data);
		}
		$re=M('user')->where($da)->save($data);
		if($re){
			$data['status']= 1;
		    $this->ajaxReturn($data);
		}else{
			$data['status']= 0;
		    $this->ajaxReturn($data);
		}
	}

}