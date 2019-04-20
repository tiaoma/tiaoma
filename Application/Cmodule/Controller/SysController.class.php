<?php
namespace Cmodule\Controller; 
use Think\Controller;
//系统
class SysController extends Controller {
     
    public function setsysAction(){
         
        if(isMobile()){
            if(MODULE_NAME!='Mobile'){
                    

                    echo json_encode(array('code'=>1,'url'=>U("Mobile/Index/index")));
                    die();
            }
        }
        if(!isMobile()){
            if(MODULE_NAME=='Mobile'){               

                    echo json_encode(array('code'=>1,'url'=>U("Home/Index/index")));
                    die();
            }
        }


        echo json_encode(array('code'=>0));
        die();
    }
}