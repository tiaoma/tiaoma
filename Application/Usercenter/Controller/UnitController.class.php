<?php
namespace Usercenter\Controller;
use Think\Controller;
//单位信息
class UnitController extends ComController {
    public function indexAction(){
       

    	if(IS_POST){
            $data = $mod->create();
            if($info){
                $mod->where("uid='{$this->_uid}'")->save($data);
            }else{
               $data['isapply'] = 0;
               $data['apply_type'] = 10;
               $data['link'] = '';
               $data['zip_code'] = '';
               $data['founding_time'] = date('Y-m-d');
               $data['registered_capital'] = 0;                
               $data['unit_class'] = 0;
               $data['management_mode'] = 0;
               $data['unit_code'] = 0;
               $data['enterprise_output'] = 0;
               $data['own_assets'] = 0;
               $data['competent_department'] = 0;
               $data['business_license'] = 0;
               $data['status'] = 1;
               $data['uid'] = $this->_uid;
               $data['addtime'] = $this->_time;
               $mod->add($data);
            }
            
            
            $this->success('保存成功');
            die();
    	}
        if(!$info){
            $mod = D('Member');
            $meb = $mod->getMemberInfoById($this->_uid);
            $info['title'] = $meb['realname'];
        }
        $this->assign('info',$info);  
        $this->display();
    }
}