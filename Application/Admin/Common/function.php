<?php
function cutstr_html($string, $sublen){
    $string = strip_tags($string);
    $string = trim($string);
    $string = ereg_replace("&nbsp;","",$string);
    $string = ereg_replace("\t","",$string);
    $string = ereg_replace("\r\n","",$string);
    $string = ereg_replace("\r","",$string);
    $string = ereg_replace("\n","",$string);
    $string = ereg_replace(" ","",$string);
    return trim($string);
}
function column_str($key) {
        $array = array(
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ',
            'BA', 'BB', 'BC', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO', 'BP', 'BQ', 'BR', 'BS', 'BT', 'BU', 'BV', 'BW', 'BX', 'BY', 'BZ',
            'CA', 'CB', 'CC', 'CD', 'CE', 'CF', 'CG', 'CH', 'CI', 'CJ', 'CK', 'CL', 'CM', 'CN', 'CO', 'CP', 'CQ', 'CR', 'CS', 'CT', 'CU', 'CV', 'CW', 'CX', 'CY', 'CZ',
            'DA', 'DB', 'DC', 'DD', 'DE', 'DF', 'DG', 'DH', 'DI', 'DJ', 'DK', 'DL', 'DM', 'DN', 'DO', 'DP', 'DQ', 'DR', 'DS', 'DT', 'DU', 'DV', 'DW', 'DX', 'DY', 'DZ',
            'EA', 'EB', 'EC', 'ED', 'EE', 'EF', 'EG', 'EH', 'EI', 'EJ', 'EK', 'EL', 'EM', 'EN', 'EO', 'EP', 'EQ', 'ER', 'ES', 'ET', 'EU', 'EV', 'EW', 'EX', 'EY', 'EZ'
        );
        return $array[$key];
    }

function column($key, $columnnum = 1) {
        return column_str($key) . $columnnum;
    }
function export($list, $params = array(),$filename='',$savepath='') {
        header('Content-Type:text/html;charset=utf-8');
        Vendor('PhpExcel.PHPExcel');   
        Vendor("PhpExcel.PHPExcel.Writer.Excel2007");         

        $excel = new \PHPExcel();

        $excel->getProperties()->setCreator(C('APP_NAME'))->setLastModifiedBy(C('APP_NAME'))->setTitle("Office 2007 XLSX Test Document")->setSubject("Office 2007 XLSX Test Document")->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")->setKeywords("office 2007 openxml php")->setCategory("report file");
       
        $sheet =$excel->setActiveSheetIndex(0);
        
        //行数
        $rownum = 1;

        //标题
        foreach ($params['columns'] as $key => $column) {
            $sheet->setCellValue(column($key, $rownum), $column['title']);
            if (!empty($column['width'])) {
                $sheet->getColumnDimension(column_str($key))->setWidth($column['width']);
            }
        }

        $rownum++;
        //数据
        $len = count($params['columns']);;
        foreach ($list as $row) {

            for ($i = 0; $i < $len; $i++) {
                $value = isset($row[$params['columns'][$i]['field']])?$row[$params['columns'][$i]['field']]:'';
                $sheet->setCellValue(column($i, $rownum), $value);
            }
            $rownum++;
        }
        $excel->getActiveSheet()->setTitle($params['title']);
        if(!$filename){
           $filename = urlencode($params['title']).'.xlsx';
        }
        $excel->setActiveSheetIndex(0);
        if($savepath){
           $objWriter = PHPExcel_IOFactory:: createWriter($excel, 'Excel2007');
           $objWriter->save($savepath.'/'.$filename);
           return true;
        }
        
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory:: createWriter($excel, 'Excel2007');


        $objWriter->save( 'php://output');
        exit();
         die('ok');      
    }
//获取研究领域
function getfield(){
   $arrfield=array(
    0=>array(
        'headtitle'=>'工业领域',
        'cont'=>array('汽车制造与智能交通','有机材料(石油化工、高分子)','超细粉体和纳米技术','生物医药','医疗器械','软件与IC技术','通信与网络','先进制造技术','电子电力',' 光机电一体化','电子新材料',' 精密制造技术','电子标签','新能源技术与节能产品','无机材料(金属、陶瓷、建材)','电子信息')
        ),
    1=>array(
        'headtitle'=>'农业领域',
        'cont'=>array('土壤环境与肥料','植保农药','农业机械化',' 农产品加工保鲜','水产养殖','畜禽养殖','农作物','林木','园艺作物','农业信息')
        ),
    2=>array(
        'headtitle'=>'社会发展领域',
        'cont'=>array('器官移植与微创治疗研究','公共卫生安全','组织工程','精神与神经','传统产业清洁生产技术','中医药研究','交通与建筑技术','海洋资源开发与保护','防灾减灾技术',' 生殖健康研究','社会安全',' 生态环境、环保产品','心胸疾病','数字医学','大气污染控制技术',' 质检、遥感与GIS应用','基因工程')
        ),
    );
   return $arrfield;
}