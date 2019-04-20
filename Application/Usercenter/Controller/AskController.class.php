<?php
namespace Usercenter\Controller;
//我的咨询
class AskController extends ComController {
    public function indexAction(){
    	$mod = M('Feedback'); 	  
 
        $condition = array('uid'=>$this->_uid,'del'=>0);
        $count = $mod->where($condition)->count();// 查询满足要求的总记录数            
        $Page = new \Think\Page($count,$this->_page_item_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $showPage = $Page->show();// 分页显示输出
        $list  = $mod->where($condition)->order("addtime DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
         
        
        $this->assign('page',$showPage);// 赋值分页输出*/
        $this->assign("list",$list);
        $this->display();
    }
}