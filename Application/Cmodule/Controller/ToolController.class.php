<?php
namespace Cmodule\Controller;
use Think\Controller;
//工具
class ToolController extends Controller {
	//过滤敏感词
    public function filterWordAction($word){
    	ini_set('memory_limit', '1024M');
        $SensitivewordObj = D('SensitiveWord');
        $re = $SensitivewordObj->filterWord($word);
        return $re;
    }
}