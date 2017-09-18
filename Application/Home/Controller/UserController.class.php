<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Think\Upload;
use Think\Image;
    class UserController extends Controller{
	//用于显示用户基本信息//
	public function user(){
		$username= $_SESSION['username'];
		$user=M('user');
		$abc['username']=$username;
		$data=$user->where($abc)->select();
		$this->assign('data',$data);
		$this->display();
	}
	////
	//用户修改基本信息//
	public function updateuser(){
		//POST请求//
		if(IS_POST){
			$qq=$_POST['qq'];
			$addres=$_POST['address'];
			$user=M('user');
			if(($qq=="")&&($addres=="")){
				$data['status']=-1;
				$this->ajaxReturn($data);   
			}else if(($qq!="")&&($addres!="")){
				//修改QQ跟地址//
				$re['qq']=$qq;
				$re['address']=$addres;
				$abc=$user->where('username='.$_SESSION['username'])->save($re);
				if($abc){
					$data['status']=1;
				    $this->ajaxReturn($data);  
				}else{
					$data['status']=0;
				    $this->ajaxReturn($data); 
				}
				//修改QQ跟地址//				
			}else if(($qq!="")&&($addres=="")){
				//修改qq
				$re['qq']=$qq;
				$abc=$user->where('username='.$_SESSION['username'])->save($re);
				if($abc){
					$data['status']=1;
				    $this->ajaxReturn($data);  
				}else{
					$data['status']=0;
				    $this->ajaxReturn($data); 
				}
				//修改qq
			}else if(($qq=="")&&($addres!="")){
				//修改地址
				$re['address']=$addres;
				$abc=$user->where('username='.$_SESSION['username'])->save($re);
				if($abc){
					$data['status']=1;
				    $this->ajaxReturn($data);  
				}else{
					$data['status']=0;
				    $this->ajaxReturn($data); 
				}
				//修改地址
			}
		}
		//POST请求//
	}
	////
//图片切割上传//
public function postimg(){
	  $M = M('user');
	  $uename=$_GET['id'];
	  $ueid=$M->where('username='.$uename)->getField('uid');
  	  $config=array(
            'rootPath'=>"./Public/img/uploads/userimg/",
            'maxSize' =>'1048579',
            'saveName'=>$ueid,
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
         $M->where('username='.$username)->save($map);
         $this->ajaxReturn($return);
      	 // 
      }else{
      	$this->ajaxReturn($Upload->getError());
      }
  }
//图片切割上传//
}
?>