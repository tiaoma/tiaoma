<?php
namespace Common\Model;
use Think\Model;

class FriendlinkModel extends ComModel
{
	public function updateCatchData(){
       $qy = $this->where("del=0")->order("sorder DESC,id DESC")->select();
       $Friendlinklist = array();
       foreach ($qy as $v) {
       	   $Friendlinklist[$v['friend_type']][] = $v;
       }
        F('Friendlinklist',$Friendlinklist);
         return $Friendlinklist;
	}
	public function getCatchData(){
		$list = F('Friendlinklist');
		if(!$list){
            $list = $this->updateCatchData();
		}
		return $list;
	}
}