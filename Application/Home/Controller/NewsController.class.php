<?php
namespace Home\Controller;
use Think\Controller;
//新闻
class NewsController extends ComController {
	 
    public function indexAction(){ 
    	$mod = D('News');
        $condition = 'del=0 AND status=1';
        $count      = $mod->where($condition)->count();             
        $this->assign('count',$count);       
        $this->display();
     }
      //获取列表
     public function getlistAction(){
        layout(false);
        $mod = D('News');
        $condition = 'del=0 AND status=1';
        $count      = $mod->where($condition)->count();             
        $Page       = new \Think\Page($count,$this->_page_item_num); 
        $showPage       = $Page->show();// 分页显示输出
        $list  =   $mod->where($condition)->order("displayorder desc,addtime DESC")->limit($Page->firstRow.','.$Page->listRows)->select(); 
         
        $this->assign('list',$list);   
        $this->assign('newstypelist',C('NEWS_TYPE_LIST'));      
        $html =   $this->fetch('list');
        
        echo json_encode(array('listhtml'=>$html,'totalpage'=>$Page->totalPages));
        die();
     }
     public function infoAction(){ 
    	$id = I('id');
    	$id = trim($id);

    	$mod = D('News');        
        $info = $mod->where("del=0 AND status=1 AND id='{$id}'")->find(); 
        
        if(!$info){
        	$this->error('该新闻不存在',U('News/index'));
        	die();
        }
        $info['viewnum'] += 1;
        $mod->where("del=0 AND status=1 AND id='{$id}'")->save(array('viewnum'=>$info['viewnum']));
        $this->assign("info",$info); 
        $this->assign('newstypelist',C('NEWS_TYPE_LIST'));  
        $this->assign("GBTitle",$info['title'].'_');  
        $this->display();
     }
}