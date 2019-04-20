<?php
namespace Common\Model;
use Think\Model;
//全文搜索
class FulltextSearchModel extends ComModel
{
    public function updateData($table_name,$data,$bid){
       $info = $this->where(array('bid'=>$bid,'table_name'=>$table_name))->find();
       if($info){
          $this->where(array('bid'=>$bid,'table_name'=>$table_name))->save($data);
       	  return;
       }
       $data['table_name'] = $table_name;       
       $data['bid'] = $bid; 
       $data['addtime'] = $this->_time;

       $this->add($data);
        
    }
    //删除数据
    public function deleteData($table_name,$bid){
        $this->where(array('bid'=>$bid,'table_name'=>$table_name))->delete();
    }

}

