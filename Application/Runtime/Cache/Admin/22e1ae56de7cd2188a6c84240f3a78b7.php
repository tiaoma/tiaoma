<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<title><?php echo (C("APP_NAME")); ?></title>
<meta name="description" content="<?php echo (C("APP_NAME")); ?>">
<meta name="author" content="<?php echo (C("APP_NAME")); ?>">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!--[if lt IE 9]>
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/html5.js"></script>
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/respond.min.js"></script>
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/PIE_IE678.js"></script>
<![endif]-->
<link href="/sptmcx/Public/Huiadmin/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/sptmcx/Public/Huiadmin/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link href="/sptmcx/Public/Huiadmin/lib/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!--[if IE 7]>
<link href="/sptmcx/Public/Huiadmin/lib/font-awesome/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
<![endif]-->
<link href="/sptmcx/Public/Huiadmin/lib/iconfont/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<link href="/sptmcx/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<!-- <link rel="stylesheet" type="text/css" href="/sptmcx/Public/Datetimepicker2.3.7/Datetimepicker/jquery.datetimepicker.css"/ >  -->
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/jquery.min.js"></script> 
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/layer1.8/layer.min.js"></script>
  
</head>
<body>
<header class="Hui-header cl"> <a class="Hui-logo l" title="H-ui.admin v2.2" href="<?php echo U('Home/Index/index');?>"><?php echo (C("APP_NAME")); ?></a> <a class="Hui-logo-m l" href="/" title="H-ui.admin">H-ui</a> <span class="Hui-subtitle l">V1.0</span> <span class="Hui-userbox"><span class="c-white"><?php echo ($username); ?></span> <a class="btn btn-danger radius ml-10" href="<?php echo U('Admin/Index/loginout');?>" title="退出"><i class="icon-off"></i> 退出</a></span> <a aria-hidden="false" class="Hui-nav-toggle" href="#"></a> </header>
<aside class="Hui-aside">
  <input runat="server" id="divScrollValue" type="hidden" value="" />
  <div class="menu_dropdown bk_2">
  <?php if(in_array('1',$upermarr)): ?><dl id="menu-user">
    <dt><i class="icon-paste"></i> 管理员管理<i class="iconfont menu_dropdown-arrow">&#xf02a9;</i></dt>
    <dd>
      <ul>
        <li><a _href="<?php echo U('Adminlist/index');?>" href="javascript:void(0);">管理员列表</a></li> 
        <li><a _href="<?php echo U('Adminlist/add');?>" href="javascript:void(0);">添加管理员</a></li>
      </ul>
    </dd>
  </dl><?php endif; ?>
   <?php if(in_array('2',$upermarr)): ?><dl id="menu-user">
      <dt><i class="icon-paste"></i> 会员管理<i class="iconfont menu_dropdown-arrow">&#xf02a9;</i></dt>
      <dd>
        <ul>
          <li><a _href="<?php echo U('Memberlist/index');?>" href="javascript:void(0);">会员列表</a></li> 
          <li><a _href="<?php echo U('Memberlist/add');?>" href="javascript:void(0);">添加会员</a></li>
          <li><a _href="<?php echo U('Realauthentication/index');?>" href="javascript:void(0);">实名认证</a></li>  
        </ul>
      </dd>
    </dl><?php endif; ?> 
    <?php if(in_array('3',$upermarr)): ?><dl id="menu-user">
      <dt><i class="icon-paste"></i> 资料下载管理<i class="iconfont menu_dropdown-arrow">&#xf02a9;</i></dt>
      <dd>
        <ul>
          <li><a _href="<?php echo U('Downloadfile/index');?>" href="javascript:void(0);">资料列表</a></li> 
          <li><a _href="<?php echo U('Downloadfile/add');?>" href="javascript:void(0);">添加资料</a></li>         
        </ul>
      </dd>
    </dl><?php endif; ?> 
      
   
    <?php if(in_array('8',$upermarr)): ?><dl id="menu-user">
      <dt><i class="icon-paste"></i> 消息管理<i class="iconfont menu_dropdown-arrow">&#xf02a9;</i></dt>
      <dd>
        <ul>
          <li><a _href="<?php echo U('Msg/index');?>" href="javascript:void(0);">消息列表</a></li> 
          <li><a _href="<?php echo U('Msg/add');?>" href="javascript:void(0);">添加消息</a></li>        
        </ul>
      </dd>
    </dl><?php endif; ?>
    <?php if(in_array('9',$upermarr)): ?><dl id="menu-product">
      <dt><i class="icon-paste"></i> Banner图片<i class="iconfont menu_dropdown-arrow">&#xf02a9;</i></dt>
      <dd>
        <ul>
          <li><a _href="<?php echo U('Banner/index');?>" href="javascript:void(0)">Banner列表</a></li>
          <li><a _href="<?php echo U('Banner/add');?>" href="javascript:void(0)">添加Banner图片</a></li>           
        </ul>
      </dd>
    </dl><?php endif; ?>
    <?php if(in_array('10',$upermarr)): ?><dl id="menu-product">
      <dt><i class="icon-paste"></i> 新闻动态<i class="iconfont menu_dropdown-arrow">&#xf02a9;</i></dt>
      <dd>
        <ul>
          <li><a _href="<?php echo U('News/index');?>" href="javascript:void(0)">新闻列表</a></li>
          <li><a _href="<?php echo U('News/add');?>" href="javascript:void(0)">添加新闻</a></li>       
        </ul>
      </dd>
    </dl><?php endif; ?>
   
    <?php if(in_array('11',$upermarr)): ?><dl id="menu-product">
      <dt><i class="icon-paste"></i> 公告管理<i class="iconfont menu_dropdown-arrow">&#xf02a9;</i></dt>
      <dd>
        <ul>
          <li><a _href="<?php echo U('Announce/index');?>" href="javascript:void(0)">公告列表</a></li>
          <li><a _href="<?php echo U('Announce/add');?>" href="javascript:void(0)">添加公告</a></li>          
        </ul>
      </dd>
    </dl><?php endif; ?>
     <?php if(in_array('11',$upermarr)): ?><dl id="menu-product">
      <dt><i class="icon-paste"></i> 政策法规<i class="iconfont menu_dropdown-arrow">&#xf02a9;</i></dt>
      <dd>
        <ul>
          <li><a _href="<?php echo U('Policies/index');?>" href="javascript:void(0)">政策列表</a></li>
          <li><a _href="<?php echo U('Policies/add');?>" href="javascript:void(0)">添加政策</a></li>          
        </ul>
      </dd>
    </dl><?php endif; ?>
    <?php if(in_array('12',$upermarr)): ?><dl id="menu-tongji" >
      <dt><i class="icon-paste"></i> 企业管理<i class="iconfont menu_dropdown-arrow">&#xf02a9;</i></dt>
      <dd>
        <ul>
          <li><a _href="<?php echo U('Company/index');?>" href="javascript:void(0)">企业列表</a></li>
          <li><a _href="<?php echo U('Company/add');?>" href="javascript:void(0)">添加企业</a></li>                      
        </ul>
      </dd>
    </dl><?php endif; ?>
    <?php if(in_array('12',$upermarr)): ?><dl id="menu-tongji" >
      <dt><i class="icon-paste"></i> 商品管理<i class="iconfont menu_dropdown-arrow">&#xf02a9;</i></dt>
      <dd>
        <ul>
          <li><a _href="<?php echo U('Goods/index');?>" href="javascript:void(0)">商品列表</a></li>
          <li><a _href="<?php echo U('Goods/add');?>" href="javascript:void(0)">添加商品</a></li>                      
        </ul>
      </dd>
    </dl><?php endif; ?>
   
    <?php if(in_array('14',$upermarr)): ?><dl id="menu-tongji" >
      <dt><i class="icon-paste"></i> 设置<i class="iconfont menu_dropdown-arrow">&#xf02a9;</i></dt>
      <dd>
        <ul>
          <li><a _href="<?php echo U('Sysset/close');?>" href="javascript:void(0)">系统状态</a></li>                     
        </ul>
      </dd>
    </dl><?php endif; ?>
   
    <?php if(in_array('15',$upermarr)): ?><dl id="menu-tongji" >
      <dt><i class="icon-paste"></i> 数据统计<i class="iconfont menu_dropdown-arrow">&#xf02a9;</i></dt>
      <dd>
        <ul>
          <li><a _href="<?php echo U('Statistics/loginstatistics');?>" href="javascript:void(0)">登录统计</a></li> 
          <li><a _href="<?php echo U('Statistics/registerstatistics');?>" href="javascript:void(0)">注册统计</a></li>                     
        </ul>
      </dd>
    </dl><?php endif; ?> 
  </div>
</aside>
<div class="dislpayArrow"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
  <div id="Hui-tabNav" class="Hui-tabNav">
    <div class="Hui-tabNav-wp">
      <ul id="min_title_list" class="acrossTab cl">
        <li class="active"><span title="我的桌面" data-href="welcome.html">我的桌面</span><em></em></li>
      </ul>
    </div>
    <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="icon-step-backward"></i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="icon-step-forward"></i></a></div>
  </div>
  <div id="iframe_box" class="Hui-article">
    <div class="show_iframe">
      <div style="display:none" class="loading"></div>
      <iframe scrolling="yes" frameborder="0" src="desktop.html"></iframe>
    </div>
  </div>
</section>

<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/laypage/laypage.js"></script> 
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/js/H-ui.js"></script>  
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/js/H-ui.admin.doc.js"></script>
<script type="text/javascript" src="/sptmcx/Public/Datetimepicker/Datetimepicker2.3.7/jquery.datetimepicker.js"/ > </script>

 

</body>
</html>