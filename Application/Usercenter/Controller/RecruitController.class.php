<?php
namespace Usercenter\Controller;
use Think\Controller;
class RecruitController extends ComController {
    public function indexAction(){
        $mod = M('Recruit');
        $condition = array('uid'=>$this->_uid,'del'=>0);
        $count = $mod->where($condition)->count();// 查询满足要求的总记录数            
        $Page = new \Think\Page($count,$this->_page_item_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $showPage = $Page->show();// 分页显示输出
        $list  = $mod->where($condition)->order("addtime DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
        $statusName = array(0=>'待审',1=>"正在进行",2=>"完成",3=>"取消",4=>"失败");
        foreach($list as &$q){
           $q['ri_Status'] = $q['ri_Status']?"发布":"关闭";
            $q['statusname'] =$statusName[$q['status']]; 
        }
        
        $this->assign('page',$showPage);// 赋值分页输出*/
		$this->assign("list",$list);
        $this->display();
    }
    public function infoAction(){
    	$mod = M('Recruit');
        $id = intval(I('id'));

    	$condition = array('uid'=>$this->_uid,'del'=>0,'id'=>$id);  
        $info = $mod->where($condition)->find();

        if(!$info){
        	$this->error('该内容不存在!',U('Recruit/index'));
        	die();
        }
        $this->assign("info",$info);
        $this->display();
    }
    public function addAction(){
    	 
        $this->post();
    }
    public function editAction(){
         
        $this->post();
    }
    public function post(){
    	 $mod = M('Recruit');
    	 $id = intval(I('id'));
    	 if(IS_POST){
            $id = intval(I('ri_Id'));
            $data  = $mod->create();
            if(!$data['ri_PostName']){
            	 $this->error('标题不能为空!',U('Recruit/index'));
            	 die();
            }
            if(!$data['ri_PostPresent']){
            	 $this->error('描述不能为空!',U('Recruit/index'));
            	 die();
            }
            $uploadfileObj = A('Cmodule/Uploadfile');
            //$data['cover'] = $uploadfileObj->coverAction();
            $data['uid'] = $this->_uid;
            $data['addtime'] = $this->_time;

            if($id){
             if($mod->where("ri_Id='{$id}'")->save($data)){
                $this->success('修改成功!',U('Recruit/index'));
                die();
              }
            }else{
                if($mod->add($data)){
                $this->success('保存成功!',U('Recruit/index'));
                die();
              }
            }
            
            $this->error('操作失败!',U('Recruit/index'));
            die();
    	 }
         if($id){
            $condition = array('uid'=>$this->_uid,'del'=>0,'ri_Id'=>$id); 
        $info = $mod->where($condition)->find();
         }
    	
  
        $this->assign("info",$info);
        $this->display('post');
    }

    public function cancelAction(){
         $mod = M('Recruit');
         $id = intval(I('id'));
         $re = $mod->where("ri_Id='{$id}' and status<3")->save(array("status"=>3));
         if($re){
           $this->success('取消成功!',U('Recruit/index'));
         }else{
            $this->error('操作失败!',U('Recruit/index'));
         }
         
    }
}