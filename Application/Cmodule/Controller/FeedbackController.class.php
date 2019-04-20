<?php
namespace Cmodule\Controller; 
use Think\Controller;
//咨询
class FeedbackController extends Controller {
     
    public function askAction(){
        $uid = session('www_id');
        $mod = M('Feedback'); 
        $ip =get_client_ip(); 
        $reason = I('reason');
        $mobile = I('mobile');
         
        
        $today = strtotime(date('Y-m-d'));
         
        $num = count($mod->where("ip='{$ip}' AND uid='{$this->_uid}' AND addtime>'{$today}'")->select());
        if($num>5){
            echo json_encode(array('code'=>0,'msg'=>'提交咨询太频繁')); 
            die();
        }
        if(!$reason){
            echo json_encode(array('code'=>0,'msg'=>'咨询内容不能为空')); 
            die();
        }
        $data['ip'] = $ip;
        $data['reason'] = $reason;
        $data['mobile'] = $mobile;
        $data['addtime'] = time();
        $data['uid'] = $uid?$uid:0;
        if(!$mod->add($data)){
            echo json_encode(array('code'=>0,'msg'=>'提交咨询失败'));
            die();
        }
       echo json_encode(array('code'=>1,'msg'=>'提交咨询成功'));
        die();
    }
}