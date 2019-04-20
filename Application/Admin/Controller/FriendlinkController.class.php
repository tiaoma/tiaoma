<?php
namespace Admin\Controller;
class FriendlinkController extends BaseController {
    public function indexAction(){
      $mod = M('Friendlink');
      $count = $mod->where("del=0")->count();// 查询满足要求的总记录数            
      $Page = new \Think\Page($count,$this->_page_item_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
      $showPage = $Page->show();// 分页显示输出
      $list  = $mod->where("del=0")->order("sorder DESC,id DESC")->limit($Page->firstRow.','.$Page->listRows)->select();

      $niStatusName = array(0=>'否',1=>'是');
      $this->assign('friendLinks',C('FriendLinks'));
      $this->assign('niStatusName',$niStatusName);
      $this->assign('list',$list);
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
        $mod = D('Friendlink');
        $id = I("id");
        if(IS_POST){
          $data = $mod->create();

          if(!$id){
           $mod->add($data);
           $mod->updateCatchData();
           $this->success('添加成功',U('Friendlink/index'));
           die;
          }
          
          $mod->save($data);
          $mod->updateCatchData();
          $this->success('修改成功',U('Friendlink/index'));
          die;
        }
        if($id){
         $info = $mod->where("id='{$id}' and del=0")->find();
             if($info){
                $this->assign("bdata",$info);
            }else{
                 $this->error('参数错误',U('Friendlink/index'));
            }
        }
        $this->assign('friendLinks',C('FriendLinks'));
        $this->display('post');
    }

//删除
  public function delAction(){
    $mod=D("Friendlink");
    //查看该id是否在表中,如果存在就把表中对应的del值修改为1
    $id=I("id");
    if($mod->where("id='{$id}'")->select()){
      $mod->where("id='{$id}'")->save(array('del'=>1));
      $mod->updateCatchData();
      $this->success("删除成功！");
    }else{
      $this->error("该友情链接不存在！");
    }

  }

}