<?php
//加密函数
function cmd5($str)
{
   return md5($str.'ggg898967ghr');
}
//uuid
function guid(){
    static $guid = '';
    $uid = uniqid("", true);
    $data = $namespace;
    $data .= $_SERVER['REQUEST_TIME'];
    $data .= $_SERVER['HTTP_USER_AGENT'];
    $data .= $_SERVER['LOCAL_ADDR'];
    $data .= $_SERVER['LOCAL_PORT'];
    $data .= $_SERVER['REMOTE_ADDR'];
    $data .= $_SERVER['REMOTE_PORT'];
    $hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
     
    return $hash;
}
function isMobile()
{ 
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
    {
        return true;
    } 
    // 如果via信息含有wap则一定是移动设备
    if (isset ($_SERVER['HTTP_VIA']))
    { 
        // 找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    } 
    // 脑残法，判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT']))
    {
        $clientkeywords = array ('nokia',
            'sony',
            'ericsson',
            'mot',
            'samsung',
            'htc',
            'sgh',
            'lg',
            'sharp',
            'sie-',
            'philips',
            'panasonic',
            'alcatel',
            'lenovo',
            'iphone',
            'ipod',
            'blackberry',
            'meizu',
            'android',
            'netfront',
            'symbian',
            'ucweb',
            'windowsce',
            'palm',
            'operamini',
            'operamobi',
            'openwave',
            'nexusone',
            'cldc',
            'midp',
            'wap',
            'mobile'
            ); 
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
        {
            return true;
        } 
    } 
    // 协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT']))
    { 
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
        {
            return true;
        } 
    } 
    return false;
} 

 //统一短信函数   
    /*参数：（1）$mobile 手机号 （2）$param 参数 （3）$type 短信类型
    （4）$fromtype 是否阿里云
      返回 ：布尔值
    */
    function sendMsnFun($mobile,$param=array(),$type){
         if(!checkMobileFormat($mobile)){
             return false;             
          }

       //阿里云Sms
            
            
            $aly_param = array(); 
            switch($type){
            case 1://验证码模板
                $templateId = 'SMS_157065148';
                 
                break;
            case 2://注册验证码
                $templateId = 'SMS_157065144';
                 
                break;                    
            } 
            $dysms = new \Org\Com\Sms($templateId);

            $re = $dysms->send_verify($mobile, $param['code']);
            
            return true; 
          
        
        
         
    }
    function createQrcode($url,$logo=true,$qrname=0){
    $size='4';
    $level='L';
    $padding=2;   
    
    $text = $url;    
    //////////////////
    $path='./Public/Data/qrcode/';
    $qrname = $qrname?$qrname:time().'.png';
    $QR=$path.$qrname;
    vendor("Phpqrcode.phpqrcode");
    $QRcode = new \QRcode ();
    $QRcode::png($text,$QR, $level, $size,$padding);
    if($logo !== false){
        $QR = imagecreatefromstring(file_get_contents($QR));
        $logo = imagecreatefromstring(file_get_contents($logo));
        $QR_width = imagesx($QR);
        $QR_height = imagesy($QR);
        $logo_width = imagesx($logo);
        $logo_height = imagesy($logo);
        $logo_qr_width = $QR_width / 5;
        $scale = $logo_width / $logo_qr_width;
        $logo_qr_height = $logo_height / $scale;
        $from_width = ($QR_width - $logo_qr_width) / 2;
        imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
    }
    return $qrname;
   /* header("Content-Type:image/jpg");
    imagepng($QR);*/
}
 
/**
 * 邮件发送函数
 */
    function sendMail($to, $title, $content) {
     
        Vendor('PHPMailer.PHPMailer');     
        $mail = new \PHPMailer(); //实例化
        $mail->IsSMTP(); // 启用SMTP
        $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
        $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
        $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
        $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
        $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
        $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
        $mail->AddAddress($to,"尊敬的客户");
        $mail->WordWrap = 50; //设置每行字符长度
        $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
        $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
        $mail->Subject =$title; //邮件主题
        $mail->Body = $content; //邮件内容
        $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
        return($mail->Send());
    }
function random($length, $numeric = FALSE) {
    $seed = base_convert(md5(microtime() . $_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
    $seed = $numeric ? (str_replace('0', '', $seed) . '012340567890') : ($seed . 'zZ' . strtoupper($seed));
    if ($numeric) {
        $hash = '';
    } else {
        $hash = chr(rand(1, 26) + rand(0, 1) * 32 + 64);
        $length--;
    }
    $max = strlen($seed) - 1;
    for ($i = 0; $i < $length; $i++) {
        $hash .= $seed{mt_rand(0, $max)};
    }
    return $hash;
}
//验证密码格式
function checkPassword($str){
     $pattern = '/^[a-zA-Z0-9]{6,16}$/';
     $pattern1 = '/^[a-zA-Z]{6,16}$/';
     $pattern2 = '/^[0-9]{6,16}$/';
     if(preg_match($pattern1, $str) || preg_match($pattern2, $str)){
         return false;
     }
      
     if(preg_match($pattern, $str)){
         return true;
     }
     return false;
}
//验证密码格式
function checkPayPassword($str){     
     $pattern = '/^[0-9]{6}$/';
     
     if(preg_match($pattern, $str)){
         return true;
     }
     return false;
}
//验证邮箱格式
function checkMailFormat($mail){
    $pattern = '/^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/';
     if(preg_match($pattern, $mail)){
         return true;
     }
     return false;
}
//验证手机格式
function checkMobileFormat($mobile){
    $pattern = '/^1[0-9]{10}$/';
     if(preg_match($pattern, $mobile)){
         return true;
     }
     return false;
}
//验证用户名 只能数字和字母6到16位的
function checkUsernameFormat($username){
    //$pattern = '/^[A-Za-z0-9]{6,16}$/';
    $pattern = '/^[A-Za-z0-9]{5,16}$/';
    /* $pattern1 = '/\d+/' ;//'/^1[0-9]{10}$/';
     $pattern2 = '/[a-zA-Z]+/';*/
     if(preg_match($pattern, $username)){
         return true;
     }
     return false;
}
//验证身份证
function checkIDCardFormat($idcard){
    $pattern = '/(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/';
     if(preg_match($pattern, $idcard)){
         return true;
     }
     return false;
}
//验证银行卡号
function checkBankNumFormat($banknum){
    $pattern = '/^\d{16}|\d{19}$/';
     if(preg_match($pattern, $banknum)){
         return true;
     }
     return false;
}
//获取4为随机数
function srandNum($num=4){
    srand((double)microtime()*1000000);
    $ychar="0,1,2,3,4,5,6,7,8,9";
    $list=explode(",",$ychar);
    $authnum = '';    
    for($i=0;$i<$num;$i++){
        $randnum=rand(0,9); 
        $authnum.=$list[$randnum];
    }  
    return $authnum; 
}
//防止注入
function inject_check($str) { 
    $str = str_replace(" and ","",$str);
   $str = str_replace(" execute ","",$str);
   $str = str_replace(" update ","",$str);
   $str = str_replace(" count ","",$str);
   $str = str_replace(" chr ","",$str);
   $str = str_replace(" mid ","",$str);
   $str = str_replace(" master ","",$str);
   $str = str_replace(" truncate ","",$str);
   $str = str_replace(" char ","",$str);
   $str = str_replace(" declare ","",$str);
   $str = str_replace(" select ","",$str);
   $str = str_replace(" create ","",$str);
   $str = str_replace(" delete ","",$str);
   $str = str_replace(" insert ","",$str);
   $str = str_replace("'","",$str);
   $str = str_replace("\"","",$str);   
   $str = str_replace(" or ","",$str);
   //$str = str_replace("=","",$str);
   $str = str_replace("%20","",$str);
  // $str = str_replace(" ","",$str);
   return $str;
}

 
/** 
  *功能： 
  *     根据ip获得国家，省，城市，运营商 
  *备注： 
  *     利用的是新浪的ip查询接口 gb2312 
  *编写人：jiftle 
  *编写时间：11:17 2011年12月26日星期二 
 **/  
  function ip_Place_Array($ipAddr){  
           // $ipAddr = "218.75.124.100";  
           //http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip=218.75.124.100  
           //1  218.75.123.215  218.75.127.243  中国  浙江  杭州   电信  
           //http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip=60.185.82.120  
           //1  60.185.58.0 60.185.127.255  中国  浙江  衢州      电信  
           //http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip=66.85.151.82  
           //1  66.85.0.0   66.85.255.255   美国  得克萨斯州    El Paso  
           //http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip=188.138.84.132  
           //1  188.138.62.160  188.138.127.255 德国  nordrhein-westfalen  Hürth  
           //http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip=106.187.35.135  
           //1  106.128.0.0 106.191.255.255 日本  
            $ip138Addr = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip=".$ipAddr;  
            $contents = file_get_contents($ip138Addr);  
            $contents=iconv("GB2312", "UTF-8//IGNORE", $contents);//编码转换  
            //echo $contents;  
            $arTmp = explode("\t",$contents); //这里是让我感到奇怪的城市后面的字段  
            $arLocation = array($ipAddr,$arTmp[3],$arTmp[4],$arTmp[5],$arTmp[7]);  
  
            return $arLocation;  
         }  

function RemoveXSS($val) {  
   // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed  
   // this prevents some character re-spacing such as <java\0script>  
   // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs  
   $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);  
     
   // straight replacements, the user should never need these since they're normal characters  
   // this prevents like <IMG SRC=@avascript:alert('XSS')>  
   $search = 'abcdefghijklmnopqrstuvwxyz'; 
   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';  
   $search .= '1234567890!@#$%^&*()'; 
   $search .= '~`";:?+/={}[]-_|\'\\'; 
   for ($i = 0; $i < strlen($search); $i++) { 
      // ;? matches the ;, which is optional 
      // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars 
    
      // @ @ search for the hex values 
      $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ; 
      // @ @ 0{0,7} matches '0' zero to seven times  
      $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ; 
   } 
    
   // now the only remaining whitespace attacks are \t, \n, and \r 
   $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base'); 
   $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload'); 
   $ra = array_merge($ra1, $ra2); 
    
   $found = true; // keep replacing as long as the previous round replaced something 
   while ($found == true) { 
      $val_before = $val; 
      for ($i = 0; $i < sizeof($ra); $i++) { 
         $pattern = '/'; 
         for ($j = 0; $j < strlen($ra[$i]); $j++) { 
            if ($j > 0) { 
               $pattern .= '(';  
               $pattern .= '(&#[xX]0{0,8}([9ab]);)'; 
               $pattern .= '|';  
               $pattern .= '|(&#0{0,8}([9|10|13]);)'; 
               $pattern .= ')*'; 
            } 
            $pattern .= $ra[$i][$j]; 
         } 
         $pattern .= '/i';  
         $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag  
         $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags  
         if ($val_before == $val) {  
            // no replacements were made, so exit the loop  
            $found = false;  
         }  
      }  
   }  
   return $val;  
} 

function getRandomString($num)  
{  
    srand((double)microtime()*1000000);
    $ychar='a,b,c,d,e,f,g,h,i,j,k,m,n,p,q,r,s,t,u,v,w,x,y,z';
    $list=explode(",",$ychar);
    
    $authnum = '';    
    for($i=0;$i<$num;$i++){
        $randnum=rand(0,23); 
        $authnum.=$list[$randnum];
    }
    
    return $authnum;      
}
function defaultVal($val, $data){
    if(!$data){
        return $val;
    }else{
        return $data;
    }
}
/**
 * 接口查询商品
 */
function queryGoods($code){
    $host = "https://codequery.market.alicloudapi.com";
    $path = "/querybarcode";
    $method = "GET";
    $appcode = "ca1d6efac3644df1b3dcfe60e9d25c41";
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
    $querys = "code=".$code;
    $bodys = "";
    $url = $host . $path . "?" . $querys;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    if (1 == strpos("$".$host, "https://"))
    {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}

