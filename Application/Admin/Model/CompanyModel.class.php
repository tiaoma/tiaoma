<?php
namespace Admin\Model;
use Think\Model;

class  CompanyModel extends Model
{

    //更新字段
    public function updateData($name,$value)
    {
       
        //当这个字段已经存在 更新
        if($this->where("name='$name'")->find())
        {
            $this->where("name='$name'")->save(array('value'=>$value));
            return; 
        }
        //当这个字段不存在 添加
        
        $this->add(array('name'=>$name,'value'=>$value));
    }
    //获取所有数据
    public function getAllData()
    {
        $bdata  = $this->select();
        $list = array();
        foreach($bdata as $c)
        {
            $list[$c['name']] = $c['value'];            
        } 
        
        return $list;
       
    }

}