<?php
namespace Usercenter\Controller; 
use Think\Controller;
//课程
class CourseController extends ComController {
     
    public function indexAction(){
        $modCourse = D('Course');
        $mod = D('MemberCourse');
        $condition = array('uid'=>$this->_uid,'del'=>0);
        $count = $mod->where($condition)->count();// 查询满足要求的总记录数            
        $Page = new \Think\Page($count,$this->_page_item_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $showPage = $Page->show();// 分页显示输出
        $list  = $mod->where($condition)->order("addtime DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
        $isfee = array(0=>'收费',1=>"付费");
        $cids = array();
        foreach($list as $q){
            $cids[] = "'".$q['cid']."'";
        }
        $cids = implode(',', $cids);
        $courselist = array();
        if($cids){
        $qy = $modCourse->where("id IN ($cids)")->select();
        $courselist = array();
        if($qy){
            foreach($qy as $q){
                $courselist[$q['id']] = $q;
            }
        }
        }
        $this->assign('page',$showPage);// 赋值分页输出*/
        $this->assign("list",$list);
        $this->assign("courselist",$courselist);
        $this->assign("isfee",$isfee);
         $this->display();
    }
}