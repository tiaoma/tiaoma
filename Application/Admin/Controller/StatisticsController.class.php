<?php
namespace Admin\Controller;
use Think\Controller;
class StatisticsController extends BaseController {
	public function loginstatisticsAction(){
		$LoginLog = M("MemberLoginlog");
		$year = I('year',date('Y')); 
	    $month = I('month');
	    $day = I('day');
        $datearr = $this->editdate($year,$month,$day);
        $years = $datearr["years"];
        $months = $datearr["months"];
        $totalcount = 0;  //总数
        $maxcount = 0;  //最高
        $maxcount_date = ''; //最高的日期
        $maxdate = '';    //最高的时间
        $countfield =  'count(*)  as c';
        $dataname = (!empty($year) && !empty($month)) ? '月份' : '日期';
        if (!empty($year) && !empty($month) && !empty($day)) {
		
		    
		    for ($hour = 0; $hour < 24; $hour++) {
		        $nexthour = $hour+1;

		        $qy = $LoginLog->query("SELECT count(*)  as c FROM " . $this->_dbprefix . "member_loginlog WHERE  logintime >=".strtotime("{$year}-{$month}-{$day} {$hour}:00:00")." and logintime <=".strtotime("{$year}-{$month}-{$day} {$hour}:59:59"));
		        $temp = isset($qy[0]['c'])?$qy[0]['c']:0;
		        $dr = array(
		            'data' => $hour.'点 - '.$nexthour."点",
		            'count' => $temp 
		           
		        );
		
		        $totalcount+=$dr['count']; 
		        if ($dr['count'] > $maxcount) {
		            $maxcount = $dr['count'];
		            $maxcount_date = "{$year}年{$month}月{$day}日 {$hour}点 - {$nexthour}点";
		        }
		
		        $list[] = $dr;
		    }
		     
		}
		else if (!empty($year) && !empty($month)) {
		    $lastday = get_last_day($year, $month);
		    for ($d = 1; $d <= $lastday; $d++) {
		    	$qy = $LoginLog->query("SELECT count(*)  as c FROM " . $this->_dbprefix . "member_loginlog WHERE  logintime >=".strtotime("{$year}-{$month}-{$d} 00:00:00")." and logintime <=".strtotime("{$year}-{$month}-{$d} 23:59:59"));
		        $temp = isset($qy[0]['c'])?$qy[0]['c']:0;
		        $dr = array(
		            'data' => $d,
		            'count' => $temp
		             
		        );		
		        $totalcount+=$dr['count'];
		        if ($dr['count'] > $maxcount) {
		            $maxcount = $dr['count'];
		            $maxcount_date = "{$year}年{$month}月{$d}日";
		        }		
		        $list[] = $dr;
		    }
		} else if (!empty($year)) {
		    foreach ($months as $m) {
		        $lastday = get_last_day($year, $m);
		        $qy = $LoginLog->query("SELECT count(*)  as c FROM " . $this->_dbprefix . "member_loginlog WHERE logintime >=".strtotime("{$year}-{$m['data']}-01 00:00:00")." and logintime <=".strtotime("{$year}-{$m['data']}-{$lastday} 23:59:59"));
                
		        $temp = isset($qy[0]['c'])?$qy[0]['c']:0;
		        $dr = array(
		            'data' => $m['data'],
		            'count' => $temp
		            
		        );
		        $totalcount+=$dr['count'];
		        if ($dr['count'] > $maxcount) {
		            $maxcount = $dr['count'];
		            $maxcount_date = "{$year}年{$m['data']}月";
		        }
		        $list[] = $dr;
		    }
		}
		/*foreach ($list as $key => &$row) {
		    $list[$key]['percent'] = number_format($row['count'] / (empty($totalcount) ? 1 : $totalcount) * 100, 2);
		}*/
		unset($row);

		$this->assign('year',$year);
        $this->assign('month',$month);
        $this->assign('day',$day);
		$this->assign('years',$years);
		$this->assign('list',$list);
        $this->assign('months',$months); 
		$this->display();
	}
	public function registerstatisticsAction(){
		$memberLog = M("Member");
		$year = I('year',date('Y')); 
	    $month = I('month');
	    $day = I('day');
        $datearr = $this->editdate($year,$month,$day);
        $years = $datearr["years"];
        $months = $datearr["months"];
        $totalcount = 0;  //总数
        $maxcount = 0;  //最高
        $maxcount_date = ''; //最高的日期
        $maxdate = '';    //最高的时间
        $countfield =  'count(*)  as c';
        $dataname = (!empty($year) && !empty($month)) ? '月份' : '日期';
        if (!empty($year) && !empty($month) && !empty($day)) {
		
		    
		    for ($hour = 0; $hour < 24; $hour++) {
		        $nexthour = $hour+1;

		        $qy = $memberLog->query("SELECT count(*)  as c FROM " . $this->_dbprefix . "member WHERE  createtime >=".strtotime("{$year}-{$month}-{$day} {$hour}:00:00")." and createtime <=".strtotime("{$year}-{$month}-{$day} {$hour}:59:59"));
		        $temp = isset($qy[0]['c'])?$qy[0]['c']:0;
		        $dr = array(
		            'data' => $hour.'点 - '.$nexthour."点",
		            'count' => $temp 
		           
		        );
		
		        $totalcount+=$dr['count']; 
		        if ($dr['count'] > $maxcount) {
		            $maxcount = $dr['count'];
		            $maxcount_date = "{$year}年{$month}月{$day}日 {$hour}点 - {$nexthour}点";
		        }
		
		        $list[] = $dr;
		    }
		     
		}
		else if (!empty($year) && !empty($month)) {
		    $lastday = get_last_day($year, $month);
		    for ($d = 1; $d <= $lastday; $d++) {
		    	$qy = $memberLog->query("SELECT count(*)  as c FROM " . $this->_dbprefix . "member WHERE  createtime >=".strtotime("{$year}-{$month}-{$d} 00:00:00")." and createtime <=".strtotime("{$year}-{$month}-{$d} 23:59:59"));
		        $temp = isset($qy[0]['c'])?$qy[0]['c']:0;
		        $dr = array(
		            'data' => $d,
		            'count' => $temp
		             
		        );		
		        $totalcount+=$dr['count'];
		        if ($dr['count'] > $maxcount) {
		            $maxcount = $dr['count'];
		            $maxcount_date = "{$year}年{$month}月{$d}日";
		        }		
		        $list[] = $dr;
		    }
		} else if (!empty($year)) {
		    foreach ($months as $m) {
		        $lastday = get_last_day($year, $m);
		        $qy = $memberLog->query("SELECT count(*)  as c FROM " . $this->_dbprefix . "member WHERE createtime >=".strtotime("{$year}-{$m['data']}-01 00:00:00")." and createtime <=".strtotime("{$year}-{$m['data']}-{$lastday} 23:59:59"));
                
		        $temp = isset($qy[0]['c'])?$qy[0]['c']:0;
		        $dr = array(
		            'data' => $m['data'],
		            'count' => $temp
		            
		        );
		        $totalcount+=$dr['count'];
		        if ($dr['count'] > $maxcount) {
		            $maxcount = $dr['count'];
		            $maxcount_date = "{$year}年{$m['data']}月";
		        }
		        $list[] = $dr;
		    }
		}
		unset($row);

		$this->assign('year',$year);
        $this->assign('month',$month);
        $this->assign('day',$day);
		$this->assign('years',$years);
		$this->assign('list',$list);
        $this->assign('months',$months);
		$this->display();
	}
	public function editdate($year='',$month='',$day=''){
		$day = intval($day);
		$list = array();
	    ////年份
		$years = array();
		$current_year = date('Y');
		$year = empty($year) ? $current_year : $year;
		for ($i = $current_year - 10; $i <= $current_year; $i++) {
		    $years[] = array('data' => $i, 'selected' => ($i == $year));
		}
		//月份
		$months = array();
        $current_month = date('m');
    
        for ($i = 1; $i <= 12; $i++) {
            $months[] = array('data' => $i, 'selected' => ($i == $month));
        }
        return array('years'=>$years,'months'=>$months);
        
	}
}