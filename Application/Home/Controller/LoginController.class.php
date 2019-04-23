<?php
namespace Home\Controller;
use Think\Controller;
//登陆 注册 退出
class LoginController extends ComController {
    public function indexAction(){          
        $this->checkLogin();    
        if(IS_POST){
           $mod = D('Member');
           $data = $mod->create();
           if(!$data){
                echo json_encode(array('code'=>'登录失败'));
                die();
           }
           $info = $mod->getMemberInfo($data,1,1);


           if(!$info){
                echo json_encode(array('code'=>'登录失败'));
                die();
           }
           if($info['islock']){
                echo json_encode(array('code'=>'很抱歉!你的账号由于违反网站规定被锁定!若有异议，请联系管理员!'));
                die();
           }
           if($info['isblack']){
                echo json_encode(array('code'=>'很抱歉!你的账号由于违反网站规定被拉入黑名单!若有异议，请联系管理员!'));
                die();
           }
           ////////自动登录
           $remember = I('remember'); 
           if($remember){
              $auto = $info['id'].'|'.$info['username'].'|'.$info['loginip'];
              $auto = $this->checkAutoLogin($auto,1);
              @cookie('bzjdauto',$auto,'expire='.C('AUTO_TIME_LOGIN').'');
           }
           //登录状态
           session('www_username',$info['username']);
           session('www_id',$info['id']);
           session('www_user_type',$info['user_type']);
           session('www_head',$info['head']);
           session('mobile_show',$info['mobile_show']);
           session('www_credit1',$info['credit1']);
           session('www_credit2',$info['credit2']);
           $url = session('preurl')?session('preurl'):U('Index/index');
           
           echo json_encode(array('code'=>'','url'=>$url));
           die();
        } 
       
        $this->display();
    }
    public function agreenmentAction(){           
        
    	  $this->display();
    }
     
    public function loginoutAction(){
         
        session('www_username',null);
        session('www_id',null);
        session('www_head',null);
        session('www_user_type',null);
        session('www_credit1',null);
        session('www_credit2',null);
        session('agent_id',null);
        session('mobile_show',null); 
        
        cookie('bzjdauto',null);
        $this->redirect("Index/index");
        die();
        
    }
    
    public function registerAction(){ 
    	  
       
        if(IS_POST){
           $mod = D('Member');
           $data = $mod->create();
           $code = I('code');
           $data['username'] = trim($data['username']);
           $data['mobile'] = trim($data['mobile']);
           $data['realname'] = trim($data['realname']);           
           $data['user_type'] = 0; 
            
           if($mod->checkUsername($data['username'])){
              echo json_encode(array('code'=>'该用户名已经存在'));
              die();
           }
           if (!checkMobileFormat($data['mobile'])) {
              echo json_encode(array('code'=>'手机号格式不正确'));
              die();
           }
           if($mod->checkMobile($data['mobile'])){
              echo json_encode(array('code'=>'手机号已被绑定'));
              die();
           }
          
           $mid = $mod->addMember($data);
           if(!$mid){
              echo json_encode(array('code'=>'注册失败'));
              die();
           }

           //登录状态
           $info = $mod->where("id='{$mid}'")->find();
           session('www_username',$data['username']);
           session('www_id',$mid);
           session('www_user_type',$data['user_type']);
           session('www_head',$info['head']);
           session('mobile_show',$info['mobile_show']);
           session('www_credit1',$info['credit1']);
           session('www_credit2',$info['credit2']);
           echo json_encode(array('code'=>'','url'=>U('Index/index')));
           die();
        }
         
    	  $this->display();
    }
       
    //验证 用户名是否可用
    public function checkusernameAction(){
        $username = trim(I('username'));         
        $mod = D('Member');        
        $re = $mod->checkUsername($username);
        echo json_encode(array('code'=>($re?1:0)));
        die();
    }
    //验证手机号是否被注册
    public function checkmobileAction(){
        $mod = D('Member');
        $mobile = I('mobile');
        
        if (!checkMobileFormat($mobile)) {
            echo json_encode(array('code'=>1));
            die();
        }
 
        
        $re = $mod->checkMobile($mobile);
        echo json_encode(array('code'=>($re?1:0)));
        die();
    }
     
