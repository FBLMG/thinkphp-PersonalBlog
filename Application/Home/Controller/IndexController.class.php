<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends Controller {
    public function index(){
	/*	$un=$_SESSION['username'];
		$this->assign('username',$un);*/
		//旅游日志第一篇显示//
		$file=M('knowledge');
		$fl['typeid']=1;
		$data=$file->where($fl)->order('publishtime desc')->limit(1)->select();	
		$this->assign('data',$data);
		//旅游日志第一篇显示//
		//日志第二篇显示//
		$file=M('knowledge');
		$fls['typeid']=3;
		$datas=$file->where($fls)->order('publishtime desc')->limit(1)->select();	
		$this->assign('datas',$datas);
		//日志第二篇显示
		//图片展示
		$images=M('img');
		$img=$images->order('publishtime desc')->limit(3)->select();	
		$this->assign('img',$img);
		//图片展示
        $this->display();
    }
	public function contact(){
		/////
		if($_SESSION['username']==''){
			$this->redirect('Home/Login/login');  
		}
		$contact =M('message');  //留言表
		$user    =M('user');  //用户表
		$rmessage=M('returnmessage'); //回复留言表
		$username=$_SESSION['username'];  //用户名
		$un['username']=$username;  //作为查询用户表中用户的ID条件
        $uid=$user->where($un)->getField('uid');   //获取当前用户ID
		$uimg=$user->where('uid='.$uid)->getField('user_img');   //获取当前用户头像
		///获取用户留言///
		$Model=new Model();
	    //*获取留言数量*//
	    $count1=$this->companyList=$Model
            ->table(array(
              C('DB_PREFIX').'message'=>'message',
              C('DB_PREFIX').'returnmessage'=>'returnmessage',)
              )->where('message.id=returnmessage.mid and message.uid='.$uid)->count();
		//获取留言//
		$Page = new \Think\Page($count1,$listRows=4);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->lastSuffix = false;
        $Page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;每页<b>'.$listRows.'</b>条&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','末页');
        $Page->setConfig('first','首页');
        $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $msdata=$this->companyList=$Model
            ->table(array(
              C('DB_PREFIX').'message'=>'message',
              C('DB_PREFIX').'returnmessage'=>'returnmessage',)
              )->where('message.id=returnmessage.mid and message.uid='.$uid)
			   ->field('message.* , returnmessage.*')
			   ->limit($Page->firstRow.','.$Page->listRows)->select();
		///获取用户留言///
        $show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('msdata',$msdata);
		$this->assign('uimg',$uimg);
		/////
		$this->display();
	}
	public function postmessage(){
		
		if(IS_POST){
		$content=$_POST['content'];
		if($content!=''){
			////	
			$unmae=$_SESSION['username'];
			$user    =M('user');  //用户表
			$uid=$user->where('username='.$unmae)->getField('uid');   //获取当前用户ID
			$mess['publishtime']=date('Y-m-d H:i:s',time());
			$mess['messagecontent']=$content;
			$mess['username']=$_SESSION['username'];
			$mess['uid']=$uid;
			$contact =M('message');  //留言表
			$returnmessage=M('returnmessage');
			$re=$contact->add($mess);
			$_SESSION['cs']=$re;
			if($re>0){
				//插入回复留言表//
				  $data['status']=1;
			      $this->ajaxReturn($data);			
			}else{
				$data['status']=2;
			    $this->ajaxReturn($data);
			}
			////
		}else{
			 $data['status']=-1;
			 $this->ajaxReturn($data);
		}
	  }
	}
}