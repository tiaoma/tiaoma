<?php
namespace Admin\Controller;
use Think\Controller;
class FeedbackController extends BaseController {
  
	function indexAction() {		 
		$condition = "";
        $mod = M('Feedback');
        $count = $mod->where($condition)->count();
         $Page = new \Think\Page($count,$this->_page_item_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $showPage = $Page->show();// 分页显示输出
        $list = $mod->order("id DESC") ->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
        $usernamelist = array();
        $usernamelist[0] = '匿名';
        $uids = array();
        foreach ($list as $l) {
        	if($l['uid']){
        		$uids[] = $l['uid'];
        	}        	
        } 
        if(!empty($uids)){
        	$uids = implode(',', $uids);
        	$mebObj = M('Member');
        	$qy = $mebObj->where("id IN ($uids)")->select();
        	foreach ($qy as $q) {
        		$usernamelist[$q['id']] = $q['username'];
        	}        	 
        }
        $this->assign('pager',$showPage);
	    $this->assign('list',$list); 
	    $this->assign('usernamelist',$usernamelist);    
		$this->display(); 
	}

	 

	function editAction() {
		$this->post();
	}

	protected function post() {
		$id = I('id');
	    $mod = M('Feedback');
		if (IS_POST) {
			$solution = htmlspecialchars_decode(I('solution'));

			$data = array(
				'solution' => $solution,
				'status' => 1  
			);
			if (!empty($id)) {
				$mod->where("id='{$id}'")->save($data); 
			} 
			$this->success("回复成功",U('Feedback/index'));
			die;
			
		}
		
		$item = $mod->where("id='{$id}' ")->find();
		$username = '匿名';
        if($item && $item['uid']){
        	$mebObj = M('Member');
        	$username = $mebObj->where("id='{$item[uid]}'")->find();
        	$username = $username['username'];
        }
		
        $this->assign('item',$item);	
        $this->assign('username',$username); 
		$this->display('post');
	}

	function delAction() {
		$id = intval($_GET['id']);
		$mod = M('Feedback');
		$items = $mod->where("id = '{$id}'")->delete();		 
		 
		$this->success("删除成功",U('Feedback/index'));
			die;
	}

	 

}