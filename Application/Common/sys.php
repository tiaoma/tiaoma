<?php
return array(
//'配置项'=>'配置值'
  'DEFAULT_FILTER'  => 'inject_check,htmlspecialchars',
  'WWW_VERSION' => 10000066,
  'PAGE_ITEM_NUM' => 10,
  'AUTO_TIME_LOGIN'=>1296003,
  'AUTO_KEYWORDS' =>'qwh2017',
  'APP_KEYWORDS'=>'千万慧教育，消防工程师培训',
  'APP_DESCRIPTION'=>'千万慧教育是一个从事消防工程师培训网站，我们聘请硕、博士学位的高端一级消防工程师持证师资，专业提供一级消防工程师培训视频直播、录播和线下面授服务；同时提供在线模拟考试真题及答案解析，各消防工程师科目考试资料下载。找优秀的一消培训老师上千万慧教育',
  'COMPANY_NAME' => '千万慧教育科技有限公司',  
  'alysms_dy'=>array(
           'signname'=>'千万慧教育',           
           'accessKeyId'=>'LTAI7rT57YXiPhNn',
           'accessKeySecret'=>'YtW3KyVI9SXzhZQktT09WZYIkhiUuq'
        ),
  'MAIL_HOST' =>'smtp.mxhichina.com',
  'MAIL_SMTPAUTH' =>TRUE,
  'MAIL_USERNAME' =>'customerservice@xixinpt.com',//你的邮箱名    
  'MAIL_FROM' =>'customerservice@xixinpt.com',
  'MAIL_PASSWORD'=>'123456Kf2017',
  'MAIL_FROMNAME'=>'国家技术标准创新基地（重庆）',//发件人姓名     
  'MAIL_CHARSET' =>'utf-8',//设置邮件编码
  'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件  
  //'TMPL_EXCEPTION_FILE'   =>  '/Home/Index/index.html',// 异常页面的模板文件
  'ERROR_PAGE'            =>  './Home/Index/index.html', // 错误定向页面
  'NEWS_TYPE_LIST'=>array(
         1=>'考试',
         2=>'招聘',
         3=>'培训',
         4=>'行业'
  ),
  'EXAM_TYPE_LIST'=>array(
         1=>'模拟考试',
         2=>'历年真题',
         3=>'课后作业'
  ),
);