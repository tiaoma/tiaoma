<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;

class BaseController extends Controller
{

	public $_time ;
    public $_uid ;
    public $_page_item_num;
    public $_username;
    public $_expire;
    public $_dbprefix;  
    public function _initialize()
    {       
         ini_set('max_execution_time', '600');
         ini_set('post_max_size ', '100M'); 
         ini_set('upload_max_filesize', '200M'); 
        $this->assign('versionId',C('WWW_VERSION'));
        $this->assign('permmodel',C('PERM_MODEL'));
        $this->_time = time();
        $this->_uid = session('admin_uid');
        $this->_page_item_num = 20; 
        $this->_expire = 604800;
        $this->_username = session('admin_username');
        $this->_dbprefix = C('DB_PREFIX'); 

        if(!in_array(CONTROLLER_NAME, array('Index')) && !$this->_uid)
        {            
            $this->error('请登录...',U('Admin/Index/index'));
        } 
        //////////获取用户权限
        if($this->_uid){
          $upermstr = M("AuthUser")->where("uid=$this->_uid")->getField("perm");

          $upermarr = explode(",", $upermstr);
          $upermarr = array_filter($upermarr);
          $this->assign("upermarr",$upermarr);
        }
       $this->assign("demandstatusName",array(0=>"待审",1=>"进行中",2=>"完成",3=>"取消",4=>"交易失败"));   
       
    }
    //全文搜索
    public function fulltextSearch($table_name,$bid,$data=array('title'=>'','status'=>1),$type=0){
        $mod = D('FulltextSearch');
        if(!$type){//更新
            $mod->updateData($table_name,$data,$bid);
        }
        if($type){//删除
           $mod->deleteData($table_name,$bid);
        }
    }
    //生成单号
    public function createNO($table, $field, $prefix) {
        $mod = M($table);
        $billno = date('YmdHis') . random(6, true);
        while (1) {
            $info = $mod->where("{$field}='{$billno}'")->find();
            if (!$info) {
                break;
            }
            $billno = date('YmdHis') . random(6, true);
        }
        return $prefix . $billno;
    }
    //操作日志
    public function log($logname='',$type = '', $op = '',$uid=0)
    {       
        
        $log = array(
            'uniacid' => $this->_uniacid,
            'uid' => $uid?$uid:$this->_uid,
            'name' => $logname,
            'type' => $type,
            'op' => $op,
            'ip' => get_client_ip(),
            'createtime' => $this->_time
        );
        $permlogObj = M('PermLog');
        $permlogObj->add($log);
    }
    
   
}
