<?php
namespace Home\Controller;
//商品查询
class GoodsController extends ComController {
    public function indexAction(){
    	
		$this->display(); 
    }
    public function infoAction(){ 
        $id = I('id');
        $id = trim($id);

        $mod = D('Goods');        
        $info = $mod->where("del=0 AND id='{$id}'")->find(); 
        
        if(!$info){
            $this->error('该内容不存在',U('Goods/index'));
            die();
        }
        $info['viewnum'] += 1;
        $mod->where("del=0 AND id='{$id}'")->save(array('viewnum'=>$info['viewnum']));
        $this->assign("info",$info); 
        $this->assign("GBTitle",$info['title'].'_');  
        $this->display();
     }

}