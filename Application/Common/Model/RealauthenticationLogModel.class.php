<?php
namespace Common\Model;
use Think\Model;
//实名认证记录
class RealauthenticationLogModel extends ComModel
{
    //获取记录
    public function getLog($authid,$uid){
       return $this->where(array('uid'=>$uid,'id'=>$authid))->order("id DESC")->find();
    }
    //添加记录
    public function addLog($data){  
         //单位
         if($data['auth_type']){
            $data['auth_unit_name'] = trim($data['auth_unit_name']);
            $data['auth_unit_code'] = trim($data['auth_unit_code']);
            
            if(!$data['auth_unit_name'] || !$data['auth_unit_code']){
               return false;
            }

         }
         //个人
         if(!$data['auth_type']){
            $data['auth_personal_name'] = trim($data['auth_personal_name']);
            $data['auth_personal_code'] = trim($data['auth_personal_code']);
            
            if(!$data['auth_personal_name'] || !$data['auth_personal_code']){
               return false;
            }

         }



         if(!$data['auth_images']){
            return false;
         }

         $data['apply_time'] = $this->_time;
        
         if($auth_id = $this->add($data)){
             //更新会员信息
             $mod = D('Member');
             $mod->where(array('id'=>$data['uid']))->save(array('auth_id'=>$auth_id));
             return $auth_id;
         }

          return false;
  
    }
     
   
}