<?php
namespace Admin\Controller;
use Think\Controller;
class HomeController extends BaseController {
    public function indexAction(){
    	layout(false);
    	$this->assign( 'username',$this->_username);
        $this->display();
    }     
}
