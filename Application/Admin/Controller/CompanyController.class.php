<?php
namespace Admin\Controller;
use Think\Controller;
class CompanyController extends BaseController {
	public function indexAction(){
		$mod = M("Company");
    $condition ="";
    $keyword = I("keyword");
    if($keyword){
      if(!$condition){
        $condition .= "title LIKE '%$keyword%' or unit_code LIKE '%$keyword%'";
      }else{
        $condition .= " and (title LIKE '%$keyword%' or unit_code LIKE '%$keyword%' ) ";
      }
      $this->assign("keyword",$keyword);
     
    }   
     
    $status = I("status");
    if(is_numeric($status)){
      if(!$condition){
        $condition .= "status = '{$status}'";
      }else{
        $condition .= " and status = '{$status}' ";
      }
      $this->assign("status",$status);
    }
    
        $export = I('export');
        $export = intval($export);
        if ($export==1) {
          $data  = $mod->where($condition)->select();
          foreach ($data as $k => $val) {
            $qy = $memberunitstaff->where(array('uint_id'=>$val['id']))->select();
            for($i=1;$i<4;$i++){
              $data[$k]['name'.$i]= '';
              $data[$k]['mobile'.$i]= '';
              $data[$k]['qq'.$i]= '';
              $data[$k]['telephone'.$i]= '';
              $data[$k]['email'.$i]= '';
            }
            foreach($qy as $q){
              $data[$k]['name'.$q['member_type']] = $q['name'];
              $data[$k]['mobile'.$q['member_type']]=  $q['mobile'];
              $data[$k]['qq'.$q['member_type']]=  $q['qq'];
              $data[$k]['telephone'.$q['member_type']]=  $q['telephone'];
              $data[$k]['email'.$q['member_type']]=  $q['email'];
            }             
          }
          ////////////
          $unitpropertyName = array(0=>'国有',1=>'合资',2=>'私营',3=>'外资',4=>'独资',5=>'个体',6=>'其它');
          
          ///////////////
          foreach ($data as $k => $val) {
            $val['addtime'] = date('Y-m-d H:i',$value['addtime']);
            $val['unitaddtime'] = date('Y-m-d H:i',$value['unitaddtime']);
            $val['founding_time'] = date('Y-m-d ',$value['founding_time']);
            $data[$k]['applyname'] = $organizationName[$val['apply_type']];
            $data[$k]['unitpropertyname'] = $unitpropertyName[$val['unit_property']];
            $data[$k]['unitclassname'] = $unitclassName[$val['unit_class']];
            $data[$k]['managementmodename'] = $managementmodeName[$val['management_mode']];
            $data[$k]['des'] = cutstr_html($val['des']);
          }
         
          /////////////
          export($data, array(
                "title" =>'基地会员单位'.date('YYmmddHHii', time()),
                "columns" => array(                   
                    array('title' => '申请类别', 'field' => 'applyname', 'width' => 12),
                    array('title' => '单位名称', 'field' => 'title', 'width' => 12),
                    array('title' => '通讯地址', 'field' => 'address', 'width' => 12),
                    array('title' => '邮编', 'field' => 'zip_code', 'width' => 12),
                    array('title' => '单位性质', 'field' => 'unitpropertyname', 'width' => 12),
                    array('title' => '单位类别', 'field' => 'unitclassname', 'width' => 12),
                    array('title' => '经营方式', 'field' => 'managementmodename', 'width' => 12),
                    array('title' => '机构代码', 'field' => 'unit_code', 'width' => 12),
                    array('title' => '企业产值', 'field' => 'enterprise_output', 'width' => 12),
                    array('title' => '自有产值', 'field' => 'own_assets', 'width' => 12),
                    array('title' => '注册商标', 'field' => 'registered_trademark', 'width' => 12),
                    array('title' => '主管部门', 'field' => 'competent_department', 'width' => 12),
                    /////////////
                    array('title' => '法人代表-姓名', 'field' => 'name1', 'width' => 12),
                    array('title' => '法人代表-手机号', 'field' => 'mobile1', 'width' => 12),
                    array('title' => '法人代表-QQ号', 'field' => 'qq1', 'width' => 12),
                    array('title' =>'法人代表-电话', 'field' => 'telephone1', 'width' => 12),
                    array('title' => '法人代表-邮箱', 'field' => 'email1', 'width' => 24),
                    ////////////////////
                    array('title' => '负责人-姓名', 'field' => 'name2', 'width' => 12),
                    array('title' => '负责人-手机号', 'field' => 'mobile2', 'width' => 12),
                    array('title' => '负责人-QQ号', 'field' => 'qq2', 'width' => 12),
                    array('title' =>'负责人-电话', 'field' => 'telephone2', 'width' => 12),
                    array('title' => '负责人-邮箱', 'field' => '[email2', 'width' => 24),
                    /////////////////
                    array('title' => '联系人-姓名', 'field' => 'name3', 'width' => 12),
                    array('title' => '联系人-手机号', 'field' => 'mobile3', 'width' => 12),
                    array('title' => '联系人-QQ号', 'field' => 'qq3', 'width' => 12),
                    array('title' =>'联系人-电话', 'field' => 'telephone3', 'width' => 12),
                    array('title' => '联系人-邮箱', 'field' => 'email3', 'width' => 24),
                    /////////////
                    
                    array('title' => '介绍', 'field' => 'des', 'width' => 24),
                     
                )
            ));
        }
    $count = $mod->where($condition)->count();// 查询满足要求的总记录数            
    $Page = new \Think\Page($count,$this->_page_item_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $showPage = $Page->show();// 分页显示输出
    $list  = $mod->where($condition)->order("id DESC")->limit($Page->firstRow.','.$Page->listRows)->select();

    
		$applytypeName = array(0=>'会员单位',1=>'理事单位',2=>'专家单位');
    $unitpropertyName = array(0=>'国有',1=>'合资',2=>'私营',3=>'外资',4=>'独资',5=>'个体',6=>'其它');
    $unitclassName = array(0=>'企业',1=>'事业',2=>'社团');
    $managementmodeName = array(0=>'企业营业执照',1=>'事业登记证',2=>'社团登记证',3=>'民办非企业');
    $statusName = array(0=>'不正常',1=>'正常');

		 
    $this->assign("statusName",$statusName);
		$this->assign("unitpropertyName",$unitpropertyName);
    $this->assign("unitclassName",$unitclassName);
    $this->assign("managementmodeName",$managementmodeName);
 
    
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
		$mod = D("Company");
		$id=I("id");
		if(IS_POST){
          $id=I("id");
          $data = I("data");
          if(!$id){
            $data['addtime'] = time();
          }
          $data['founding_time'] = strtotime($data['founding_time']);
          $data['des'] = htmlspecialchars_decode($data['des']);
          $upload = new \Think\Upload();// 实例化上传类   
        $upload->maxSize   =     3145728 ;// 设置附件上传大小    
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
        $upload->rootPath  =      './Public/Data/others'; // 设置附件上传目录    // 上传文件     
        $upload->savePath  =      '/'; // 设置附件上传目录    // 上传文件     
        
        if(isset($_FILES['head']) && $_FILES['head'] && !empty($_FILES['head']['tmp_name'])){
            $coverfileinfo = $upload->uploadOne($_FILES['head']);
            $data['head'] = $coverfileinfo['savepath'].$coverfileinfo['savename'];
            unset($_FILES['head']);
        } 

        if(isset($_FILES['registered_trademark']) && $_FILES['registered_trademark'] && !empty($_FILES['registered_trademark']['tmp_name'])){
            $coverfileinfo = $upload->uploadOne($_FILES['registered_trademark']);
            $data['registered_trademark'] = $coverfileinfo['savepath'].$coverfileinfo['savename'];
            unset($_FILES['registered_trademark']);
        }
        if(isset($_FILES['business_license']) && $_FILES['business_license'] && !empty($_FILES['business_license']['tmp_name'])){
            $coverfileinfo = $upload->uploadOne($_FILES['business_license']);
            $data['business_license'] = $coverfileinfo['savepath'].$coverfileinfo['savename'];
            unset($_FILES['business_license']);
        }
        
          if(!$id){
           $mod->add($data);
           $this->success('添加成功',U('Company/index'));
           die;
          }
          if( $mod->where("id!='{$id}' AND title='{$data[title]}'")->find()){
            $this->error('该单位名称已经存在');
            die;
          }
          
          $mod->where("id='{$id}'")->save($data);
         
          $this->success('修改成功');
          die;
		}
		if($id){
			$info = $mod->where("id='{$id}'")->find();
			$this->assign('info',$info);
		}
     
		$this->display('post');
	}
	public function delAction(){
		$mod = M("Company");
		$id=I("id");
		$mod->where("id='{$id}'")->delete();
		$this->success("删除成功");
		die;
	}

}