<?php
namespace Cmodule\Controller;
use Think\Controller;
class EmailController extends Controller {
	public function sendAction(){
		$email = I('email','');
		$mtype = I('mtype',0);//已登录身份验证

       /* $email = '250875880@qq.com';
        $mtype = 1;*/
		if(!$mtype){
        	$memberObj = D('Member');
            $member = $memberObj->getMemberInfoById($this->_uid) ;
            $email = $member && $member['email']?$member['email']:$email;        
        }
        if(!checkMailFormat($email)){
             echo '发送邮件失败!';
             die();
        }
        $authnum = srandNum(); 

        layout(false);
        $this->assign('authnum',$authnum);
        $this->assign('pubdate',date('Y年m月d日'));
        $emailhtml = $this->fetch();
		$re = sendMail($email, '邮箱身份验证', $emailhtml);     
        if(!$re){
            echo '发送邮件失败!';
            die();
        }
        $codeLog = D('CodeLog');
        $codeLog->addLog(array('email'=>$email,'code'=>$authnum));
        session(array('name'=>'www_check_code','expire'=>$this->_code_expire));
        session('www_check_code',$authnum);
        echo "发送邮件成功，请注意查收";
            
	}
    public function sendnewAction(){
         
            $memberObj = D('Member');
            $member = $memberObj->getMemberInfoById($this->_uid) ;
            $email = $member['email'];        
        
        if(!checkMailFormat($email)){
             echo '发送邮件失败!';
             die();
        }
        $authnum = srandNum();
        $re = sendMail($email, '邮箱身份验证', '邮箱校验码为：'.$authnum);     
        if(!$re){
            echo '发送邮件失败!';
            die();
        }
        $codeLog = D('CodeLog');
        $codeLog->addLog(array('email'=>$email,'code'=>$authnum));
        session(array('name'=>'www_check_code','expire'=>$this->_code_expire));
        session('www_check_code',$authnum);
        echo "";
            
    }
    public function sendmsnAction(){        
        header("Content-type: text/html; charset=utf-8");
        $username = session('www_forget_username');
        if(!$username){
            echo '操作错误!';
            die();
        }
        $memberObj = D('Member');
        $member = $memberObj->checkUsername($username);
        if(!$member){
            echo '操作错误!';
            die();
        }
        $email = $member['email'];
        if(!$email){
            echo '不存在已验证邮箱!';
            die();
        }
 
        if(!checkMailFormat($email)){
             echo '发送邮件失败!';
             die();
        }
        $authnum = srandNum();
        $re = sendMail($email, '邮箱身份验证', '邮箱校验码为：'.$authnum);     
        if(!$re){
            echo '发送邮件失败!';
            die();
        }
        $codeLog = D('CodeLog');
        $codeLog->addLog(array('email'=>$email,'code'=>$authnum));
        session(array('name'=>'www_check_code','expire'=>$this->_code_expire));
        session('www_check_code',$authnum);
        echo "";//发送邮件成功，请注意查收
            
    }
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
}
