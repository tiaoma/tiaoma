<?php
namespace Home\Controller;

//我的商品
class UgoodsController extends ComController
{
    public function indexAction()
    {
        $mod = D('Goods');
        $condition = array('unit_id' => $this->_unitid, 'del' => 0);
        $count = 0;
        if ($this->_unitid) {
            $count = $mod->where($condition)->count();// 查询满足要求的总记录数   
        }
        $this->assign('count', $count);
        $this->display();
    }

    //添加商品
    public function addAction()
    {
        $memberObj = D('Member');
        $meb = $memberObj->getMemberInfoById($this->_uid);defaultVal();
        if(IS_POST){
            if (!$meb['auth_time']) {
                exit(json_encode(['status'=>0,'msg'=>'非法操作']));
            }
            $mod = D('Goods');
            $data = $mod->create();
            if(!$data){
                exit(json_encode(['status'=>0,'msg'=>$mod->getError()]));
            }
            if($mod->checkBarcode($data['barcode'])){
                exit(json_encode(['status'=>0,'msg'=>'该商品条码已存在，请勿重复录入']));
            }
            $data['uid'] = $meb['id'];
            $data['unit_id'] = $meb['unit_id'];
            if(!$mod->addGoods($data)){
                exit(json_encode(['status'=>0,'msg'=>'添加商品失败']));
            }else{
                exit(json_encode(['status'=>1,'msg'=>'添加商品成功']));
            }
        }
        if (!$meb['auth_time']) {
            $this->redirect("Realauthentication/index");
        }
        $mod = M("MemberUnit");
        $unit = $mod->where("id='{$this->_unitid}'")->find();
        $this->assign('unit', $unit);
        $this->useJssdk();//调用jssdk
        $this->display();
    }


    //获取列表
    public function getlistAction()
    {
        layout(false);
        $mod = D('Goods');
        $condition = array('uid' => $this->_uid, 'del' => 0);
        $count = $mod->where($condition)->count();// 查询满足要求的总记录数            
        $Page = new \Think\Page($count, $this->_page_item_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $showPage = $Page->show();// 分页显示输出
        $list = $mod->where($condition)->order("addtime DESC")->limit($Page->firstRow . ',' . $Page->listRows)->select();


        $this->assign('page', $showPage);// 赋值分页输出*/
        $this->assign("list", $list);
        $html = $this->fetch('list');
        echo json_encode(array('listhtml' => $html, 'totalpage' => $Page->totalPages));
        die();


    }

    /**
     * 接口查询商品信息
     */
    public function queryGoodsAction(){
        $code = I('code');
        $res = M('goods')->where(['barcode'=>$code])->find();
        if($res){
            exit(0);
        }
        $result = queryGoods($code);
        echo $result;
    }
    /**
     * 商品图片ajax上传
     */
    public function upload_goods_imgAction(){
        $base64_image_content = I('file');
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
            $type = $result[2];
            $path = './Public/Data/' . date('Ymd') . '/';
            if(!is_dir($path))
                mkdir($path, 0777);//如果不存在tmp目录，则建立
            $path .= '/';
            $name_md5 = md5(time());
            for($i=0;$i<10;$i++){
                $path .= $name_md5[rand(0,30)];
            }
            $new_file = $path.'.'.$type;
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
                $url = substr($new_file,1);
                exit(json_encode(['status'=>1,'msg'=>'上传成功','data'=>$url]));
            }else{
                exit(json_encode(['status'=>0,'msg'=>'上传失败','data'=>'']));
            }

        }else{
            exit(json_encode(['status'=>0,'msg'=>'上传失败','data'=>'']));
        }
    }
}