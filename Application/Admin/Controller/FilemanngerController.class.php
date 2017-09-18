<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Upload;
use Think\Image;
class FilemanngerController extends Controller {
     public function files(){
		  if($_SESSION['adminname']==""){
			  $this->redirect('Admin/Login/login');
		  }
		  $systemtime=date('Y-m-d H:i:s',time());    //当前系统时间
		  $adminuser=$_SESSION['adminname'];
		  $z=M('user');
		  $b['username']=$adminuser;
		  $lasttime=$z->where($b)->getField('lasttime');
		  //获取博客类型//
		  $filetype=M('filetype');
		  $filtype=$filetype->select();
		  //**************************//
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
             session('files',$id);
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
             session('files',$id);
          } 
		  //***************************//
		  $this->assign('filtype',$filtype);
		  $this->assign('systemtime',$systemtime);
		  $this->assign('adminuser',$adminuser);
		  $this->assign('lasttime',$lasttime);
		  $this->display();
	 }
	 //文章删除//
	 public function delfile(){
		 //****//
	      $files=M('knowledge');
		   if($_GET){
             if($_GET['id']){
				  $id=$_GET['id'];
				  $res=$files->where("id=$id")->delete();
				  ////
				  M('knowledgecount')->where("fid=$id")->delete();
				  ////
				  $this->redirect('Filemannger/files');
			 }
		   }
		 //****//
	 }
	 //文章删除//
	 //文章编辑//
	 public function update(){
		 //获取类型//
		 $filetype=M('filetype');
		 $type=$filetype->select();
		 $this->assign('type',$type);
		 //获取类型//
		 //****//
		 $systemtime=date('Y-m-d H:i:s',time());    //当前系统时间
		 $adminuser=$_SESSION['adminname'];
		 $z=M('user');
		 $b['username']=$adminuser;
		 $lasttime=$z->where($b)->getField('lasttime');
		 $files=M('knowledge');
		 $id=$_GET['id'];
		 $_SESSION['fileid']= $id;
		 if($_GET){
            if($_GET['id']){
                $id=$_GET['id'];
				$result=$files->where("id=$id")->find();
				$this->assign('result',$result);
				$this->assign('systemtime',$systemtime);
				$this->assign('adminuser',$adminuser);
		        $this->assign('lasttime',$lasttime);
				$this->assign('fid',$id);
				$this->display();
			}
		 }
		 //****//
	 }
	 //文章编辑//
	 //修改文章//
	 public function edit(){
		 if(IS_POST){
			 $title=$_POST['title'];
			 $content=$_POST['content'];
			 $files=M('knowledge');
			 $res['title']=$title;
			 $res['content']=$content;
			 $res['abstract']=$_POST['abstract'];
			 $res['typeid']=$_POST['typeid'];
			 $r['id']=$_SESSION['fileid'];
			 $re=$files->where($r)->save($res);
			 
			 if($re){
				 $data['status']=1;
				 $this->ajaxReturn($data); 
			 }else{
				 $data['status']=-1;
				 $this->ajaxReturn($data);
			 }
	     }
	 }
	 //修改文章//
	 ////查看评论
	 public function fpinglun(){
		 /*基本信息获取*/
		  if($_SESSION['adminname']==""){
			  $this->redirect('Admin/Login/login');
		  }
		  $systemtime=date('Y-m-d H:i:s',time());    //当前系统时间
		  $adminuser=$_SESSION['adminname'];
		  $z=M('user');
		  $b['username']=$adminuser;
		  $lasttime=$z->where($b)->getField('lasttime');
		  /*基本信息获取**/
		  //
		  $pl=M('pinglun');
		  $re['filed']=$_GET['id'];  //获取博客ID
		  /*获取博客标题*/
		  $file=M('knowledge');
		  $ftitle=$file->where($re)->getField('title');;
		  /*获取博客标题*/
		  $count1=$pl->where($re)->count();
		  $Page = new \Think\Page($count1,$listRows=6);// 实例化分页类 传入总记录数和每页显示的记录数
		  $Page->lastSuffix = false;
         $Page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;每页<b>'.$listRows.'</b>条&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
         $Page->setConfig('prev','上一页');
         $Page->setConfig('next','下一页');
         $Page->setConfig('last','末页');
         $Page->setConfig('first','首页');
         $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		  $result=$pl->where($re)->order('publishtime desc')->limit($Page->firstRow.','.$Page->listRows)->select(); 
          $show = $Page->show();// 分页显示输出
		  //获取博客
		  $f['id']=$_GET['id'];
		  $a['fid']=$_GET['id'];
		  $fil=$file->where($f)->select();
		  //获取博客
		  //
		  ///获取相应数据
		  $knoecomment=M('knowledgecount')->where($a)->getField('comment');
		  $knoeread=M('knowledgecount')->where($a)->getField('read');
		  $knowthumb=M('knowledgecount')->where($a)->getField('thumb');
		  $this->assign('knoecomment',$knoecomment);
		  $this->assign('knoeread',$knoeread);
		  $this->assign('knowthumb',$knowthumb);
		  ///获取相应数据
		  /*基本信息传递*/
		  $this->assign('fil',$fil);
		  $this->assign('ftitle',$ftitle);
		  $this->assign('result',$result);
		  $this->assign('page',$show);// 赋值分页输出
		  $this->assign('systemtime',$systemtime);
		  $this->assign('adminuser',$adminuser);
		  $this->assign('lasttime',$lasttime);
		  /*基本信息传递*/
		  $this->display();
		  //
	 }
	//图片切割上传//
   public function updateimg(){
	  $M = M('knowledge');
	  $fid=$_GET['id'];
	  $time=time();
  	  $config=array(
            'rootPath'=>"./Public/img/uploads/fileimg/",
            'maxSize' =>'1048579',
            'saveName'=>$fid,
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
         $image->open("./Public/img/uploads/fileimg/".$saveName);
         //将图片裁剪为400x400并保存为corp.jpg
         $image->crop($avatarData['width'],$avatarData['height'],$avatarData['x'], $avatarData['y'])->save("./Public/img/uploads/fileimg/".$saveName);        
         $map['img']=$saveName;
         $M->where('id='.$fid)->save($map);
         $this->ajaxReturn($return);
      	 // 
      }else{
      	$this->ajaxReturn($Upload->getError());
      }
  }
//图片切割上传//
}
?>