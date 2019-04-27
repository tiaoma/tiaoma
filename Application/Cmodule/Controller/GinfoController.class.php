<?php
namespace Cmodule\Controller; 
use Think\Controller;
//全站信息
class GinfoController extends Controller {
    public function indexAction(){
    	  $mod = D('Member');
        $meb = $mod->getMemberInfoById(session('www_id'));
        $this->assign('www_member',$meb);
    }
    public function wwwcookieAction(){
    	if(cookie('bzjdauto') && session('www_id')==null){ 
              $bzjdauto = explode('|', $this->checkAutoLogin(cookie('bzjdauto')));
               $ip = get_client_ip();
               if(isset($bzjdauto[2])){                   
                  $mod = M('Member');
                  $info  = $mod->where("(username='{$bzjdauto[1]}' OR email='{$bzjdauto[1]}' OR mobile='{$bzjdauto[1]}') AND id='{$bzjdauto[0]}'")->find();
                  if($info){
                      
                       session('www_username',$info['username']);
                       session('www_id',$info['id']);
                       session('www_user_type',$info['user_type']);
                       session('www_head',$info['head']);
                       session('mobile_show',$info['mobile_show']);
                       session('www_credit1',$info['credit1']);
                       session('www_credit2',$info['credit2']);
                       session('www_unit_id',$info['unit_id']);
                     return true;
                  }
               }
        }
    }

    //判断是否自动登入
     public function checkAutoLogin($value,$type=0){         
        $key = md5(C('AUTO_KEYWORDS'));
        if($type){
            return str_replace('==','',base64_encode($key^$value));
        }
        $value = base64_decode($value);
        return $key^$value;
    }
    
}