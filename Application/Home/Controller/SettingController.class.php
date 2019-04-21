<?php
namespace Home\Controller;
use Think\Controller;
class SettingController extends ComController {
    public function indexAction(){ 
    	 
        $this->display();
    }
    public function realnameAction(){
    	
    	 
        $this->display();
    }
    //性别
    public function genderAction(){
    	
    	if(IS_POST){
            $memberObj = M('Member');
            $data = $memberObj->create();
            $memberObj->where("id='{$this->_uid}'")->save($data);
            $this->json_show('','保存成功');
            
    	}
        $this->display();
    }
    //邮箱
    public function emailAction(){
        if(IS_POST){
            $code = I('code');
            if(strlen($code)!=4){                
                $this->json_show('','验证码错误');
                die();
            }
            if($code != session('www_check_code')){                
                $this->json_show('','验证码错误');
                die();
            }
            $memberObj = M('Member');
            $data = $memberObj->create();
            $memberObj->where("id='{$this->_uid}'")->save($data);
            session('www_check_code',null);
            $this->json_show('','保存成功');
            die();
        }         
        $this->display();
    }
    //验证邮箱是否被绑定
    public function checkemailAction(){
        $mod = D('Member');
        $email = I('email');
        if (!checkMailFormat($email)) {
            echo json_encode(array('code'=>1));
            die();
        }
        $re = $mod->getEmailMember($email);
        echo json_encode(array('code'=>($re?1:0)));
        die();
    }
    //修改头像
    public function headAction(){
        $this->display();
    }
    //修改密码
    public function pswAction(){
        if(IS_POST){
            $oldpsw = I('oldpsw');
            $newpsw = I('newpsw');
            $agpsw = I('agpsw');

            if(!$newpsw || !checkPassword($newpsw)){
                $this->json_show('','新密码格式不正确');                
                die();
            }
            if($agpsw!=$newpsw){
                $this->json_show('','新密码和确认密码不一致');
                die();
            }
            $mod = D("Member");
            $oldpsw = cmd5($oldpsw);
            $newpsw = cmd5($newpsw);

             
            $mod ->where("id='{$this->_uid}' AND password='{$oldpsw}'")->save(array('password'=>$newpsw));
 
            $this->json_show(1,'保存成功');
            die();
        }  
        $this->display();
    }
}
 