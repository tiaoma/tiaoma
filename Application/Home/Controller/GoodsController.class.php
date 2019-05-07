<?php
namespace Home\Controller;
//商品查询
class GoodsController extends ComController
{
    public function indexAction()
    {
        $this->useJssdk();//调用jssdk
        $this->display();
    }

    public function infoAction()
    {
        $barcode = I('barcode');
        $barcode = trim($barcode);

        $mod = D('Goods');
        $info = $mod->where("del=0 and status=1 AND barcode='{$barcode}'")->find();
        if (!$info) {//如果不存在，则通过接口查询商品基本信息
            $result = json_decode(queryGoods($barcode), true);
            if ($result['status'] != '200') {
                $this->error('该商品不存在', U('Goods/index'));
            }
            $res_data = $result['result'];
            $info = [
               'title' => $res_data['goodsName'],
               'barcode' => $barcode,
               'spec' => $res_data['spec'],
               'trademark' => $res_data['trademark'],
               'summary' => $res_data['remark'],
               'thumb' => $res_data['img'],
            ];
            $mod = D('Goods');
            $data = $mod->create($info);
            if($data){
                $mod->addGoods($data);
            }
        }
        $mod->where("del=0 AND barcode='{$barcode}'")->setInc('viewnum');
        $standard = M('standard')->where(['standardnumber' => $info['standardnum']])->find();
        $this->assign("info", $info);
        $this->assign("standard", $standard);
        $this->assign("GBTitle", $info['title'] . '_');
        $this->display();
    }

}