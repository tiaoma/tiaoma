<?php
namespace Admin\Controller;
use Think\Controller;
class MemberlistController extends BaseController {
	public function indexAction(){
		$memberObj = M("Member");
    $condition = 'del=0';
    $keyword=I("keyword");
    $this->assign("keyword",$keyword);
    if($keyword){
      $condition.=" and (username like '%$keyword%' or mobile like '%$keyword%')";
    }
    $user_type=I("user_type");
    $this->assign("user_type",$user_type);
    if(is_numeric($user_type)){
      $condition.=" and (user_type = '{$user_type}' )";
    }
    $islock=I("islock");
    $this->assign("islock",$islock);
    if(is_numeric($islock)){
      $condition.=" and (islock = '{$islock}' )";
    }
    

    $count = $memberObj->where($condition)->count();// 查询满足要求的总记录数            
    $Page = new \Think\Page($count,$this->_page_item_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $showPage = $Page->show();// 分页显示输出
    $list  = $memberObj->where($condition)->order("id DESC")->limit($Page->firstRow.','.$Page->listRows)->select();

   
		$islockName = array(0=>'否',1=>'是');
		$isblackName = array(0=>'正常',1=>'黑名单');
    $usertypeName = array(0=>'普通',1=>'单位');
		$this->assign("islockName",$islockName);
		$this->assign("isblackName",$isblackName);
    $this->assign("usertypeName",$usertypeName);
    $this->assign('page',$showPage);// 赋值分页输出*/
		$this->assign("list",$list);
		$this->display();
	}
	public function addAction(){
		$this->post();
	}
	public function editAction(){
		$this->post();
	}
	public function post(){
		$memberObj = D("Member");
		$id=I("id");
		if(IS_POST){
          $id=I("id");
          $data = I("data");
          if(!$id){
            $data['createtime'] = time();
          }
          if($data['password']){
             $data['password'] =cmd5(trim($data['password']));
          }else{
              unset($data['password']);
          }          
          
          if($memberObj->checkUsername($data['username'],$id) || !checkUsernameFormat($data['username'])){
             $this->error('该用户名存在或者格式不对');
             die;
          } 
          if($memberObj->checkMobile($data['mobile'],$id) || !checkMobileFormat($data['mobile'])){
             $this->error('该手机号存在或者格式不对');
             die;
          }
          if($data['email']){
            if($memberObj->checkEmail($data['email'],$id) || !checkMailFormat($data['email'])){
             $this->error('该邮箱存在或者格式不对');
             die;
          }
          }
           
          if(!$id){
           $memberObj->addMember($data);
           $this->success('添加成功',U('Memberlist/index'));
           die;
          }
          $memberObj->where("id='{$id}'")->save($data);
          $this->success('修改成功',U('Memberlist/index'));
          die;
		}
		if($id){
			$info = $memberObj->where("id='{$id}'")->find();
			$this->assign('info',$info);
		}
   
		$this->display('post');
	}
	public function delAction(){
		$memberObj = M("Member");
		$id=I("id");
		$memberObj->where("id='{$id}'")->save(array('del'=>1));
		$this->success("删除成功");
		die;
	}

}