<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends ComController {
    public function indexAction(){
    	//幻灯片
        $mod = D('Banner');        
        $bannerlist = $mod->getCatchData(); 
        $bannerfirst = $bannerlast = "";
        $bannerlistnum = count($bannerlist);
        $root =     './Public/Data/others'; 
        $width = 1000;
        $height = 533;
        $x= 460;
        foreach ($bannerlist as &$value) { 
            if($value['link'] && count(explode('http', $value['link']))<=1){
                $value['link'] = C('APP_URL').'Home/'.$value['link'];
            }

            $filearr = explode('.', $value['href']);
            if(count($filearr )>1){
                $value['href_m'] = $filearr[0].'_m'.'.'.$filearr[1];
                if(file_exists(  $root.$value['href']) && !file_exists(  $root.$value['href_m'])){
                      $image = new \Think\Image();
                      $image->open($root.$value['href']);  
                      $image->crop($width, $height,$x);
                      $image->save($root.$value['href_m']);
                }
            }
            
             
              
        }

        

        if($bannerlistnum>0){
             $bannerlast = $bannerlist[$bannerlistnum-1];
             $bannerfirst = $bannerlist[0];
        }
        

        //新闻
        $NewsObj = D('News');
        $condition = 'del=0 AND status=1';
        $newsList  =   $NewsObj->where($condition)->order("displayorder desc,addtime DESC")->limit('0,3')->select();
        //通知
        $noticeObj = D("Announce");
        $condition = 'del=0 AND status=1';
        $noticelist = $noticeObj->where($condition)->order("id DESC")->limit('0,1')->select();
        //政策法规
        $policiesObj = D("Policies");
        $condition = 'del=0 AND status=1';
        $policieslist = $policiesObj->where($condition)->order("id DESC")->limit('0,3')->select();
       
        $this->assign("newsList",$newsList);
        $this->assign("noticelist",$noticelist);
        $this->assign("policieslist",$policieslist);
        $this->assign('bannerfirst',$bannerfirst);
        $this->assign('bannerlast',$bannerlast);
        $this->assign("bannerlist",array_slice($bannerlist, 0,5));
        $this->assign('expertlist',$expertlist);
        $this->display();
    }
     
}