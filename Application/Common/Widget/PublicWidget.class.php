<?php
namespace Common\Widget;
use Think\Controller;
class PublicWidget extends Controller {
    public $_uniacid = 1;
    public function _initialize(){
       ini_set('memory_limit','1024M' );
       $this->assign('www_username',session('www_username'));       
       $this->assign('versionId',C('WWW_VERSION'));
       
    }
    public function advbannerAction(){
        layout(false);   
        //幻灯片
        $mod = D('Banner');        
        $placeId = 1;
          
        $placeBannerList =  array('Careerprospects' => 7,'Downloadfile' => 8, 'Exam' => 5,'Expert' => 4,'Freetrial' => 3,'News' => 6,'Onlinecourse' => 9,'Train' => 2); 
         if(isset($placeBannerList[CONTROLLER_NAME])){
             $placeId   = $placeBannerList[CONTROLLER_NAME];    
              
          }
        $bannerlist = $mod->getCatchData($placeId); 
       if(!$bannerlist){
           $bannerlist = $mod->getCatchData(1); 
       }      

        $this->assign('topbannerlist',$bannerlist);     
        $this->display(T('Common@Public/advbanner'));  
    } 
    public function madvbannerAction(){
        layout(false);   
        //幻灯片
        $mod = D('Banner');        
        $placeId = 1;
          
        $placeBannerList =  array('Careerprospects' => 7,'Downloadfile' => 8, 'Exam' => 5,'Expert' => 4,'Freetrial' => 3,'News' => 6,'Onlinecourse' => 9,'Train' => 2); 
         if(isset($placeBannerList[CONTROLLER_NAME])){
             $placeId   = $placeBannerList[CONTROLLER_NAME];    
              
          }
        $bannerlist = $mod->getCatchData($placeId); 
       if(!$bannerlist){
           $bannerlist = $mod->getCatchData(1); 
       }      

        $this->assign('topbannerlist',$bannerlist);     
        $this->display(T('Common@Public/madvbanner'));  
    }
    public function advbanner1Action(){
        layout(false);          
            
        $this->display(T('Common@Public/advbanner1'));  
    }
    public function advbanner2Action(){
        layout(false);          
            
        $this->display(T('Common@Public/advbanner2'));  
    }
     
    public function headerAction(){
        layout(false);   
        $this->display(T('Common@Public/header'));  
    }  
    public function header1Action(){
        layout(false);   
        $this->display(T('Common@Public/header1'));  
    }    
    public function footerAction(){
        layout(false);
        $this->display(T('Common@Public/footer'));  
    } 
    public function mfooterAction(){
        layout(false);
        $this->display(T('Common@Public/mfooter'));  
    }
    public function footer1Action(){
        layout(false);
        $this->display(T('Common@Public/footer1'));  
    }

    public function trainfeaturesAction(){
        layout(false);
        $this->display(T('Common@Public/trainfeatures'));  
    }
    //注册协议
    public function agreenmentAction(){
        layout(false);
        $this->display(T('Common@Public/agreenment'));  
    }
    //右侧
    public function sidebarAction(){
        layout(false);
        $this->display(T('Common@Public/sidebar'));  
    } 
    //推荐
    public function recommendAction(){
        layout(false);
        $mod = M('News');
        $condition = 'del=0 AND status=1';
        $list  =   $mod->where($condition)->order("id DESC")->limit('0,6')->select(); 
        $this->assign("recommendlist",$list);


        $this->display(T('Common@Public/recommend'));
    }
    //考试类型
    public function examAction(){
        layout(false);
        $this->assign('typelist',C('EXAM_TYPE_LIST'));
        $this->display(T('Common@Public/exam'));
    }
    //新闻类型
    public function newstypeAction(){
        layout(false);
        $this->assign('typelist',C('NEWS_TYPE_LIST'));
        $this->display(T('Common@Public/newstype'));
    }
    //排行榜
    public function downloadfilerankAction(){
        layout(false);          
         $mod = M('Downloadfile');
         $condition['del'] = 0;
         $condition['status'] = 1;    
         $list  =   $mod->where($condition)->order("downloadnum desc")->limit('0,10')->select();
         $this->assign("list",$list);
        $this->display(T('Common@Public/downloadfilerank'));  
    }
    //师资力量
    public function expertAction(){
        layout(false);
        $mod = M('Expert');
         $condition['del'] = 0;
         $condition['status'] = 1;    
         $list  =   $mod->where($condition)->order("displayorder desc")->limit('0,10')->select();
         $this->assign("list",$list);
         $this->display(T('Common@Public/expert'));
    }
    
}