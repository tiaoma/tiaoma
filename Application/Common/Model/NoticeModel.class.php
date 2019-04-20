<?php
namespace Common\Model;
use Think\Model;
//通知
class NoticeModel extends ComModel
{
    public function updateCatchData(){
       $list = $this->where("status=1 and  del=0")->order("displayorder DESC,id DESC")->select();
       
        F('Noticelist',$list);
         return $list;
    }
    public function getCatchData(){
        $list = F('Noticelist');
        if(!$list){
            $list = $this->updateCatchData();
        }
        return $list;
    }
   
}