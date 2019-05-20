<?php
namespace Home\Controller;
use Think\Controller;
class ComController extends Controller {
	public $_time ;
    public $_uid ;
    public $_unitid;
    public $_page_item_num;
    public $_username;
    public $_expire;
    public $_uniacid = 1;    
    public $_memberInfo = array();
    public $_dbprefix;
    public function _initialize(){ 
    	$this->_time = time();
        $this->_page_item_num = C('PAGE_ITEM_NUM'); 
        $this->_expire = 604800;
        $this->_code_expire = 10;//验证码的有效时间
        $this->_dbprefix = C('DB_PREFIX'); 
         
        $gBTitles =  array('News' => '新闻动态','Policies' => '政策法规','Notice' => '通知公告');
        if(isset($gBTitles[CONTROLLER_NAME])){
            $this->assign("GBMenu",$gBTitles[CONTROLLER_NAME].'_'); 
        } 
         //在某些版块必须是登录状态下才能访问
        $this->isLogin();    
        $this->assign('globalRandNum',time());
       
             
    }
    public function isLogin(){
        //返回用户数据
        $ginfoObj = A('Cmodule/Ginfo');
        $ginfoObj->wwwcookieAction();

        if((session('www_username')==null || session('www_id')==null) &&  in_array(CONTROLLER_NAME, array('Setting','Ugoods','Umsg','Uask'))){      
            $this->redirect("Login/index");
            die();
        }
        //返回用户数据        
        $ginfoObj->indexAction();
        $this->_username = session('www_username');
        $this->_uid = session('www_id')?session('www_id'):0; 
        $this->_unitid = session('www_unit_id')?session('www_unit_id'):0; 
    }
    public function checkLogin(){
        if(session('www_username')!=null && session('www_id')!=null){
            $this->redirect('Index/index');
            die();
        }
    }
     public function isUserLogin(){
        if(session('www_username')!=null && session('www_id')!=null){
            return true;
        }
        return false;
    }
    //获取会员信息
    public function getMemberInfo($uid){
        $mod = D('Member');
        $info = $mod->getMemberInfoById($uid);
        if($info){
            $info['uid'] = $info['id'];
        }
        return $info;
    }
    public function json_show($code,$msg='',$url='',$data=array()){
        echo json_encode(array('code'=>$code,'msg'=>$msg,'url'=>$url,'data'=>$data));
        die(); 
    }
    public function getExpert($expertid=0){
      $mod = M('Expert');
      $condition['del'] = 0;
      $condition['status'] = 1;
      if($expertid){
        $condition['id'] = $expertid;
      }
      $count      = $mod->where($condition)->count();// 查询满足要求的总记录数           
      
      $qy = $mod->where($condition)->order('displayorder desc,id desc')->select(); 
      $list = array();    
      foreach ($qy as $value) {
       $list[$value['id']] = $value;
      }
      return $list;
    }

    /**
     * 调用微信jssdk
     */
    public function useJssdk(){
        $weixin_config = C('weixin_conf'); //获取微信配置
        // 微信Jssdk 操作类 用分享朋友圈 JS
        require_once "./Jssdk/jssdk.php";
        $jssdk = new \JSSDK($weixin_config['appid'], $weixin_config['appsecret']);
        $signPackage = $jssdk->GetSignPackage();
        $this->assign('signPackage', $signPackage);
    }
}
    
    