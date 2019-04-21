<?php
namespace Home\Controller;
use Think\Controller;
//政策法规
class PoliciesController extends ComController {
   public function indexAction(){    
        $mod = M('Policies');
        $count = $mod->where("del=0 and status=1")->count();// 查询满足要求的总记录数  
        $this->assign('count',$count);  
        $this->display();
     }
     //获取列表
     public function getlistAction(){
        layout(false);
        $mod = M('Policies');
        $count = $mod->where("del=0 and status=1")->count();// 查询满足要求的总记录数            
        $Page = new \Think\Page($count,$this->_page_item_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $showPage = $Page->show();// 分页显示输出
        $list  = $mod->where("del=0 and status=1")->order("displayorder DESC,id DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
      
       
         
        $this->assign('list',$list);
        $this->assign('page',$showPage);// 赋值分页输出*/ 
        $html =   $this->fetch('list');
        echo json_encode(array('listhtml'=>$html,'totalpage'=>$Page->totalPages));
        die();
     }
     public function infoAction(){ 
    	$id = I('id');
        $id = trim($id);

    	$mod = D('Policies');        
        $info = $mod->where("del=0 and status=1 and id='{$id}'")->find(); 
        
        if(!$info){
        	$this->error('该内容不存在',U('Policies/index'));
        	die();
        }
        $info['viewnum'] += 1;
        $mod->where("id='{$id}'")->save(array('viewnum'=>$info['viewnum']));
        $this->assign("info",$info); 
        $this->assign("GBTitle",$info['title'].'_');    
        $this->display();
     }

     
}