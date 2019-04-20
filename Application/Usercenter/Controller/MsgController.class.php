<?php
namespace Usercenter\Controller;
//消息管理 
class MsgController extends ComController {
    public function indexAction(){
    	 $mod = M('MemberMsg');
    	 $mod->where(array('uid'=>$this->_uid))->save(array('isview'=>1));

    	 $memberObj = M('Member');
    	 $memberObj->where(array('id'=>$this->_uid))->save(array('msg_num'=>0));

    	 $sql = "SELECT m.* FROM {$this->_dbprefix}member_msg u , {$this->_dbprefix}msg m WHERE u.uid='{$this->_uid}' AND u.msgid=m.id AND del=0 ";
          
         $count = count($mod->query($sql));// 查询满足要求的总记录数            
    	 $Page = new \Think\Page($count,$this->_page_item_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
         $showPage = $Page->show();// 分页显示输出
         $sql .= ' ORDER BY m.id DESC  LIMIT '.$Page->firstRow.','.$Page->listRows;
         $list  = $mod->query($sql); 
         $this->assign('page',$showPage);// 赋值分页输出*/
		 $this->assign("list",$list);
		 $this->display(); 
    }
}