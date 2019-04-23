<?php
namespace Common\Model;
use Think\Model;

class MemberModel extends ComModel
{
    protected $_validate        =   array(      
        array('username','require','账号不能为空',1),
        array('password','require','密码不能为空',1)    
    );  // 自动验证定义 
    
    protected $_auto            =   array(
        array('password','cmd5',3,'function')
    
    );  
    //检测用户名是否已经存在
   public function checkUsername($username,$uid=0){
       $condition = "username='{$username}'";
       if($uid){//排除该id
           $condition .= " AND id <> $uid ";
       }
       if($this->where($condition)->find()){
           return true;
       }
       
       return false;
   }
    
   //检查手机号是否存在
   public function checkMobile($mobile,$uid=0,$isactivation=false){
       $condition = "mobile='{$mobile}'";
       if($uid){//排除该id
           $condition .= " AND id <> $uid ";
       }
       if($this->where($condition)->find()){
           return true;
       }

       //只是检测正式会员
       if($isactivation){
          return false;
       }
      
       return false;
   }
   //检查邮箱是否存在
   public function checkEmail($email,$uid=0){
       $condition = "email='{$email}'";
       if($uid){//排除该id
           $condition .= " AND id <> $uid ";
       }
       if($this->where($condition)->find()){
           return true;
       }
       
       return false;
   }
   /**
     * 通过手机号获取用户信息
     * @param $mobile
     */
  public function getMobileMember($mobile,$uniacid=1)
  {
    $info = $this->where("mobile='{$mobile}' AND uniacid='{$uniacid}'")->find();     
     return $info;
  }
  /**
     * 通过邮箱获取用户信息
     * @param $mobile
     */
  public function getEmailMember($email,$uniacid=1)
  {
    $info = $this->where("email='{$email}' AND uniacid='{$uniacid}'")->find();     
     return $info;
  }
  /**
     * 添加用户信息，完成注册
     * @param $data
     */
  public function addMember($data,$uniacid=1){
      if(!is_array($data)){
         return 0;
      }
      $re = $this->getMobileMember($data['mobile']);
      if($re){
          return 0;
      }
      $data['uniacid'] = $uniacid;
      $data['createtime'] = $this->_time;
      $uid = $this->add($data);
      //注册地域
      /*$ip = get_client_ip();
      $place = ip_Place_Array($ip);
      $data['province'] = $place[2] ?$place[2]:'重庆';
      $data['city'] = $place[3] ?$place[3]:'重庆';*/
      $data['province'] = '重庆';
      $data['city'] = '重庆';
      
      return $uid;
  } 
  /**
     * 检测用户信息，完成登录
     * @param $data
     */ 
  public function getMemberInfo($data,$uniacid=1,$islogin=0){
      if(!is_array($data)){
         return 0;
      }
      $info = $this->where("(username='{$data[username]}' OR email='{$data[username]}' OR mobile='{$data[username]}') AND password='{$data[password]}'")->find();
      if($info){
         $info['loginip'] = get_client_ip();
         if($islogin){//是登录
             $mod = M('MemberLoginlog');
             $idata = array(
                'uid'=>$info['id'],
                'loginip' => $info['loginip'],
                'logintime'=>$this->_time
              );
             $mod->add($idata);
         }
        $info['mobile_show'] = substr_replace($info['mobile'],'****',3,4);
        $info['email_show'] = substr_replace($info['email'],'****',2,3);
         return $info;
      }
      return '';
  } 
  /**
     * 检测用户信息，完成登录
     * @param $data
     */ 
  public function getMemberInfoByUsernameandMobile($username,$mobile){
      if(!$mobile){
         return 0;
      }
      $info = $this->where("username='{$username}' AND (mobile='{$mobile}' OR email='{$mobile}') ")->find();
      
      return $info;
  }  
  /**
     * 获取用户信息 
     * @param $id
     */ 
  public function getMemberInfoById($id){
       $id = intval($id);
       if(!$id){
           return array();
       }
       $info = $this->where("id='{$id}'")->find();
       if($info){
          $info['mobile_show'] = substr_replace($info['mobile'],'****',3,4);
          $info['email_show'] = substr_replace($info['email'],'****',2,3);
          $info['user_type_show'] = $info['user_type']?'单位':'个人';
          $info['organization_id_show'] = '无';

          if($info['organization_id']){
            $mod = M('Organization');
            $organization = $mod->where(array('id'=>$info['organization_id']))->find();
            $info['organization_id_show'] = $organization?$organization['title']:$info['organization_id_show'];
            $MemberLevel_Unit = C('MemberLevel_Unit');
            $info['level_show'] = $MemberLevel_Unit[$info['level']];
          }else{
            $MemberLevel_Personal = C('MemberLevel_Personal');
            $info['level_show'] = $MemberLevel_Personal[$info['level']];
          }
       }

      
       return $info;
  }
  /**
     * 获取用户信息 
     * @param $id
     */ 
  public function getMemberInfoByAll($str){
      $info = $this->where("username='{$str}' OR mobile='{$str}' OR email='{$str}' ")->find();
      
      return $info;
      
       
  } 
  
    //获取积分或余额
    public function getCredit($uid = '', $credittype = 'credit1') {
 

      if (!empty($uid)) {       
        return $this->where("id='{$uid}'")->getField($credittype);
      } 

      return 0; 
  }
   //处理积分或余额
    public function setCredit( $credittype = 'credit1', $credits = 0, $log = array(),$uid=0,$info='用户消费购物',$module='bzjd') {
            $uid = $uid?$uid:$this->_uid;
            $member = $this->where("id='{$uid}'")->find(); 
            $value = $member[$credittype]; 
            $newcredit = $credits + $value;

            if ($newcredit <= 0) {
                $newcredit = 0;
            }
            $this->where("id='{$uid}'")->save(array($credittype => $newcredit));
            return true;
    }

     
  
}
  
