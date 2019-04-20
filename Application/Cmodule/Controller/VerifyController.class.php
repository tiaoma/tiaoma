<?php
namespace Cmodule\Controller;
use Think\Controller;
class VerifyController extends Controller {
	 /*验证码*/
    public function indexAction(){
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
    //检查
    public function checkAction(){
    	$code = I('code');
    	$config = array(
        'reset' => false // 验证成功后是否重置，这里才是有效的。
        );

        $back = array('msg'=>'');  
        $verify = new \Think\Verify($config);
        if(!$verify->check($code,'')){
            $back['msg'] = '验证码错误'; 
        } 
        echo json_encode($back) ;
        exit();
    }
}