<?php  //商品
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends BaseController {
    public function IndexAction(){
      $unit_id = I('unit_id');

      $mod = M('Goods');
      $condition['del'] = 0;
      if( $unit_id){
         $unit_id = intval( $unit_id);
         $condition['unit_id'] = $unit_id;
      }
      $count      = $mod->where($condition)->count();// 查询满足要求的总记录数            
      $Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
      $showPage       = $Page->show();// 分页显示输出
      $qy = $mod->where($condition)->order('displayorder desc,addtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();     
     
      $unitids = array();
      foreach($qy as $q){
           if($q['unit_id']){
               $unitids[] = $q['unit_id'];
           }           
      }
      $unitInfoArr = array();
      $unitInfoArr[0] = '无';
      if($unitids){
         $unitids = implode(',', $unitids);
         $memberunit = D("MemberUnit");
         $mqy = $memberunit->where("id IN ($unitids)")->select();
         foreach ($mqy as $value) {
           $unitInfoArr[$value['id']] = $value['title'];
         }

      }
 
      $isStatus = array(0=>'否',1=>'是');
      $isfee = array(0=>'否',1=>'是');
      $this->assign('isStatus',$isStatus);
      $this->assign('typelist',C('NEWS_TYPE_LIST'));
      $this->assign('list',$qy);
      $this->assign('unitInfoArr',$unitInfoArr);
      $this->assign('page',$showPage);// 赋值分页输出
      $this->display();
    }
    public function addAction(){
      $this->post();
    } 
    public function editAction(){
       $this->post();
    }  
    public function post(){
        $mod = D('Goods');
        $id = I("id");

        if(IS_POST){
          $data = $mod->create();
          $data['des'] = I('des','','htmlspecialchars_decode');
          $data['des'] = stripcslashes($data['des']);
        
          ////////////
            $upload = new \Think\Upload();// 实例化上传类   
            $upload->maxSize   =     3145728 ;// 设置附件上传大小    
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
            $upload->rootPath  =      './Public/Data/'; // 设置附件上传目录    // 上传文件     
            $upload->savePath  =      '/'; // 设置附件上传目录    // 上传文件  
           /* $data['thumb'] = '/goodesdef.jpg';*/
            unset( $data['thumb']);
            if(isset($_FILES['thumb']) && $_FILES['thumb'] && !empty($_FILES['thumb']['tmp_name'])){
                $coverfileinfo = $upload->uploadOne($_FILES['thumb']);
                $data['thumb'] = $coverfileinfo['savepath'].$coverfileinfo['savename'];
                unset($_FILES['thumb']);
            }             
         
          if(!$id){      
           $data['addtime'] = time();     	 
           $data['id'] = guid();
           $data['thumb'] =  $data['thumb']? $data['thumb']:'s_def.png';
           $mod->add($data);
           $this->success('添加成功',U('Goods/index'));
           die;
          }
          

          $mod->save($data);
          $this->success('修改成功',U('Goods/index'));
          die;
        }
        if($id){
         $info = $mod->where("id='{$id}' and del=0")->find();
             if($info){
                $this->assign("info",$info);
            }else{
                 $this->error('参数错误',U('Goods/index'));
            }
        }

        
        $this->display('post');
    }
    
    public function delAction(){      
        $mod = D('Goods');
        $id = I('id');
        $mod->where("id= '{$id}' ")->save(array('del'=>1));

        $this->success('删除成功',U('Goods/index'));
    }  
    
}
