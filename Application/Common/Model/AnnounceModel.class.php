<?php
namespace Common\Model;
use Think\Model;
//公告
class AnnounceModel extends ComModel
{
    public function updateCatchData(){
       $qy = $this->where("status=1")->order("displayorder DESC,id DESC")->select();
       $Announcelist = array();
       foreach ($qy as $v) {
           $Announcelist[$v['ntype']][] = $v;
       }
        F('Announcelist',$Announcelist);
         return $Announcelist;
    }
    public function getCatchData(){
        $list = F('Announcelist');
        if(!$list){
            $list = $this->updateCatchData();
        }
        return $list;
    }
   
}