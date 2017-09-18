<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Think\Upload;
    class ImageController extends Controller{
		 public function image(){
			 //图片类型
			 $types=M('imgtype');
		     $type=$types->select();
             $this->assign('type',$type);
			 //图片类型
			 //获取图片信息
			 $imgs=M('img');
			 $id=$_GET['id'];
		     if($id==''){
              $count1=$imgs->count();
			  $Page = new \Think\Page($count1,$listRows=5);// 实例化分页类 传入总记录数和每页显示的记录数
			  $Page->lastSuffix = false;
              $Page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;每页<b>'.$listRows.'</b>条&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
              $Page->setConfig('prev','上一页');
              $Page->setConfig('next','下一页');
              $Page->setConfig('last','末页');
              $Page->setConfig('first','首页');
              $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
              $show = $Page->show();// 分页显示输出
              $imgdata=$imgs->limit($Page->firstRow.','.$Page->listRows)->select();		 
              session('himgs',$id);
             }else{
              $count1=$imgs->where("typeid=".$id)->count();  
			  $Page = new \Think\Page($count1,$listRows=5);// 实例化分页类 传入总记录数和每页显示的记录数
			  $Page->lastSuffix = false;
              $Page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;每页<b>'.$listRows.'</b>条&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
              $Page->setConfig('prev','上一页');
              $Page->setConfig('next','下一页');
              $Page->setConfig('last','末页');
              $Page->setConfig('first','首页');
              $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
              $show = $Page->show();// 分页显示输出
			  $imgdata=$imgs->where("typeid=".$id)->limit($Page->firstRow.','.$Page->listRows)->select();	 
              session('himgs',$id);
             } 	  
			 //获取图片信息    
			 $show = $Page->show();// 分页显示输出    
			 $this->assign('page',$show);// 赋值分页输出
			 $this->assign('imgdata',$imgdata);   //客服信息输出
			 $this->display();
		 }
	}
?>