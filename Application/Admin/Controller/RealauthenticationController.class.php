<?php
//实名认证
namespace Admin\Controller;
use Think\Controller;
class RealauthenticationController extends BaseController {
	public function indexAction(){
	$Realauthentication = D("RealauthenticationLog");
	$keyword = I('keyword');
	$this->assign("keyword",$keyword);
	$where='';
	if($keyword){
		$where = " where m.username LIKE '%$keyword%' or m.mobile LIKE '%$keyword%' or rl.auth_unit_name LIKE '%$keyword%' or rl.auth_personal_name LIKE '%$keyword%' or rl.auth_unit_code LIKE '%$keyword%' or rl.auth_unit_code LIKE '%$keyword%'";
	}
	
    $sql = "SELECT rl.*,m.username,m.mobile FROM ".$this->_dbprefix."realauthentication_log rl left join ".$this->_dbprefix."member m"." on rl.uid=m.id ".$where." order by rl.apply_time desc";
	$list = $Realauthentication->query($sql);
	$statusName = array(
		  "0"=>"待审核",
		  "1"=>"正在审核",
		  "2"=>"审核完成",
		  "-1"=>"取消审核",
		  "-2"=>"审核失败",
		);
	$this->assign("statusName",$statusName);
	$this->assign("list",$list);
	$this->display();
	}
	public function editAction(){
		$Realauthentication = D("RealauthenticationLog");
		$memberObj = D("Member");
		$id=I("id");
		$info = $Realauthentication->where("id='{$id}'")->find();
		$memberinfo = $memberObj->getMemberInfoById($info['uid']);
		$this->assign("memberinfo",$memberinfo);
		$this->assign("info",$info);
		$this->display();
	}
	///待审核变为正在审核
	public function verifyAction(){
		$id = I("id");
		$Realauthentication = D("RealauthenticationLog");
		$info = $Realauthentication->where("id='{$id}' and status=0")->find();
		if(!$info){
			$this->error("对应的内容不存在或者已经修改");
			die;
		}
		$Realauthentication->where("id='{$id}'")->save(array("status"=>1,"verify_time"=>$this->_time));
		$this->success("修改成功");
	}
	///正在审核变为有结果审核（失败，或者成功）
	public function verifyingAction(){
		$id = I("id");
		$Realauthentication = D("RealauthenticationLog");
		$info = $Realauthentication->where("id='{$id}' and status=1")->find();
		if(!$info){
			$this->error("对应的内容不存在或者已经修改");
			die;
		}
		$Realauthentication->where("id='{$id}'")->save(array("status"=>2,"finish_time"=>$this->_time));
		$memberObj = D("member");
		$memberObj->where("id='{$info[uid]}'")->save(array("auth_time"=>$this->_time));

		$memberunit = D("MemberUnit");
		$data = array();
		$data['addtime'] = time();
        $data['uid'] = $info['uid']; 
        $data['title'] = $info['auth_unit_name'];  
        $data['management_mode'] = 0;  
        $data['unit_code'] = $info['auth_unit_code'];  
        $data['business_license'] = $info['auth_images']; 
		$memberunit->add($data);
		$this->success("修改成功");
	}
	public function errverifyingAction(){
		$id = I("id");
		$this->assign("id",$id);
		$this->display("failVerify");
	}
	public function failVerifyAction(){
		$id = I("id");
		$fail_remark = I("fail_remark");
		$Realauthentication = D("RealauthenticationLog");
		$info = $Realauthentication->where("id='{$id}' and status=1")->find();
		if(!$info){
			$this->error("对应的内容不存在或者已经修改",U('Realauthentication/index'));
			die;
		}
		$Realauthentication->where("id='{$id}'")->save(array("status"=>-2,"finish_time"=>$this->_time,"fail_remark"=>$fail_remark));
		$memberObj = D("member");
		$memberObj->where("id='{$info[uid]}'")->save(array("auth_time"=>$this->_time));
		$this->success("修改成功",U('Realauthentication/index'));
	}
	public function editfailVerifyAction(){
		$id = I("id");
		$fail_remark = I("fail_remark");
		$Realauthentication = D("RealauthenticationLog");
		$info = $Realauthentication->where("id='{$id}' and status=-2")->find();
		if(!$info){
			echo "0";
			die;
		}
		$Realauthentication->where("id='{$id}'")->save(array("fail_remark"=>$fail_remark));
		echo "1";
	}
//////////////////////
	public function delAction(){
		$Realauthentication = D("RealauthenticationLog");
		$id=I("id");
		$Realauthentication->where("id='{$id}'")->save(array('del'=>1));
		$this->success("删除成功");
		die;
	}
}