<?php
namespace Admin\Controller;
use Think\Controller;
class NoticeController extends BaseController {
    public function indexAction(){
      $mod = M('Notice');
      $count = $mod->where("del=0")->count();// 查询满足要求的总记录数            
      $Page = new \Think\Page($count,$this->_page_item_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
      $showPage = $Page->show();// 分页显示输出
      $list  = $mod->where("del=0")->order("displayorder DESC,id DESC")->limit($Page->firstRow.','.$Page->listRows)->select();

      $niStatusName = array(0=>'否',1=>'是');
      $this->assign('niStatusName',$niStatusName);
      $this->assign('list',$list);
      $this->assign("typelist",$this->typelist());
      $this->assign('page',$showPage);// 赋值分页输出*/
      $this->display();
    }
  //添加
  public function addAction(){
        $this->post();
    }
    public function editAction(){
        $this->post();
    }
    public function post(){
        $mod = D('Notice');
        $id = I("id");
        if(IS_POST){
          $data = $mod->create();
          $data['des'] = htmlspecialchars_decode($data['des']);
          $data['updatetime'] = $this->_time;
          if(!$id){

           $id = $mod->add($data);
           $this->fulltextSearch('notice',$id,array('title'=>$data['title'],'status'=>$data['status']));
           
           $this->success('添加成功',U('Notice/index'));
           die;
          }
          
          $mod->save($data);
          $this->fulltextSearch('notice',$id,array('title'=>$data['title'],'status'=>$data['status']));
          
          $this->success('修改成功',U('Notice/index'));
          die;
        }
        if($id){
         $info = $mod->where("id='{$id}' and del=0")->find();
             if($info){
                $this->assign("info",$info);
            }else{
                 $this->error('参数错误',U('Notice/index'));
            }
        }
        $noticeTypeObj = M("NoticeType");
        $noticetypeList =$noticeTypeObj->where("del=0")->select();
        
        $this->assign("lists",$noticetypeList);
        $this->display('post');
    }

   //删除
  public function delAction(){
    $mod=D("Notice");
    //查看该id是否在表中,如果存在就把表中对应的del值修改为1
    $id=I("id");
    if($mod->where("id='{$id}'")->select()){
      $mod->where("id='{$id}'")->save(array('del'=>1));
      $this->fulltextSearch('notice',$id,'',1);
      
      $this->success("删除成功！");
    }else{
      $this->error("该消息不存在！");
    }

  }
  /////分类
     public function typeAction(){
        $mod = M('NoticeType');
       $count      = $mod->where("del=0")->count();// 查询满足要求的总记录数            
        $Page       = new \Think\Page($count,$this->_page_item_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $showPage       = $Page->show();// 分页显示输出
        $qy  =   $mod->where("del=0")->order("type_order DESC,type_id DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
        $lq = array();
        foreach ($qy as $v) {
            if(!$v['type_own']){
                $lq[$v['type_id']][] = $v;
                continue;
            }
            if(isset($lq[$v['type_own']])){
                $lq[$v['type_own']][] = $v;
            }
            
        }
        foreach ($lq as $q) {  
            foreach ($q as $v) {
                    $lists[] = $v;
                }       
            
        }
       $this->assign('page',$showPage);
        $this->assign('lists',$lists);
        $this->display();
    }
    public function addtypeAction(){
        if (IS_POST){
            $mod = M('NoticeType');
            $data = $mod->create();
            
            if($mod->where("type_name='{$data['type_name']}' AND type_own='{$data['type_own']}'")->find()){
                $this->error('该类型已经存在',U('Notice/type'));
                die();
            }

            if ($mod->add($data)){                
                $this->success('添加分类成功',U('Notice/type')); 
                die();
            }else{
                $this->error('添加失败',U('Notice/type'));
                die();
            }
        }
        $this->error('添加失败',U('Notice/type'));
    }  
    public function edittypeAction(){
        if (IS_POST){
            $mod = M('NoticeType');
            $data = $mod->create();
            if($mod->where("type_id!='{$data[type_id]}' AND type_name='{$data[type_name]}'")->find()){
                $this->error('编辑失败',U('Notice/type'));
            }else{
                $mod->where("type_id='{$data[type_id]}' ")->save($data);
                $this->error('编辑成功',U('Notice/type'));
            }
            
        }
        $mod = M('NoticeType');
        $type_id = I('type_id');
        $info = $mod->where("type_id='{$type_id}' ")->find();
        $this->assign('info',$info);
        $this->display();
    } 
    public function deltypeAction(){        
        $mod = M('NewsType');
        $type_id = I('type_id');
        $mod->where("type_id= '{$type_id}' ")->save(array('del'=>1));
        $this->error('删除成功',U('Notice/type'));
    }
    public function typelist($ty =0 ){
        $mod = M('NoticeType');
        $qy = $mod->where('del=0')->select();
        if(!$ty){
            $typelist[0] = '未分类';
            foreach ($qy as $v) {
                $typelist[$v['type_id']] = $v['type_name'];
                
            }
            return $typelist;
        }
        $lq = array();
        foreach ($qy as $v) {
            if(!$v['type_own']){
                $lq[$v['type_id']][] = $v;
                continue;
            }
            if(isset($lq[$v['type_own']])){
                $lq[$v['type_own']][] = $v;
            }
            
        }
        foreach ($lq as $q) {  
            foreach ($q as $v) {
                    $lists[] = $v;
                }       
            
        }
        return $lists;
    }
}
