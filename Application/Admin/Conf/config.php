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
    	"3"=>"资料下载管理",
    	"4"=>"试题管理",
    	"5"=>"专家管理",
    	"6"=>"课程管理",
    	"7"=>"培训班管理",
    	"8"=>"消息管理",
    	"9"=>"Banner图片",
    	"10"=>"新闻动态",
    	"11"=>"公告管理",
    	"12"=>"友情链接",
    	"13"=>"意见反馈",
    	"14"=>"设置",
    	"15"=>"数据统计",
    	),
);
