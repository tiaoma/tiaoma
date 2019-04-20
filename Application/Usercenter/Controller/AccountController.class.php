<?php
namespace Usercenter\Controller;
use Think\Controller;
class AccountController extends ComController {
    public function indexAction(){

        $this->display();
    }
    //修改密码
    public function pswAction(){
        $this->display();
    }
    public function pswverificationAction(){
        if(IS_POST){
            $code = I('code');
            if(strlen($code)!=4){                
                $this->error('验证码错误',U('Account/index'));
                die();
            }
            if($code != session('www_check_code')){                
                $this->error('验证码错误',U('Account/index'));
                die();
            }
            session('www_check_code',null);
            $this->display();
            die();
        }
        $this->error('操作错误',U('Account/index'));
        die();
    }
    public function pswfinishAction(){
        if(IS_POST){
            $oldpsw = I('oldpsw');
            $newpsw = I('newpsw');
            $agpsw = I('agpsw');
            /*if(!$oldpsw){
                $this->error('旧密码不能为空!');
                die();
            }*/
            if(!$newpsw || !checkPassword($newpsw)){
                $this->error('新密码格式不正确!');
                die();
            }
            if($agpsw!=$newpsw){
                $this->error('新密码和确认密码不一致!');
                die();
            }
            $mod = D("Member");
            $oldpsw = cmd5($oldpsw);
            $newpsw = cmd5($newpsw);

            /*$info = $mod ->where("id='{$this->_uid}' AND password='{$oldpsw}'")->find();
            if(!$info){
                $this->error('旧密码错误!');
                die();
            }*/
            $mod ->where("id='{$this->_uid}' AND password='{$oldpsw}'")->save(array('password'=>$newpsw));
            

            session('www_username',null);
            session('www_id',null);
            session('www_head',null);
            session('www_user_type',null);
            session('www_credit1',null);
            session('www_credit2',null);
            session('agent_id',null);
            @setcookie('hxwmauto','',$this->_time-1,'/'); 

            $this->display("pswfinish");
            die();
        }
        $this->display();
         
    }
    //支付密码
    public function paypswAction(){
        var_dump(session('www_check_code'));
        $this->display();
    }
    public function paypswverificationAction(){
        if(IS_POST){
            $code = I('code');
            if(strlen($code)!=4){                
                $this->error('验证码错误',U('Account/index'));
                die();
            }
            if($code != session('www_check_code')){                
                $this->error('验证码错误',U('Account/index'));
                die();
            }
            session('www_check_code',null);
            $this->display();
            die();
        }
        $this->error('操作错误',U('Account/index'));
    }
    public function paypswfinishAction(){
        if(IS_POST){
            $oldpsw = I('oldpsw');
            $newpsw = I('newpsw');
            $agpsw = I('agpsw');
            /*if(!$oldpsw){
                $this->error('旧密码不能为空!');
                die();
            }*/
            if(!$newpsw || !checkPayPassword($newpsw)){
                $this->error('新密码格式不正确!');
                die();
            }
            if($agpsw!=$newpsw){
                $this->error('新密码和确认密码不一致!');
                die();
            }
            $mod = D("Member");
            $oldpsw = cmd5($oldpsw);
            $newpsw = cmd5($newpsw);
            $info = $mod ->where("id='{$this->_uid}'")->find();
            if(!$info){
                $this->error('修改密码失败!');
                die();
            }
            /*if($info['paypwd'] && $info['paypwd']!=$oldpsw){
                $this->error('修改密码失败!');
                die();
            }*/
             
            $mod ->where("id='{$this->_uid}'")->save(array('paypwd'=>$newpsw));
            $this->redirect("Account/paypswfinish");
            die();
        }
        $this->display();
         
    }
    //修改手机号
    public function mobileAction(){

    	$this->display();
    }
    public function mobileverificationAction(){

        if(IS_POST){
            $code = I('code');
            if(strlen($code)!=4){                
                $this->error('验证码错误',U('Account/index'));
                die();
            }
            if($code != session('www_check_code')){                
                $this->error('验证码错误',U('Account/index'));
                die();
            }
            session('www_check_code',null);
            $this->display();
            die();
        }
        $this->error('操作错误',U('Account/index'));
    	 
    }
    public function mobilefinishAction(){
    	if(IS_POST){
            $mobile = I('mobile'); 
            if(!checkMobileFormat($mobile)){
                $this->error('手机号不能为空或格式不正确!');
                die();
            }
            $mod = D("Member");
             
            $info = $mod ->where("id='{$this->_uid}'")->find();
            if(!$info){
                $this->error('修改手机号失败!');
                die();
            }
            $re = $mod->getMobileMember($mobile);
            if($re){
                $this->error('该手机号已经被绑定!');
                die();
            }
            /*if($info['mobile'] ==$mobile){
                $this->error('手机号与之前一样!');
                die();
            }*/
            $mod ->where("id='{$this->_uid}'")->save(array('mobile'=>$mobile));
            $this->redirect("Account/mobilefinish");
            die();
        }
        $this->display();
         
    }
    //修改邮箱
    public function emailAction(){
        $this->display();
    }
    public function emailverificationAction(){
        if(IS_POST){
            $code = I('code');
            if(strlen($code)!=4){                
                $this->error('验证码错误',U('Account/index'));
                die();
            }
            if($code != session('www_check_code')){                
                $this->error('验证码错误',U('Account/index'));
                die();
            }
            session('www_check_code',null);
            $this->display();
            die();
        }
        $this->error('操作错误',U('Account/index'));
         
    }
    public function emailfinishAction(){
        if(IS_POST){
            $email = I('email'); 
            if(!checkMailFormat($email)){
                $this->error('邮箱不能为空或格式不正确!');
                die();
            }
            $mod = D("Member");
             
            $info = $mod ->where("id='{$this->_uid}'")->find();
            if(!$info){
                $this->error('修改邮箱失败!');
                die();
            }
            $re = $mod->getEmailMember($email);
            if($re){
                $this->error('该邮箱已经被绑定!');
                die();
            }
            /*if($info['mobile'] ==$mobile){
                $this->error('手机号与之前一样!');
                die();
            }*/
            $mod ->where("id='{$this->_uid}'")->save(array('email'=>$email));
            $this->redirect("Account/emailfinish");
            die();
        }
        $this->display();
         
    }
    //bind绑定手机号
    public function bindmobileAction(){
        $this->display();
    }
    public function bindmobilefinishAction(){
        if(IS_POST){
            $mobile = I('mobile'); 
            if(!checkMobileFormat($mobile)){
                $this->error('手机号不能为空或格式不正确!');
                die();
            }
            $mod = D("Member");
             
            $info = $mod ->where("id='{$this->_uid}'")->find();
            if(!$info){
                $this->error('修改手机号失败!');
                die();
            }
            $re = $mod->getMobileMember($mobile);
            if($re){
                $this->error('该手机号已经被绑定!');
                die();
            }
            /*if($info['mobile'] ==$mobile){
                $this->error('手机号与之前一样!');
                die();
            }*/
            $mod ->where("id='{$this->_uid}'")->save(array('mobile'=>$mobile));
            $this->redirect("Account/bindmobilefinish");
            die();
        }
        $this->display();
         
    }
    //验证手机号是否被注册
    public function checkmobileAction(){
        $mod = D('Member');
        $mobile = I('mobile');
        if (!checkMobileFormat($mobile)) {
            echo json_encode(array('code'=>1));
            die();
        }
        $re = $mod->getMobileMember($mobile);
        echo json_encode(array('code'=>($re?1:0)));
        die();
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
}