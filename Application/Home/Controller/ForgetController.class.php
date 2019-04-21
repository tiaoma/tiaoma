<?php
namespace Home\Controller;
use Think\Controller;
//找回密码
class ForgetController extends ComController {
    public function indexAction(){
    	$this->display();
    }
    public function steptwoAction(){
    	 
        $code = I('code'); 
        
        /*$verify = new \Think\Verify();
        if(!$verify->check($code,'')){
            $this->error('验证码错误',U('Forget/index'));
        } */ 
        $username = session('www_forget_username');
        $memberObj = D('Member');
        $member = $memberObj->getMemberInfoByAll($username);
        if(!$member){
           $this->error('参数错误',U('Forget/index'));
        }
        $member['mobile_show'] = substr_replace($member['mobile'],'****',3,4);
        $member['email_show'] = substr_replace($member['email'],'****',2,3);
        $this->assign('member',$member);
        $this->assign('www_forget_username',session('www_forget_username'));
    	$this->display();
    }
    public function stepthreeAction(){    	 
    	if(IS_POST){
    		$code = I('code');

    		if(strlen($code)!=4){                
                $this->error('验证码错误',U('Forget/index'));
                die();
            }
            if($code != session('www_check_code')){                
                $this->error('验证码错误',U('Forget/index'));
                die();
            }
            $username = session('www_forget_username');
            session('www_check_code',null);
	        if(!$username){
	            $this->error('操作错误',U('Forget/index'));
	            die();
	        }
	        $memberObj = D('Member');
	        $member = $memberObj->getMemberInfoByAll($username);


	        if(!$member){
	            $this->error('操作错误',U('Forget/index'));
	            die();
	        }

	        session('www_check_salt',cmd5($username.$this->_time));
            $this->assign('salt',session('www_check_salt'));
            $this->assign('member',$member);             
            $this->display();
            die();
    	}
    	$this->error('操作错误',U('Forget/index'));
	    die();
    }
    public function stepfourAction(){        
        if(IS_POST){
        	$salt = I('salt');
        	if($salt != session('www_check_salt')){
        		$this->error('操作错误',U('Forget/index'));
	            die();
        	}
        	$newpsw = I('newpsw');
            $agpsw = I('agpsw');
            $username = session('www_forget_username');
            $memberObj = D('Member');
            $re = $memberObj->getMemberInfoByAll($username);
            if(!$re){
              $this->error('操作错误',U('Forget/index'));
	           die();
            }
            if(!$newpsw || !checkPassword($newpsw)){
                $this->error('新密码格式不正确!',U('Forget/index'));
                die();
            }
            if($agpsw!=$newpsw){
                $this->error('新密码和确认密码不一致!',U('Forget/index'));
                die();
            }
            
            
            $newpsw = cmd5($newpsw);
             
            $memberObj ->where("id='{$re[id]}'")->save(array('password'=>$newpsw));
            session('www_check_salt',null);
            session('www_forget_username',null);

            $this->success('设置成功',U('Login/index'));
            die();
        }
        $this->error('操作错误',U('Forget/index'));
	    die();
    }
    /*验证码*/
    public function verifyAction(){
        layout(false);
        $config = array(
            'codeSet'=>'0123456789',
            'fontSize'=>30,
            'length'=>3,
            'useNoise'=>false
            );
        $Verify = new \Think\Verify($config);// 设置验证码字符为纯数字        
        $Verify->entry();
    }
    //检查验证码
    public function checkusernameAction(){
    	$username = trim(I('username'));
    	$code = trim(I('code'));
        
       /* $back = array('msg'=>'',url=>'');
        $config = array(
        'reset' => false 
        );
        $verify = new \Think\Verify($config);
        if(!$verify->check($code,'')){
            $back['msg'] = '验证码错误';           
            echo json_encode($back) ;
            exit();
        }  */

    	$memberObj = D('Member');
        $re = $memberObj->getMemberInfoByAll($username);
        
        if(!$re){
            $back['msg'] = '用户信息不存在';           
            echo json_encode($back) ;
            exit();
        }

        session('www_forget_username',$re['username']);
        session('www_forget_code',$code);
        $back['msg'] = '';  
        $back['url'] = U('Forget/steptwo');           
        echo json_encode($back) ;
        exit();
    }
}