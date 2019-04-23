<?php
namespace Home\Controller;
use Think\Controller;
//实名认证
class RealauthenticationController extends ComController {
    public function indexAction(){
        $memberObj = D('Member');
        $meb = $memberObj->getMemberInfoById($this->_uid);

        //判读是否已经提交
        $mod = D('RealauthenticationLog');
        $log = $mod->getLog($meb['auth_id'],$this->_uid);
         $this->assign('log',$log);
         
        if($log){
            if($log['status']==0 || $log['status']==1){
                $this->display('steptwo');//正在审核
                die();
            }
            if($log && $log['status']==2){
            $this->display('result_succ');
            die();
            }
            if($log && $log['status']==-2){
                $this->display('result_fail');
                die();
            } 
           
        }
        
        $this->display();
        
    }
    public function steptwoAction(){
        $memberObj = D('Member');
        $meb = $memberObj->getMemberInfoById($this->_uid);

        if(IS_POST){
            $mod = D('RealauthenticationLog');
            $data = $mod->create();
            
            

            $upload = new \Think\Upload();// 实例化上传类   
            $upload->maxSize   =     3145728 ;// 设置附件上传大小    
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
            $upload->rootPath  =      './Public/Data'; // 设置附件上传目录    // 上传文件     
            $upload->savePath  =      '/'; // 设置附件上传目录    // 上传文件     
             
            if(isset($_FILES['authfile']) && $_FILES['authfile'] && !empty($_FILES['authfile']['tmp_name'])){
            $coverfileinfo = $upload->uploadOne($_FILES['authfile']);
            $data['auth_images'] = $coverfileinfo['savepath'].$coverfileinfo['savename'];
            unset($_FILES['authfile']);
            }  

            $data['uid'] = $this->_uid;
            
            $re = $mod->addLog($data);
            if(!$re){
                $this->error('提交审核失败',U('Realauthentication/index'));
                die();
            }

            $this->display();
            die();
      
        }
        //判读是否已经提交
        $mod = D('RealauthenticationLog');
        $log = $mod->getLog($meb['auth_id'],$this->_uid);
        if($log && ($log['status']==0 || $log['status']==1)){
            $this->display();
            die();
        }

        $this->error('访问错误',U('Realauthentication/index'));
        die();
    }
    public function resultAction(){
        $memberObj = D('Member');
        $meb = $memberObj->getMemberInfoById($this->_uid);
        
        //判读是否已经提交
        $mod = D('RealauthenticationLog');
        $log = $mod->getLog($meb['auth_id'],$this->_uid); 

        $this->assign('log',$log);
         
       

        if($log && $log['status']==2){
            $this->display('result_succ');
            die();
        }
        if($log && $log['status']==-2){
            $this->display('result_fail');
            die();
        } 
        $this->error('访问错误',U('Realauthentication/index'));
        die();
    }
}