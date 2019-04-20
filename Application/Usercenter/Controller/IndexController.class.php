<?php
namespace Usercenter\Controller;
 
class IndexController extends ComController {
    public function indexAction(){
    	if(IS_POST){
            $memberObj = M('Member');
            $data = $memberObj->create();
            $memberObj->where("id='{$this->_uid}'")->save($data);
            $this->success('保存成功');
            die();
    	}
         $this->display();
    }
}