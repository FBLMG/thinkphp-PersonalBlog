<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Upload;
class ImagesController extends Controller {
	 public function postimge(){
		 if($_SESSION['adminname']==""){
			  $this->redirect('Admin/Login/login');
		  }
		 $systemtime=date('Y-m-d H:i:s',time());    //当前系统时间
		 $adminuser=$_SESSION['adminname'];
		 $z=M('user');
		 $b['username']=$adminuser;
		 $lasttime=$z->where($b)->getField('lasttime');
		//获取图片类型//
		 $types=M('imgtype');
		 $type=$types->select();
         $this->assign('type',$type);
		//获取图片类型//
		 $this->assign('systemtime',$systemtime);
		 $this->assign('adminuser',$adminuser);
		 $this->assign('lasttime',$lasttime);
		 $this->display();
	 }
	 //上传图片//
	 public function dopostimg(){
		 //
		 //上传图片配置//
		$time=time();
        $upload = new \Think\Upload();// 实例化上传类
        $upload->autoSub=true;
        $upload->autoSub=false;
        $upload->maxSize=3145728 ;// 设置附件上传大小
        $upload->exts   =array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->saveName=array('date',array('his',$time));;
        $upload->rootPath='./Public/img/uploads/imgs/'; // 设置附件上传根目录
		//上传图片配置//
        // 上传文件 
        $info =$upload->upload();   
		//上传文件/
		//图片类型//
		$types=$_POST['section'];      
		$filetype=M('imgtype');
		$typ['type']=$types;
		$te=$filetype->where($typ)->find();;   //文章类型
		$type=$te['id'];      //文章类型ID
		$publishtime=date('Y-m-d H:i:s',time());   //发表时间
		//图片类型//
		$title=$_POST['title'];      //文字标题
		if(!$info) {  // 上传错误提示错误信息
           $this->error($upload->getError());   
        }else{// 上传成功
		//
		$Img=M('img');
		$re['img']= $info['avatar_file']['savename'];;
		$re['title']=$title;
		$re['publishtime']=$publishtime;
		$re['typeid']=$type;
		$res=$Img->add($re);   //插入文章表
    	  if($res){
    	      $this->success('上传成功！');
    	  }else{
    	      $this->error('失败');	
    	  }       
		//
		}
		 //
	 }
    //上传图片//
	////新增图片类型
	public function addtype(){
		if(IS_POST){
			$imgtype['type']=$_POST['imagetype'];
			$img=M('imgtype');	
			if($imgtype==""){
				$this->redirect('Images/postimge');
			}else{
				$re=$img->add($imgtype);
				if($re){
					$this->redirect('Images/postimge');
				}else{
					$this->redirect('Images/postimge');
				}
			}
		}
	}
	////图片显示界面
	public function imgmanger(){
		 if($_SESSION['adminname']==""){
			  $this->redirect('Admin/Login/login');
		  }
		 $systemtime=date('Y-m-d H:i:s',time());    //当前系统时间
		 $adminuser=$_SESSION['adminname'];
		 $z=M('user');
		 $b['username']=$adminuser;
		 $lasttime=$z->where($b)->getField('lasttime');
		 //获取图片//
		 $img=M('imgtype');
		 $imgs=M('img');
		 $imgtype=$img->select();  //获取图片类型
		 $id=$_GET['id'];
		  if($id==''){
             $count1=$imgs->count();
			 $Page = new \Think\Page($count1,$listRows=5);// 实例化分页类 传入总记录数和每页显示的记录数
             $imgdata=$imgs->limit($Page->firstRow.','.$Page->listRows)->select();
			 $this->assign('imgdata',$imgdata);   //客服信息输出
			 $Page->lastSuffix = false;
             $Page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;每页<b>'.$listRows.'</b>条&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
             $Page->setConfig('prev','上一页');
             $Page->setConfig('next','下一页');
             $Page->setConfig('last','末页');
             $Page->setConfig('first','首页');
             $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
			 $show = $Page->show();// 分页显示输出
			 $this->assign('page',$show);// 赋值分页输出
             session('imgs',$id);
          }else{
             $count1=$imgs->where("typeid=".$id)->count();
			 $Page = new \Think\Page($count1,$listRows=5);// 实例化分页类 传入总记录数和每页显示的记录数
             $imgdata=$imgs->where("typeid=".$id)->limit($Page->firstRow.','.$Page->listRows)->select();
			 $this->assign('imgdata',$imgdata);   //客服信息输出
			 $Page->lastSuffix = false;
             $Page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;每页<b>'.$listRows.'</b>条&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
             $Page->setConfig('prev','上一页');
             $Page->setConfig('next','下一页');
             $Page->setConfig('last','末页');
             $Page->setConfig('first','首页');
             $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
			 $show = $Page->show();// 分页显示输出
			 $this->assign('page',$show);// 赋值分页输出
             session('imgs',$id);
          }       
		 //获取图片//
		 $this->assign('systemtime',$systemtime);
		 $this->assign('adminuser',$adminuser);
		 $this->assign('lasttime',$lasttime);
		 $this->assign('imgtype',$imgtype);
		 
         
		 $this->display();
	}
	////图片删除
	public function delimg(){
		 if($_GET['id']){
		  $img=M('img');
		  $re['id']=$_GET['id'];
		  $res=$img->where($re)->delete();
		  $this->redirect('Images/imgmanger');
		 }
	}
	////
	public function editimg(){
		////
		 if($_SESSION['adminname']==""){
			  $this->redirect('Admin/Login/login');
		  }
		 $systemtime=date('Y-m-d H:i:s',time());    //当前系统时间
		 $adminuser=$_SESSION['adminname'];
		 $z=M('user');
		 $b['username']=$adminuser;
		 $lasttime=$z->where($b)->getField('lasttime');
		 ////获取图片类型
		 $imgtype=M('imgtype');
		 $type=$imgtype->select();
		 $this->assign('type',$type);
		 ////获取图片类型
		 ///获取图片信息//
		 if($_GET['id']){
			 $iid=$_GET['id'];
			 $img=M('img');
			 $result=$img->where('id='.$iid)->select();
			 $this->assign('result',$result); 
			 $this->assign('iid',$iid);
		 }
		 ///获取图片信息//
		 $this->assign('systemtime',$systemtime);
		 $this->assign('adminuser',$adminuser);
		 $this->assign('lasttime',$lasttime);
		 $this->display();
		////
	}
	///图片修改//
	public function imgpost(){
	  $M = M('img');
	  $fid=$_GET['id'];
	  $time=time();
  	  $config=array(
            'rootPath'=>"./Public/img/uploads/imgs/",
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
         $image->open("./Public/img/uploads/imgs/".$saveName);
         //将图片裁剪为400x400并保存为corp.jpg
         $image->crop($avatarData['width'],$avatarData['height'],$avatarData['x'], $avatarData['y'])->save("./Public/img/uploads/imgs/".$saveName);        
         $map['img']=$saveName;
         $M->where('id='.$fid)->save($map);
         $this->ajaxReturn($return);
      	 // 
      }else{
      	$this->ajaxReturn($Upload->getError());
      }
	}
	///图片修改//
	//图片编辑//
	public function uploadimg(){
		$where['id']=$_POST['id'];
		$data['title']=$_POST['title'];
		$data['typeid']=$_POST['section'];
		$re=M('img')->where($where)->save($data);
		if($re){
			$data['status']=1;
			$this->ajaxReturn($data); 
		}else{
			$data['status']=2;
			$this->ajaxReturn($data);
		}
	}
	//图片编辑//
	///图片删除///
	public function deletimg(){
		$id=$_POST['id'];
		$img=M('img');
		$re['id']=$id;
		$res=$img->where($re)->delete();
		$data['status']=1;
	    $this->ajaxReturn($data); 
	}
	///图片删除//
	///修改图片类型///
	public function edittyp(){
		$id=$_POST['id'];
		$type=$_POST['type'];
		$imgtype=M('imgtype');
		$whe['id']=$id;
		$data['type']=$type;
		$isre=$imgtype->where($data)->select();
		if($isre){
			$data['status']=-2;
	        $this->ajaxReturn($data); 
		}
		$re=$imgtype->where($whe)->save($data);
		if($re){
			$data['status']=1;
	        $this->ajaxReturn($data); 
		}else{
			$data['status']=-1;
	        $this->ajaxReturn($data); 
		}
	}
	///修改图片类型///
	///删除图片类型///
	public function deletetype(){
		$id=$_POST['id'];
		$imgtype=M('imgtype');
		$whe['id']=$id;
		$re=$imgtype->where($whe)->delete();
		if($re){
			$data['status']=1;
	        $this->ajaxReturn($data); 
		}else{
			$data['status']=-1;
	        $this->ajaxReturn($data); 
		}
	}
	///删除图片类型///
}
?>