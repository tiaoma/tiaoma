<?php
namespace Admin\Controller;
use Think\Controller;
class UtilController extends BaseController {
	
	public function daysAction() {
         
		//获取某月天数
		$year = intval($_POST['year']);
		$month = intval($_POST['month']);
		die(get_last_day($year, $month));
	}
}