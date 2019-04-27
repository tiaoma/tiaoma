<?php

return array(
    //'配置项'=>'配置值'
    'APP_NAME' => '商品信息及标准公开查询平台',
    'URL_MODEL' => 2,
    'APP_KEYWORDS' => '',
    'APP_DESCRIPTION' => '',
    'APP_URL' => 'http://127.0.0.1/',
    'MOBILE_URL' => 'http://127.0.0.1/Mobile',
    'SESSION_OPTIONS'=>array('domain'=>'127.0.0.1'),//session配置
    'ACTION_SUFFIX' => 'Action', // 操作方法后缀  
    'SESSION_PREFIX' => 'sp_', // session 前缀              
    'SHOW_PAGE_TRACE' => false,
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => '39.100.72.24', // 服务器地址
    'DB_NAME' => 'tiaoma', // 数据库名
    'DB_USER' => 'tiaoma', // 用户名
    'DB_PWD' => '123456', // 密码
    'DB_PORT' => '3306', // 端口
    'DB_PREFIX' => 'sp_', // 数据库表前缀 
    'DB_PARAMS' => array('PDO::ATTR_CASE' => 'PDO::CASE_NATURAL'), // 数据库连接参数  
   
    'LOAD_EXT_CONFIG' => 'sys,',
    'weixin_conf'=>array('appid'=>'wx62c35fd2eeaab593','appsecret'=>'f7ae0fd82959019e1bc9d1a20d446313'),
);
