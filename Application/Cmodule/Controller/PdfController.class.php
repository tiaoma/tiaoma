<?php
namespace Cmodule\Controller;
use Think\Controller;
//预览pdf
class PdfController extends Controller {
	public function indexAction(){
        $id = I('id');
        $type = I('type');

        $id = intval($id);

        switch ($type) {
        	case 'train'://培训
        		$mod=D("TrainClass");
                $info = $mod->where("id='{$id}' and status=1")->find();
        		break;
        	
        	default:
        		 
        		break;
        }

        if(!$info){
        	$this->error('内容不存在',U('Home/Index/index'));
        }
   
        $this->assign('info',$info);
        $this->display();
	}
}