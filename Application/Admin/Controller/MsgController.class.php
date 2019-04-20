<?php
namespace Admin\Controller;
use Think\Controller;
class MsgController extends BaseController {
	public function indexAction(){
		$msgObj = M("Msg");
    $count = $msgObj->count();// 查询满足要求的总记录数            
    $Page = new \Think\Page($count,$this->_page_item_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $showPage = $Page->show();// 分页显示输出
    $list  = $msgObj->where("del=0")->order("sendtime DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
    $this->assign('page',$showPage);// 赋值分页输出*/
		$this->assign("list",$list);
		$this->display();
	}
	public function addAction(){
		$this->post();
	}
	public function editAction(){
		$this->post();
	}
	public function post(){
		$msgObj = M("Msg");
    $memberMsgObj = M("MemberMsg");
    $memberObj = M("Member");
		$id=I("id");
    
		if(IS_POST){
        $id=I("id");
          $uids = I("uids");
          $uidarr = explode(",", $uids);
          $data = $msgObj->create();
          $data['cont'] = I('cont','','htmlspecialchars_decode');
          $data['sendtime'] = $this->_time;
        
          if(!$id){
           $msgid = $msgObj->add($data);

           if(count($uidarr)){
             foreach ($uidarr as $k => $val) {
              if($val){
                $mbmsg = array(
                 "msgid"=>$msgid,
                 "uid"=>$val,
                 "addtime"=>$this->_time
                );
                $memberMsgObj->add($mbmsg);
                $minfo = $memberObj->where("id='{$val}'")->find();
                if($minfo){
                  $memberObj->where("id='{$val}'")->save(array('msg_num'=>($minfo['msg_num']+1)));
                }
              }
               
            }
           }
           
           
           $this->success('添加成功',U('Msg/index'));
           die;
          }
          
          $msgObj->save(array("cont"=>$data['cont']));
          $mmsgarr_sql = $memberMsgObj->where("msgid = '{$id}'")->getField("uid",true);
          if(count($uidarr)){
             foreach ($uidarr as $k => $val) {
             
              if($val){
                $mmsginfo = $memberMsgObj->where("msgid = '{$id}' and uid='{$val}'")->find();
                if(!$mmsginfo){
                  $mbmsg = array(
                 "msgid"=>$id,
                 "uid"=>$val,
                 "addtime"=>$this->_time
                );
                $memberMsgObj->add($mbmsg);
                $minfo = $memberObj->where("id='{$val}'")->find();
                if($minfo){
                  $msg_num=$memberMsgObj->where("uid='{$val}'")->count();
                  $memberObj->where("id='{$val}'")->save(array('msg_num'=>$msg_num));
                }
              }
                
              }
              } 
            }
        
            foreach ($mmsgarr_sql as $k => $val) {
              if(!in_array($val,$uidarr)){
                $memberMsgObj->where("msgid = '{$id}' and uid='{$val}'")->delete();
                $msg_num=$memberMsgObj->where("uid='{$val}'")->count();
                $memberObj->where("id='{$val}'")->save(array('msg_num'=>$msg_num));
              }
            }
       
          $this->success('修改成功',U('Msg/index'));
          die;
		}

		if($id){
			$info = $msgObj->where("id='{$id}'")->find();
      $uidsarr=$memberMsgObj->where("msgid='{$id}'")->getField("uid",true);
      $unames='';
      foreach ($uidsarr as $k => $val) {
        if($val){
         $unames.=$memberObj->where("id='{$val}'")->getField("username").',';
        }
        
      }
      
      $uids = implode(",",$uidsarr);
      $this->assign('uids',$uids);
      $this->assign('uidsarr',$uidsarr);
      $this->assign('unames',$unames);
			$this->assign('info',$info);
		}
    //////////////

    $this->query();
		$this->display('post');
	}

	public function delAction(){
		$MsgObj = M("Msg");
    $memberMsgObj = M("MemberMsg");
    $memberObj = M("Member");
		$id=I("id");
		$MsgObj->where("id='{$id}'")->save(array("del"=>1));
    $uidsarr=$memberMsgObj->where("msgid='{$id}'")->getField("uid",true);
    //$memberMsgObj->where("msgid='{$id}'")->delete();
    foreach ($uidsarr as $k => $val) {
        if($val){
        //$msg_num=$memberMsgObj->where("uid='{$val}'")->count();
          $minfo= $memberObj->where("id='{$val}'")->find();
         $unames.=$memberObj->where("id='{$val}'")->save(array('msg_num'=>($minfo['msg_num']-1)));
        }
        
      }

		$this->success("删除成功");
		die;
	}

  public function selectuidsAction(){
    $uids = I("uids");
    $this->assign('uids',$uids);
    $this->redirect("Msg/add");
    
  }
   public function query(){
    $mod = D("Member");
     
    $where = "del=0";
    $list = $mod->where($where)->select();

    $islockName = array(0=>'否',1=>'是');
    $isblackName = array(0=>'正常',1=>'黑名单');
    $usertypeName = array(0=>'普通',1=>'单位');
    
   
    $this->assign("islockName",$islockName);
    $this->assign("isblackName",$isblackName);
    $this->assign("usertypeName",$usertypeName);
    $this->assign("list",$list);
    
  }
}