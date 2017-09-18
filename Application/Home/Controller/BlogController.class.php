<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class BlogController extends Controller {
	  ////博客显示
	  public function index(){
		  $id=$_GET['id'];
		  //文章类型
		  $filetype=M('filetype');
		  $type=$filetype->select();
		  $this->assign('type',$type);
		  //文章类型
		  ///根据ID获取文章
		  $info=M('knowledge');
		  $id=$_GET['id'];
          if($id==''){
             $count1=$info->count();
			 $Page = new \Think\Page($count1,$listRows=6);// 实例化分页类 传入总记录数和每页显示的记录数
			 $Page->lastSuffix = false;
             $Page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;每页<b>'.$listRows.'</b>条&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
             $Page->setConfig('prev','上一页');
             $Page->setConfig('next','下一页');
             $Page->setConfig('last','末页');
             $Page->setConfig('first','首页');
             $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
             $show = $Page->show();// 分页显示输出
             $data_info=$info->limit($Page->firstRow.','.$Page->listRows)->select();
			 $this->assign('data',$data_info);   //客服信息输出
             $this->assign('page',$show);// 赋值分页输出
             session('ufiles',$id);
          }else{
             $count1=$info->where("typeid=".$id)->count();
			 $Page = new \Think\Page($count1,$listRows=6);// 实例化分页类 传入总记录数和每页显示的记录数
			 $Page->lastSuffix = false;
             $Page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;每页<b>'.$listRows.'</b>条&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
             $Page->setConfig('prev','上一页');
             $Page->setConfig('next','下一页');
             $Page->setConfig('last','末页');
             $Page->setConfig('first','首页');
             $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
             $show = $Page->show();// 分页显示输出
             $data_info=$info->where("typeid=".$id)->limit($Page->firstRow.','.$Page->listRows)->select();
			 $this->assign('data',$data_info);   //客服信息输出
             $this->assign('page',$show);// 赋值分页输出
             session('ufiles',$id);
          } 
		  ///根据ID获取文章
		  $this->display();
	  }
	  ////
	  //博客详情
	  public function files(){
		  //
		  $info=M('knowledge');
		  $id=$_GET['id'];
		  $files=$info->where('id='.$id)->select();
		  //评论
		  //浏览量增加一次
		  $knowledgecount=M('knowledgecount');
		  $ll=$knowledgecount->where('fid='.$id)->getField('read');
		  $a['read']=$ll+1;
		  $knowledgecount->where('fid='.$id)->save($a);
		  //
		  $Model=new Model();
		  $count1=$this->companyList=$Model
            ->table(array(
              C('DB_PREFIX').'pinglun'=>'pinglun',
              C('DB_PREFIX').'user'=>'user',)
              )->where('pinglun.uid=user.uid and pinglun.filed='.$id)->count();
		//获取留言//
		  $Page = new \Think\Page($count1,$listRows=2);// 实例化分页类 传入总记录数和每页显示的记录数
		  $Page->lastSuffix = false;
          $Page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;每页<b>'.$listRows.'</b>条&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
          $Page->setConfig('prev','上一页');
          $Page->setConfig('next','下一页');
          $Page->setConfig('last','末页');
          $Page->setConfig('first','首页');
          $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		  $show = $Page->show();// 分页显示输出
          $msdata=$this->companyList=$Model
            ->table(array(
              C('DB_PREFIX').'pinglun'=>'pinglun',
              C('DB_PREFIX').'user'=>'user',)
              )->where('pinglun.uid=user.uid and pinglun.filed='.$id)
			   ->field('pinglun.* , user.user_img')
			   ->limit($Page->firstRow.','.$Page->listRows)->select();
		  //评论
		  ////
		  $a['fid']=$_GET['id'];
		  $knoecomment=M('knowledgecount')->where($a)->getField('comment');
		  $this->assign('knoecomment',$knoecomment);
		  ////
		  $this->assign('page',$show);// 赋值分页输出
		  $this->assign('msdata',$msdata);
		  $this->assign('files',$files);
		  $this->assign('fiid',$id);
		  $this->display();
			//
	  }
	  //发表评论
	  public function postpinglun(){
		   $id=$_POST['fid'];
		   //浏览量增加一次
		  $knowledgecount=M('knowledgecount');
		  $ll=$knowledgecount->where('fid='.$id)->getField('comment');
		  $a['comment']=$ll+1;
		  $knowledgecount->where('fid='.$id)->save($a);
		  //
		   $content=$_POST['content'];
		   $user=M('user');
		   $uid=$user->where('username='.$_SESSION['username'])->getField('uid');
		   $addpinglun['content']=$_POST['content'];
		   $addpinglun['uname']=$_SESSION['username'];
		   $addpinglun['publishtime']=date('Y-m-d H:i:s',time());
		   $addpinglun['uid']=$uid;
		   $addpinglun['filed']=$id;
		   $pinglun=M('pinglun');
		   $re=$pinglun->add($addpinglun);
		   if($re){
			  $data['status']=1;
			  $this->ajaxReturn($data); 
		   }else{
		   }
		      $data['status']=0;
			  $this->ajaxReturn($data); 
	  }
	  //
	  public function zan(){
		  $id=$_POST['id'];
		  $files=M('knowledgecount');
		  $thumb=$files->where('fid='.$id)->getField('thumb');
		  $a['thumb']=$thumb+1;
		  $re=$files->where('fid='.$id)->save($a);
		  if($re){
			  $data['status']=1;
	          $this->ajaxReturn($data);
		  }	
	  }
}


?>