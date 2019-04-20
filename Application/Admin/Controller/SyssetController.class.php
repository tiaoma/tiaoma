<?php
namespace Admin\Controller;
use Think\Controller;

class SyssetController extends BaseController { 
	public function indexAction(){
         
		$this->display();
	}
	public function closeAction(){
		$mod = D('Sysset');
		if (IS_POST) {
			$data = I('data');
			$data = is_array($data) ? $data : array();
			$data['flag'] = intval($data['flag']);
			$data['detail'] = htmlspecialchars_decode($data['detail']);
			$data['url'] = trim($data['url']);
			$mod->updateSysset(array('close' => $data)); 
			$this->success("操作成功");
			die;
		}

		$data = $mod->getSysset('close');
        $this->assign('data',$data);  
		$this->display();
	}

}