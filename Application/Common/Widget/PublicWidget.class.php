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

   
    //注册协议
    public function agreenmentAction(){
        layout(false);
        $this->display(T('Common@Public/agreenment'));  
    }
   
    
}