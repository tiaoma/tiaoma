<?php
namespace Usercenter\Controller; 
use Think\Controller;
//报班
class TrainController extends ComController {
     
    public function indexAction(){
        $modTrain = D('Train');
        $mod = D('MemberTrain');
        $condition = array('uid'=>$this->_uid,'del'=>0);
        $count = $mod->where($condition)->count();// 查询满足要求的总记录数            
        $Page = new \Think\Page($count,$this->_page_item_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $showPage = $Page->show();// 分页显示输出
        $list  = $mod->where($condition)->order("addtime DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
         
        $tids = array();
        foreach($list as $q){
            $tids[] = "'".$q['tid']."'";
        }
        $tids = implode(',', $tids);
        $trainlist = array();
        if($tids){
            $qy = $modTrain->where("id IN ($tids)")->select();
           
            if($qy){
                foreach($qy as $q){
                    $trainlist[$q['id']] = $q;
                }
            }
        }
       
        $ispay = array(0=>'未付费',1=>"已付费");
        $this->assign('page',$showPage);// 赋值分页输出*/
        $this->assign("list",$list);
        $this->assign("trainlist",$trainlist);
        $this->assign("ispay",$ispay);
         $this->display();
    }
}