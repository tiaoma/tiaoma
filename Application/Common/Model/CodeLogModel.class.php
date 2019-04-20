<?php
namespace Common\Model;
use Think\Model;
//发送短信验证码记录
class CodeLogModel extends ComModel
{
    public function addLog($data){
        $data['addtime'] = $this->_time;
        $this->add($data);
    }
    public function check($mobile,$smscode){
    	if($this->where("mobile='{$mobile}' AND code='{$smscode}'")->find()){
    		return true;
    	}
    	return false;
    }
   
}