<?php
namespace Home\Controller;
//商品查询
class GoodsController extends ComController {
    public function indexAction(){
        $weixin_config = C('weixin_conf'); //获取微信配置
        // 微信Jssdk 操作类 用分享朋友圈 JS
        require_once "./Jssdk/jssdk.php";
        $jssdk = new \JSSDK($weixin_config['appid'], $weixin_config['appsecret']);
        $signPackage = $jssdk->GetSignPackage();
        $this->assign('signPackage', $signPackage);
		$this->display(); 
    }
    public function infoAction(){ 
        /*$id = I('id');
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
        $this->assign("GBTitle",$info['title'].'_');  */
        $this->display();
     }

}