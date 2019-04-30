<?php
namespace Home\Controller;
//商品查询
class GoodsController extends ComController {
    public function indexAction(){
        $this->useJssdk();//调用jssdk
		$this->display(); 
    }
    public function infoAction(){ 
        $barcode = I('barcode');
        $barcode = trim($barcode);

        $mod = D('Goods');        
        $info = $mod->where("del=0 and status=1 AND barcode='{$barcode}'")->find();

        if(!$info){
            $this->error('该商品不存在',U('Goods/index'));
        }
        $mod->where("del=0 AND barcode='{$barcode}'")->setInc('viewnum');
        $standard = M('standard')->where(['standardnumber'=>$info['standardnum']])->find();
        $this->assign("info",$info); 
        $this->assign("standard",$standard);
        $this->assign("GBTitle",$info['title'].'_');
        $this->display();
     }

}