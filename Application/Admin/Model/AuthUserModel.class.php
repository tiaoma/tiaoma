<?php
namespace Admin\Model;
use Think\Model;

class AuthUserModel extends ComModel
{
    protected $_validate        =   array(      
        array('username','require','账号不能为空',1),
        array('password','require','密码不能为空',1)    
    );  // 自动验证定义 
    
    protected $_auto            =   array(
        array('password','cmd5',3,'function')
    
    );  // 自动完成定义  
    
   //检测用户是否是管理员
   public function isAdmin($uid)
   {
      
        return $this->where("isadmin=1 && uid='{$uid}'")->find()?true:false;
   }  
   //判断该账号是否已经注册
   public function isExits($username)
   {
      
        return $this->where("username='{$username}'")->find()?true:false;
   }  
   public function addUser($username,$password,$status,$addtion)
   {
       
       if( $status==''){$status=1;}
       $idata['status'] = $status;
       $idata['username'] = $username;
       $idata['password'] = cmd5($password);
       $idata['regtime'] = $this->_time;
       $idata['isadmin'] = 0;
     //  dump($idata);die();
       if(!$addtion)
       {
          return $this->add($idata); 
          exit(); 
       }
      return $this->where("uid='{$addtion}'")->save($idata);  
   }

   
   
}
  
