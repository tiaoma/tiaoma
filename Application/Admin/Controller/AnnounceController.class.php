<?php
namespace Admin\Controller;
use Think\Controller;
class AnnounceController extends BaseController {
	public function indexAction(){
		$announceObj = M("Announce");
    $count = $announceObj->count();// 查询满足要求的总记录数            
    $Page = new \Think\Page($count,$this->_page_item_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $showPage = $Page->show();// 分页显示输出
    $list  = $announceObj->order("displayorder DESC,id DESC")->limit($Page->firstRow.','.$Page->listRows)->select();

		$niStatusName = array(0=>'不发布',1=>'发布');
		$niTypeName = array(0=>'公告',1=>'规则',2=>'活动');

		$this->assign("niStatusName",$niStatusName);
		$this->assign("niTypeName",$niTypeName);
    $this->assign('page',$showPage);// 赋值分页输出*/
		$this->assign("list",$list);
		$this->display();
	}
	public function addAction(){
		$this->post();
	}
	public function editAction(){
		$this->post();
	}
	public function post(){
		$announceObj = D("Announce");
		$id=I("id");
		if(IS_POST){
          $data = $announceObj->create();

          $data['detail'] = I('detail','','htmlspecialchars_decode');
          $data['createtime'] = time();

          
          ////////////
            $upload = new \Think\Upload();// 实例化上传类   
            $upload->maxSize   =     3145728 ;// 设置附件上传大小    
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
            $upload->rootPath  =      './Public/Data/others'; // 设置附件上传目录    // 上传文件     
            $upload->savePath  =      '/'; // 设置附件上传目录    // 上传文件  
           /* $data['thumb'] = '/goodesdef.jpg';*/
            if(isset($_FILES['thumb']) && $_FILES['thumb'] && !empty($_FILES['thumb']['tmp_name'])){
                $coverfileinfo = $upload->uploadOne($_FILES['thumb']);
                $data['thumb'] = $coverfileinfo['savepath'].$coverfileinfo['savename'];
                unset($_FILES['thumb']);
            }  
            ////////////////
            $imginfolist   =   $upload->upload();
            $gid = $data['id'];
            if($imginfolist)   
            {
                $image = new \Think\Image();
               $attachment = D('Attachment');
                foreach($imginfolist as $imginfo)
                {
                $attachment->addAttachment($imginfo,$gid,0);  
                $thumb_file = './Public/Data/servicetype/' . $imginfo['savepath'] . $imginfo['savename'];
                $save_path = './Public/Data/servicetype/' .$imginfo['savepath'] . 'mini_' . $imginfo['savename'];
                $image->open( $thumb_file )->text(C('APP_NAME'),'./Public/Fonts/zl.otf',20,'#A7AAA4',\Think\Image::IMAGE_WATER_SOUTHWEST)->thumb( 800, 800 )->save( $thumb_file );
                /*$image->open( $thumb_file )->text(C('APP_NAME'),'./Public/Fonts/zl.otf',24,'#A7AAA4',\Think\Image::IMAGE_WATER_SOUTHWEST)->thumb( $thumbWidth, $thumbHeight )->save( $save_path );*/
                } 
            }
          if(!$id){
           $bid = $announceObj->add($data);
           $announceObj->updateCatchData();
           $this->fulltextSearch('announce',$bid,array('title'=>$data['title'],'status'=>$data['status']));
           $this->success('添加成功',U('Announce/index'));
           die;
          }
          
          $announceObj->save($data);
          $announceObj->updateCatchData();
          $this->fulltextSearch('announce',$data['id'],array('title'=>$data['title'],'status'=>$data['status']));
          $this->success('修改成功',U('Announce/index'));
          die;
		}
		if($id){
			$info = $announceObj->where("id='{$id}'")->find();
			$this->assign('info',$info);
		}
		$this->display('post');
	}
	public function delAction(){
		$announceObj = D("Announce");
		$id=I("id");
		$announceObj->where("id='{$id}'")->delete();
    $announceObj->updateCatchData();
    $this->fulltextSearch('announce',$id,'',1);
		$this->success("删除成功");
		die;
	}
}