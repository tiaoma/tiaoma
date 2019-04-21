<?php
namespace Admin\Controller;
class BannerController extends BaseController {
	public function indexAction(){
		  $mod = M('Banner');
    	$count = $mod->where("del=0")->count();// 查询满足要求的总记录数            
      $Page = new \Think\Page($count,$this->_page_item_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
      $showPage = $Page->show();// 分页显示输出
      $list  = $mod->where("del=0")->order("displayorder desc,id DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
      $niStatusName = array(0=>'不发布',1=>'发布');
      $placeName = array(0=>'首页',1=>'内页');
      $this->assign('niStatusName',$niStatusName);
      $this->assign('placeName',$placeName);
    	$this->assign('list',$list);
      $this->assign('page',$showPage);// 赋值分页输出
    	$this->display();
	}
//添加
	public function addAction(){

		if(IS_POST){
       $mod = D('Banner');
       $data = $mod->create();
          //图片文件上传
			     $upload = new \Think\Upload();// 实例化上传类    
    		   $upload->maxSize   =     3145728 ;// 设置附件上传大小   
    		   $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
    		   $upload->rootPath  =      './Public/Data/others';     
    		   $upload->savePath  =      '/'; // 设置附件上传目录    
           // 上传文件 
        
         if(isset($_FILES['href']) && $_FILES['href'] && !empty($_FILES['href']['tmp_name'])){
            $coverfileinfo = $upload->uploadOne($_FILES['href']);
            $data['href'] = $coverfileinfo['savepath'].$coverfileinfo['savename'];
            unset($_FILES['href']);
        } 
           //数据添加
           $data['createtime'] = time();
           if($mod->add($data)){
              $mod->updateCatchData($data['place']);
                $this->success('保存成功',U('Banner/index'));
                die();
           } 

           $this->error('保存失败');
           die();  
            
    	}
		$this->display();
	}

//删除
  public function delAction(){
    $mod=D("Banner");
    //查看该id是否在表中,如果存在就把表中对应的del值修改为1
    $before_id=I("id");
    if($data=$mod->where("id='{$before_id}'")->find()){
      $mod->where("id='{$before_id}'")->save(array('del'=>1));
      $mod->updateCatchData($data['place']);
      $this->success("删除成功！");
    }else{
      $this->error("该图片不存在！");
    }

  }
//编辑
  public function editAction(){
  
    $mod=D("Banner");
    $before_id=I('id');
    //页面点击跳转到编辑页面，编辑页面要将对应id下的相关内容显示出来,这是第一步
    $info=$mod->where("id='{$before_id}'")->find();
    if($info){
      $this->assign("info",$info);
    }else{
      $this->error("该图片不存在！");
    }
    //用户修改编辑页面中的相关内容后，这里获取并且到数据库对应位置去修改，这是第二步
    if(IS_POST){
       $data = $mod->create();
    	 $upload = new \Think\Upload();// 实例化上传类   
        $upload->maxSize   =     3145728 ;// 设置附件上传大小    
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
        $upload->rootPath  =      './Public/Data/others'; // 设置附件上传目录    // 上传文件     
        $upload->savePath  =      '/'; // 设置附件上传目录    // 上传文件 
       if(isset($_FILES['href']) && $_FILES['href'] && !empty($_FILES['href']['tmp_name'])){
            $coverfileinfo = $upload->uploadOne($_FILES['href']);
            $data['href'] = $coverfileinfo['savepath'].$coverfileinfo['savename'];
            unset($_FILES['href']);
        }
      $mod->where("id={$before_id}")->save($data);
      $mod->updateCatchData($data['place']);
      $this->success("修改成功",U('Banner/index'));
      die();
    }
    $this->display();
  }
}