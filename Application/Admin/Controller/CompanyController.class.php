<?php
namespace Admin\Controller;
class CompanyController extends BaseController
{
    public function instroAction()
    {
        $company = D('Company'); 
        $list  = $company->getAllData();

        $this->assign('bdata',$list);
        $this->display();
    }

    public function saveinstroAction()
    {
        $company = D('Company');

        //公司名称
        $company->updateData('cp_name', I('cp_name'));           
        //公司注册时间
        $company->updateData('cp_regtime', I('cp_regtime'));            
        //公司规模
        $company->updateData('cp_membernum', I('cp_membernum'));      
        //公司描述
        $company->updateData('cp_instro', I('cp_instro','','htmlspecialchars_decode'));   
        //注册资金
        $company->updateData('cp_registeredcapital', I('cp_registeredcapital'));  
        //经营模式
        $company->updateData('cp_pattern', I('cp_pattern'));
        //经营范围
        $company->updateData('cp_range', I('cp_range'));
        //主营行业
        $company->updateData('cp_majorbusiness', I('cp_majorbusiness'));
         //备案号
        $company->updateData('cp_icp', I('cp_icp'));
        

        $this->success('保存成功',U('Admin/Company/instro','rand='.rand(1,10000)));
        //$this->redirect("Admin/Company/instro") ; 
    }
    public function contactusAction()
    {
        $company = D('Company'); 
        $list  = $company->getAllData();

        $this->assign('bdata',$list);
        $this->display();
    }
    public function savecontactusAction()
    {
        $company = D('Company');                    
        $company->updateData('cp_phone', I('cp_phone')); 
        $company->updateData('cp_email', I('cp_email')); 
        $company->updateData('cp_fax', I('cp_fax'));  
        $company->updateData('cp_landline', I('cp_landline'));  
        $company->updateData('cp_username', I('cp_username'));
        $company->updateData('cp_mobile', I('cp_mobile'));              
        $company->updateData('cp_address', I('cp_address'));
        $company->updateData('cp_zipcode', I('cp_zipcode'));   
        $company->updateData('cp_qq', I('cp_qq'));        
        $company->updateData('cp_url', I('cp_url'));  
        $company->updateData('cp_hotphone', I('cp_hotphone')); 
        $company->updateData('pc_busroute', I('pc_busroute'));
        $company->updateData('cp_rout', I('cp_rout'));
        $this->success('保存成功',U('Admin/Company/contactus','rand='.rand(1,10000)));
       // $this->redirect("Admin/Company/contactus") ;
    }
    public function cultureAction()
    {
        $company = D('Company'); 
        $list  = $company->getAllData();

        $this->assign('bdata',$list);
        $this->display();
    }
    public function savecultureAction()
    {
        $company = D('Company');
        //企业文化
        $company->updateData('cp_culture', I('cp_culture','','htmlspecialchars_decode'));   
      
        $this->success('保存成功',U('Admin/Company/culture','rand='.rand(1,10000)));
       // $this->redirect("Admin/Company/contactus") ;
    }
     public function qualificationsAction()
    {
        $company = D('Company'); 
        $list  = $company->getAllData();

        $this->assign('bdata',$list);
        $this->display();
    }
    public function savequalificationsAction()
    {
        $company = D('Company');
        //企业文化
        $company->updateData('cp_qualifications', I('cp_qualifications','','htmlspecialchars_decode'));   
      
        $this->success('保存成功',U('Admin/Company/qualifications','rand='.rand(1,10000)));
       // $this->redirect("Admin/Company/contactus") ;
    }
}  

