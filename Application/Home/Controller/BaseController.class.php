<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller
{

	public $_time ;
    public $_uid ;
    public $_page_item_num;
    public $_username;
    public $_expire;
    public $_dbprefix;  
    public function _initialize()
    {       
        $this->_time = time();
        $this->_page_item_num = C('PAGE_ITEM_NUM'); 
        $this->_expire = 604800;
        $this->_code_expire = 10;//验证码的有效时间
        $this->_dbprefix = C('DB_PREFIX'); 
        
         
    }
    

}