<?php
namespace Admin\Controller;
use Think\Controller;
class AdminlistController extends BaseController {
	public function indexAction(){
		$authuserObj = M("AuthUser");
    $uadmin = $authuserObj->where("uid = $this->_uid")->find();
    $this->assign("uadmin",$uadmin);
    $count = $authuserObj->count();// 查询满足要求的总记录数            
    $Page = new \Think\Page($count,$this->_page_item_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $showPage = $Page->show();// 分页显示输出
    $list  = $authuserObj->order("regtime DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
    
		$niStatusName = array(0=>'关闭',1=>'开启');
    $niPermname = C("PERM_MODEL");
    foreach ($list as $k => $val) {
      $permarr = explode(",", $val['perm']);
      $list[$k]['permname'] = '';
      if(count($permarr)){
        foreach ($permarr as $key => $value) {
          if($value){
            $list[$k]['permname'] .= $niPermname[$value].',';
          }
          
        }
      }
    }
		$this->assign("niPermname",$niPermname);
    $this->assign("niStatusName",$niStatusName);
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
		$authuserObj = M("AuthUser");
		$id=I("id");
		if(IS_POST){
        $id=I("id");
          $data = $authuserObj->create();
          $data['regtime'] = $this->_time;
          if($data['password']){
             $data['password'] =cmd5(trim($data['password']));
          }else{
              unset($data['password']);
          }
          if(!$id){
           $authuserObj->add($data);
           $this->success('添加成功',U('Adminlist/index'));
           die;
          }
          unset($data['regtime']);
          $authuserObj->where("uid='{$id}'")->save($data);
          $this->success('修改成功',U('Adminlist/index'));
          die;
		}
		if($id){
			$info = $authuserObj->where("uid='{$id}'")->find();
			$this->assign('info',$info);
		}
		$this->assign('Permlist',C("PERM_MODEL"));
		$this->display('post');
	}
	public function delAction(){
		$authuserObj = M("AuthUser");
		$id=I("id");
		$authuserObj->where("uid='{$id}'")->delete();
		$this->success("删除成功");
		die;
	}
}