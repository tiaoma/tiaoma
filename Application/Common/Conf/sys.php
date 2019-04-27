<?php
return array(
//'配置项'=>'配置值'
  'DEFAULT_FILTER'  => 'inject_check,htmlspecialchars',
  'WWW_VERSION' => 10000191,
  'PAGE_ITEM_NUM' => 10,
  'AUTO_TIME_LOGIN'=>1296003,
  'AUTO_KEYWORDS' =>'qwh2017',
  'APP_KEYWORDS'=>'商品信息及标准公开查询平台',
  'APP_DESCRIPTION'=>'商品信息及标准公开查询平台',
  'COMPANY_NAME' => '重庆条码技术与应用协会',  
  'alysms_dy'=>array(
           'signname'=>'重庆条码技术与应用协会',           
           'accessKeyId'=>'LTAI7rT57YXiPhNn',
           'accessKeySecret'=>'YtW3KyVI9SXzhZQktT09WZYIkhiUuq'
        ),  
  'dispatch_error_tmpl' => './Home/Com/dispatch_jump.tpl',
  'ERROR_PAGE'            =>  './Home/Index/index.html', 
  //标准状态
  'standard_status' => array(
      0=>"未生效",
      1=>"现行",
      2=>"废止",      
      ),
  //标准类型
   'standard_type' => array(
      0=>"国际标准",
      1=>"国家标准",
      2=>"行业标准",
      3=>"地方标准", 
      4=>"团体标准", 
      5=>"企业标准",       
      ),
   
);
