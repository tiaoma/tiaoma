<?php  
namespace Common\Model;
use Think\Model\RelationModel;

class ComModel extends RelationModel
{
    public $_time;
    public function _initialize()
    {
        
        $this->_time = time();
    }
    
}
