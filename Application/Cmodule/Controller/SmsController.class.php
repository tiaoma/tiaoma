<?php
namespace Cmodule\Controller; 
use Think\Controller;
//发送短信
class SmsController extends Controller {
	//发送验证码
    public function sendcodeAction(){
        $mod = D('Member');
        $mobile  = I('mobile');
        $from  = I('from');
        
        if($from=='forget'){//来自找回密码
            $username = session('www_forget_username');
            if(!$username){
                echo '操作错误!';
                die();
            }
            
            $member = $mod->getMemberInfoByAll($username);
            if(!$member){
                echo '操作错误!';
                die();
            }
            $mobile = $member['mobile'];
            if(!$mobile){
                echo '不存在已验证手机号!';
                die();
            }
        }
        if(!checkMobileFormat($mobile)){
             echo '发送短信失败!';
             die();
        }
        //从注册来 检查手机号是否绑定
        if($from=='register'){
          $re = $mod->checkMobile($mobile);
          if($re){
             echo '该手机号已绑定!';
             die();
          }
        } 
        
        
        $authnum = srandNum();
        $re = sendMsnFun($mobile,array('code'=>$authnum),1); 
         
        if ($re) {
            if($from=='register'){
              session(array('name'=>'www_reg_code','expire'=>$this->_code_expire));
              session('www_reg_code',$authnum);//记住二维码
            }else{
              session(array('name'=>'www_check_code','expire'=>$this->_code_expire));
              session('www_check_code',$authnum);
            }
            echo "短信验证码已发送成功，请注意查收短信";
            
        }else{
            //如果不成功
            echo "短信验证码发送失败，请联系客服";
            
        } 
        $codeLog = D('CodeLog');
        $codeLog->addLog(array('mobile'=>$mobile,'code'=>$authnum,'messageid'=>0));
         
        die();
    }
    //检查验证码的正确性
    public function checkAction(){
        $code = I('code');
        if(strlen($code)!=4){
          echo '验证码错误';
          die();
        }
        if(strlen($code)!=4){
          echo '验证码错误';
          die();
        }
        
        if(session('www_check_code') != $code){
          echo '验证码错误';
          die();
        }
        echo '';
        die();
    }

    //发送通知类短信
    public function noticeAction(){
        $mobile = I('mobile');
        $type = I('type',3);

        
        $type = 3; 
        //type=3 激活通知
        sendMsnFun($mobile,array('code'=>''),$type);

        echo '发送短信成功';
        die();

    }
}