<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Upload;
class PostController extends Controller {
    public function post(){
		 if($_SESSION['adminname']==""){
			  $this->redirect('Admin/Login/login');
		  }
		 $systemtime=date('Y-m-d H:i:s',time());    //当前系统时间
		 $adminuser=$_SESSION['adminname'];
		 $z=M('user');
		 $b['username']=$adminuser;
		 $lasttime=$z->where($b)->getField('lasttime');
		 $types=M('filetype');
		 $type=$types->select();
         $this->assign('type',$type);
		 $this->assign('systemtime',$systemtime);
		 $this->assign('adminuser',$adminuser);
		 $this->assign('lasttime',$lasttime);
         $this->display();
    }
	//发表博客//
	public function postfile(){
		//上传图片配置//
		$time=time();
        $upload = new \Think\Upload();// 实例化上传类
        $upload->autoSub=true;
        $upload->autoSub=false;
        $upload->maxSize=3145728 ;// 设置附件上传大小
        $upload->exts   =array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->saveName=array('date',array('his',$time));
        $upload->rootPath='./Public/img/uploads/fileimg/'; // 设置附件上传根目录
		//上传图片配置//
        // 上传文件 
        $info =$upload->upload();   
		//上传文件//
		$types=$_POST['section'];      
		$filetype=M('filetype');
		$typ['title']=$types;
		$te=$filetype->where($typ)->find();;   //文章类型
		$type=$te['id'];      //文章类型ID
		////
        $title=$_POST['title'];      //文字标题
		$author='1413336';           //作者
		$content=$_POST['content'];  //内容
		$publishtime=date('Y-m-d H:i:s',time());   //发表时间
		$abstract=$_POST['abstract'];  //摘要
        if(!$info) {  // 上传错误提示错误信息
           $this->error($upload->getError());   
        }else{// 上传成功
    	// $this->success('上传成功！');
    	  $Imgname = $info['avatar_file']['savename'];
    	  $Img=M('knowledge');   //实例文章表
		  $map['title']=$title;   //文章标题
    	  $map['author']=$author;   //作者
		  $map['img']=$Imgname;    //图片名字
		  $map['content']=$content;   //文章内容
		  $map['publishtime']=$publishtime;   //上传时间
		  $map['typeid']=$type;    //文章类型ID
		  $map['abstract']=$abstract;   //文章摘要
    	  $res=$Img->add($map);   //插入文章表
		  ///插入到文章附属表//
		  $a['fid']=$res;
		  $a['thumb']=0;
		  $a['read']=0;
		  $a['comment']=0;
		  M('knowledgecount')->add($a);
		  ///插入到文章附属表//
    	  if($res){
    	      $this->success('上传成功！');
    	  }else{
    	      $this->error('失败');	
    	  }       
        }
		///
	}
	//发表博客//
	////新增文章类型
	public function addtype(){
		if(is_POST){
			$files=M('filetype');
			$re['title']=$_POST['filestype'];
			if($re['title']==""){
				$this->redirect('Post/post');
			}else{
				$result=$files->add($re);
				$this->redirect('Post/post');
			}
		}
	}
	 //图片上传
	 public function cut_img(){
		 //
		 
		 //
	 }
	 ///
	 ////类型编辑
	 public function edittyp(){
		$id=$_POST['id'];
		$type=$_POST['type'];
		$filetype=M('filetype');
		$whe['id']=$id;
		$data['title']=$type;
		$isre=$filetype->where($data)->select();
		if($isre){
			$data['status']=-2;
	        $this->ajaxReturn($data); 
		}
		$re=$filetype->where($whe)->save($data);
		if($re){
			$data['status']=1;
	        $this->ajaxReturn($data); 
		}else{
			$data['status']=-1;
	        $this->ajaxReturn($data); 
		}
	 }
	 ////类型编辑
	 ////类型删除
	 public function deletetype(){
		 $id=$_POST['id'];
		 $filetype=M('filetype');
		 $whe['id']=$id;
		 $re=$filetype->where($whe)->delete();
		 if($re){
			$data['status']=1;
	        $this->ajaxReturn($data); 
		 }else{
			$data['status']=-1;
	        $this->ajaxReturn($data); 
		 }
	 }
	 ////类型删除
	 
}