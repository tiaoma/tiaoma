<?php
namespace Common\Model;
use Think\Model;

class SyssetModel extends ComModel
{
     

    /**
     * 获取配置
     */
    public function getSysset($key = '', $uniacid = 1) {     

        $set = $this->where("uniacid='{$uniacid}'")->find();
        $allset = unserialize($set['sets']);
        
        $retsets = array();
        if (!empty($key)) {
            if (is_array($key)) {
                foreach ($key as $k) {
                    $retsets[$k] = isset($allset[$k]) ? $allset[$k] : array();
                }
            } else {
                $retsets = isset($allset[$key]) ? $allset[$key] : array();
            }
            return $retsets;
        } else {
            return $allset;
        }
    }
    public function updateSysset($values, $uniacid = 1) {
        $setdata = $this->where("uniacid='{$uniacid}'")->find();
        if (!$setdata) {
            $this->add(array('sets' => serialize($values), 'uniacid' => $uniacid));
        } else {
            $sets = serialize($setdata['sets']);
            $sets = is_array($sets) ? $sets : array();
            foreach ($values as $key => $value) {
                foreach ($value as $k => $v) {
                    $sets[$key][$k] = $v;
                }
            }
            $this->where("id='{$setdata[id]}'")->save(array('sets' =>serialize($sets)));
        }        
    }

   
}

