<?php
namespace Usercenter\Controller;
use Think\Controller;
class ComController extends Controller {
	public $_time ;
    public $_uid ;
    public $_page_item_num;
    public $_username;
    public $_expire;
    public $_uniacid = 1;    
    public $_memberInfo = array();
    public $_dbprefix;
    public function _initialize(){ 
    	$this->_time = time();
        $this->_page_item_num = C('PAGE_ITEM_NUM'); 
        $this->_expire = 604800;
        $this->_code_expire = 10;//验证码的有效时间
        $this->_dbprefix = C('DB_PREFIX'); 
        
        
      
        $this->isLogin();

        $this->_username = session('www_username');
        $this->_uid = session('www_id')?session('www_id'):0;         
        $this->assign('www_head',session('www_head')); 
        $this->assign('www_credit1',intval(session('www_credit1')));
        
         
           
         
    }
    public function isLogin(){
        if((session('www_username')==null || session('www_id')==null)){
            $subBox = I('subBox',array());
            $subBoxs = implode(',', $subBox);
            $this->redirect("Home/Login/index",array('subBoxs'=>$subBoxs));
            die();
        }
        //返回用户数据
        $ginfoObj = A('Cmodule/Ginfo');
        $ginfoObj->indexAction();
        $this->_username = session('www_username');
        $this->_uid = session('www_id')?session('www_id'):0;  
    }
    // 会员 账号是 被冻结
    public function memberIsBlack(){
        session('www_username',null);
        session('www_id',null);
        session('www_head',null);
        session('www_user_type',null);
        session('www_credit1',null);
        session('www_credit2',null);
        session('agent_id',null);
        @setcookie('hxwmauto','',$this->_time-1,'/'); 
        $this->redirect("Home/Mall/memberblack");
        die();
         
    }
    
}