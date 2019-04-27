<?php

return array(
    //'配置项'=>'配置值'
    'LAYOUT_ON' => true,
    'LAYOUT_NAME' => 'Com/layout',
    /* 错误页面模板 */
    'TMPL_ACTION_ERROR' => MODULE_PATH . 'View/Com/dispatch_jump.html', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => MODULE_PATH . 'View/Com/dispatch_jump.html', // 默认成功跳转对应的模板文件 

    'URL_MODEL ' =>2,
    'PERM_MODEL' => array(
    	"1"=>"管理员管理",
    	"2"=>"会员管理",
    	"3"=>"标准管理",
    	"4"=>"企业管理",
    	"5"=>"商品管理",
    	"6"=>"新闻动态",
    	"7"=>"公告管理",
    	"8"=>"政策法规",
    	"9"=>"消息管理",
    	"10"=>"Banner图片",
    	"11"=>"设置",
    	"12"=>"数据统计",
    	),
    
);