    //检查验证码
    public function checkcodeAction(){
        $mobile  = I('mobile');
        $code = I('code');
        if($code != session('www_reg_code')){
            echo json_encode(array('code'=>1));
            die();
        }
        $codeLog = D('CodeLog');
        if(!$codeLog->where("code='{$code}' AND mobile='{$mobile}'")->find()){
            echo json_encode(array('code'=>1));
            die();
        }
        echo json_encode(array('code'=>0));
        die();
    }

    public function activationAction(){
        $this->checkLogin();   
        $type = I('type','');
        if (IS_POST) {
            if ($type == '2') {
                $id = session('www_activation_id');
                if (empty($id)) {
                    $this->error('参数出错', U('Home/Login/index'));
                }
                $memberCasualObj = D('MemberPre');
                $where = array();
                $where['id'] = $id;
                $info = $memberCasualObj->where($where)->find();
                $info['mobile_show'] = substr_replace($info['mobile'], '****', 3, 4);
                 
                $this->assign('info', $info);
            } else if ($type == '3') {
                $id = session('www_activation_id');
                
                if (empty($id)) {
                    $this->error('参数出错', U('Home/Login/index'));
                }
                $memberCasualObj = D('MemberPre');
                $where = array();
                $where['id'] = $id;
                $info = $memberCasualObj->where($where)->find();
                
                $this->assign('info', $info);
            } else if ($type == 'ok') {  
                $id = session('www_activation_id');
                
                if (empty($id)) {
                    $this->error('参数出错', U('Home/Login/index'));
                }

                $username = trim(I('username'));
                $pwd = trim(I('pwd'));
                $agpwd = trim(I('agpwd'));
                $mobile = trim(I('mobile'));

                $memberObj = D('Member');
                $memberCasualObj = D('MemberPre');
                 
              
                $where = array();
                $where['id'] = $id;
                $re = $memberCasualObj->where($where)->find();

                if (!$re) {
                    echo json_encode(array('code' => '参数错误'));
                    die();
                }
                 
                if ($re['mobile']!=$mobile) {
                    echo json_encode(array('code' => '参数错误'));
                    die();
                }
                if ($memberObj->getMobileMember($mobile)) {
                    echo json_encode(array('code' => '该手机号已被绑定'));
                    die();
                }
                
                $data['username'] = $re['username'];
                $data['password'] = cmd5($pwd);
                $data['mobile'] = $re['mobile'];              
                $data['address'] = $re['address'];       
               // $data['unit'] = $re['unit'];         
                $data['realname'] = $re['realname'];
                $data['user_type']  = $re['user_type'];
                $data['organization_id']  = $re['organization_id'];
                


                $mid = $memberObj->addMember($data);
                  
               
                if (!$mid) {
                    echo json_encode(array('code' => '激活失败'));
                    die();
                }
                session('www_activation_id', null);
               if(!$memberCasualObj->updateData($re['mobile'],$mid)){
                     $memberObj->delete($mid); 
                     echo json_encode(array('code' => '激活失败'));
                    die();
               }
                
                //登录状态
                $info = $memberObj->where("id='{$mid}'")->find();
                session('www_username', $data['username']);
                session('www_id', $mid);
                session('www_user_type', $data['user_type']);
                session('www_head', $info['head']);
                session('www_credit1', $info['credit1']);
                session('www_credit2', $info['credit2']);
                echo json_encode(array('code' => '', 'url' => U('Index/index')));
                die();
                
            }


        }
        if($type==''){
           session('www_activation_id', null);
        } 
        $this->display('activation'.$type);
         
    }
        //验证手机号在重构表但是不在member表里
    public function checkmobileactiveAction()
    {
        
        $mobile = I('mobile');
        if (!checkMobileFormat($mobile)) {
            echo json_encode(array('code' => 1));
            die();
        }


        //1是错误0是成功
        $condition = "mobile='{$mobile}' and del=0";
        
        //2018-02-05
        $memberObj = D('Member');
        if($memberObj->checkMobile($mobile,0,true)){
            echo json_encode(array('code' => 3));
            die();
        }       
 

        $memberPreObj = M('MemberPre');
        if ($memberPreObj->where($condition . " and uid<>0")->find()) {
            echo json_encode(array('code' => 2));
            die();
        }
        $re = $memberPreObj->where($condition . " and uid=0")->find();//找已经存在但是没有激活
        session("www_activation_id", $re['id']);
        echo json_encode(array('code' => ($re ? 0 : 1)));
        die();
    }

    
  
        
}