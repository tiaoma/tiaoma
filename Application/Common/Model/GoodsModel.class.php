<?php
namespace Common\Model;
use Think\Model;

class GoodsModel extends ComModel
{
    protected $_validate        =   array(
        array('barcode','/^\d{13,14}$/','请输入13或14位的条形码',1),
        array('title','require','商品名称不能为空',1),
        array('standardnum','require','执行标准号不能为空',1)
    );  // 自动验证定义

    //检测商品条码是否已经存在
    public function checkBarcode($barcode,$id=0){
        $condition = "barcode='{$barcode}'";
        if($id){//排除该id
            $condition .= " AND id <> $id ";
        }
        if($this->where($condition)->find()){
            return true;
        }

        return false;
    }
    //添加商品信息
    public function addGoods($data){
        if(!is_array($data)){
            return 0;
        }
        $data['addtime'] = $this->_time;
        $data['id'] = guid();
        $id = $this->add($data);
        return $id;
    }
}

