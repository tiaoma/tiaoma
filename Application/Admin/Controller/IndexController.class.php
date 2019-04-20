<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function indexAction(){
        layout(false); 
        /*echo cmd5('sptm2019');  die();*/
        $this->display();
    }
    /*登陆*/
    public function submitloginAction()
    {
        if(IS_POST){
            layout(false); 
            $back = array('msg'=>'',url=>'');  
            $user = D('AuthUser');
            $flag = $user->create(); //接收数据 验证数据
            $code = I('code');   
            $isajax = I('isajax');  

            if(!$isajax){                 
                $this->error('非法访问',U('Index/index'));
                die();
            }  
             
            $config = array(
            'reset' => false // 验证成功后是否重置，这里才是有效的。
            );
            $verify = new \Think\Verify($config);
            if(!$verify->check($code,'')){
                $back['msg'] = '验证码错误';           
                echo json_encode($back) ;
                exit();
            }     
            if(!$flag)
            {
                $back['msg'] = '接收数据错误';           
                echo json_encode($back) ;
                exit();
            }
            $userData = $user->where("username='{$flag[username]}' AND password='{$flag[password]}'")->find();
            if(!$userData)
            {
                $back['msg'] = '账号或密码错误';    
                echo json_encode($back) ;
                exit();
            }

            //保持用户状态
            session('admin_username',$flag['username']);          
            session('admin_uid',$userData['uid']); 
            $back['url'] =   U('Admin/Home/index');
            echo json_encode($back) ;
            exit();
       }
       $this->error('非法访问',U('Index/index'));
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
    /*退出登录*/
    public function loginoutAction()
    {
        
        session('admin_username',null);          
        session('admin_uid',null);
        $this->success('退出登录成功',U('Admin/Index/index')); 
    }
}