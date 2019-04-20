<?php
namespace Common\Model;
use Think\Model;
//幻灯片
class BannerModel extends ComModel
{
    public function updateCatchData($place=0){
       $Bannerlist = $this->where("status=1 and del=0 and place=".$place)->order("displayorder desc,id DESC")->select();
       
        F('Bannerlist'.$place,$Bannerlist);
         return $Bannerlist;
    }
    public function getCatchData($place=0){
        $list = F('Bannerlist'.$place);
        if(!$list){
            $list = $this->updateCatchData($place);
        }
        return $list;
    }
   
}